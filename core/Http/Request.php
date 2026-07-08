<?php

namespace Routex\Http;

use Routex\Contracts\Request as IRequest;

final class Request implements IRequest
{
    public function __construct(private RequestContext $context) {}

    public static function capture(): self
    {
        $context = new RequestContext(
            $_SERVER,
            $_GET,
            $_POST,
            $_SESSION,
            $_COOKIE,
            $_FILES,
        );

        return new static($context);
    }

    public function method(): string
    {
        return $this->context->server["REQUEST_METHOD"];
    }

    public function uri(): string
    {
        return $this->context->server["REQUEST_URI"];
    }

    public function ip(): string
    {
        return $this->context->server["REMOTE_ADDR"] ??
            ($this->context->server["HTTP_CLIENT_IP"] ??
                ($this->context->server["HTTP_X_FORWARDED_FOR"] ?? "unknown"));
    }

    public function host(): string
    {
        return $this->context->server["HTTP_HOST"];
    }

    public function agent(): string
    {
        return $this->context->server["HTTP_USER_AGENT"] ?? "";
    }

    public function platform(): string
    {
        return $this->context->server["HTTP_SEC_CH_UA_PLATFORM"];
    }

    public function header(string $key): ?string
    {
        return $this->context->server[$key] ?? null;
    }

    public function query(string $key, $default = null): ?string
    {
        return $this->context->queryParams[$key] ?? $default;
    }

    public function input(string $key, $default = null): mixed
    {
        return $this->context->bodyParams[$key] ?? $default;
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

        return isset($this->context->sessionParams[$key])
            ? $this->context->sessionParams[$key]
            : $default;
    }

    public function cookie(string $key, $default = null): mixed
    {
        return $this->context->cookieParams[$key] ?? $default;
    }

    public function file(string $key): mixed
    {
        return $this->context->fileParams[$key] ?? null;
    }
}
