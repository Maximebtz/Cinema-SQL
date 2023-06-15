<?php
ob_start();
// demarre la temporisation de sortie
?>
    
    <div class="main-content">
        <h2>
            Liste des films
        </h2>
        <?php
        // echo "<div class='li'";
        
            while ($film = $films->fetch()) {
                    echo "<a href='index.php?action=detailFilms&id=" . $film["id_film"] . "'>
                    <div class='li-film'>
                        <form class='delete' action='' method='post'>
                            <input type='hidden' name='id_film' value='" . $film["id_film"] . "'>
                            <button type='submit' name='id_film' id='delete'><img class src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtklEQVR4nO2VOwoCMRRFX6W9RXAP2YGMYOuOLC1dj+5gotVM5w50HXIkmCLE+eWpII6nCS8k95AfERkFwJZndtqwE3rcEIF7QVDKOECJfKtgARQNeau0XyWQllV1jf0Lfm+LNsAcmH1EoCJXAByBGjChNqF27xLUofsM2NB6ql4Bjxe7TAX+FUfjTRR6i2SmTXBlGAdgGubYKNy3tusM1sClJ3wPTFQryCX7DBQC/81WyS3ydXkHQDyc36v9MlYAAAAASUVORK5CYII='></button>
                        </form>        
                            <span><img class='img-film' src='./public/Img/" . $film["image_film"] . "' alt='Image du film'></span>
                            <p>" . $film["titre_film"] . "</p>
                            <p class='detail-p'>Detail Film</p>
                    </div></a>
                ";
            }
            
            
                 
            echo "<a href='index.php?action=addMovieForm'>
                    <div class='li-film'>
                        <img src='public/Img/icons8-plus-50.png' alt='add icon'>
                    </div>
                </a>";
        ?>
    </div>

<?php
    $title = "Liste des films";
    $content = ob_get_clean();
    require "./views/template.php"
?>