<?php
session_start();
require_once('database.php');

class deleteMember
{
    public $database;
    public $pdo;

    public function __construct()
    {
        $this->database = new Database();
        $this->pdo = $this->database->getConnection();
    }

    public function deleteMember()
    {
        $query_deleteMember = $this->pdo->prepare('UPDATE membres SET statut = 0 WHERE id_membre = '.$_SESSION["id_membre"].'');
        $query_deleteMember->execute();
        echo "Compte supprimé";
        ?>
        <script>
        setTimeout(function(){
        window.location='index.php';
        }, 2000);
        </script>
        <?php
    }
}

$delete= new deleteMember();
$delete->deleteMember();