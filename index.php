<?php
include('header.php'); 
?>
<body>
    <div id="wrapper_index">
    <section class="section_title">
        <h1>We Meet</h1>
        <h2>Share your hobbies and passions with others !</h2>
    </section>
    <section id="section_form">
        <form method="POST" id="form_register">
            <div class="fieldset_name">
                <label class="label_info" for="lastname">Nom : </label>
                <input type="text" name="lastname" id="lastname" required>

                <label class="label_info" for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="firstname" required>

                <label class="label_info" for="birthday">Date de naissance : </label>
                <input type="date" min="1920-01-01" max="2020-12-31" name="birthday" id="birthday" required><br>

                <label class="label_info" for="city">Ville : </label>
                <input type="text" name="city" id="city" required>
            </div>

            <div class="fieldset_gender">
                <label class="label_info" for="gender">Genre :</label>
                <select id="gender" name="gender_select">
                    <option value="">-----------------Choisir-----------------</option>
                    <option value="Femme">Femme</option>
                    <option value="Homme">Homme</option>
                    <option value="Agenre">Agenre</option>
                    <option value="Bigenre">Bigenre</option>
                    <option value="Trans Femme">Trans Femme</option>
                    <option value="Trans Homme">Trans Homme</option>
                    <option value="Androgyne">Androgyne</option>
                </select>
            </div>

            <div class="fieldset_mail">
                <label class="label_info" for="email">E-mail : </label>
                <input type="text" name="email" id="email" required><br>
                <span class="error" id="email_error">Email invalide</span>
                
                <label class="label_info" for="password">Mot de passe : </label>
                <input type="password" name="password" id="password" required><br>
            </div>

            <div class="fieldset_hobbies">
                <p>Loisirs : </p>
                <label class="label_check" for="dance">Dance</label><input type="checkbox" name="hobbies" id="dance" value="1">
                <label class="label_check" for="skateboard">Skateboard</label><input type="checkbox" name="hobbies" id="skateboard" value="2">
                <label class="label_check" for="manga">Manga</label><input type="checkbox" name="hobbies" id="manga" value="3">
                <label class="label_check" for="licorne">Licorne</label><input type="checkbox" name="hobbies" id="licorne" value="4">
                <label class="label_check" for="cuisiner">Cuisiner</label><input type="checkbox" name="hobbies" id="cuisiner" value="5"><br>
                <span class="error" id="hobbies_error">Veuillez choisir au moins un loisir</span>
            </div>

            <div class="fieldset_validation">
                <input id="button_subscribe" type="submit" name="submit_subscribe" value="Valider">
                <input id="button_reset" type="reset" name="button_reset" value="Reset">
                <p>Déjà membre ? <a href="login_connexion.php" id="connexion_link"> Connexion</a></p>
            </div>
        </form>
        <div id="info_messages"></div>
    </section>
    </div>
    <footer id="footer">
        <p>Copyright © 2020 We Meet, Inc. All rights reserved. Terms of Use | Privacy Policy</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="register_ajax.js"></script>
</body>
</html>
