<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignkeyInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function (Blueprint $table) {

            $table->foreign(['loginEleve','code'])->references(['loginEleve','code'])->on('eleves')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('anneeScolaire_id')->references('anneeScolaire_id')->on('anneeScolaires')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->dropForeign(['loginEleve','code','anneeScolaire_id']);
        });
    }
}
