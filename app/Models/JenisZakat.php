<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisZakat extends Model
{
    use HasFactory;

    protected $table = 'jenis_zakats';

    protected $fillable = [
        'name',
        'deskripsi_singkat',
        'wallet',
        'gambar',
        'id_petugas',
    ];

    public function masterZakats()
    {
        return $this->hasMany(MasterZakat::class, 'id_jenis_zakat');
    }
    public function petugas()
    {
        return $this->belongsTo(
            User::class,
            'id_petugas'
        );
    }
}