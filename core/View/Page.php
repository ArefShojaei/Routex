<?php

namespace Routex\View;

use InvalidArgumentException;
use Routex\Http\Request;
use Routex\Contracts\{
    Page as IPage,
    BaseController
};

final class Page implements IPage {
    public const NOT_FOUND = "/404";

    public static function resolve(string $controller): array {
        $instnace = new $controller;

        if (!is_subclass_of($instnace, BaseController::class)) {
            throw new InvalidArgumentException("Invalid controller class!");
        }

        return call_user_func($instnace, Request::capture());
    }
}