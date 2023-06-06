<?php 



require_once "controllers/GenreController.php";
require_once "controllers/HomeController.php";
require_once "controllers/MovieController.php";
require_once "controllers/PersonController.php";
require_once "controllers/RoleController.php";


// Je créé des instance des controllers 
$homeCtrl = new HomeController();
$personCtrl = new PersonController();
$movieCtrl = new MovieController();
$genreCtrl = new GenreController();
$roleCtrl = new RoleController();

// l'index va intercepter la requete HTTP et va orienter vers la bonen methode 
// ex :  index.php?action=listFilms

if(isset($_GET['action'])) {

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    switch($_GET['action']){
        case 'listFilms': $movieCtrl->findAllFilms(); 
        break;
        case 'listActors': $personCtrl->findAllActors(); 
        break;
        case 'listDirectors': $personCtrl->findAllDirectors(); 
        break;
        case 'listGenres': $genreCtrl->findAllGenres(); 
        break;
        case 'detailFilms': $movieCtrl->findFilmDetails($id); 
        break;
        default: $homeCtrl->homePage();
    }} else {
        $homeCtrl->homePage();
    }
?>