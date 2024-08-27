INSERT INTO
	program_studi (nama_program)
VALUES
	('Kedokteran'),
	('Teknik Informatika'),
	('Sastra Inggris');

INSERT INTO 
	mata_kuliah (kode_mk, nama_matkul, beban_sks)
VALUES
	('BD103', 'Pendidikan Kewarganegaraan', 2),
	('BD103.1', 'Pendidikan Pancasila', 2),
	('BD105', 'Pendidikan Agama', 3),
	('BD106', 'Bahasa Indonesia', 3),
	('BD201.1', 'Anatomi Fisiologi', 3),
	('BD202.1', 'Biokimia dan Fisika Kesehatan', 2),
	('BD203.1', 'Biorep dan Mikrobiologi', 2),
	('BD317.1', 'Keterampilan Dasar Kebidanan 1', 3),
	('BD407', 'Humaniora', 2),
	('BD505', 'Alquran Hadist', 1);

INSERT INTO 
	form_krs_mahasiswa (id_prodi, nama_mahasiswa, npm, tingkat, semester, angkatan)
VALUES
	(1, 'Nibras Alyassar', '2021.00001', 1, 2, 2021),
	(3, 'Adi Kusnadi', '2022.00002', 2, 3, 2022),
	(2, 'Michael Simajuntak', '2023.00003', 2, 4, 2023);
	
INSERT INTO
	matkul_mahasiswa (id_krs, id_matkul)
VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(2, 3),
	(2, 4),
	(2, 5),
	(3, 2),
	(3, 4),
	(3, 1);