<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterZakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis_zakat',
        'id_pemberi',
        'id_penerima',
        'status',
    ];

    public function jenisZakat()
    {
        return $this->belongsTo(
            JenisZakat::class,
            'id_jenis_zakat'
        );
    }

    public function pemberi()
    {
        return $this->belongsTo(
            User::class,
            'id_pemberi'
        );
    }

    public function penerima()
    {
        return $this->belongsTo(
            User::class,
            'id_penerima'
        );
    }
}