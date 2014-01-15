<?php
return array(
    'doctrine' => array(
        'connection' => array(
            'odm_default' => array(
               'server'           => '127.0.0.1',
               'port'             => '27017',
               'connectionString' => null,
               'user'             => null,
               'password'         => null,
               'dbname'           => 'vfaMongoDB',
               'options'          => array()
            ),
        ),

        'configuration' => array(
            'odm_default' => array(
               'metadata_cache'     => 'array',

               'driver'             => 'odm_default',

               'generate_proxies'   => true,
               'proxy_dir'          => 'data/DoctrineMongoODMModule/Proxy',
               'proxy_namespace'    => 'DoctrineMongoODMModule\Proxy',

               'generate_hydrators' => true,
               'hydrator_dir'       => 'data/DoctrineMongoODMModule/Hydrator',
               'hydrator_namespace' => 'DoctrineMongoODMModule\Hydrator',

               'default_db'         => 'vfaMongoDB',

               'filters'            => array(),

               'logger'             => null
            )
        ),

       'driver' => array(
            'ODM_Driver' => array(
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver',
                'paths' => array(__DIR__.'/../../module/Application/src/Application/Document')
            ),
            'odm_default' => array(
                'drivers' => array(
                    'Application\Document' => 'ODM_Driver'
                )
            ),
        ),
        
        'documentmanager' => array(
            'odm_default' => array(
               'connection'    => 'odm_default',
               'configuration' => 'odm_default',
               'eventmanager' => 'odm_default'
            )
        ),

        'eventmanager' => array(
            'odm_default' => array(
                'subscribers' => array()
            )
        ),
    ),
);