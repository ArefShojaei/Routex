<?php

namespace Routex\Contracts;

interface Response
{
    public function status(int $code): self;

    public function header(string $key, string $value): self;

    public function redirect(string $to): void;

    public function json(array $data): void;

    public function text(string $content): void;

    public function html(string $html): void;
}
