<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PkEmploiDuTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emploiDuTemps', function (Blueprint $table) {
            $table->primary(['classe_id','matiere_id','nom_salle','jour','heureDeb','heureFin']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emploiDuTemps', function (Blueprint $table) {
            $table->dropPrimary(['classe_id','matiere_id','nom_salle']);
        });
    }
}
