<?php
/**
 * Created by PhpStorm.
 * User: Tittu
 * Date: 1/8/14
 * Time: 2:38 PM
 */

namespace Dashboard\Form;
use Zend\Form\Form;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Team;

class CreateTeamForm extends Form{

    public function __construct($name = null){
        parent::__construct ('Create Team');

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');       
        $this->setHydrator(new DoctrineHydrator($objectManager))
        ->setObject(new Team());

        $this->setAttribute('method', 'post');
        $this->add(array(
                'name' => 'input-text',
                'attributes' => array(
                    'type' => 'text',
                    'placeholder' => 'Enter Team Name',
                    'id' => 'inputTeamName'
                ),
                'options' => array('label' => 'Name')
            ))->add(array(
                'name' => 'select',
                'type' => 'select',
                'attributes' => array('id' => 'inputTeamManager'),
                'options' => array('value_options' => array('Sudhir','Byna'),'label' => 'Manager')
               
            ))->add(array(
                'name' => 'select',
                'type' => 'select',
                'attributes' => array('id' => 'inputTeamPMO'),
                'options' => array('value_options' => array('Bill Norton', 'Mellisa'),'label' => 'PMO')
               
            ))->add(array(
                'name' => 'input-text',
                'attributes' => array(
                    'type' => 'text',
                    'placeholder' => 'Enter SOW Code',
                    'id' => 'inputTeamSOW'
                ),
                'options' => array('label' => 'SOW')
            ))->add(array(
                'name' => 'input-text-area',
                'type' => 'textarea',
                'attributes' => array(
                    'row' => 3,
                    'placeholder' => 'Enter Team Description',
                    'id' => 'inputTeamDesc'
                ),
                'options' => array('label' => 'Description')
            ))->add(array(
                'name' => 'input-file',
                'attributes' => array(
                    'type' => 'file',
                    'id' => 'inputTeamImage'
                ),
                'options' => array(
                    'label' => 'Select Image File',
                 )
            ))->add(array(
                'name' => 'button-submit',
                'type' => 'button',
                'attributes' => array('type' => 'submit'),
                'options' => array('label' => 'Submit')
            ));
}
} 