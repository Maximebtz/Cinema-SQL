<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Cinema</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <nav>
                <input id="searchbar" onkeyup="search_film()" type="text"
                name="search" placeholder="Search film..">
            </nav>
        </header>
            <main>
                <div class="left-line"></div>
                <section class="sec-1 home">
                    <div class="films-contener">
                        <div class="title">
                            <h1>
                            Films
                            </h1>
                            <button id="display-insert">Ajout Film</button>
                        </div>
                    </div>
                    <div class="Genres-contener">
                        <div class="title">
                            <h1>
                            Genres
                            </h1>
                            <button id="display-insert">Ajout Genre</button>
                        </div>
                    </div>
                </section>
                <section id="insert" class="sec-2 insert">
                    <div class="left-content">
                        <h1>
                            <span class="word-1">You</span>
                            <span class="word-2">Can</span>
                            <span class="word-3">Here</span>
                            <span class="word-4">Add</span>
                            <span class="word-5">Content</span>                 
                        </h1>
                    </div>
                    <div class="right-content">
                        <h2>
                            AJOUT
                        </h2>
                        <input type="text">
                    </div>
                </section>
                <section class="sec-3 update">

                </section>
                <section class="sec-3 delete">

                </section>
            </main>
        
    </div>
    <script src="./Script.js"></script>
</body>
</html>