
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
                <span class="word-5">Actors</span> 
            </h1>
        </div>
        <div class="right-content">
            <h2>
                Ajout acteur
            </h2>
            <form action="" method="post">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" required>
                
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" required>
                
                <label for="sexe">Sexe :</label>
                <select name="sexe" id="sexe" required>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
                
                <label for="dateNaissance">Date de naissance :</label>
                <input type="date" name="dateNaissance" id="dateNaissance" required>
                
                <input id="submit" type="submit" name="addActor" value="Ajouter">
            </form>
        </div>
    </section>

<?php
$title = "Ajout acteur";
$content = ob_get_clean();
require "./views/template.php"
?>
