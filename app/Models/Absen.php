<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'absens';
    //Kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'asal_sekolah',
        'status',
        'bukti',
    ];
}
