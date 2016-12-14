SELECT COUNT(*) AS nb_abo, 
FLOOR(AVG(prix)) AS moy_abo, 
SUM(duree_abo) AS ft 
FROM db_kvignau.`abonnement`;