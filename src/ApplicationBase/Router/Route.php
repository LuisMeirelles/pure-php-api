<?php

namespace App\ApplicationBase\Router;

readonly class Route
{
    public function __construct(
        public string $method,
        public string $path,
        public string $controller,
        public string $action
    )
    {
    }
}