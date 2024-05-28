<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "pasiens"; // nama tabel yg digunakan

    // kolom yg dapat diisi di table pasien
    protected $fillable = [
        "kode" ,
        "nama" ,
        "tmp_lahir" ,
        "gender" ,
        "email" ,
        "alamat",
    ];

    // nonaktifin timestamp
    public $timestamps = false;
}
