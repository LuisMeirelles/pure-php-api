<?php

namespace App\ApplicationBase\Router;

use App\ApplicationBase\Singletonable;

class Router
{
    use Singletonable;

    /**
     * @var Route[] $routes
     */
    private array $routes = [];
}