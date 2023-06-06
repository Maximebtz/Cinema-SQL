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
                            <span></span>
                            <p>" . $film["titre_film"] . "</p>
                            <a href='index.php?action=detailFilm&id=" . $film["id_film"] . "'>Detail Film</a>
                    </div>
                ";
            }
            
        // echo "</div>";
        ?>
    </div>
</div>

<?php
    $title = "Liste des films";
    $content = ob_get_clean();
    require "./views/template.php"
?>