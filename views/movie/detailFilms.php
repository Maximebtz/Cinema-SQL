<?php
ob_start();
// demarre la temporisation de sortie
?>
<div class="page-detail">
    <h2>
        Détails
    </h2>

    <div class="main-detail">
        <?php
        // echo "<div class='li'";
        
        while ($detail = $details->fetch()) {
                echo "
                    <div class='li-detail'>
                            <span></span>
                            <h3>" . $detail["titre_film"] ."</h3>
                            <ul>
                                <li class='small'><p>Année :</p> " . $detail["YEAR(f.annee_film)"] ."</li>
                                <li class='small'><p>Durée :</p> " . $detail["duree_film"] ." min</li>
                                <li class='small'><p>Genre :</p> " . $detail["nom_genre"] ."</li>
                                <li class='small'><p>Réalisateur :</p> " . $detail["nom"] ."</li>
                                <li class='synopsis'><p>Synopsis :</p> " . $detail["synopsis_film"] ."</li>
                                <a href='index.php?action=modifyFilms&id_film" . $detail['id_film'] . "'>Modifier</a>
                            </ul>
                    </div>
                ";
            }
        ?>
    </div>
</div>

<?php
    $title = "Détail film";
    $content = ob_get_clean();
    require "./views/template.php"
?>