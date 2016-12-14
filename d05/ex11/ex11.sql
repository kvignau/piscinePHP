SELECT UCASE(fiche_personne.nom) AS NOM, prenom, prix 
FROM db_kvignau.`fiche_personne` 
INNER JOIN db_kvignau.`membre` ON fiche_personne.id_perso = membre.id_fiche_perso
INNER JOIN db_kvignau.`abonnement` ON membre.id_abo = abonnement.id_abo
WHERE abonnement.prix > 42
ORDER BY fiche_personne.nom, fiche_personne.prenom ASC;