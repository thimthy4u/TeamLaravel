<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'sex',
        'phone',
        'email',
        'password',
    ];
}
