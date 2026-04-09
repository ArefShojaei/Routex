<?php

namespace Routex\Utils;

use Routex\Contracts\Config as IConfig;

final class Config implements IConfig {
    /**
     * @example app.name
     */
    public static function get(string $pattern): mixed {
        $keys = explode(".", $pattern);

        $filename = array_shift($keys);

        $config = self::loadFromFile($filename);

        foreach ($keys as $key) {
            if (!is_array($config) || !array_key_exists($key, $config)) return null;

            $config = $config[$key];
        }

        return $config;
    }

    private static function loadFromFile(string $filename): array {
        $basePath = dirname(__DIR__, 2) . "/config";

        $file = $basePath . "/{$filename}.php";
    
        if (!file_exists($file)) return [];

        return require $file;
    }
}