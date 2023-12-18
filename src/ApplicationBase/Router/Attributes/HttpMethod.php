<?php

namespace App\ApplicationBase\Router\Attributes;

abstract readonly class HttpMethod
{
    public function __construct(
        public string $endpoint
    )
    {
    }
}