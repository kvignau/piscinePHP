SELECT titre, resum 
FROM db_kvignau.`film`
WHERE resum 
LIKE '%vincent%' 
ORDER BY id_film ASC;