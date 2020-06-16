<?php
include('header.php'); 
?>
<body>
    <div id="wrapper_login">
    <section class="section_title">
        <h1>We Meet</h1>
        <h2>Share your hobbies and passions with others !</h2>
    </section>
    <section id="section_form">
        <form method="POST" id="form_connexion">
            <div>
                <label class="label_info" for="email">E-mail : </label>
                <input type="text" name="email" id="email" required>

                <label class="label_info" for="password">Mot de passe : </label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="fieldset_validation">
                <input id ="button_subscribe" type="submit" name="submit_connexion" value="Valider">
                <input id="button_reset" type="reset" name="button_reset" value="Reset">
                <p>Pas encore inscrit ? <a href="index.php">Inscription</a></p>
            </div>
        </form>
        <div id="info_messages"></div>
    </section>
    </div>
    <footer id="footer">
        <p>Copyright © 2020 We Meet, Inc. All rights reserved. Terms of Use | Privacy Policy</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="connexion_ajax.js"></script>
</body>
</html>