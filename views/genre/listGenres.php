
<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-content">
    <h2>
    Liste des genres
    </h2>
    
    <div class="main-content">
        
        <?php
        // echo "<div class='li'";
        
        while ($genre = $genres->fetch()) {
                echo "
                    <div class='li'>
                            <span></span>
                            <p>" . $genre["nom_genre"] ."</p>
                    </div>
                ";
            }
            
        echo 
        "<div class='icon'>
            <a href='index.php?action=addGenre'><img src='public/Img/icons8-plus-50.png' alt='add icon'></a>
        </div>";
        ?>
    </div>
</div>

<?php
$title = "Liste des genres";
$content = ob_get_clean();
require "./views/template.php"
?>
