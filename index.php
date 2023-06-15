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
// ex :  index.php?action=listFilm

if(isset($_GET['action'])) {

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    switch($_GET['action']){
        case 'listFilm': $movieCtrl->findAllFilms(); 
        break;
        case 'listActor': $personCtrl->findAllActors(); 
        break;
        case 'listDirector': $personCtrl->findAllDirectors(); 
        break;
        case 'listGenre': $genreCtrl->findAllGenres(); 
        break;
        case 'detailFilm': $movieCtrl->findFilmDetails($id); 
        break;
        case 'addActor': $personCtrl->addActor(); 
        break;
        case 'AddDirector': $personCtrl->AddDirector(); 
        break;
        case 'addGenre': $genreCtrl->addGenre(); 
        break;
        case 'addMovieForm': $movieCtrl->addMovieFormulaire();
        break;
        case 'addFilm': $movieCtrl->addFilm($_POST); 
        break;
        case 'updateActors': $personCtrl->updateActor(); 
        break;
        case 'updateDirectors': $personCtrl->updateDirector(); 
        break;
        case 'updateGenres': $genreCtrl->updateGenre($id); 
        break;
        case 'updateFilm': $movieCtrl->updateFilm(); 
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