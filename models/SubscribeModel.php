<?php

namespace app\models;

use app\core\Model;

class SubscribeModel extends Model
{
    public string $email;
    // add check box bool

    public function subscribe()
    {
        echo 'Subscribing email';
    }

    public function rules(): array
    {
        return [
            'email' => [
                self::RULE_REQUIRED,
                self::RULE_CHECKBOX,
                self::RULE_INVALID_ENDING,
                self::RULE_INVALID
            ]
        ];
    }
}
