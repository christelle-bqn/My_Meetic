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
        <section id="wrapper_search">
                <form method="POST" id="form_search_members">
                <h3>Recherche de membres</h3>
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
                    <div class="fieldset_city">
                        <p>Ville : </p>
                        <label class="label_check" for="Paris">Paris</label><input type="checkbox" name="city" id="Paris" value="Paris">
                        <label class="label_check" for="Lyon">Lyon</label><input type="checkbox" name="city" id="Lyon" value="Lyon">
                        <label class="label_check" for="Marseille">Marseille</label><input type="checkbox" name="city" id="Marseille" value="Marseille">
                        <label class="label_check" for="Bordeaux">Bordeaux</label><input type="checkbox" name="city" id="Bordeaux" value="Bordeaux">
                        <label class="label_check" for="Lille">Lille</label><input type="checkbox" name="city" id="Lille" value="Lille"><br>
                        <span class="error" id="city_error">Veuillez choisir au moins une ville</span>
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
                     <div class="fieldset_age">
                        <p>Age : </p>
                        <label class="label_check"><input type="radio" name="age" value="1">18/25</label>
                        <label class="label_check"><input type="radio" name="age" value="2">26/35</label>
                        <label class="label_check"><input type="radio" name="age" value="3">36/45</label>
                        <label class="label_check"><input type="radio" name="age" value="4">46++</label>
                     </div>
                     <input id="button_search" type="submit" name="submit_filters" value="Rechercher" />
                </form>
        </section>
        <section id="section_results">
            <div id="results"></div>
        </section>
        <footer id="footer">
            <p>Copyright © 2020 We Meet, Inc. All rights reserved. Terms of Use | Privacy Policy</p>
        </footer>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="nav_menu.js"></script>
    <script src="search_ajax.js"></script>
    </body>
</html>