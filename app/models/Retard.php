<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Retard extends Model
{
    protected $fillable =['retard_id','loginEleve','code','duree_retard','motif','justificatif','isDeleted'];
}
