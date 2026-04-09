<?php

namespace Routex\Contracts;

interface Request {
    public static function capture(): self;

    public function method(): string;

    public function uri(): string;

    public function ip(): string;
    
    public function host(): string;

    public function agent(): string;

    public function platform(): string;

    public function header(string $key): ?string;
}