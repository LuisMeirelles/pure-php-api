<?php

namespace App\ApplicationBase\Router\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
readonly class Post extends HttpMethod
{
}