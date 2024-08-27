SET profiling = 1;

SELECT 
	nama_program AS prodi, nama_mahasiswa AS mahasiswa, npm, tingkat, semester, angkatan
FROM form_krs_mahasiswa
JOIN 
	program_studi ON program_studi.id = form_krs_mahasiswa.id_prodi
WHERE 
	nama_mahasiswa = 'John Doe' AND form_krs_mahasiswa.id = 8;
	
SHOW PROFILES;

SET profiling = 0;