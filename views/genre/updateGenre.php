<?php
ob_start();
// Démarre la temporisation de sortie
?>
<section id="update" class="sec-2 update">
    <div class="left-content">
        <h1>
            <span class="word-3">Here</span>
            <span class="word-1">You</span>
            <span class="word-2">Can</span>
            <span class="word-4">Update</span>
            <span class="word-5">Genres</span> 
        </h1>
    </div>
    <div class="right-content">
        <h2>
            Modification genre
        </h2>
        <form action="index.php?action=updateGenre&id=<?= $id ?>" method="post">
            <!-- <input type="hidden" name="id_genre" value=""> -->
            <label for="nomGenre">Nom :</label>
            <input type="text" name="nomGenre" placeholder="<?php echo $genre['nom_genre'];?>" required>

            <input type="submit" name="updateGenre" value="Modifier">
        </form>
    </div>
</section>

<?php
$title = "Modification genre";
$content = ob_get_clean();
require "./views/template.php"
?>
