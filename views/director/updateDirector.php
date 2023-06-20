<?php
    ob_start();
    // demarre la temporisation de sortie
?>

    <section id="insert" class="sec-2 insert">
        <div class="left-content">
            <h1>
                <span class="word-3">Here</span>
                <span class="word-1">You</span>
                <span class="word-2">Can</span>
                <span class="word-4">Update</span>
                <span class="word-5">Actor</span> 
            </h1>
        </div>
        <div class="right-content">
            <h2>
                Modifier 
            </h2>
            <form action="index.php?action=updateDirector&id=<?= $id ?>" method="post">
            <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" value="">
                
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="">
                
                <label for="sexe">Sexe :</label>
                <select name="sexe" id="sexe">
                    <option value="homme">H</option>
                    <option value="femme">F</option>
                    <option value="autre">Autre</option>
                </select>
                
                <label for="dateNaissance">Date de naissance :</label>
                <input type="date" name="dateNaissance" id="dateNaissance" >
                
                <input id="submit" type="submit" name="updateDirector" value="Ajouter">
            </form>
        </div>
    </section>

<?php
    $title = "Modifier Realisateur";
    $content = ob_get_clean();
    require "./views/template.php";
?>
