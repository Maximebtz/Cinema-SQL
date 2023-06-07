
<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-content">
    <h2>
    Liste des acteurs
    </h2>
    
    <div class="main-content card">
        <?php
        // echo "<div class='li'";
        
        while ($actor = $actors->fetch()) {
                echo "
                    <div class='li'>
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
