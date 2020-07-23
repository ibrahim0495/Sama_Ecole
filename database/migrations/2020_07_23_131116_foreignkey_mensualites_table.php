<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignkeyMensualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensualites', function (Blueprint $table) {
            $table->foreign('mois_id')->references('mois_id')->on('mois')
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
        Schema::table('mensualites', function (Blueprint $table) {
            $table->dropForeign(['mois_id','anneeScolaire_id']);
        });
    }
}
