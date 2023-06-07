<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-content">
    <h2>
        Liste des films
    </h2>

    <div class="main-content">
        <?php
        // echo "<div class='li'";
        
        while ($film = $films->fetch()) {
                echo "
                    <div class='li'>
                            <span><img class='img-film' src='" . $film["image_film"] . "' alt='Image du film'></span>
                            <p>" . $film["titre_film"] . "</p>
                            <a href='index.php?action=detailFilms&id=" . $film["id_film"] . "'>Detail Film</a>
                    </div>
                ";
            }
            
            echo 
            "<a href='index.php?action=addFilms'><div class='li'>
                <img src='public/Img/icons8-plus-50.png' alt='add icon'>
            </div></a>";
        ?>
    </div>
</div>

<?php
    $title = "Liste des films";
    $content = ob_get_clean();
    require "./views/template.php"
?>