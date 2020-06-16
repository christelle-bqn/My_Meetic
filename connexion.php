<?php
require_once('database.php');

class Connexion
{
    public $email;
    public $password;
    public $database;
    public $pdo;

    public function __construct($email, $password)
    {
        $this->database = new Database();
        $this->pdo = $this->database->getConnection();
        $this->email = $email;
        $this->password = $password;
    }

    public function checkMember()
    {
        //Vérification email
        $query_checkMail = $this->pdo->prepare('SELECT email FROM membres WHERE email LIKE ?');
        $query_checkMail->execute(array(
            $this->email,
        ));
        $emailDatabase = $query_checkMail->rowCount();

        if ($emailDatabase < 1){

            echo "<p>Email incorrect</p>";
            return false;
        }
    
        //Vérification mot de passe
        $mdp = trim($this->password);
        $query_checkMember = $this->pdo->prepare('SELECT * FROM membres WHERE email LIKE ?');
        $query_checkMember->execute(array(
            $this->email,
        ));
        $results = $query_checkMember->fetch();
        $query_checkMember->closeCursor();

        $query_getHobbies = $this->pdo->prepare('SELECT nom_loisirs FROM loisirs INNER JOIN loisirs_membres ON loisirs.id_loisirs = loisirs_membres.id_loisirs INNER JOIN membres ON loisirs_membres.id_membre = membres.id_membre WHERE email LIKE ?');
        $query_getHobbies->execute(array(
            $this->email,
        ));

        $array_hobbies = [];
        while($hobby = $query_getHobbies->fetch()){
        array_push($array_hobbies,$hobby['nom_loisirs']);
        }

        if (count($results) > 0 && password_verify($mdp, $results['mot_de_passe'])){
            if ($results['statut'] > 0){
                session_start();
                $_SESSION['id_membre'] = $results['id_membre'];
                $_SESSION['nom'] = $results['nom'];
                $_SESSION['prenom'] = $results['prenom'];
                $_SESSION['date_naissance'] = $results['date_naissance'];
                $_SESSION['genre'] = $results['genre'];
                $_SESSION['ville'] = $results['ville'];
                $_SESSION['email'] = $results['email'];
                $_SESSION['hobbies'] = $array_hobbies;

                //Redirection vers l'acceuil
                ?>
                <script>
                window.location.href='account.php';
                </script>
                <?php
            }else{
                echo "<p>Compte supprimé</p>";
                return false;
            }
        }else{
            echo "<p>Mot de passe incorrect</p>";
            return false;
        }
    }
}

$member = new Connexion($_POST['email'],$_POST['password']);
$member->checkMember();