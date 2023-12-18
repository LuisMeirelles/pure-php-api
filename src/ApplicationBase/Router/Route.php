<?php

namespace App\ApplicationBase\Router;

readonly class Route
{
    public function __construct(
        public string $path,
        public string $controller,
        public string $method,
        public array  $middlewares = [],
        public array  $params = []
    )
    {
    }
}