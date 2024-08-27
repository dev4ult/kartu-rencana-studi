CREATE INDEX idx_mata_kuliah
ON mata_kuliah (id, nama_matkul);

CREATE INDEX idx_krs
ON form_krs_mahasiswa (id, nama_mahasiswa);

CREATE INDEX idx_matkul_mahasiswa
ON matkul_mahasiswa (id, id_krs);

CREATE INDEX idx_prodi
ON program_studi (id, nama_program);