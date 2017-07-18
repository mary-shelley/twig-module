<?php

use Corley\TwigModule\Factory\TwigFactory;

return [
    "services" => [
        "factories" => [
            \Twig_Environment::class => TwigFactory::class,
        ],
        "aliases" => [
            "twig" => \Twig_Environment::class,
        ],
    ],
];
