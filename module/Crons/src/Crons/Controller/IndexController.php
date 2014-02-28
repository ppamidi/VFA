<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Crons for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Crons\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Application\Entity\AccessToken;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    protected $entityManager;
    
    /**
     * Sets the EntityManager
     *
     * @param EntityManager $em
     * @access protected
     * @return PostController
     */
    protected function setEntityManager(EntityManager $em)
    {
        $this->entityManager = $em;
        return $this;
    }
    
    /**
     * Returns the EntityManager
     *
     * Fetches the EntityManager from ServiceLocator if it has not been initiated
     * and then returns it
     *
     * @access protected
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        }
        return $this->entityManager;
    }
    
    public function getPostsAction(){
        
        $request = $this->getRequest();
         
//         if (!$request instanceof ConsoleRequest){
//             throw new \RuntimeException('You can only use this action from a console!');
//         }
        
        // Check mode
//         $mode = $request->getParam('mode', 'all'); // defaults to 'all'
        
        $postUrl = 'https://www.yammer.com/api/v1/messages/in_group/YammerVacation.json';
         
        $accesToken = AccessToken::retrieveAccessToken($this->getEntityManager());
        $token = $accesToken[0];
        
        $headr = array();
        $headr[] = "Content-type: application/json";
        $headr[] = "Authorization: Bearer ". $token->getTokenId();
        
        $ch = curl_init();
         
        curl_setopt($ch,CURLOPT_URL,$postUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headr
        );
         
        $responseArray = Json::decode(curl_exec($ch), TRUE)['messages'];

        
        curl_close($ch);
        return json_encode($responseArray);
        
    }
    public function indexAction()
    {
        

    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /index/index/foo
        return array();
    }
}
