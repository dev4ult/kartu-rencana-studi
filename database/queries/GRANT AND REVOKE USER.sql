CREATE USER 'nibras'@'localhost' IDENTIFIED BY 'nibras123';

# Jangan lakukan ini untuk aplikasi
GRANT ALL PRIVILEGES ON kartu_rencana_studi TO 'nibras'@'localhost';

REVOKE ALL ON kartu_rencana_studi FROM 'nibras'@'localhost';

GRANT INSERT, UPDATE, DELETE, SELECT ON kartu_rencana_studi TO 'nibras'@'localhost';