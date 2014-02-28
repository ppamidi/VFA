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
use User\Entity\User;
use Zend\View\Model\ViewModel;
use Zend\View\View;
use Doctrine\ORM\EntityManager;
use Application\Entity\AccessToken;

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
    
    public function validateAction(){      
        $response = Json::decode($this->getRequest()->getPost('response'), TRUE);    
        if ($response) {
            
         	$userEmail = $response['user']['contact']['email_addresses'][0]['address']; 	
         	$user = User::retrieveUser($response, $this->getEntityManager());
         	
         	if (!$user) {
         		$user = new User();
         		$user->persistUser($response, $this->getEntityManager());
         	}
         	
        	$authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        	 
        	$adapter = $authService->getAdapter();
        	$adapter->setIdentityValue($userEmail);
        	$adapter->setCredentialValue(1);
        	$authResult = $authService->authenticate();
        	 
        	if ($authResult->isValid()){
        	    AccessToken::persistAccessToken($response, $this->getEntityManager());       	    
        		return $this->redirect()->toRoute('dashboard', array(
        				'action' =>  'index',
        		));
        	}else{
        		return $this-> redirect()->toRoute('home');
        	};
        }else {
        	return $this-> redirect()->toRoute('home');
        }
        
    }
    
    public function indexAction()
    {
        return array();
    }
    
    public function fooAction()
    {
        return array();
    }
}
