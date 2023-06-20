
<?php
ob_start();
// demarre la temporisation de sortie
?>

    <div class="main-content card">
        <h2>
            Liste des réalisateurs
        </h2>
        <!-- href='index.php?action=updateMovie&id=" . $director["id_director"] . "' -->
            <?php
            // echo "<div class='li'";
            
            while ($director = $directors->fetch()) {
                    echo "
                        <div class='li'>
                            <a class='detail_btn' href='index.php?action=detailDirector&id=". $director['id_realisateur'] ."' class='clickable-cards'>
                                <a href='index.php?action=deleteFormDirector&id= " . $director['id_personne'] . "' id='delete'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtklEQVR4nO2VOwoCMRRFX6W9RXAP2YGMYOuOLC1dj+5gotVM5w50HXIkmCLE+eWpII6nCS8k95AfERkFwJZndtqwE3rcEIF7QVDKOECJfKtgARQNeau0XyWQllV1jf0Lfm+LNsAcmH1EoCJXAByBGjChNqF27xLUofsM2NB6ql4Bjxe7TAX+FUfjTRR6i2SmTXBlGAdgGubYKNy3tusM1sClJ3wPTFQryCX7DBQC/81WyS3ydXkHQDyc36v9MlYAAAAASUVORK5CYII='></a>
                                <p>" . $director["nom"] . " " . $director["prenom"] . "</p>
                            </a>
                        </div>
                    ";
                }
                
                echo 
                "<a href='index.php?action=addDirector'><div class='li'>
                    <img src='public/Img/icons8-plus-50.png' alt='add icon'>
                </div></a>";
            ?>
    </div>

<?php
$title = "Liste des réalisateurs";
$content = ob_get_clean();
require "./views/template.php"
?>
