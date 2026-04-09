<?php

namespace Routex\Contracts;

interface Response {
    public function status(int $code): self;

    public function header(string $key, string $value): self;

    public function redirect(string $to): void;
}