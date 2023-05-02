<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name', //имя
        'middle_name', //отчество
        'last_name', //фамилия
        'qualification',
        'specialisation',
    ];
}
