<?php
session_start();
require_once('database.php');

class Hobby
{
    public $new_hobby;
    public $database;
    public $pdo;

    public function __construct($new_hobby)
    {
        $this->database = new Database();
        $this->pdo = $this->database->getConnection();
        $this->new_hobby = $new_hobby;
    }

    public function newHobby()
    {
        $query_newHobby = $this->pdo->prepare('INSERT INTO loisirs (nom_loisirs) VALUES (?)');
        $query_newHobby->execute(array(
            $this->new_hobby,
        ));
      
        $query_addHobby = $this->pdo->prepare('INSERT INTO loisirs_membres (id_membre, id_loisirs) VALUES ('.$_SESSION["id_membre"].', (SELECT id_loisirs FROM loisirs WHERE nom_loisirs LIKE ?))');
        $query_addHobby->execute(array(
            $this->new_hobby,
        ));

        $query_getHobbies = $this->pdo->prepare('SELECT nom_loisirs FROM loisirs INNER JOIN loisirs_membres ON loisirs.id_loisirs = loisirs_membres.id_loisirs INNER JOIN membres ON loisirs_membres.id_membre = membres.id_membre WHERE membres.id_membre = '.$_SESSION["id_membre"].'');
        $query_getHobbies->execute();

        $array_hobbies = [];
        while($hobby = $query_getHobbies->fetch()){
        array_push($array_hobbies,$hobby['nom_loisirs']);
        }
        $_SESSION['hobbies'] = $array_hobbies;

        ?>
        <script>
        window.location.href='account.php';
        </script>
        <?php
    }
}

$hobby = new Hobby($_POST['new_hobby']);
$hobby->newHobby();