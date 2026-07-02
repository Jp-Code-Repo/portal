<?php

declare(strict_types=1);

interface RuleInterface
{
    /**
     * Validates a field.
     *
     * @param string $field Display name of the field.
     * @param mixed $value Value being validated.
     * @param array $data Complete request data.
     *
     * @return string|null
     * Returns null when valid, otherwise returns
     * the validation error message.
     */
    public function validate(
        string $field,
        mixed $value,
        array $data = []
    ): ?string;
}