<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'User\Controller\Index' => 'User\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'user' => array(
                'type'    => 'segment',
                'options' => array(
                		'route'    => '/user[/:action][/:user]',
                		'constraints' => array(
                		        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                				'user'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                		),
                		'defaults' => array(
                				'controller' => 'User\Controller\Index',
                				'action'        => 'index',
                		),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
     	   'user/retrieve-user' =>  __DIR__ . '/../view/user/userThumbnail.phtml',     
        ),
        'template_path_stack' => array(
            'User' => __DIR__ . '/../view',
        ),
//         'strategies' => array(
//         		'ViewJsonStrategy',
//         ),
    ),
'view_helpers' => array(
'invokables' => array(
	'UserMediaHelper' => 'User\View\Helper\UserMediaHelper',
		),
	),
    'doctrine' => array(
    		'authentication' => array(
    				'orm_default' => array(
    						'object_manager' => 'Doctrine\ORM\EntityManager',
    						'identity_class' => 'User\Entity\User',
    						'identity_property' => 'emailId',
    						'credential_property' => 'verified'
    
    				),
    		),
    		'driver' => array(
    				'application_entities' => array(
    						'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
    						'cache' => 'array',
    						'paths' => array(__DIR__ . '/../src/User/Entity')
    				),
    
    				'orm_default' => array(
    						'drivers' => array(
    								'User\Entity' => 'application_entities'
    						)
    				)
    		)
    )
);
