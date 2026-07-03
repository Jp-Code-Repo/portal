<?php

declare(strict_types=1);

namespace App\Core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function (string $class): void {

            $prefix = 'App\\';

            if (!str_starts_with($class, $prefix)) {
                return;
            }

            $relativeClass = substr($class, strlen($prefix));

            /*
             * Convert the first namespace segment
             * to match our lowercase directory structure.
             */
            $segments = explode('\\', $relativeClass);

            if (!empty($segments)) {
                $segments[0] = strtolower($segments[0]);
            }

            $file = dirname(__DIR__) . DIRECTORY_SEPARATOR
                . implode(DIRECTORY_SEPARATOR, $segments)
                . '.php';

            if (file_exists($file)) {
                require_once $file;
            }
        });
    }
}