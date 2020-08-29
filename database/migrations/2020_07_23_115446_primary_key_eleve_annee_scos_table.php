<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryKeyEleveAnneeScosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleveAnneeClasse', function (Blueprint $table) {
            $table->primary(['loginEleve', 'anneeScolaire_id','classe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eleveAnneeClasse', function (Blueprint $table) {
            $table->dropPrimary(['loginEleve', 'anneeScolaire_id', 'classe_id']);
        });
    }
}
