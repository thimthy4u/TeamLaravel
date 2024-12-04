<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
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