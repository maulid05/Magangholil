<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'role_users',
            'id_Role',
            'id_User'
        );
    }

    public function permissions()
    {
        return $this->belongsToMany(
            Permision::class,
            'role_permisions',
            'id_role',
            'id_permision'
        );
    }
}
