<?php

namespace Routex\View;

use InvalidArgumentException;
use Routex\Contracts\{
    Page as IPage,
    BaseController
};

final class Page implements IPage {
    public static function resolve(string $controller): array {
        $instnace = new $controller;

        if (!is_subclass_of($instnace, BaseController::class)) {
            throw new InvalidArgumentException("Invalid controller class!");
        }

        return call_user_func($instnace);
    }
}