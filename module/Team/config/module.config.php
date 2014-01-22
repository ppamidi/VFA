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
                		'type'    => 'segment',
                		'options' => array(
                				'route'    => '/team[/:team]',
                				'constraints' => array(
            			     		'team'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                				),
                				'defaults' => array(
                    				'controller' => 'Team\Controller\Index',
                                    'action'        => 'index',
                			),
                	),      
            ),
        ),
    ),
    'view_manager' => array(
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
