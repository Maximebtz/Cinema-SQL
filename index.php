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
// ex :  index.php?action=listMovie

if(isset($_GET['action'])) {

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    switch($_GET['action']){
        case 'listMovie': $movieCtrl->findAllFilms(); 
        break;
        case 'listActor': $personCtrl->findAllActors(); 
        break;
        case 'listDirector': $personCtrl->findAllDirectors(); 
        break;
        case 'listGenre': $genreCtrl->findAllGenres(); 
        break;
        case 'detailMovie': $movieCtrl->findFilmDetails($id); 
        break;
        case 'detailActor': $personCtrl->findActorDetails($id); 
        break;
        case 'detailDirector': $personCtrl->findDirectorDetails($id); 
        break;
        case 'addActor': $personCtrl->addActor(); 
        break;
        case 'addDirector': $personCtrl->addDirector(); 
        break;
        case 'addGenre': $genreCtrl->addGenre(); 
        break;
        case 'addMovieForm': $movieCtrl->addMovieFormulaire();
        break;
        case 'addMovie': $movieCtrl->addMovie($_POST); 
        break;
        case 'updateActor': $personCtrl->updateActor($id); 
        break;
        case 'updateDirector': $personCtrl->updateDirector($id); 
        break;
        case 'updateGenre': $genreCtrl->updateGenre($id); 
        break;
        case 'updateMovie': $movieCtrl->updateMovie($id); 
        break;
        case 'updateFormMovie': $movieCtrl->updateFormMovie($id); 
        break;
        case 'filmsGenre': $genreCtrl->displayAllFilms($id);
        break;
        case 'deleteGenre': $genreCtrl->deleteGenre($id); 
        break;
        case 'deleteFormGenre': $genreCtrl->deleteFormGenre($id); 
        break;
        case 'deleteMovie': $movieCtrl->deleteMovie($id); 
        break;
        case 'deleteFormMovie': $movieCtrl->deleteFormMovie($id); 
        break;
        case 'deleteActor': $personCtrl->deleteActor($id); 
        break;
        case 'deleteFormActor': $personCtrl->deleteFormActor($id); 
        break;
        case 'deleteDirector': $personCtrl->deleteDirector($id); 
        break;
        case 'deleteFormDirector': $personCtrl->deleteFormDirector($id); 
        break;
        default: $homeCtrl->homePage();
    }} else {
        $homeCtrl->homePage();
    }
?>