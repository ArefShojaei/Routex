<?php

namespace Routex\Contracts;

interface Config {
    public static function get(string $pattern): mixed;
}