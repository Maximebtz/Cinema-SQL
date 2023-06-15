
<?php
ob_start();
// demarre la temporisation de sortie
?>

    
    <div class="main-content card">
        <h2>
            Liste des genres
        </h2>
        
        <?php
        // echo "<div class='li'";
        
        while ($genre = $genres->fetch()) {
                echo "
                <a href='index.php?action=filmsGenre&id_film' class='clickable-cards'>
                    <div class='li'>
                            <a href='index.php?action=deleteGenre&id=" . $genre["id_genre"] . "' id='delete'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtklEQVR4nO2VOwoCMRRFX6W9RXAP2YGMYOuOLC1dj+5gotVM5w50HXIkmCLE+eWpII6nCS8k95AfERkFwJZndtqwE3rcEIF7QVDKOECJfKtgARQNeau0XyWQllV1jf0Lfm+LNsAcmH1EoCJXAByBGjChNqF27xLUofsM2NB6ql4Bjxe7TAX+FUfjTRR6i2SmTXBlGAdgGubYKNy3tusM1sClJ3wPTFQryCX7DBQC/81WyS3ydXkHQDyc36v9MlYAAAAASUVORK5CYII='></a>
                        <p>" . $genre["nom_genre"] ."</p>
                        <a href='index.php?action=updateGenres&id=" . $genre["id_genre"] . "'>update</a>
                    </div>
                </a>
                ";
            }
            
        echo 
        "<a href='index.php?action=addGenre'><div class='li'>
            <img src='public/Img/icons8-plus-50.png' alt='add icon'>
        </div></a>";
        ?>
    </div>


<?php
$title = "Liste des genres";
$content = ob_get_clean();
require "./views/template.php"
?>
