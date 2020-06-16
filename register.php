<?php
require_once('database.php');

class Members
{
    public $lastname;
    public $firstname;
    public $birthday;
    public $gender;
    public $city;
    public $email;
    public $password;
    public $database;
    public $pdo;

    public function __construct($lastname, $firstname, $birthday, $gender, $city, $email, $password)
    {
        $this->database = new Database();
        $this->pdo = $this->database->getConnection();
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->city = $city;
        $this->email = $email;
        $this->password = $password;
    }

    public function newMember($hobbies)
    {
        //Vérification email
        $query_verif = $this->pdo->prepare('SELECT email from membres WHERE email = ?');
        $query_verif->execute(array(
            $this->email,
        ));
        $emailDatabase = $query_verif->rowCount();

        //Vérification âge
        $birthDay = substr($this->birthday,-2);
        $birthMonth = substr($this->birthday,5,-3);
        $birthYear = substr($this->birthday,0,4);

        $stampBirth = mktime(0, 0, 0, $birthMonth, $birthDay, $birthYear);

        $today['day'] = date('d');
        $today['month'] = date('m');
        $today['year'] = date('Y') - 18;

        $stampToday = mktime(0, 0, 0, $today['month'], $today['day'], $today['year']);
        
        $dateOfBirth = "$birthDay-$birthMonth-$birthYear";
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');

        if ($emailDatabase > 0){

            echo "<p>Email déjà existant</p>";
            return false;

        } elseif ($stampBirth > $stampToday) {

            echo "<p>Inscription réservée aux 18+</p>";
            return false;
        }

        //Insertion données formulaire inscription dans table "membres"
        $query_newMember = $this->pdo->prepare('INSERT INTO membres (nom, prenom, date_naissance, age, genre, ville, email, mot_de_passe) VALUES (?,?,?,?,?,?,?,?)');
        $query_newMember->execute(array(
            $this->lastname,
            $this->firstname,
            $this->birthday,
            $age,
            $this->gender,
            $this->city,
            $this->email,
            password_hash($this->password, PASSWORD_BCRYPT),
        ));

        //Insertion données hobbies dans table "loisirs_membres"
        $hobbies = $_POST['hobbies'];
        foreach ($hobbies as $hobby)
        {
            $query_addHobbies = $this->pdo->prepare('INSERT INTO loisirs_membres (id_membre, id_loisirs) VALUES ((SELECT MAX(id_membre) FROM membres), ?)');
            $query_addHobbies->execute(array($hobby));
        }

        //Redirection vers page de connexion
        echo "<h3>Vous allez être redirigé vers la page de connexion...</h3>";

        ?>
        <script>
        setTimeout(function(){
        window.location='login_connexion.php';
        }, 3000);
        </script>
        <?php
    }
}

$member = new Members($_POST['lastname'],$_POST['firstname'],$_POST['birthday'],$_POST['gender'],$_POST['city'],$_POST['email'],$_POST['password']);
$member->newMember($hobbies);