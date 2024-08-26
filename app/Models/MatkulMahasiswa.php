<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulMahasiswa extends Model {
    use HasFactory;

    protected $table = 'matkul_mahasiswa';
    public $timestamps = false;
    protected $fillable = [
        'id_krs',
        'id_matkul',
        'keterangan',
    ];
}
