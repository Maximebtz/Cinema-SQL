<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./public/css/Style.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
      <title><?= $title ?></title>
  </head>
  <body>
    <div class="wrapper"> 
      <header>
          <nav>
            <ul>
              <li>
                <a href="index.php?action=homePage" id="home">HOME</a>
              </li>
              <li>
                <a href="index.php?action=listMovie">LISTE FILMS</a>
              </li>
              <li>
                <a href="index.php?action=listGenre">LISTE GENRES</a>
              </li>
              <li>
                <a href="index.php?action=listActor">LISTE ACTEURS</a>
              </li>
              <li>
                <a href="index.php?action=listDirector">LISTE REALISATEURS</a>
              </li>
            </ul>
              <input id="searchbar" onkeyup="search_film()" type="text"
              name="search" placeholder="Search film..">
          </nav>
      </header>

      <main>
          
      <?= $content?>
      </main>
    
    </div>
  </body>
</html>