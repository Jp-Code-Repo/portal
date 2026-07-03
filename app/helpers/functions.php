<?php

declare(strict_types=1);

function flash(string $key, mixed $value = null): mixed
{
    if (func_num_args() === 2) {

        $_SESSION['_flash'][$key] = $value;

        return null;
    }

    $value = $_SESSION['_flash'][$key] ?? null;

    unset($_SESSION['_flash'][$key]);

    return $value;
}

function flash_has(string $key): bool
{
    return isset($_SESSION['_flash'][$key]);
}

function toast_success(string $message): void
{
    flash('toast', [
        'type' => 'success',
        'message' => $message,
    ]);
}

function toast_error(string $message): void
{
    flash('toast', [
        'type' => 'error',
        'message' => $message,
    ]);
}

function redirect(string $path): void
{
    header('Location: ' . $path);
    exit;
}

function old(string $key, mixed $default = ''): mixed
{
    return $_SESSION['old'][$key] ?? $default;
}