<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comptable extends Model
{
    protected $table = 'comptables';

    protected $fillable = ['login'];
}
