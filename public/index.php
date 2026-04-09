<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Routex\Http\Request;
use Routex\Routing\Router;

function bootstrap(): void {
    session_start();

    $router = Router::getInstance();

    $request = Request::capture();

    $router->dispatch($request);
}


bootstrap();