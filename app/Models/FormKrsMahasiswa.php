<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKrsMahasiswa extends Model {
    use HasFactory;

    protected $table = 'form_krs_mahasiswa';

    public $timestamps = false;

    protected $fillable = [
        'id_prodi',
        'nama_mahasiswa',
        'npm',
        'tingkat',
        'semester',
        'angkatan',
    ];
}
