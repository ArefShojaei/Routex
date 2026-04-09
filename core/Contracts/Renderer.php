<?php

namespace Routex\Contracts;

interface Renderer {
    public static function render(string $view): void;
}