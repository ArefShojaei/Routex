<?php

namespace Routex\Http;

use Routex\Contracts\Request as IRequest;

final class Request implements IRequest
{
    public static function capture(): self
    {
        return new static();
    }

    public function method(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function uri(): string
    {
        return $_SERVER["REQUEST_URI"];
    }

    public function ip(): string
    {
        return $_SERVER["REMOTE_ADDR"] ??
            ($_SERVER["HTTP_CLIENT_IP"] ??
                ($_SERVER["HTTP_X_FORWARDED_FOR"] ?? "unknown"));
    }

    public function host(): string
    {
        return $_SERVER["HTTP_HOST"];
    }

    public function agent(): string
    {
        return $_SERVER["HTTP_USER_AGENT"] ?? "";
    }

    public function platform(): string
    {
        return $_SERVER["HTTP_SEC_CH_UA_PLATFORM"];
    }

    public function header(string $key): ?string
    {
        return $_SERVER[$key] ?? null;
    }

    public function query(string $key, $default = null): ?string
    {
        return $_GET[$key] ?? $default;
    }

    public function input(string $key, $default = null): mixed
    {
        return $_POST[$key] ?? $default;
    }

    public function body(): mixed
    {
        if (!in_array($this->method(), ["POST", "PUT", "PATCH", "DELETE"])) {
            return null;
        }

        $content = @file_get_contents("php://input");

        return $content ? json_decode($content, true) : null;
    }

    public function session(string $key, $default = null): mixed
    {
        if (session_status() === PHP_SESSION_NONE) {
            trigger_error("Session is not started!", E_USER_WARNING);

            return $default;
        }

        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public function cookie(string $key, $default = null): mixed
    {
        return $_COOKIE[$key] ?? $default;
    }

    public function file(string $key): mixed
    {
        return $_FILES[$key] ?? null;
    }
}
