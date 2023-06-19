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
        echo "
            <div class='li-detail'>
                <ul>
                    <li class='small'><p>Date de naissance :</p> " . $detail["dateNaissance"] . "</li>";
    
                    if ($castings && $castings->rowCount() > 0) {
                        $castingList = ""; // Variable pour stocker les castings concaténés
    
                        // Construire la liste des castings avec une virgule entre chaque genre
                        while ($casting = $castings->fetch()) {
                            $castingList .= $casting["nom_role"] . " dans " . $casting["titre_film"];
                        }
    
                        // Supprimer la virgule en trop
                        $castingList = rtrim($castingList, ", ");
    
                        echo "<li class='small'><p>Castings :</p> " . $castingList . "</li>";
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
    $title = "Détail acteur";
    $content = ob_get_clean();
    require "./views/template.php"
?>