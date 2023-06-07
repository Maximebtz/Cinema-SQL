<?php

class GenreController {

    public function findAllGenres(){

        $dao = new DAO();

        $sql = "SELECT ge.id_genre, ge.nom_genre FROM genre ge";
        
        $genres = $dao->executerRequete($sql);
        
        require "views/genre/listGenres.php";


    }

    public function addGenres(){
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nomGenre = $_POST['nom_genre'];

            // Insérer le nouveau genre dans la base de données (vous devez adapter cette partie à votre logique de base de données)
            $dao = new DAO();
            $sql = "INSERT INTO genre (nom_genre) VALUES ('$nomGenre')";
            $dao->executerRequete($sql);
        }

        require "views/genre/addGenres.php";
    }

    public function modifyGenre(){
        
    }
}

?>