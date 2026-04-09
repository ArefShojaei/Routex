<?php

namespace Routex\Contracts;

interface Page {
    public static function resolve(string $controller): array;
}