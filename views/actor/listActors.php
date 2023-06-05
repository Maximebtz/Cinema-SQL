
<?php
ob_start();
// demarre la temporisation de sortie
?>
<h2>
Liste des acteurs
</h2>
<?php
$title = "Liste des acteurs";
$content = ob_get_clean();
require "./views/template.php"
?>
