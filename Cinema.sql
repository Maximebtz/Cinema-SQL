-- Active: 1685524979446@@127.0.0.1@3306@cinema

----- Exercice Cinem-SQL -----

    -- a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur 
    
        SELECT fi.titre_film, fi.annee_film, TIME_FORMAT( SEC_TO_TIME(fi.duree_film * 60), '%H:%i' ) AS duree, pe.nom AS nom_realisateur
        FROM film fi
        INNER JOIN realisateur re ON fi.id_realisateur = re.id_realisateur
        INNER JOIN personne pe ON re.id_personne = pe.id_personne;

    -- b. Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)
    
        SELECT fi.titre_film, TIME_FORMAT(SEC_TO_TIME(fi.duree_film * 60), '%H:%i') AS duree
        FROM film fi
        INNER JOIN realisateur re ON fi.id_realisateur = re.id_realisateur
        INNER JOIN personne pe ON re.id_personne = pe.id_personne
        WHERE fi.duree_film > 135 -- 2 heures et 15 minutes en minutes
        ORDER BY fi.duree_film DESC;
    
    -- c. Liste des films d’un réalisateur (en précisant l’année de sortie) 
    
        SELECT fi.titre_film, pe.nom AS nom_realisateur, year(fi.annee_film) 
        FROM film fi
        INNER JOIN realisateur re ON fi.id_realisateur = re.id_realisateur
        INNER JOIN personne pe ON re.id_personne = pe.id_personne;
    
    -- d. Nombre de films par genre (classés dans l’ordre décroissant)
    
        SELECT ge.nom_genre, COUNT(fi.id_film) AS nbFilmGenre
        FROM posseder po
        INNER JOIN genre ge ON po.id_genre = ge.id_genre
        INNER JOIN film fi ON po.id_film = fi.id_film
        GROUP BY ge.nom_genre
        ORDER BY nbFilmGenre DESC;

    -- e. Nombre de films par réalisateur (classés dans l’ordre décroissant)
    
        SELECT pe.nom, COUNT(fi.id_film) AS nbFilmGenre
        FROM film fi
        INNER JOIN realisateur re ON fi.id_realisateur = re.id_realisateur
        INNER JOIN personne pe on re.id_personne = pe.id_personne
        GROUP BY re.id_realisateur
        ORDER BY nbFilmGenre DESC;

    -- f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe
    
        SELECT fi.titre_film, pe.nom, pe.prenom, pe.sexe
        FROM jouer jo
        INNER JOIN film fi on jo.id_film = fi.id_film
        INNER JOIN acteur ac on jo.id_acteur = ac.id_acteur
        INNER JOIN personne pe on ac.id_personne = pe.id_personne;
    
    -- g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien)
    
        SELECT fi.titre_film, pe.nom, pe.prenom, rf.nom_role, year(fi.annee_film)
        FROM jouer jo
        INNER JOIN film fi on jo.id_film = fi.id_film
        INNER JOIN role_film rf on jo.id_role = rf.id_role
        INNER JOIN acteur ac on jo.id_acteur = ac.id_acteur
        INNER JOIN personne pe on ac.id_personne = pe.id_personne
        WHERE ac.id_acteur = 1
        ORDER BY fi.annee_film DESC;
    
    -- h. Liste des personnes qui sont à la fois acteurs et réalisateurs
    
        SELECT pe.nom, pe.prenom
        FROM personne pe
        INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
        INNER JOIN realisateur re ON pe.id_personne = re.id_personne;

    -- i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)
    
        SELECT fi.titre_film, year(fi.annee_film)
        FROM film fi 
        WHERE year(fi.annee_film) > '2018'
        ORDER BY fi.annee_film DESC;
    
    -- j. Nombre d’hommes et de femmes parmi les acteurs

        SELECT 
            CASE 
                WHEN pe.sexe = 'M' THEN 'Homme' -- Si le sexe est 'M', on affiche 'Homme'
                WHEN pe.sexe = 'F' THEN 'Femme' -- Si le sexe est 'F', on affiche 'Femme'
                ELSE 'Non spécifié' -- Si le sexe n'est ni 'M' ni 'F', on affiche 'Non spécifié'
            END AS genre, -- On renomme la colonne résultat en 'genre'
            COUNT(pe.sexe) AS nombre -- On compte le nombre d'enregistrements correspondants
        FROM personne pe
        INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
        GROUP BY genre;
    
    -- k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)
    
        SELECT pe.nom, pe.prenom, (YEAR(CURRENT_DATE) - YEAR(pe.`dateNaissance`)) AS age
        FROM personne pe
        INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
        WHERE (YEAR(CURRENT_DATE) - YEAR(pe.`dateNaissance`)) > 50
        ORDER BY age DESC;
    
    -- l. Acteurs ayant joué dans 3 films ou plus

        SELECT pe.nom, pe.prenom, COUNT(jo.id_film) AS nombre_films
        FROM personne pe
        INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
        INNER JOIN jouer jo ON ac.id_acteur = jo.id_acteur
        GROUP BY pe.id_personne
        HAVING COUNT(*) >= 3;
