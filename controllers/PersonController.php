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
        // $dao = new DAO();

        // $sql = "SELECT pe.nom, pe.prenom
        // FROM personne pe
        // INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
        // GROUP BY pe.id_personne";
        
        // $addActor = $dao->executerRequete($sql);

        require "views/actor/addActors.php";
    }

    public function addDirectors(){
        // $dao = new DAO();

        // $sql = "SELECT pe.nom, pe.prenom
        // FROM personne pe
        // INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
        // GROUP BY pe.id_personne";
        
        // $addDirector = $dao->executerRequete($sql);

        require "views/director/addDirectors.php";
    }
}

?>