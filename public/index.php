<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\ApplicationBase\Router\Attributes\Controller;
use App\ApplicationBase\Router\Attributes\Get;
use App\ApplicationBase\Router\Attributes\HttpMethod;
use App\ApplicationBase\Router\Route;
use App\ApplicationBase\Router\Router;

$router = Router::getInstance();

echo '<pre>';

$controllerFilePaths = glob('../src/Modules/*/*Controller.php');

foreach ($controllerFilePaths as $filePath) {
    $className = str_replace(['../src', '.php', '/'], ['\App', '', '\\'], $filePath);

    $controllerReflection = new ReflectionClass($className);

    $controllerReflectionAttributes = $controllerReflection->getAttributes(Controller::class);

    if (empty($controllerReflectionAttributes)) {
        throw new Exception("The $className controller must have Controller attribute");
    }

    /**
     * @var ReflectionAttribute<Controller> $controllerReflectionAttribute
     */
    $controllerReflectionAttribute = $controllerReflectionAttributes[0];

    $controllerAttribute = $controllerReflectionAttribute->newInstance();

    $actionReflectionMethods = $controllerReflection->getMethods(ReflectionMethod::IS_PUBLIC);

    foreach ($actionReflectionMethods as $actionReflectionMethod) {
        $actionName = $actionReflectionMethod->getName();

        $methodReflectionAttributes = $actionReflectionMethod->getAttributes(HttpMethod::class, ReflectionAttribute::IS_INSTANCEOF);

        if (empty($methodReflectionAttributes)) {
            throw new Exception("The $className::$actionName controller handler must have HttpMethod attribute");
        }

        /**
         * @var ReflectionAttribute<HttpMethod> $methodReflectionAttribute
         */
        $methodReflectionAttribute = $methodReflectionAttributes[0];

        $httpMethodAttribute = $methodReflectionAttribute->newInstance();

        $httpMethodReflectionClass = new ReflectionClass($httpMethodAttribute);

        $httpMethod = $httpMethodReflectionClass->getShortName();
        $httpMethod = mb_convert_case($httpMethod, MB_CASE_UPPER);

        $routePrefix = $controllerAttribute->prefix;
        $routePartialPath = $httpMethodAttribute->path;

        $routePath = "$routePrefix/$routePartialPath";
        $routePath = trim($routePath, '/');

        $temp = &$router->routes[$httpMethod];

        foreach (explode('/', $routePath) as $routeSegment) {
            $temp[$routeSegment] = [];

            $temp = &$temp[$routeSegment];
        }

        $temp = new Route(
            method: $httpMethod,
            path: $routePath,
            controller: $className,
            action: $actionName
        );

        unset($temp);
    }
}

echo json_encode($router->getRoutes(), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
