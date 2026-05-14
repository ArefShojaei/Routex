<?php

namespace Routex\Routing;

use Routex\Constants\PageMessage;
use Routex\Http\Request;
use Routex\Utils\{Config, FileSystem};
use Routex\View\{Renderer, Page};
use Routex\Contracts\{
    Singleton,
    Router as IRouter
};

final class Router implements IRouter, Singleton {
    private const ROOT = "/";
    
    private const INDEX = "index";

    private static ?self $instance = null;

    private array $routes;


    private function __construct() {
        $this->routes = [];

        $this->bindFromFiles();
    }

    public static function getInstance(): self {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function dispatch(Request $request): void {
        foreach ($this->routes as $route => $pointer) {
            $pattern = "/^" . str_replace(["/","[", "]"], ["\/","(?<", ">.+)"], $route) ."$/";
        
            preg_match($pattern, $request->uri(), $matches);

            if ($matches) break;
        }

        if (!count($matches) && array_key_exists(Page::NOT_FOUND, $this->routes)) {
            Renderer::render($this->routes[Page::NOT_FOUND]);
        
            return;
        }

        if (!count($matches) && !array_key_exists(Page::NOT_FOUND, $this->routes)) {
            die(PageMessage::NOT_FOUND);
        }

        Renderer::render($pointer);
    }

    private function addRoute(string $path, string $pointer): void {
        $this->routes[$path] = $pointer;
    }

    private function bindFromFiles(): void {
        $path = Config::get("app.path.pages");

        $files = FileSystem::getRecursiveFilesFromDirectory($path);
        
        foreach ($files as $file) {
            $data = explode("/pages", $file);
        
            $meta = pathinfo(end($data));

            $root = $meta["dirname"];
            $path = $meta["filename"];
            $pointer = $file;

            if ($root !== self::ROOT) {
                $root .= self::ROOT;
            }

            if ($path === self::INDEX) {
                $path = null;
            }

            $route = $root . $path;

            $this->addRoute($route, $pointer);
        }
    }
}