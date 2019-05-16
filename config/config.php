<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

// the connection configuration
$dbParams = [
    'driver' => 'pdo_mysql',
    'host' => 'host.ru',
    'user' => 'user_name',
    'password' => 'password',
    'dbname' => 'db_name',
    'charset'  => 'utf8',
];


$config = Setup::createConfiguration(false);
$driver = new AnnotationDriver(new AnnotationReader(), [
    __DIR__ . '/../Entity',
]);

// registering noop annotation autoloader - allow all annotations by default
AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);

$entityManager = EntityManager::create($dbParams, $config);
unset($dbParams, $config);
