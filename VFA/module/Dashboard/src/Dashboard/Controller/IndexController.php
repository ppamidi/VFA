<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Dashboard for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Dashboard\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout('layout/home');
       
        $user = $this->getEvent()->getRouteMatch()->getParam('user');;      
//         if ($user) {
//         	 var_dump($user);
//         }else{
//             return $this-> redirect()->toRoute('home');
//         } 
       
        
        return array();
    }

    public function fooAction()
    {  
        return array();
    }
}
