<?php

namespace App\Console\Commands;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use PhpX\Components\Console\Command;
use Routex\Utils\Config;

final class RouteListCommand extends Command {
    public function exec(array $params): string
    {
        $routes = $this->getRoutes();

        echo "#" . "| " . "Routes" . PHP_EOL;
        echo "-----------------------------------" . PHP_EOL;

        foreach ($routes as $index => $route) {
            $index++;
            
            echo $index . "| " . $route . PHP_EOL;
        }

        return "";
    }

    private function getRoutes(): array {
        $routes = [];

        $pagesPath = Config::get("app.path.pages");

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($pagesPath, RecursiveDirectoryIterator::SKIP_DOTS)
        );
        
        foreach ($iterator as $file) {
            $path = $file->getPath();
            $file = $file->getFilename();

            [$_, $folder] = explode("/pages", $path);
            $filename = pathinfo($file)["filename"];

            if ($filename === "index") {
                $filename = null;
            }

            $routes[] = $folder . "/" . $filename;
        }


        return array_reverse($routes);
    }
}