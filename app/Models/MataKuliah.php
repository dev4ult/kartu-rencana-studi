<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model {
    use HasFactory;
    protected $table = 'mata_kuliah';

    public $timestamps = false;

    protected $fillable = [
        'kode_mk',
        'nama_matkul',
        'beban_sks',
    ];
}
