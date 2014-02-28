<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Team\Controller\Index' => 'Team\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'team' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/team[/:action][/:teamName]',
                    'constraints' => array(
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'teamName'     => '[a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Team\Controller',
                        'controller'    => 'Index',
                        'action' => 'index',
                    ),
                ),               
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'team/profile' =>  __DIR__ . '/../view/Partial/TeamProfile.phtml',
        ),
        'template_path_stack' => array(
            'Team' => __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
    		'driver' => array(
    				'application_entities' => array(
    						'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
    						'cache' => 'array',
    						'paths' => array(__DIR__ . '/../src/Team/Entity')
    				),
    
    				'orm_default' => array(
    						'drivers' => array(
    								'Team\Entity' => 'application_entities'
    						)
    				)
    		)
    ),
);
