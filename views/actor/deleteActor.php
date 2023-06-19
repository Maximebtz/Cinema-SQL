
<?php
ob_start();
// demarre la temporisation de sortie
?>
    <section id="insert" class="sec-2 insert">
        <div class="left-content">
            <h1>
                <span class="word-3">Do</span>
                <span class="word-1">You</span>
                <span class="word-2">Want to</span>
                <span class="word-4">Remove</span>
                <span class="word-5">This ?</span> 
            </h1>
        </div>
        <div class="right-content">
            <h2>
                Supprimer ?
            </h2>
            <form class="delete-form" action="index.php?action=deleteActor&id=<?= $id ?>" method="post">
                <input class="delete-btn" type="submit" name ="deleteActor" value="Supprimer">
                <a class="delete-btn" href="http://localhost/Cinema/Cinema-PDO/index.php?action=listActor">Non</a>
            </form>
        </div>
    </section>

<?php
$title = "Supp acteur";
$content = ob_get_clean();
require "./views/template.php"
?>
