<?php

declare(strict_types=1);

namespace App\Core\Validation;

class ValidationResult
{
    /**
     * @var string[]
     */
    private array $errors = [];

    public function addError(string $message): void
    {
        $this->errors[] = $message;
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }

    public function passes(): bool
    {
        return empty($this->errors);
    }

    /**
     * @return string[]
     */
    public function errors(): array
    {
        return $this->errors;
    }

    public function first(): ?string
    {
        return $this->errors[0] ?? null;
    }
}