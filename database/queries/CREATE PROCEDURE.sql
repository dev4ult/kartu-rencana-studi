DROP PROCEDURE update_ket_baru;

DELIMITER //
 
CREATE PROCEDURE update_ket_baru 
	(IN NPM VARCHAR(10), IN kode_matkul VARCHAR(50))
BEGIN
    UPDATE 
	 	matkul_mahasiswa
	 JOIN form_krs_mahasiswa
	 ON
	 	form_krs_mahasiswa.id = matkul_mahasiswa.id_krs
	 JOIN mata_kuliah
	 ON
	 	mata_kuliah.id = matkul_mahasiswa.id_matkul  
	 SET 
	 	keterangan = 'Baru'
	 WHERE 
	 	form_krs_mahasiswa.npm = NPM AND mata_kuliah.kode_mk = kode_matkul;
END //

DELIMITER ;