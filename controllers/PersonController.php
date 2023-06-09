<?php 

class PersonController {
    public function findAllActors(){
        $dao = new DAO();

        $sql = "SELECT pe.id_personne, ac.id_acteur, pe.nom, pe.prenom
                FROM personne pe
                INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
                GROUP BY pe.id_personne";
        
        $actors = $dao->executerRequete($sql);

        require "views/actor/listActors.php";

    }
    
    
    public function findAllDirectors(){
        $dao = new DAO();

        $sql = "SELECT pe.id_personne, re.id_realisateur, pe.nom, pe.prenom
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

            $id_personne_realisateur = $dao->getBDD()->lastInsertId();

            $sql = "INSERT INTO realisateur (id_realisateur, id_personne)
                    VALUES (NULL, :id_personne)";
            $params = [
                ":id_personne" => $id_personne_realisateur
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