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
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/dashboard',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Dashboard\Controller',
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
                    'foo' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/foo[/:user]',
                            'constraints' => array(
                                  'user'       => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'action' => 'foo',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'template_map' => array(
    		'layout/home'           => __DIR__ . '/../view/layout/home.phtml',
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Dashboard' => __DIR__ . '/../view',
          ),
    ),
);
