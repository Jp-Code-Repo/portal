<?php

declare(strict_types=1);

class RequiredRule implements RuleInterface
{
    public function validate(
        string $field,
        mixed $value,
        array $data = []
    ): ?string
    {
        if (is_array($value)) {

            if (empty($value)) {
                return "{$field} is required.";
            }

            return null;
        }

        if ($value === null) {
            return "{$field} is required.";
        }

        if (is_string($value) && trim($value) === '') {
            return "{$field} is required.";
        }

        return null;
    }
}