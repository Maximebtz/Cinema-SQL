<?php

class GenreController {

    public function findAllGenres(){

        $dao = new DAO();

        $sql = "SELECT ge.id_genre, ge.nom_genre FROM genre ge";
        
        $genres = $dao->executerRequete($sql);
        
        require "views/genre/listGenre.php";

    }

    
    
    public function deleteFormGenre($id){
        
        $dao = new DAO();

        
            $sql = "SELECT ge.id_genre
                    FROM genre ge
                    WHERE id_genre = :idGenre";
    
            // $genres = filter_var_array($array['genref'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = ['idGenre' => filter_var($id, FILTER_SANITIZE_NUMBER_INT)];
            // foreach($genres as $genre_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
            require "views/genre/deleteGenre.php";
    }

    public function deleteGenre($id){
        
        $dao = new DAO();

        if(isset($_POST['deleteGenre'])){
            $sql = "DELETE  FROM genre
                    WHERE id_genre = :idGenre";
    
            // $genres = filter_var_array($array['genref'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = ['idGenre' => filter_var($id, FILTER_SANITIZE_NUMBER_INT)];
            // foreach($genres as $genre_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
                header('location: http://localhost/Cinema/Cinema-PDO/index.php?action=listGenre');
        }
    }



    public function addGenre(){
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nomGenre = filter_input(INPUT_POST, 'nom_genre', FILTER_SANITIZE_SPECIAL_CHARS);

            // Insérer le nouveau genre dans la base de données 
            $dao = new DAO();
            $sql = "INSERT INTO genre (nom_genre) VALUES ('$nomGenre')";
            $dao->executerRequete($sql);
        }

        require "views/genre/addGenre.php";
    }
    
    public function updateGenre($id){
        $dao = new DAO();

        $sql2 = "SELECT nom_genre 
                FROM genre 
                WHERE id_genre = :idGenre";
        $params2 = array(':idGenre' => filter_var($id, FILTER_SANITIZE_NUMBER_INT));
        $genre = $dao->executerRequete($sql2, $params2)->fetch();


        if (isset($_POST['updateGenre'])) {

            // var_dump($idGenre, $nomGenre);
            
            $sql = "UPDATE genre 
                    SET nom_genre = :nomGenre 
                    WHERE id_genre = :idGenre";

            $nomGenre = filter_input(INPUT_POST, 'nomGenre', FILTER_SANITIZE_SPECIAL_CHARS);
            $params = array(':idGenre' => $id, ':nomGenre' => $nomGenre);
            $result = $dao->executerRequete($sql, $params);

            if ($result) {
                // La mise à jour a réussi
                header('Location: http://localhost/Cinema/Cinema-PDO/index.php?action=listGenre');
                exit();
            } else {
                // La mise à jour a échoué
                echo "la mise a jour n'a pas fonctionnée";
            }
        }

        require "views/genre/updateGenre.php";
    }
    

    public function displayAllFilms($genreId){
        $dao = new DAO();
        
        // Requête pour récupérer les films correspondant au genre spécifié
        $sql = "SELECT f.id_film, f.image_film, f.titre_film 
                FROM film f
                INNER JOIN posseder po ON f.id_film = po.id_film
                WHERE po.id_genre = :genreId";
        
        $params = array(':genreId' => filter_var($genreId, FILTER_SANITIZE_NUMBER_INT));
        $filmsGenre = $dao->executerRequete($sql, $params);
    

        $sqlGenre = "SELECT ge.nom_genre 
                    FROM genre ge
                    WHERE id_genre = :genreId";

        $paramsGenre = array(':genreId' => filter_var($genreId, FILTER_SANITIZE_NUMBER_INT));
        
        
        $genre = $dao->executerRequete($sqlGenre, $paramsGenre)->fetch();
    
        require "views/genre/filmsGenre.php";
    }
}

?>