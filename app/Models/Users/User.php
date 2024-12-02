<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'sex',
        'dob',
        'phone',
        'email',
        'password',
    ];
}
