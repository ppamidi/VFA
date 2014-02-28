<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Index' => 'Services\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'services' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/services',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                 'teams' => array(
            		'type'    => 'Zend\Mvc\Router\Http\Segment',
            		'options' => array(
            				'route'    => '/Hercules/Services/RegisterDevice[/:UniqueDeviceID][/:DeviceSerialNumber]',
            				'constraints' => array(
            						'UniqueDeviceID' => '[a-zA-Z][a-zA-Z0-9_-]*',
            						'DeviceSerialNumber' => '[a-zA-Z][a-zA-Z0-9_-]*'
            				),
            				'defaults' => array(
            						'controller' => 'RegisterDevice',
            				),
            		),
                ),
           ),
        ),
        
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Services' => __DIR__ . '/../view',
        ),
        'strategies' => array(
        		'ViewJsonStrategy',
        ),
    ),
);
