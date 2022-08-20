<?php

namespace app\models;

use app\core\Model;
use app\core\Database;
use PDO;

class SubscribeModel extends Model
{
    public string $email;
    public bool $checkBox;
    public Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function subscribe()
    {


        echo 'Subscribing email';
    }

    public function rules(): array
    {
        return [
            'email' => [
                self::RULE_REQUIRED,
                self::RULE_INVALID_ENDING,
                self::RULE_INVALID
            ],
            'checkBox' => [
                self::RULE_CHECKBOX
            ]
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }

    public function getEmails()
    {
        $getProductsSql = "SELECT * FROM email";
        $emails = $this->db->connectToDb()->prepare($getProductsSql);
        $emails->execute();
        $items = $emails->fetchAll();

        // echo '<pre>';
        // var_dump($items);
        // echo '</pre>';
        // exit;
    }

    public function setEmails()
    {
        $currentDate = date('Y-m-d H:i:s');
        $insertEmailSQL = "INSERT INTO email ( address, date) VALUES(:address, :date)";

        $statement = $this->db->connectToDb()->prepare($insertEmailSQL);
        $statement->bindParam('address', $this->email, PDO::PARAM_STR);
        $statement->bindParam('date', $currentDate, PDO::PARAM_STR);
        $statement->execute();
    }
}
