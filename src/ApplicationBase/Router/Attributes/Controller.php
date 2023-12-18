<?php

namespace App\ApplicationBase\Router\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class Controller
{
    public function __construct(
        public string $prefix
    )
    {
    }
}