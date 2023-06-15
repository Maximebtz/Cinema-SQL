<?php 

// ' or 1 = 1 --

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
        case 'addActors': $personCtrl->addActors(); 
        break;
        case 'addDirectors': $personCtrl->addDirectors(); 
        break;
        case 'addGenres': $genreCtrl->addGenres(); 
        break;
        case 'addMovieForm': $movieCtrl->addMovieFormulaire();
        break;
        case 'addFilm': $movieCtrl->addFilm($_POST); 
        break;
        case 'modifyActors': $personCtrl->modifyActor(); 
        break;
        case 'modifyDirectors': $personCtrl->modifyDirector(); 
        break;
        case 'modifyGenres': $genreCtrl->modifyGenre(); 
        break;
        case 'modifyFilms': $movieCtrl->modifyFilms(); 
        break;
        case 'filmsGenre': $genreCtrl->displayAllFilms($id); 
        break;
        case 'deleteGenre': $genreCtrl->deleteGenre($id); 
        break;
        default: $homeCtrl->homePage();
    }} else {
        $homeCtrl->homePage();
    }
?>