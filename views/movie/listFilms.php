<?php
ob_start();
// demarre la temporisation de sortie
?>
<h2>
    Liste des films
</h2>

<?= $films->rowCount()?>

<?php
$title = "Liste des films";
$content = ob_get_clean();
require "./views/template.php"
?>
