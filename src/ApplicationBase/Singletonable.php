<?php

namespace App\ApplicationBase;

trait Singletonable
{
    private static ?self $instance = null;

    public static function getInstance(): ?self
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}