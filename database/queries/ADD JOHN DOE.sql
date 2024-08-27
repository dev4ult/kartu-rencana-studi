SELECT id, kode_mk FROM mata_kuliah;

INSERT INTO 
	matkul_mahasiswa (id_krs, id_matkul)
VALUES
	(8, 1); # John Doe, BD103

SELECT 
	mata_kuliah.kode_mk, form_krs_mahasiswa.nama_mahasiswa, form_krs_mahasiswa.npm
FROM matkul_mahasiswa
JOIN mata_kuliah
ON 
	mata_kuliah.id = matkul_mahasiswa.id_matkul
JOIN form_krs_mahasiswa
ON 
	form_krs_mahasiswa.id = matkul_mahasiswa.id_krs
WHERE 
	form_krs_mahasiswa.nama_mahasiswa = 'John Doe';

