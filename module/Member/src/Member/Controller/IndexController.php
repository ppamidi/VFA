<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Member for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Member\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;
use Member\Entity\Member;
use Doctrine\ORM\EntityManager;



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
    
    
    public function indexAction()
    {
        return array();
    }

    public function retrieveMemberAction(){
    	$response = Json::decode($_POST['member'], true);
    	$memberEmail = $response[0]['contact']['email_addresses'][0]['address'];
    	$memberImage = $response[0]['mugshot_url'];
    	$memberName = $response[0]['full_name'];
    	 
    	$view = new ViewModel(array('name' => $memberName, 'email' => $memberEmail, 'image' => $memberImage , 'response' => $response));
    	$view->setTerminal(true);
    	$view->setTemplate('member/thumbnail');
    	return $view;
    }
    
    public function addMemberAction(){
        
        $this->layout('layout/home');
         
         $response = $this->getResponse();
         $request = Json::decode($_POST['response'], true);
         
         if ($request) {          
             $member = Member::retrieveMember($request, $this->getEntityManager());         
        	   if (!$member) {
             		$member = new Member();
             		$member->persistMember($request, $this->getEntityManager());
             		$response->setStatusCode(200);
             		$this->getEventManager()->trigger('updateList', null, array('member' => $member));
               }
        }else{
            $response->setStatusCode(500);
            $response->setContent("Bad Request");
        }       
        
        return $response;
    }
    
    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /index/index/foo
        return array();
    }
}
