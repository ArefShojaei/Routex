<?php

namespace Routex\Contracts;

interface BaseController {
    /**
     * Define the View data
     */
    public function __invoke(): array;
}