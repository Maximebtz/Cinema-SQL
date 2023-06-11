<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-detail">
    <h2>
        
    </h2>

    <div class="main-detail">
        <?php
// Afficher les détails du film
while ($detail = $details->fetch()) {
    echo "
        <div class='li-detail'>
            <span></span>
            <h3>" . $detail["titre_film"] . "</h3>
            <ul>
                <li class='small'><p>Année :</p> " . $detail["YEAR(f.annee_film)"] . "</li>
                <li class='small'><p>Durée :</p> " . $detail["duree_film"] . " min</li>";

                // Vérifier si des genres existent
                if ($genres && $genres->rowCount() > 0) {
                    $genreList = ""; // Variable pour stocker les genres concaténés

                    // Construire la liste des genres avec une virgule entre chaque genre
                    while ($genre = $genres->fetch()) {
                        $genreList .= $genre["nom_genre"] . ", ";
                    }

                    // Supprimer la virgule en trop
                    $genreList = rtrim($genreList, ", ");

                    echo "<li class='small'><p>Genres :</p> " . $genreList . "</li>";
                }

                    echo "
                <li class='small'><p>Réalisateur :</p> " . $detail["nom"] . "</li>
                <li class='synopsis'><p>Synopsis :</p> " . $detail["synopsis_film"] . "</li>
                <a href='index.php?action=modifyFilms&id_film" . $detail['id_film'] . "'>Modifier</a>
            </ul>
        </div>
    ";
}

$details->closeCursor();
$genres->closeCursor();
?>
    </div>
</div>

<?php
    $title = "Détail film";
    $content = ob_get_clean();
    require "./views/template.php"
?>