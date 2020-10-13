<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProfClasseMatiere extends Model
{
    protected $table = 'profClassesMatieres';

    protected $fillable = ['classe_id', 'login_professeur','matiere_id'];
}
