<?php 

class PersonController {
    public function findAllActors(){
        $dao = new DAO();

        $sql = "SELECT pe.nom, pe.prenom
                FROM personne pe
                INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
                GROUP BY pe.id_personne";
        
        $actors = $dao->executerRequete($sql);

        require "views/actor/listActors.php";

    }
    
    
    public function findAllDirectors(){
        $dao = new DAO();

        $sql = "SELECT pe.nom, pe.prenom
                FROM personne pe
                INNER JOIN realisateur re ON pe.id_personne = re.id_personne
                GROUP BY pe.id_personne";
        
        $directors = $dao->executerRequete($sql);

        require "views/director/listDirectors.php";

    }


    public function addActors(){
        $dao = new DAO();

        if(isset($_POST['addActor'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $date_naissance = $_POST['dateNaissance'];
            
            $sql = "INSERT INTO personne (id_personne, nom, prenom, sexe, dateNaissance) 
                    VALUES (NULL, :nom, :prenom, :sexe, :dateNaissance)";
            
            $params = [
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":sexe" => $sexe,
                ":dateNaissance" => $date_naissance
            ];

            $addActor = $dao->executerRequete($sql, $params);
        }
        require "views/actor/addActors.php";
    }
    

    public function addDirectors(){

        $dao = new DAO();

        if(isset($_POST['addDirector'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $date_naissance = $_POST['dateNaissance'];
            
            $sql = "INSERT INTO personne (id_personne, nom, prenom, sexe, dateNaissance) 
                    VALUES (NULL, :nom, :prenom, :sexe, :dateNaissance)";
            
            $params = [
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":sexe" => $sexe,
                ":dateNaissance" => $date_naissance
            ];

            $addDirector = $dao->executerRequete($sql, $params);
        }

        require "views/director/addDirectors.php";
    }


    public function modifyActor(){
        
    }


    public function modifyDirector(){

    }
}

?>