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
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/team',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Team\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                             'route'    => '[/:teamName]',
                            'constraints' => array(
//                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'teamName' => '[a-zA-Z0-9_-]*',
                             ),
                            'defaults' => array(
                            ),
                        ),
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
