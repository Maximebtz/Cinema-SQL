<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-detail">
    <h2>
        <?php 
            while ($genre = $filmsGenre->fetch()) {
                echo "
                    <p>" . $genre["nom_genre"] . "</p>
                ";
            }
        ?>
    </h2>

    <div class="main-detail">
        <?php
            // Afficher les détails du film
            while ($film = $filmsGenre->fetch()) {
                echo "
                    <div class='li-film'>
                        <form class='delete' action='' method='post'>
                            <input type='hidden' name='id_film' value='" . $film["id_film"] . "'>
                            <button type='submit' name='delete_film' id='delete'><img class src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtklEQVR4nO2VOwoCMRRFX6W9RXAP2YGMYOuOLC1dj+5gotVM5w50HXIkmCLE+eWpII6nCS8k95AfERkFwJZndtqwE3rcEIF7QVDKOECJfKtgARQNeau0XyWQllV1jf0Lfm+LNsAcmH1EoCJXAByBGjChNqF27xLUofsM2NB6ql4Bjxe7TAX+FUfjTRR6i2SmTXBlGAdgGubYKNy3tusM1sClJ3wPTFQryCX7DBQC/81WyS3ydXkHQDyc36v9MlYAAAAASUVORK5CYII='></button>
                        </form>        
                            <span><img class='img-film' src='" . $film["image_film"] . "' alt='Image du film'></span>
                            <p>" . $film["titre_film"] . "</p>
                            <a href='index.php?action=detailMovie&id=" . $film["id_film"] . "'>Detail Film</a>
                    </div>
                ";
            }
            
            echo 
            "<a href='index.php?action=addMovie'><div class='li-film'>
                <img src='public/Img/icons8-plus-50.png' alt='add icon'>
            </div></a>";
        ?>
    </div>
</div>

<?php
    $title = "Films par genre";
    $content = ob_get_clean();
    require "./views/template.php"
?>