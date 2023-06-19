
<?php
ob_start();
// demarre la temporisation de sortie
?>

    
    <div class="main-content card">
        <h2>
            Liste des acteurs
        </h2>
        <!-- href='index.php?action=updateActor&id=" . $actor["id_actor"] . " -->
        <?php
        // echo "<div class='li'";
        
        while ($actor = $actors->fetch()) {
            echo "
                <div class='li'>
                    <a class='detail_btn' href='index.php?action=detailActor&id=" . $actor['id_acteur'] . "' class='clickable-cards'>
                        <a href='index.php?action=deleteFormActor&id=" . $actor["id_personne"] . "' id='delete'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtklEQVR4nO2VOwoCMRRFX6W9RXAP2YGMYOuOLC1dj+5gotVM5w50HXIkmCLE+eWpII6nCS8k95AfERkFwJZndtqwE3rcEIF7QVDKOECJfKtgARQNeau0XyWQllV1jf0Lfm+LNsAcmH1EoCJXAByBGjChNqF27xLUofsM2NB6ql4Bjxe7TAX+FUfjTRR6i2SmTXBlGAdgGubYKNy3tusM1sClJ3wPTFQryCX7DBQC/81WyS3ydXkHQDyc36v9MlYAAAAASUVORK5CYII='></a>
                        <p>" . $actor["nom"] . " " . $actor["prenom"] . "</p> 
                         
                    </a>
                </div>
                ";
            }
            
            echo 
            "<a href='index.php?action=addActor'><div class='li'>
                <img src='public/Img/icons8-plus-50.png' alt='add icon'>
            </div></a>";
        ?>
    </div>


<?php
$title = "Liste des acteurs";
$content = ob_get_clean();
require "./views/template.php"
?>
