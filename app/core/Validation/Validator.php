<?php

declare(strict_types=1);

namespace App\Core\Validation;

use App\Core\Validation\Rules\EmailRule;
use App\Core\Validation\Rules\RequiredRule;

class Validator
{
    private array $data;

    private array $rules;

    private array $attributes;

    private ValidationResult $result;

    /**
     * Registered validation rules.
     */
    private array $ruleMap = [

        'required' => Rules\RequiredRule::class,

        'email' => Rules\EmailRule::class,

    ];

    public function __construct(
        array $data,
        array $rules,
        array $attributes = []
    ) {
        $this->data = $data;
        $this->rules = $rules;
        $this->attributes = $attributes;

        $this->result = new ValidationResult();
    }

    public function validate(): ValidationResult
    {
        foreach ($this->rules as $field => $rules) {

            $value = $this->data[$field] ?? null;

            $displayName = $this->attributes[$field]
                ?? ucwords(str_replace('_', ' ', $field));

            $ruleList = explode('|', $rules);

            foreach ($ruleList as $rule) {

                $ruleInstance = $this->resolveRule($rule);

                if ($ruleInstance === null) {
                    continue;
                }

                $error = $ruleInstance->validate(
                    $displayName,
                    $value,
                    $this->data
                );

                if ($error !== null) {

                    $this->result->addError($error);

                    // Stop validating this field after its first failed rule.
                    break;

                }

            }

        }

        return $this->result;
    }

    private function resolveRule(string $rule): ?RuleInterface
    {
        $class = $this->ruleMap[$rule] ?? null;

        if ($class === null) {
            return null;
        }

        return new $class();
    }
}