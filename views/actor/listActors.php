
<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-content">
    
    <div class="main-content card">
        <h2>
            Liste des acteurs
        </h2>
        <?php
        // echo "<div class='li'";
        
        while ($actor = $actors->fetch()) {
            echo "
                <div class='li'>
                    <form class='delete' action='' method='post'>
                        <input type='hidden' name='id_acteur' value='" . $actor["id_acteur"] . "'>
                        <button type='submit' name='delete_actor' id='delete'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtklEQVR4nO2VOwoCMRRFX6W9RXAP2YGMYOuOLC1dj+5gotVM5w50HXIkmCLE+eWpII6nCS8k95AfERkFwJZndtqwE3rcEIF7QVDKOECJfKtgARQNeau0XyWQllV1jf0Lfm+LNsAcmH1EoCJXAByBGjChNqF27xLUofsM2NB6ql4Bjxe7TAX+FUfjTRR6i2SmTXBlGAdgGubYKNy3tusM1sClJ3wPTFQryCX7DBQC/81WyS3ydXkHQDyc36v9MlYAAAAASUVORK5CYII='></button>
                    </form>
                    <p>" . $actor["nom"] . " " . $actor["prenom"] . "</p>  
                </div>
                ";
            }
            
            echo 
            "<a href='index.php?action=addActors'><div class='li'>
                <img src='public/Img/icons8-plus-50.png' alt='add icon'>
            </div></a>";
        ?>
    </div>
</div>

<?php
$title = "Liste des acteurs";
$content = ob_get_clean();
require "./views/template.php"
?>
