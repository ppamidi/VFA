<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Crons\Controller\Index' => 'Crons\Controller\IndexController',
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'get-user-posts' => array(
                    'options' => array(
                        'route' => 'get user posts', 
                        'defaults' => array(
                            '__NAMESPACE__' => 'Crons\Controller',
                            'controller' => 'index',
                            'action' => 'get-posts'
                        ),
                    ),
                ),
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Crons' => __DIR__ . '/../view',
        ),
    ),
);
