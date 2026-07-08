<?php

namespace App\Console\Commands;

use PhpX\Components\Console\Command;

final class ApplicationStarterCommand extends Command
{
    private const HTTP_DEFAULT_APPLICATION_HOST = "localhost";

    private const HTTP_DEFAULT_APPLICATION_PORT = 4100;

    public function exec(array $params): string
    {
        $host = $this->getHost($params);
        $port = $this->getPort($params);

        echo "[HTTP] Server is running at http://{$host}:{$port}" . PHP_EOL;

        return exec("php -S {$host}:{$port} -t public/");
    }

    private function getHost(array $params): string
    {
        return array_key_exists("host", $params)
            ? $params["host"]
            : self::HTTP_DEFAULT_APPLICATION_HOST;
    }

    private function getPort(array $params): int
    {
        return array_key_exists("port", $params)
            ? $params["port"]
            : self::HTTP_DEFAULT_APPLICATION_PORT;
    }
}
