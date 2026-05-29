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

    public function query(string $key): ?string;
    
    public function input(string $key): mixed;
    
    public function body(): mixed;

    public function session(string $key, $default = null): mixed;

    public function cookie(string $key, $default = null): mixed;

    public function file(string $key): mixed;
}