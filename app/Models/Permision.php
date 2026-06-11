<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permision extends Model
{
    protected $fillable = [
        'name',
        'route'
    ];

    public function rolePermisions()
    {
        return $this->hasMany(
            RolePermision::class,
            'id_permision'
        );
    }
}
