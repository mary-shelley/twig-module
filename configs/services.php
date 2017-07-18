<?php

use Doctrine\ORM\EntityManager;
use Corley\DoctrineModule\Factory\EntityManagerFactory;

return [
    "services" => [
        "factories" => [
            EntityManager::class => EntityManagerFactory::class,
        ],
        "aliases" => [
            "doctrine.orm.entity_manager" => EntityManager::class,
            "orm" => "doctrine.orm.entity_manager",
        ],
    ],
];
