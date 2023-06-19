<?php 

class PersonController {
    public function findAllActors(){
        $dao = new DAO();

        $sql = "SELECT pe.id_personne, ac.id_acteur, pe.nom, pe.prenom
                FROM personne pe
                INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
                GROUP BY pe.id_personne";
        
        $actors = $dao->executerRequete($sql);

        require "views/actor/listActor.php";

    }
    
    
    public function findAllDirectors(){
        $dao = new DAO();

        $sql = "SELECT pe.id_personne, re.id_realisateur, pe.nom, pe.prenom
                FROM personne pe
                INNER JOIN realisateur re ON pe.id_personne = re.id_personne
                GROUP BY pe.id_personne";
        
        $directors = $dao->executerRequete($sql);

        require "views/director/listDirector.php";

    }


    public function addActor(){
        $dao = new DAO();
    
        if(isset($_POST['addActor'])){
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, 'dateNaissance', FILTER_SANITIZE_SPECIAL_CHARS);
            
            $sql = "INSERT INTO personne (id_personne, nom, prenom, sexe, dateNaissance) 
                    VALUES (NULL, :nom, :prenom, :sexe, :dateNaissance)";
            
            $params = [
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":sexe" => $sexe,
                ":dateNaissance" => $date_naissance
            ];
    
            $addPerson = $dao->executerRequete($sql, $params);
    
            // recup l'id de la personne qui vient d'être ajoutée
            $id_personne_acteur = $dao->getBDD()->lastInsertId();
    
            // inserer une nouvelle entrée dans la table acteur
            $sql = "INSERT INTO acteur (id_acteur, id_personne) 
                    VALUES (NULL, :id_personne)";
            $params = [
                ":id_personne" => $id_personne_acteur
            ];
            $addActor = $dao->executerRequete($sql, $params);
        }
        require "views/actor/addActor.php";
    }
    
    

    public function addDirector(){

        $dao = new DAO();

        if(isset($_POST['addDirector'])){
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_SPECIAL_CHARS);
        $date_naissance = filter_input(INPUT_POST, 'dateNaissance', FILTER_SANITIZE_SPECIAL_CHARS);
            
            $sql = "INSERT INTO personne (id_personne, nom, prenom, sexe, dateNaissance) 
                    VALUES (NULL, :nom, :prenom, :sexe, :dateNaissance)";
            
            $params = [
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":sexe" => $sexe,
                ":dateNaissance" => $date_naissance
            ];

            $addDirector = $dao->executerRequete($sql, $params);

            $id_personne_realisateur = $dao->getBDD()->lastInsertId();

            $sql = "INSERT INTO realisateur (id_realisateur, id_personne)
                    VALUES (NULL, :id_personne)";
            $params = [
                ":id_personne" => $id_personne_realisateur
            ];
            $addDirector = $dao->executerRequete($sql, $params);
        }

        require "views/director/addDirector.php";
    }



    public function findActorDetails($id) {
        $dao = new DAO();
        
        // Requête pour récupérer les détails du film
        $sql = "SELECT ac.id_acteur, pe.nom, pe.prenom, pe.dateNaissance
                    FROM acteur ac
                    INNER JOIN personne pe ON ac.id_personne = pe.id_personne
                    WHERE ac.id_acteur = $id";
    
    // $params = array(':actorId' => $id);
    $details = $dao->executerRequete($sql);
    
    
    $castingSql = "SELECT jo.id_film, jo.id_role, jo.id_acteur, pe.nom, pe.prenom, ro.nom_role, f.titre_film
                    FROM jouer jo
                    INNER JOIN film f ON jo.id_film = f.id_film
                    INNER JOIN role_film ro ON jo.id_role = ro.id_role
                    INNER JOIN acteur ac ON jo.id_acteur = ac.id_acteur
                    INNER JOIN personne pe ON ac.id_personne = pe.id_personne
                    WHERE jo.id_acteur = $id";
        
        $castings = $dao->executerRequete($castingSql);
        
        require "views/actor/detailActor.php";
    }


    public function findDirectorDetails($id) {
        $dao = new DAO();
    
        // Requête pour récupérer les détails du réalisateur
        $sql = "SELECT re.id_realisateur, pe.nom, pe.prenom, pe.dateNaissance
                FROM realisateur re
                INNER JOIN personne pe ON re.id_personne = pe.id_personne
                WHERE re.id_realisateur = :idRealisateur";
    
        $params = [':idRealisateur' => $id];
        $details = $dao->executerRequete($sql, $params);
    
        // Requête pour récupérer les films réalisés par le réalisateur
        $filmSql = "SELECT f.titre_film
                    FROM film f
                    WHERE f.id_realisateur = :idRealisateur";
    
        $films = $dao->executerRequete($filmSql, $params);
    
        require "views/director/detailDirector.php";
    }


    public function deleteFormActor($id){
        
        $dao = new DAO();

        
            $sql = "SELECT ac.id_acteur
                    FROM acteur ac
                    WHERE id_acteur = :idActeur";
    
            // $films = filter_var_array($array['filmf'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = [':idActeur' => filter_var($id, FILTER_SANITIZE_NUMBER_INT)];
            // foreach($films as $film_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
            require "views/actor/deleteActor.php";
    }


    public function deleteActor($id){
        
        $dao = new DAO();
        
            $sql = "DELETE FROM personne
                    WHERE id_personne = :idPerson";
    
            // $Acteurs = filter_var_array($array['Acteurf'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = [':idPerson' => filter_var($id, FILTER_SANITIZE_NUMBER_INT)];
            // foreach($Films as $Film_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
            header('location: http://localhost/Cinema/Cinema-PDO/index.php?action=listActor');
    }


    public function deleteFormDirector($id){
        
        $dao = new DAO();

        
            $sql = "SELECT re.id_realisateur
                    FROM realisateur re
                    WHERE id_realisateur = :idDirector";
    
            // $films = filter_var_array($array['filmf'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = [':idDirector' => filter_var($id, FILTER_SANITIZE_NUMBER_INT)];
            // forereh($films as $film_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
            require "views/director/deleteDirector.php";
    }


    public function deleteDirector($id){
        
        $dao = new DAO();
        
            $sql = "DELETE FROM personne
                    WHERE id_personne = :idPerson";
    
            // $Acteurs = filter_var_array($array['Acteurf'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            $params = [':idPerson' => filter_var($id, FILTER_SANITIZE_NUMBER_INT)];
            // foreach($Films as $Film_actuel){
                $dao->executerRequete($sql, $params);
                
            // }
            header('location: http://localhost/Cinema/Cinema-PDO/index.php?action=listDirector');
    }

    public function updateActor(){
        
    }


    public function updateDirector(){

    }
}

?>