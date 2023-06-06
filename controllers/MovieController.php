<?php

require_once "bdd/DAO.php";

class MovieController {

    public function findAllFilms(){

        $dao = new DAO();

        $sql = "SELECT f.id_film, f.titre_film FROM film f";
        
        $films = $dao->executerRequete($sql);
        
        require "views/movie/listFilms.php";


    }

    public function findFilmDetails($filmId) {
        $dao = new DAO();
    
        $sql = "SELECT f.id_film, f.id_realisateur,  f.titre_film, YEAR(f.annee_film), pe.nom, f.duree_film, f.titre_film, f.synopsis_film 
                FROM film f
                INNER JOIN realisateur re ON f.id_realisateur = re.id_realisateur
                INNER JOIN personne pe ON re.id_personne = pe.id_personne
                WHERE f.id_film = :filmId";
        
        $params = array(':filmId' => $filmId);
        $details = $dao->executerRequete($sql, $params);
    
        require "views/movie/detailFilms.php";
    }
    

}

?>