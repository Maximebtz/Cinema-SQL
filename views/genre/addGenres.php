
<?php
ob_start();
// demarre la temporisation de sortie
?>
    <section id="insert" class="sec-2 insert">
        <div class="left-content">
            <h1>
                <span class="word-3">Here</span>
                <span class="word-1">You</span>
                <span class="word-2">Can</span>
                <span class="word-4">Add</span>
                <span class="word-5">Genres</span> 
            </h1>
        </div>
        <div class="right-content">
            <h2>
                Ajout genre
            </h2>
            <form action="" method="post">
                <label for="nom_genre">Nom :</label>
                <input type="text" name="nom_genre" id="nom_genre" required>

                <input id="submit" type="submit" value="Ajouter">
            </form>
        </div>
    </section>

<?php
$title = "Ajout genre";
$content = ob_get_clean();
require "./views/template.php"
?>
