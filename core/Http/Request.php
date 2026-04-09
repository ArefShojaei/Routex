<?php

namespace Routex\Http;

use Routex\Contracts\Request as IRequest;

final class Request implements IRequest {
    public static function capture(): self {
        return new static;
    }

    public function method(): string {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function uri(): string {
        return $_SERVER["REQUEST_URI"];
    }

    public function ip(): string {
        return $_SERVER["REMOTE_ADDR"];
    }

    public function host(): string {
        return $_SERVER["HTTP_HOST"];
    }

    public function agent(): string {
        return $_SERVER["HTTP_USER_AGENT"];
    }

    public function platform(): string {
        return $_SERVER["HTTP_SEC_CH_UA_PLATFORM"];
    }

    public function header(string $key): ?string {
        return $_SERVER[$key] ?? null;
    }
}