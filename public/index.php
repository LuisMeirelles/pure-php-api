<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\ApplicationBase\Router\Attributes\Controller;
use App\ApplicationBase\Router\Router;

$router = Router::getInstance();

echo '<pre>';

foreach (glob('../src/Modules/*/*Controller.php') as $file) {
    require $file; // Include the current file in the loop

    $class = basename($file, '.php');
    if (!class_exists($class)) {
        throw new RuntimeException("Class not found: $class. The name of the file is the same as the declared class?");
    }

    $reflectionClass = new ReflectionClass($class);

    $attributes = $reflectionClass->getAttributes(Controller::class);

    var_dump($attributes);
}
