START TRANSACTION;

INSERT INTO form_krs_mahasiswa 
	(id_prodi, nama_mahasiswa, npm, tingkat, semester, angkatan)
VALUES
	(1, 'Nibras Alyassar', '2021.00001', 1, 2, 2021),
	(2, 'Nibras Alyassar', '2021.00003', 1, 2, 2021);
	
ROLLBACK;

START TRANSACTION;

INSERT INTO form_krs_mahasiswa 
	(id_prodi, nama_mahasiswa, npm, tingkat, semester, angkatan)
VALUES
	(1, 'Nibras Alyassar', '2021.00001', 1, 2, 2021),
	(2, 'Nibras Alyassar', '2021.00003', 1, 2, 2021);
	
COMMIT;
