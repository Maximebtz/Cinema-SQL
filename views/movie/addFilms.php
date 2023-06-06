<?php
ob_start();
// demarre la temporisation de sortie
?>
    <section id="insert" class="sec-2 insert">
        <div class="left-content">
            <h1>
                <span class="word-1">You</span>
                <span class="word-2">Can</span>
                <span class="word-3">Here</span>
                <span class="word-4">Add</span>
                <span class="word-5">Movies</span> 
            </h1>
        </div>
        <div class="right-content">
            <h2>
                Ajout film
            </h2>
            <form action="ajouter_film.php" method="post">
                <label for="titre_film">Titre :</label>
                <input type="text" name="titre_film" id="titre_film" required>
                
                <label for="annee_film">Année :</label>
                <input type="text" name="annee_film" id="annee_film" required>
                
                <label for="duree_film">Durée (en minutes) :</label>
                <input type="number" name="duree_film" id="duree_film" required>
                
                <label for="synopsis_film">Synopsis :</label>
                <textarea name="synopsis_film" id="synopsis_film" rows="4" required></textarea>

                <input id="submit" type="submit" value="Ajouter">
            </form>
        </div>
    </section>

<?php
$title = "Ajout film";
$content = ob_get_clean();
require "./views/template.php"
?>
