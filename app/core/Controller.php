<?php

declare(strict_types=1);

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);

        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            die("View '{$view}' not found.");
        }

        ob_start();

        require $viewPath;

        $content = ob_get_clean();

        require __DIR__ . '/../views/layouts/main.php';
    }
}