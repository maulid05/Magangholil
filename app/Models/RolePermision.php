<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermision extends Model
{
    /** @use HasFactory<\Database\Factories\RolePermisionFactory> */
    use HasFactory;
    protected $fillable = [
        'id_role',
        'id_permision',
    ];
    
    public function role()
    {
        return $this->belongsTo(
            Role::class,
            'id_role'
        );
    }
    
    public function permision()
    {
        return $this->belongsTo(
            Permision::class,
            'id_permision'
        );
    }
}
