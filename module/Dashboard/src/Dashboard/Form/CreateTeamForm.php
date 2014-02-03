<?php
/**
 * User: Tittu
 * Date: 1/8/14
 * Time: 2:38 PM
 */

namespace Dashboard\Form;
use Zend\Form\Form;

class CreateTeamForm extends Form{

    public function __construct($name = null){
        parent::__construct ('Create Team');

        $this->setAttribute('method', 'post');
        $this->setAttribute('action', 'dashboard/foo');
        $this->add(array(
                'name' => 'teamName',
                'attributes' => array(
                    'type' => 'text',
                    'placeholder' => 'Enter Team Name',
                    'id' => 'inputTeamName'
                ),
                'options' => array('label' => 'Name')
            ))->add(array(
                'name' => 'teamManager',
                'attributes' => array(
                    'type' => 'text',
                    'placeholder' => 'Enter Team Manager name',
                    'id' => 'inputTeamManagerName'
                ),
                'options' => array('label' => 'Manager Name')
            ))->add(array(
                'name' => 'teamPMO',
                'attributes' => array(
                    'type' => 'text',
                    'placeholder' => 'Enter Team PMO name',
                    'id' => 'inputTeamPMOName'
                ),
                'options' => array('label' => 'PMO Name')
               
            ))->add(array(
                'name' => 'teamSOW',
                'attributes' => array(
                    'type' => 'text',
                    'placeholder' => 'Enter SOW Code',
                    'id' => 'inputTeamSOW'
                ),
                'options' => array('label' => 'SOW')
            ))->add(array(
                'name' => 'teamDesc',
                'type' => 'textarea',
                'attributes' => array(
                    'row' => 3,
                    'placeholder' => 'Enter Team Description',
                    'id' => 'inputTeamDesc'
                ),
                'options' => array('label' => 'Description')
            ))->add(array(
                'type' => 'Zend\Form\Element\Csrf',
                'name' => 'csrf',
            ))->add(array(
                'name' => 'button-submit',
                'type' => 'button',
                'attributes' => array('type' => 'submit'),
                'options' => array('label' => 'Submit')
            ));         
    }
} 

// ->add(array(
// 		'name' => 'team_manager',
// 		'type' => 'select',
// 		'attributes' => array('id' => 'inputTeamManager'),
// 		'options' => array('value_options' => array('Sudhir','Byna'),'label' => 'Manager')
		 
// ))->add(array(
// 		'name' => 'team_pmo',
// 		'type' => 'select',
// 		'attributes' => array('id' => 'inputTeamPMO'),
// 		'options' => array('value_options' => array('Bill Norton', 'Mellisa'),'label' => 'PMO')
		 
// ))