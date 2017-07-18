# Doctrine ORM Module

Add Doctrine ORM to your project

```php
[
    ...,
    new DoctirneModule([
        "orm" =>  [
            "connection" => [
                'driver' => 'pdo_sqlite',
                'path' => __DIR__ . '/_files',
            ],
        ],
        "entities" => [__DIR__ . "/src"],
        "development" => true,
        "cache" => "/tmp",
    ]),
]
```

