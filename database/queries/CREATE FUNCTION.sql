DELIMITER //

CREATE FUNCTION get_matkul_sks(NPM INT, Semester INT)
RETURNS JSON
DETERMINISTIC
BEGIN
	DECLARE result JSON;
	
	SELECT 
	JSON_ARRAYAGG(
		JSON_OBJECT('nama_matkul', mata_kuliah.nama_matkul, 'beban_sks', mata_kuliah.beban_sks)
	)
	INTO result
	FROM 
		matkul_mahasiswa
	JOIN 
		mata_kuliah
	ON 
		mata_kuliah.id = matkul_mahasiswa.id_matkul
	JOIN 
		form_krs_mahasiswa
	ON 
		form_krs_mahasiswa.id = matkul_mahasiswa.id_krss
	WHERE 
		form_krs_mahasiswa.npm = NPM AND form_krs_mahasiswa.semester = Semester;
		
	RETURN result;
END //
   
DELIMITER ;

SELECT get_matkul_sks(2134213232, 2);