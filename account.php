<?php
session_start();
if((array_key_exists('email', $_SESSION) === false) && empty($_SESSION['email'])){
    header('location:login_connexion.php');
}
else {
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width">
        <link rel="stylesheet" media="screen" type="text/css" href="styles/account.css" />
        <title>We Meet</title>
    </head>
    <body>
        <div id="section_all">
        <header class="wrapper_header">
            <section class="section_title">
                <h1>We Meet</h1>
                <h2>Share your hobbies and passions with others !</h2>
            </section>
            <nav class="section_nav">
            <ul class="menu">
                <li><a href="account.php">Mon compte</a>
                    <ul>
                    <li><a href="search.php">Recherche</a></li>
                    <li><a href="help.php">Aide</a></li>
                    </ul>
                </li>
            </ul>
            </nav>
        </header>
        <section id="wrapper_home">
            <div class="info_member">
                <div>
                <h3 class="account_title">À propos de moi</h3>
                <p>Nom: <?= $_SESSION['nom'] ?></p>
                <p>Prénom: <?= $_SESSION['prenom'] ?></p>
                <p>Date de naissance: <?= $_SESSION['date_naissance'] ?></p>
                <p>Genre: <?= $_SESSION['genre'] ?></p>
                <p>Email: <?= $_SESSION['email'] ?></p>
                <p>Loisirs: <?php foreach ($_SESSION['hobbies'] as $hobby) {
                    echo "$hobby "; }?></p>
                </div>
                <div>
                <h3 class="account_title">Gestionnaire de compte</h3>
                <p>
                    <h3 class="account_subtitle">Ajouter un hobby</h3>
                    <label for="new_hobby">Hobby : </label>
                    <input type="text" name="new_hobby" id="new_hobby" required><br>
                    
                    <input id="button_add_hobby" type="submit" name="button_add_hobby" value="Ajouter">
                </p>
                <p>
                    <h3 class="account_subtitle">Modification du mot de passe</h3>
                    <label for="old_password">Mot de passe actuel : </label>
                    <input type="password" name="old_password" id="old_password" required><br>
                    
                    <label for="new_password">Nouveau mot de passe : </label>
                    <input type="password" name="new_password" id="new_password" required><br>
                    <input id="button_modify_password" type="submit" name="button_modify_password" value="Modifier">
                </p>
                <p>
                    <h3 class="account_subtitle">Modification de l'e-mail</h3>
                    <label for="new_email">Nouveau e-mail : </label>
                    <input type="text" name="new_email" id="new_email" required><br>

                    <input id="button_modify_email" type="submit" name="button_modify_email" value="Modifier">
                    <span class="error" id="email_error">Email invalide</span>
                </p>
                <p>
                    <h3 class="account_subtitle">Suppression du compte</h3>
                    <input id="button_delete" type="submit" name="button_delete" value="Supprimer">
                </p>
                <div id="info_messages"></div>
                </div>
            </div>
            <div class="section_logout">
                <p>Se déconnecter : <input id="button_logout" type="button" name="button_logout" onclick="location.href='destroy_session.php';" value="Se déconnecter"></p>
            </div>
        </section>
        <footer id="footer">
            <p>Copyright © 2020 We Meet, Inc. All rights reserved. Terms of Use | Privacy Policy</p>
        </footer>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="nav_menu.js"></script>
        <script src="add_modify_delete_ajax.js"></script>
    </body>
<?php
}