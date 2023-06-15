<?php
ob_start();
// Démarre la temporisation de sortie
?>
<section id="modify" class="sec-2 modify">
    <div class="left-content">
        <h1>
            <span class="word-3">Here</span>
            <span class="word-1">You</span>
            <span class="word-2">Can</span>
            <span class="word-4">Modify</span>
            <span class="word-5">Genres</span> 
        </h1>
    </div>
    <div class="right-content">
        <h2>
            Modification genre
        </h2>
        <form action="index.php?action=modifyGenres" method="post">
            <input type="hidden" name="id_genre" value="<?php echo $genreId; ?>">
            <label for="nom_genre">Nom :</label>
            <input type="text" name="nom_genre" id="nom_genre" placeholder="<?php echo $genre['nom_genre']; ?>" required>


            <input id="submit" type="submit" name="modifyGenres" value="Modifier">
        </form>
    </div>
</section>

<?php
$title = "Modification genre";
$content = ob_get_clean();
require "./views/template.php"
?>
