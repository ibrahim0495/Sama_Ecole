<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable =['absence_id','loginEleve','code','duree_abs','motif','justificatif','isDeleted'];
}
