<?php
session_start();
require_once('database.php');

class Password
{
    public $old_password;
    public $new_password;
    public $database;
    public $pdo;

    public function __construct($old_password, $new_password)
    {
        $this->database = new Database();
        $this->pdo = $this->database->getConnection();
        $this->old_password = $old_password;
        $this->new_password = $new_password;
    }

    public function newPassword()
    {
        $mdp = trim($this->old_password);
        $query_searchMember = $this->pdo->prepare('SELECT * FROM membres WHERE id_membre = '.$_SESSION["id_membre"].'');
        $query_searchMember->execute();
        $results = $query_searchMember->fetch();
        $query_searchMember->closeCursor();
        if (password_verify($mdp, $results['mot_de_passe']))
        {
            $query_newPassword = $this->pdo->prepare('UPDATE membres SET mot_de_passe = ? WHERE id_membre = '.$_SESSION["id_membre"].'');
            $query_newPassword->execute(array(
                password_hash($this->new_password, PASSWORD_BCRYPT),
            ));
            echo "Mot de passe modifié";
        }
        else 
        {
            echo "<p>Mot de passe actuel incorrect</p>";
            return false; 
        }
    }
}

$password = new Password($_POST['old_password'],$_POST['new_password']);
$password->newPassword();