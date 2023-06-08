<?php

$dao = new DAO();


if (isset($_POST['delete_film']) && isset($_POST['film_id'])) {
    // Récupérer l'ID du film à supprimer
    $filmId = $_POST['film_id'];

    "DELETE FROM film WHERE id_film = :idfilm ";

}
?>







