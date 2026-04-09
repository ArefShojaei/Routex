<?php

namespace Routex\Http;

use Routex\Contracts\Response as IResponse;

final class Response implements IResponse {
    public function status(int $code): self {
        http_response_code($code);
        
        return $this;
    }

    public function header(string $key, string $value): self {
        header("{$key}: {$value}");
        
        return $this;
    }

    public function redirect(string $to): void {
        header("Location: {$to}");

        exit;
    }
}