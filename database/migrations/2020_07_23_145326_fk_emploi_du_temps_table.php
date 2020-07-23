<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkEmploiDuTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emploiDuTemps', function (Blueprint $table) {

            $table->foreign('classe_id')->references('classe_id')->on('classes');

            $table->foreign('matiere_id')->references('matiere_id')->on('matieres');

            $table->foreign('nom_salle')->references('nom_salle')->on('salles');

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
            $table->dropForeign(['classe_id','matiere_id','nom_salle']);
        });
    }
}
