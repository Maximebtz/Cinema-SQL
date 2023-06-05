<?php

require_once "bdd/DAO.php";

class MovieController {

    public function findAllFilms(){

        $dao = new DAO();

        $sql = "SELECT f.id_film, f.titre_film FROM film f";
        
        $films = $dao->executerRequete($sql);
        
        require "views/movie/listFilms.php";


    }

}

?>