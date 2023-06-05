<?php
ob_start();
// demarre la temporisation de sortie
?>
<h2>
Ceci est une page d'acceuil
</h2>
<?php
$title = "Page d'acceuil";
$content = ob_get_clean();
require "./views/template.php"
?>
