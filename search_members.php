<?php
session_start();
require_once('database.php');

class searchMembers
{
    public $gender;
    public $age;
    public $database;
    public $pdo;

    public function __construct($gender, $age)
    {
        $this->database = new Database();
        $this->pdo = $this->database->getConnection();
        $this->gender = $gender;
        $this->age = $age;
    }

    public function searchMembers($cities, $hobbies)
    {
        $cities = $_POST['city'];
        $all_cities = "'" . implode("','", $cities) . "'";
        $hobbies = $_POST['hobbies'];
        $all_hobbies = "'" . implode("','", $hobbies) . "'";

        switch($this->age){
            case ($this->age == 1) :
                $query_searchMember = $this->pdo->prepare('SELECT DISTINCT nom, prenom, date_naissance, age, genre, ville FROM membres INNER JOIN loisirs_membres ON membres.id_membre = loisirs_membres.id_membre WHERE genre = ? AND ville IN ('.$all_cities.') AND id_loisirs IN ('.$all_hobbies.') AND age BETWEEN "18" AND "25"');
                $query_searchMember->execute(array(
                    $this->gender,
                ));
            break;

            case ($this->age == 2) : 
                $query_searchMember = $this->pdo->prepare('SELECT DISTINCT nom, prenom, date_naissance, age, genre, ville FROM membres INNER JOIN loisirs_membres ON membres.id_membre = loisirs_membres.id_membre WHERE genre = ? AND ville IN ('.$all_cities.') AND id_loisirs IN ('.$all_hobbies.') AND age BETWEEN "26" AND "35"');
                $query_searchMember->execute(array(
                    $this->gender,
                ));
            break;

            case ($this->age == 3) :
                $query_searchMember = $this->pdo->prepare('SELECT DISTINCT nom, prenom, date_naissance, age, genre, ville FROM membres INNER JOIN loisirs_membres ON membres.id_membre = loisirs_membres.id_membre WHERE genre = ? AND ville IN ('.$all_cities.') AND id_loisirs IN ('.$all_hobbies.') AND age BETWEEN "36" AND "45"');
                $query_searchMember->execute(array(
                    $this->gender,
                ));
            break;

            case ($this->age == 4) :
                $query_searchMember = $this->pdo->prepare('SELECT DISTINCT nom, prenom, date_naissance, age, genre, ville FROM membres INNER JOIN loisirs_membres ON membres.id_membre = loisirs_membres.id_membre WHERE genre = ? AND ville IN ('.$all_cities.') AND id_loisirs IN ('.$all_hobbies.') AND age > "45"');
                $query_searchMember->execute(array(
                    $this->gender,
                ));
            break;
        }

        $resultMember = $query_searchMember->rowCount();
        
        if ($resultMember < 1) {
            echo "Pas de membres trouvés";
            return false;
        }

        foreach($query_searchMember as $value){   
            echo "<p>".$value['nom']."<br>
                    ".$value['prenom']."<br>
                    ".$value['date_naissance']."<br>
                    ".$value['age']."<br>
                    ".$value['genre']."<br>
                    ".$value['ville']."</p>";
        }
    }
}

$members = new searchMembers($_POST['gender'], $_POST['age']);
$members->searchMembers($cities, $hobbies);