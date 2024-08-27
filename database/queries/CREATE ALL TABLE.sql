CREATE TABLE program_studi (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	nama_program VARCHAR(50) NOT NULL
);

CREATE TABLE form_krs_mahasiswa (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	id_prodi INT(11),
	nama_mahasiswa VARCHAR(255) NOT NULL,
	npm VARCHAR(10) NOT NULL,
	tingkat INT(1) NOT NULL,
	semester INT(2) NOT NULL,
	angkatan INT(4) NOT NULL,
	FOREIGN KEY (id_prodi) REFERENCES program_studi(id)
);

CREATE TABLE mata_kuliah (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	kode_mk VARCHAR(10),
	nama_matkul VARCHAR(50) NOT NULL,
	beban_sks INT(1) NOT NULL
);

CREATE TABLE matkul_mahasiswa (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	id_krs INT(11) NOT NULL,
	id_matkul INT(11) NOT NULL,
	keterangan ENUM('Baru', 'Lama') DEFAULT 'Lama',
	FOREIGN KEY (id_krs) REFERENCES form_krs_mahasiswa(id),
	FOREIGN KEY (id_matkul) REFERENCES mata_kuliah(id)
);