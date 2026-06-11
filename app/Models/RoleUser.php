<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_users';

    protected $fillable = [
        'id_User',
        'id_Role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_User');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_Role');
    }
}