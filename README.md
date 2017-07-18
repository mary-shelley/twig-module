# Twig Template Module

Add Twig templates to your project

```php
[
    ...,
    new TwigModule([
        'templates' => __DIR__ . '/app/resources',
        'options' => [
            'cache' => '/tmp',
            'debug' => true,
        ],
    ]),
]
```

