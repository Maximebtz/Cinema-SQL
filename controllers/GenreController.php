<?php

class GenreController {

    public function findAllGenres(){

        $dao = new DAO();

        $sql = "SELECT ge.id_genre, ge.nom_genre FROM genre ge";
        
        $genres = $dao->executerRequete($sql);
        
        require "views/genre/listGenres.php";

    }


    public function deleteGenre($id){
        
        $dao = new DAO();

        
            $sql = "DELETE  FROM genre
                    WHERE id_genre = :idGenre";
    
            // $genres = filter_var_array($array['genref'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = ['idGenre' => $id];
            // foreach($genres as $genre_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
            require "views/genre/deleteGenre.php";
                header('location: http://localhost/Cinema/Cinema-PDO/index.php?action=listGenres');
        }
    



    public function addGenres(){
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nomGenre = $_POST['nom_genre'];

            // Insérer le nouveau genre dans la base de données 
            $dao = new DAO();
            $sql = "INSERT INTO genre (nom_genre) VALUES ('$nomGenre')";
            $dao->executerRequete($sql);
        }

        require "views/genre/addGenres.php";
    }
    
    public function modifyGenre(){
        $dao = new DAO();
        $idGenre = $_GET['id_genre'];

        $sql2 = "SELECT nom_genre 
                FROM genre 
                WHERE id_genre = :idGenre";
        $params2 = array(':idGenre' => $idGenre);
        $genre = $dao->executerRequete($sql2, $params2)->fetch();


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idGenre = filter_input(INPUT_POST, 'id_genre', FILTER_SANITIZE_NUMBER_INT);
            $nomGenre = filter_input(INPUT_POST, 'nom_genre', FILTER_SANITIZE_SPECIAL_CHARS);
            var_dump($idGenre, $nomGenre);
    
            $dao = new DAO();
            $sql = "UPDATE genre 
                    SET nom_genre = :nomGenre 
                    WHERE id_genre = :idGenre";

            $params = array(':idGenre' => $idGenre, ':nomGenre' => $nomGenre);
            $result = $dao->executerRequete($sql, $params)->fetch();

            if ($result) {
                // La mise à jour a réussi
                header('Location: index.php?action=listGenres');
                exit();
            } else {
                // Gérer le cas où la mise à jour a échoué
                echo "la mise a jour n'a pas fonctionnée";
            }
        }
    

        require "views/genre/modifyGenre.php";
    }
    

    public function displayAllFilms($genreId){
        $dao = new DAO();
        
        // Requête pour récupérer les films correspondant au genre spécifié
        $sql = "SELECT f.id_film, f.image_film, f.titre_film 
                FROM film f
                INNER JOIN posseder po ON f.id_film = po.id_film
                WHERE po.id_genre = :genreId";
        
        $params = array(':genreId' => $genreId);
        $filmsGenre = $dao->executerRequete($sql, $params);
    

        $sqlGenre = "SELECT ge.nom_genre 
                    FROM genre ge
                    WHERE id_genre = :genreId";

        $paramsGenre = array(':genreId' => $genreId);
        
        
        $genre = $dao->executerRequete($sqlGenre, $paramsGenre)->fetch();
    
        require "views/genre/filmsGenre.php";
    }
}

?>