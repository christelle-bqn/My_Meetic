<?php
session_start();
require_once('database.php');

class Email
{
    public $new_email;
    public $database;
    public $pdo;

    public function __construct($new_email)
    {
        $this->database = new Database();
        $this->pdo = $this->database->getConnection();
        $this->new_email = $new_email;
    }

    public function newEmail()
    {
        $query_newEmail = $this->pdo->prepare('UPDATE membres SET email = ? WHERE id_membre = '.$_SESSION["id_membre"].'');
        $query_newEmail->execute(array(
            $this->new_email,
        ));
        echo "Email modifié";
    }
}

$email = new Email($_POST['new_email']);
$email->newEmail();