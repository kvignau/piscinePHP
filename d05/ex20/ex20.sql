SELECT genre.id_genre, genre.nom AS `nom genre`, distrib.id_distrib, distrib.nom AS `nom distrib`, film.titre AS `titre film`
FROM db_kvignau.`genre`
LEFT JOIN db_kvignau.`film` ON genre.id_genre = film.id_genre
LEFT JOIN db_kvignau.`distrib` ON distrib.id_distrib = film.id_distrib
WHERE (genre.id_genre > 3 AND genre.id_genre < 9);