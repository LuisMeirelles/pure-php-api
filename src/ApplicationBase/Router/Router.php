<?php

namespace App\ApplicationBase\Router;

use App\ApplicationBase\Singletonable;

class Router
{
    use Singletonable;

    /**
     * @var Route[] $routes
     */
    public array $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => []
    ];

    /**
     * @return Route[]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}