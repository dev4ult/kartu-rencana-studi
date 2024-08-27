CALL update_ket_baru('2021.00004', 'BD103');

SELECT 
	mata_kuliah.kode_mk, form_krs_mahasiswa.nama_mahasiswa, form_krs_mahasiswa.npm, matkul_mahasiswa.keterangan
FROM matkul_mahasiswa
JOIN mata_kuliah
ON 
	mata_kuliah.id = matkul_mahasiswa.id_matkul
JOIN form_krs_mahasiswa
ON 
	form_krs_mahasiswa.id = matkul_mahasiswa.id_krs
WHERE 
	form_krs_mahasiswa.nama_mahasiswa = 'John Doe';