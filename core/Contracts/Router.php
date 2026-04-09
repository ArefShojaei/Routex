<?php

namespace Routex\Contracts;

use Routex\Http\Request;

interface Router {
    public function dispatch(Request $request): void;
}