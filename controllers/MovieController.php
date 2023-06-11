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
    
        // Requête pour récupérer les détails du film
        $filmSql = "SELECT f.id_film, re.id_realisateur, f.image_film, f.titre_film, YEAR(f.annee_film), pe.nom, f.duree_film, f.synopsis_film 
                    FROM film f
                    INNER JOIN realisateur re ON f.id_realisateur = re.id_realisateur
                    INNER JOIN personne pe ON re.id_personne = pe.id_personne
                    WHERE f.id_film = :filmId";
    
        $params = array(':filmId' => $filmId);
        $details = $dao->executerRequete($filmSql, $params);
    
        // Requête pour récupérer les genres du film
        $genresSql = "SELECT ge.nom_genre
                      FROM film f
                      INNER JOIN posseder po ON f.id_film = po.id_film
                      INNER JOIN genre ge ON po.id_genre = ge.id_genre
                      WHERE f.id_film = :filmId";
    
        $genres = $dao->executerRequete($genresSql, $params);
    
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
        $sql = "INSERT INTO film (titre_film, annee_film, duree_film, image_film, synopsis_film, id_realisateur) 
        VALUES (:titre, :annee, :duree_film, :img_film, :synopsis, :id_realisateur)";

        $params = [
            ":titre" => $titre,
            ":annee" => $annee,
            ":duree_film" => $dureefilm,
            ":img_film" => $img_film,
            ":synopsis" => $synopsis,
            ":id_realisateur" => $idRealisateur
            ];

        $addFilm = $dao->executerRequete($sql, $params);

        // Vérifiez si l'ID du film est valide avant d'insérer dans la table "posseder"
        if ($idFilm) {
        // Insérez les données dans la table "posseder"
        $sqlPosseder = "INSERT INTO posseder (id_film, id_genre) VALUES (:id_film, :id_genre)";
        $paramsPosseder = [
                        ":id_film" => $idFilm,
                        ":id_genre" => $genre
                        ];
        $addPosseder = $dao->executerRequete($sqlPosseder, $paramsPosseder);
        };

        }
        require "views/movie/addFilms.php";
    }


    public function modifyFilms(){
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
    
            // Mettez à jour les données dans la table "film"
            $sql = "UPDATE film SET titre_film = :titre, annee_film = :annee, duree_film = :duree_film, image_film = :img_film, synopsis_film = :synopsis, id_realisateur = :id_realisateur WHERE id_film = :idFilm";
    
            $params = [
                ":titre" => $titre,
                ":annee" => $annee,
                ":duree_film" => $dureefilm,
                ":img_film" => $img_film,
                ":synopsis" => $synopsis,
                ":id_realisateur" => $idRealisateur,
                ":idFilm" => $idFilm
            ];
    
            $modifyFilm = $dao->executerRequete($sql, $params);
    
            // Vérifiez si l'ID du film est valide avant de mettre à jour la table "posseder"
            if ($idFilm) {
                // Mettez à jour les données dans la table "posseder"
                $sqlPosseder = "UPDATE posseder SET id_genre = :id_genre WHERE id_film = :id_film";
                $paramsPosseder = [
                    ":id_film" => $idFilm,
                    ":id_genre" => $genre
                ];
                $modifyPosseder = $dao->executerRequete($sqlPosseder, $paramsPosseder);
            } 
        }
        require "views/movie/modifyFilms.php";
    }
}

?>