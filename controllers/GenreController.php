<?php

class GenreController {

    public function findAllGenres(){

        $dao = new DAO();

        $sql = "SELECT ge.id_genre, ge.nom_genre FROM genre ge";
        
        $genres = $dao->executerRequete($sql);
        
        require "views/genre/listGenres.php";


    }

}

?>