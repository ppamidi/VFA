<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Member\Controller\Index' => 'Member\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'member' => array(
               'type'    => 'segment',
                'options' => array(
                		'route'    => '/member[/:action][/:member]',
                		'constraints' => array(
                		        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                				'member'     => '[a-zA-Z0-9_-]*',
                		),
                		'defaults' => array(
                				'controller' => 'Member\Controller\Index',
                				'action'        => 'index',
                		),
                ),
             ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
        		'member/thumbnail' =>  __DIR__ . '/../view/Partial/MediaThumbnail.phtml',
        ),
        'template_path_stack' => array(
            'Member' => __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
    		'driver' => array(
    				'application_entities' => array(
    						'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
    						'cache' => 'array',
    						'paths' => array(__DIR__ . '/../src/Member/Entity')
    				),
    
    				'orm_default' => array(
    						'drivers' => array(
    								'Member\Entity' => 'application_entities'
    						)
    				)
    		)
    ),
);
