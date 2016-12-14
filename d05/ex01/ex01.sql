CREATE TABLE IF NOT EXISTS db_kvignau.`ft_table` 
	(`id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	`login` CHAR(8) DEFAULT 'toto' NOT NULL, 
	`groupe` ENUM('staff', 'student', 'other') NOT NULL, 
	`date_de_creation` DATE NOT NULL);
