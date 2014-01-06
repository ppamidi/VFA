<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
 public function indexAction()
    {
        
      
        
//         $dm = $this->getServiceLocator()->get('doctrine.documentmanager.odm_default');
        
//         $user = new User();
        
//         $user->setFirstName('Prasad');
        
//         $user->setLastName('Pamidi');
        
//         $dm->persist($user);
        
//         $dm->flush();
        
//         $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

//         var_dump( $objectManager->find('Application\Entity\User', '1508450159'));
        
//         $token = new AccessToken();
        
//         $token->setUserID(23232344);
//         $token->setNetworkID('3435454');
//         $token->setNetworkName('Capgemini');
//         $token->setToken('sdsdsdsds');
//         $token->setCreatedAt('12/3/2013');
//         $token->setFullName('Prasad Pamidi');

  
//         $user = new User();
//         $user->setFullName('Prasad Pamidi');
//         $user->setEmailAddress('prasadmailid50@gmail.com');
//         $user->setPassword('tittu2003');
//         $user->setUserName('prasad1250');
        
//         $objectManager->persist($user);
//         $objectManager->flush();
//         $newId = $user->getId();
        
//     	$objectManager->persist($token);
//      $objectManager->flush();
        
        // If you used another name for the authentication service, change it here
//         $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        
//         $adapter = $authService->getAdapter();
//         $adapter->setIdentityValue('prasadmailid50@gmail.com');
//         $adapter->setCredentialValue('tittu2003');
//         $authResult = $authService->authenticate();
        
//         if ($authResult->isValid()) {
//             $identity = $authResult->getIdentity();
//             $authService->getStorage()->write($identity);
            
//         	//return $this->redirect()->toRoute('log-in');
//         }
           
        return new ViewModel(array(
//             'error' => 'Your authentication credentials are not valid',
        ));
    }
}
