<?php
ob_start();
// demarre la temporisation de sortie
?>

<div class="main-detail">
    <div class="page-detail">
        <h2>
            <?php
            while ($detail = $details->fetch()) {
                
                echo "<span><h3>" . $detail["nom"] . " " . $detail["prenom"] . "</h3></span>";
              
            ?>
        </h2>
    
        <div class="main-detail">
        <?php
        // Afficher les détails du film
        echo '
        <div class="li-detail">
            <ul>
                <li class="small"><p>Date de naissance :</p> ' . $detail["dateNaissance"] . '</li>';

                if ($films && $films->rowCount() > 0) {
                    $filmList = ""; // Variable pour stocker les détails concaténés

                    // Construire la liste des détails avec une virgule entre chaque film
                    while ($film = $films->fetch()) {
                        $filmList .= $film["titre_film"] . ", ";
                    }

                    // Supprimer la virgule en trop
                    $filmList = rtrim($filmList, ", ");

                    echo "<li class='small'><p>Films réalisés :</p> " . $filmList . "</li>";
                }

                "
                    </ul>
                </div>
            ";
    }
    
    $details->closeCursor();
    ?>
        </div>
    </div>
        
    
</div>

<?php
    $title = "Détail réalisateur";
    $content = ob_get_clean();
    require "./views/template.php"
?>