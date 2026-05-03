<?php

namespace Routex\Contracts;

use Routex\Http\Request;

interface BaseController {
    /**
     * Define the View data
     */
    public function __invoke(Request $request): array;
}