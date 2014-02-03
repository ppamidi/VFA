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
use Zend\Form\Factory;
use Dashboard\Form\CreateTeamForm;
use Team\Entity\Team;
use Doctrine\ORM\EntityManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;

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
    
    public function fooAction()
    {
        $this->layout('layout/home');

        $team = new Team();
        $form = new CreateTeamForm();
        $form->setHydrator(new DoctrineEntity($this->getEntityManager(), 'Team\Entity\Team'));
        $form->setInputFilter($team->getInputFilter());
        $form->bind($team);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$form->setData($request->getPost());
        	if ($form->isValid()) {
        		$this->getEntityManager()->persist($team);
        		$this->getEntityManager()->flush();
        		
        		return $this-> redirect()->toRoute('dashboard');
        	}
        }else{
            return array(
            		'form' => $form
            );
        } 
  
    }

    public function indexAction()
    {  
        $this->layout('layout/home', array('user' => $this->identity()));
        
        if ($user = $this->identity()) {
        	 $user = $this->identity();
        }
        
        
       
        $team = new Team();
        $form = new CreateTeamForm();
        $form->setHydrator(new DoctrineEntity($this->getEntityManager(), 'Team\Entity\Team'));
        $form->setInputFilter($team->getInputFilter());
        $form->bind($team);  
        $teams = $this->getEntityManager()->getRepository('Team\Entity\Team')->findAll();
        $members = $this->getEntityManager()->getRepository('Member\Entity\Member')->findAll();    
            
        if ($user) {      
           	return array("form" => $form, "user" => $user, "teams" => $teams, "members" => $members);
         }else {
             return array("form" => $form, "teams" => $teams);
         }        
        
    }
}
