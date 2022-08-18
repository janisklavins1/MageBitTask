<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_INVALID = 'invalid';
    public const RULE_CHECKBOX = 'checkbox';
    public const RULE_INVALID_ENDING = 'invalidEnding';
    public array $errors = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as  $rule) {
                $ruleName = $rule;

                if (!is_string($ruleName)) {
                    $ruleName = $ruleName[0];
                }

                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if ($ruleName === self::RULE_INVALID && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_INVALID);
                }

                if ($ruleName === self::RULE_INVALID_ENDING && substr($value, -3) == '.co') {
                    $this->addError($attribute, self::RULE_INVALID_ENDING);
                }
            }
        }

        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule)
    {
        $message = $this->errorMessages()[$rule] ?? '';
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'Email address is required',
            self::RULE_CHECKBOX => 'You must accept the terms and conditions',
            self::RULE_INVALID_ENDING => 'We are not accepting subscriptions from Colombia emails',
            self::RULE_INVALID => 'Please provide a valid e-mail address'
        ];
    }
}
