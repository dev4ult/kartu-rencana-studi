CREATE VIEW view_krs AS
SELECT 
	form_krs_mahasiswa.nama_mahasiswa AS nama, form_krs_mahasiswa.npm AS NPM, mata_kuliah.nama_matkul AS Mata_Ajar, beban_sks AS SKS
FROM 
	matkul_mahasiswa
JOIN 
	form_krs_mahasiswa
ON 
	form_krs_mahasiswa.id = matkul_mahasiswa.id_krs
JOIN 
	mata_kuliah
ON 
	mata_kuliah.id = matkul_mahasiswa.id_matkul;