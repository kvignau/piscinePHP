SELECT id_distrib, nom 
FROM db_kvignau.`distrib` 
WHERE (id_distrib = 42) 
OR (id_distrib > 61 
AND id_distrib < 70) 
OR (id_distrib = 71) 
OR (id_distrib > 87 
AND id_distrib < 91) 
OR (LENGTH(nom) - LENGTH(REPLACE(LOWER(nom), 'y', '')) = 2) 
LIMIT 3, 5;