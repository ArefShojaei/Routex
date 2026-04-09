<?php

namespace Routex\View;

use Routex\Contracts\Renderer as IRenderer;

final class Renderer implements IRenderer {
    public static function render(string $view): void {
        ob_start();
        
        require_once $view;

        echo ob_get_clean();
    }
}