<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegUser extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
