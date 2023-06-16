<?php

require_once "bdd/DAO.php";

class MovieController {
    
    public function findAllFilms(){
        
        $dao = new DAO();
        
        $sql = "SELECT f.id_film, f.image_film, f.titre_film 
                FROM film f";
            
            $films = $dao->executerRequete($sql);
        
        require "views/movie/listMovie.php";
    }

    
    public function findFilmDetails($filmId) {
        $dao = new DAO();
        
        // Requête pour récupérer les détails du film
        $filmSql = "SELECT f.id_film, re.id_realisateur, f.image_film, f.titre_film, f.annee_film, pe.nom, pe.prenom, f.duree_film, f.synopsis_film 
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
    
    $castingSql = "SELECT jo.id_film, jo.id_role, jo.id_acteur, pe.nom, pe.prenom, ro.nom_role, f.titre_film
                    FROM jouer jo
                    INNER JOIN film f ON jo.id_film = f.id_film
                    INNER JOIN role_film ro ON jo.id_role = ro.id_role
                    INNER JOIN acteur ac ON jo.id_acteur = ac.id_acteur
                    INNER JOIN personne pe ON ac.id_personne = pe.id_personne
                    WHERE f.id_film = :filmId";
        
        $castings = $dao->executerRequete($castingSql, $params);
        
        require "views/movie/detailMovie.php";
    }
    

    public function addMovieFormulaire() {
        $dao = new DAO();
        $sql1 = "SELECT ge.id_genre, ge.nom_genre
                FROM genre ge";
        $sql2 = "SELECT r.id_realisateur, p.nom, p.prenom 
                FROM realisateur r
                INNER JOIN personne p ON r.id_personne = p.id_personne";
        $genres = $dao->executerRequete($sql1);
        $realisateurs = $dao->executerRequete($sql2);
        
        require "views/movie/addMovie.php";
    }
    

    public function addMovie($array){
        $dao = new DAO();
        
        if (isset($_POST['addMovie'])) {
            $img_film = filter_input(INPUT_POST, 'image_film', FILTER_DEFAULT);
            $titre = filter_input(INPUT_POST, 'titre_film', FILTER_DEFAULT);
            $annee = filter_input(INPUT_POST, 'annee_film', FILTER_DEFAULT);
            $dureefilm = filter_input(INPUT_POST, 'duree_film', FILTER_SANITIZE_NUMBER_INT);
            $synopsis = filter_input(INPUT_POST, 'synopsis_film', FILTER_DEFAULT);
            $idRealisateur = filter_input(INPUT_POST, 'id_realisateur', FILTER_DEFAULT);
            
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
            
            $addMovie = $dao->executerRequete($sql, $params);
            $dernierId = $dao->getBDD()->lastInsertId();
            
            $genres = filter_var_array($array['genref'], FILTER_SANITIZE_SPECIAL_CHARS);
            
            // Insérez les données dans la table "posseder"
            $sqlPosseder = "INSERT INTO posseder (id_film, id_genre) 
                                    VALUES (:id_film, :id_genre)";

            foreach($genres as $genre_actuel){
                $paramsPosseder = [
                    ":id_film" => $dernierId,
                    ":id_genre" => $genre_actuel
                ];
                $addPosseder = $dao->executerRequete($sqlPosseder, $paramsPosseder);
            }
            header('Location: http://localhost/Cinema/Cinema-PDO/index.php?action=listMovie');
        }
    }
    

    public function updateFormMovie($id) {
        $dao = new DAO();
        
        $sql = "SELECT f.titre_film, f.id_realisateur, f.annee_film, f.duree_film, f.synopsis_film, f.image_film 
                FROM film f 
                WHERE id_film = :idFilm";
        $params = array(':idFilm' => filter_var($id, FILTER_SANITIZE_NUMBER_INT));
        $film = $dao->executerRequete($sql, $params)->fetch();
    
        $sql1 = "SELECT ge.id_genre, ge.nom_genre
                FROM genre ge";
        $sql2 = "SELECT r.id_realisateur, pe.nom, pe.prenom 
                FROM realisateur r
                INNER JOIN personne pe ON r.id_personne = pe.id_personne";
        $genres = $dao->executerRequete($sql1);
        $realisateurs = $dao->executerRequete($sql2);
    
        require "views/movie/updateMovie.php";
    }
    
    
    public function updateMovie() {
        $dao = new DAO();
    
        if (isset($_POST['updateMovie'])) {
            // $idFilm = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $titreFilm = filter_input(INPUT_POST, 'titre_film', FILTER_SANITIZE_SPECIAL_CHARS);
            // $idRealisateur = filter_input(INPUT_POST, 'id_realisateur', FILTER_SANITIZE_NUMBER_INT);
            // $anneeFilm = filter_input(INPUT_POST, 'annee_film', FILTER_SANITIZE_SPECIAL_CHARS);
            // $dureeFilm = filter_input(INPUT_POST, 'duree_film', FILTER_SANITIZE_NUMBER_INT);
            // $synopsisFilm = filter_input(INPUT_POST, 'synopsis_film', FILTER_SANITIZE_SPECIAL_CHARS);
            // $imageFilm = filter_input(INPUT_POST, 'image_film', FILTER_SANITIZE_SPECIAL_CHARS);
    
            $sql = "UPDATE film 
                    SET titre_film = :titreFilm
                    WHERE id_film = :idFilm";
            // , id_realisateur = :idRealisateur, annee_film = :anneeFilm, duree_film = :dureeFilm, synopsis_film = :synopsisFilm, image_film = :imageFilm
            $params = array(
                ':titreFilm' => $titreFilm,
                // ':idRealisateur' => $idRealisateur,
                // ':anneeFilm' => $anneeFilm,
                // ':dureeFilm' => $dureeFilm,
                // ':synopsisFilm' => $synopsisFilm,
                // ':imageFilm' => $imageFilm,
                // ':idFilm' => $idFilm
            );
    
            $result = $dao->executerRequete($sql, $params);
            
            // if ($result) {
            //     // La mise à jour a réussi
            //     header('Location: http://localhost/Cinema/Cinema-PDO/index.php?action=listMovie');
            //     exit();
            // } else {
            //     // La mise à jour a échoué
            //     echo "La mise à jour n'a pas fonctionné";
            // }
        }
    
        require "views/movie/updateMovie.php";
    }
    
    
    public function deleteFormMovie($id){
        
        $dao = new DAO();

        
            $sql = "SELECT f.id_film
                    FROM film f
                    WHERE id_film = :idfilm";
    
            // $films = filter_var_array($array['filmf'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = ['idfilm' => filter_var($id, FILTER_SANITIZE_NUMBER_INT)];
            // foreach($films as $film_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
            require "views/movie/deleteMovie.php";
    }


    public function deleteMovie($id){
        
        $dao = new DAO();
    
        
            $sql = "DELETE  FROM Film
                    WHERE id_Film = :idFilm;
                    DELETE FROM posseder
                    WHERE id_film = :idFilm";
    
            // $Films = filter_var_array($array['Filmf'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = ['idFilm' => filter_var($id, FILTER_SANITIZE_NUMBER_INT)];
            // foreach($Films as $Film_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
            header('location: http://localhost/Cinema/Cinema-PDO/index.php?action=listMovie');
    }
}

?>
