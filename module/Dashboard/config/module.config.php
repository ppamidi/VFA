<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Dashboard\Controller\Index' => 'Dashboard\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'dashboard' => array(
                'type'    => 'segment',
                'options' => array(
                		'route'    => '/dashboard[/:action][/:user]',
                		'constraints' => array(
                		        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                				'user'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                		),
                		'defaults' => array(
                				'controller' => 'Dashboard\Controller\Index',
                				'action'        => 'index',
                		),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_map' => array(
        	'dashboard/memberlist' =>  __DIR__ . '/../view/Partial/MemberList.phtml',
            'dashboard/teamList' =>  __DIR__ . '/../view/Partial/TeamList.phtml',
            'dashboard/testAngularPartial' =>  __DIR__ . '/../view/Partial/TestAngularPartial.phtml',
         ),
        'template_path_stack' => array(
            'Dashboard' => __DIR__ . '/../view',
          ),
    ),
    'doctrine' => array(
    		'driver' => array(
    				'application_entities' => array(
    						'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
    						'cache' => 'array',
    						'paths' => array(__DIR__ . '/../src/Dashboard/Entity')
    				),
    
    				'orm_default' => array(
    						'drivers' => array(
    								'Dashboard\Entity' => 'application_entities'
    						)
    				)
    		)
    ),
);
