<?php

namespace Routex\Http;

final class RequestContext
{
    public function __construct(
        public readonly array $server,
        public readonly array $queryParams,
        public readonly array $bodyParams,
        public readonly array $sessionParams,
        public readonly array $cookieParams,
        public readonly array $fileParams,
    ) {}
}
