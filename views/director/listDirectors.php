
<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-content">
    <h2>
    Liste des réalisateurs
    </h2>
    
    <div class="main-content">
            <?php
            // echo "<div class='li'";
            
            while ($director = $directors->fetch()) {
                    echo "
                        <div class='li'>
                                <span></span>
                                <p>" . $director["nom"] . " " . $director["prenom"] . "</p>
                        </div>
                    ";
                }
                
                echo 
                "<div class='icon'>
                    <a href='index.php?action=addDirector'><img src='public/Img/icons8-plus-50.png' alt='add icon'></a>
                </div>";
            ?>
    </div>
</div>

<?php
$title = "Liste des réalisateurs";
$content = ob_get_clean();
require "./views/template.php"
?>
