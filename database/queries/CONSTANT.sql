SET @PI = 3.14159;

SET @PI = 3.14;

########################################################3

DROP PROCEDURE IF EXISTS calculate_circle_area;
DELIMITER //

CREATE PROCEDURE calculate_circle_area(radius DOUBLE)
BEGIN
    DECLARE PI DOUBLE DEFAULT 3.14159;
    SET PI = 312;
    SELECT PI * radius * radius AS area;
END //

DELIMITER ;

CALL calculate_circle_area(1);
