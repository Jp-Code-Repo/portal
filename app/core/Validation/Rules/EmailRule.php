<?php

declare(strict_types=1);

namespace App\Core\Validation\Rules;

use App\Core\Validation\RuleInterface;

class EmailRule implements RuleInterface
{
    public function validate(
        string $field,
        mixed $value,
        array $data = []
    ): ?string
    {
        if ($value === null) {
            return null;
        }

        if (is_string($value) && trim($value) === '') {
            return null;
        }

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return "{$field} must be a valid email address.";
        }

        return null;
    }
}