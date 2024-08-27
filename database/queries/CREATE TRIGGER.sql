DELIMITER //

CREATE TRIGGER before_insert_krs 
BEFORE INSERT ON
	form_krs_mahasiswa
FOR EACH ROW
BEGIN
	DECLARE last_npm INT;
	DECLARE formatted_number VARCHAR(5);
		
	SELECT COALESCE(MAX(CAST(SUBSTRING(npm, 6, 5) AS UNSIGNED)), 0)
	INTO last_npm
	FROM form_krs_mahasiswa
	WHERE SUBSTRING(npm, 1, 4) = NEW.angkatan;
	
	SET last_npm =  last_npm + 1;
	SET formatted_number = LPAD(last_npm, 5, '0');
	
	SET NEW.npm = CONCAT(NEW.angkatan, '.', formatted_number);
END //

DELIMITER ;