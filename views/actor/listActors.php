
<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-content">
    <h2>
    Liste des acteurs
    </h2>
    
    <div class="main-content">
        <?php
        // echo "<div class='li'";
        
        while ($actor = $actors->fetch()) {
                echo "
                    <div class='li'>
                            <span></span>
                            <p>" . $actor["nom"] . " " . $actor["prenom"] . "</p>
                    </div>
                ";
            }
            
        // echo "</div>";
        ?>
    </div>
</div>

<?php
$title = "Liste des acteurs";
$content = ob_get_clean();
require "./views/template.php"
?>
