SELECT nom, prenom 
FROM db_kvignau.`fiche_personne`
WHERE nom LIKE '%-%' OR prenom LIKE '%-%' 
ORDER BY nom, prenom ASC;