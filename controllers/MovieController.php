<?php

require_once "bdd/DAO.php";

class MovieController {

    public function findAllFilms(){

        $dao = new DAO();

        $sql = "SELECT f.id_film, f.image_film, f.titre_film FROM film f";
        
        $films = $dao->executerRequete($sql);
        
        require "views/movie/listFilms.php";


    }

    public function findFilmDetails($filmId) {
        $dao = new DAO();
    
        $sql = "SELECT f.id_film, f.id_realisateur, f.image_film, f.titre_film, YEAR(f.annee_film), pe.nom, f.duree_film, f.titre_film, f.synopsis_film 
                FROM film f
                INNER JOIN realisateur re ON f.id_realisateur = re.id_realisateur
                INNER JOIN personne pe ON re.id_personne = pe.id_personne
                WHERE f.id_film = :filmId";
        
        $params = array(':filmId' => $filmId);
        $details = $dao->executerRequete($sql, $params);
    
        require "views/movie/detailFilms.php";
    }
    
    public function addFilms(){
        $dao = new DAO();

        if (isset($_POST['addFilm'])) {
            $img_film = $_POST['image_film'];
            $idFilm = $_GET['id_film'];
            $titre = $_POST['titre_film'];
            $annee = $_POST['annee_film'];
            $dureefilm = $_POST['duree_film'];
            $synopsis = $_POST['synopsis_film'];
            $genre = $_POST['id_genre'];
            $idRealisateur = $_POST['id_realisateur'];


            // Insérez les données dans la table "film"
    $sql = "INSERT INTO film (id_film, titre_film, annee_film, duree_film, image_film, synopsis_film, id_realisateur) 
    VALUES (NULL, :titre, :annee, :duree_film, :img_film, :synopsis, :id_realisateur)";

    $params = [
    ":titre" => $titre,
    ":annee" => $annee,
    ":duree_film" => $dureefilm,
    ":img_film" => $img_film,
    ":synopsis" => $synopsis,
    ":id_realisateur" => $idRealisateur
    ];

    $addFilm = $dao->executerRequete($sql, $params);


    // Insérez les données dans la table "posseder"
    $sqlPosseder = "INSERT INTO posseder (id_film, id_genre) VALUES (:id_film, :id_genre)";
    $paramsPosseder = [
    ":id_film" => $idFilm,
    ":id_genre" => $genre
    ];
    $addPosseder = $dao->executerRequete($sqlPosseder, $paramsPosseder);

        }
        require "views/movie/addFilms.php";
    }
}

?>