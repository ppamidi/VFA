<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/User for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Json\Json;
use Application\Entity\User;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $response = Json::decode($this->getRequest()->getPost('response'), TRUE);
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $user =User::retrieveUser($response, $objectManager);

         
        if ($user && $user->getVerified()){
        
        	return $this->forward()->dispatch('Dashboard/Controller/Index',array(
        			'action' => 'foo',
        			'user'   => $user
        	)) ;
        }else{
        	return $this-> redirect()->toRoute('/');
        }
        
        return array();
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /index/index/foo
        return array();
    }
}
