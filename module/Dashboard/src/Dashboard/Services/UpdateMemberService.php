<?php
namespace Dashboard\src\Dashboard\Services;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManagerAwareInterface;

class UpdateMemberService implements EventManagerAwareInterface
{
    
    /**
     * @var EventManagerInterface
     */
    protected $eventManager;
    
    /**
     * @param  EventManagerInterface $eventManager
     * @return void
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
    	$this->eventManager = $eventManager;
    }
    
    /**
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
         $eventManager->addIdentifiers(array(

             get_called_class()
         
         ));
    
        $this->eventManager = $eventManager;
    }
    
    
}

?>