<?php
ob_start();
// demarre la temporisation de sortie
?>
    <section id="insert" class="sec-2 insert">
        <div class="left-content">
            <h1>
                <span class="word-1">You</span>
                <span class="word-2">Can</span>
                <span class="word-3">Here</span>
                <span class="word-4">Add</span>
                <span class="word-5">Movies</span> 
            </h1>
        </div>
        <div class="right-content">
            <h2>
                Ajout film
            </h2>
            <form action="" method="post">
                <div class="horizontal">
                    <div class="annee">
                        <label for="titre_film">Titre :</label>
                        <input type="text" name="titre_film" id="titre_film" required>
                    </div>
                    <div class="duree">
                        <label for="id_genre">Genre :</label>
                        <select name="id_genre" id="genre_film" required>
                        <?php
                            // Récupérez la liste des genres depuis votre base de données
                            $dao = new DAO();
                            $sql = "SELECT ge.id_genre, ge.nom_genre
                                    FROM genre ge";
                            $result = $dao->executerRequete($sql);
                            
                            // Parcourez les résultats et affichez les options de la liste déroulante
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $idgenre = $row['id_genre'];
                                $nomgenre = $row['nom_genre'];
                                echo "<option value='$idgenre'>$nomgenre</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="horizontal">
                    <div class="annee">
                        <label for="annee_film">Année :</label>
                        <input type="text" name="annee_film" id="annee_film" required>
                    </div>
                    <div class="duree">
                        <label for="duree_film">Durée :</label>
                        <input type="number" name="duree_film" id="duree_film" placeholder="minutes" required>
                    </div>
                </div>
                
                <label for="id_realisateur">Réalisateur :</label>
                <select name="id_realisateur" id="id_realisateur" required>
                <?php
                    // Récupérez la liste des réalisateurs depuis votre base de données
                    $dao = new DAO();
                    $sql = "SELECT r.id_realisateur, p.nom, p.prenom 
                            FROM realisateur r
                            INNER JOIN personne p ON r.id_personne = p.id_personne";
                    $result = $dao->executerRequete($sql);
                    
                    // Parcourez les résultats et affichez les options de la liste déroulante
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        $idRealisateur = $row['id_realisateur'];
                        $nomRealisateur = $row['nom'];
                        $prenomRealisateur = $row['prenom'];
                        echo "<option value='$idRealisateur'>$nomRealisateur $prenomRealisateur</option>";
                    }
                    ?>
                </select>

                <label for="image_film">Affiche :</label>
                <input type="file" name="image_film" id="image_film" class="fileImg">
                
                <label for="synopsis_film">Synopsis :</label>
                <textarea name="synopsis_film" id="synopsis_film" rows="4" required></textarea>

                <input id="submit" type="submit" name="addFilm" value="Ajouter">
            </form>
        </div>
    </section>

<?php
$title = "Ajout film";
$content = ob_get_clean();
require "./views/template.php"
?>
