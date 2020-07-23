<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualites', function (Blueprint $table) {
            $table->id('mensualite_id');
            $table->unsignedBigInteger('mois_id');
            $table->unsignedBigInteger('anneeScolaire_id');
            $table->integer('montant');
            $table->integer('reliquat');
            $table->string('type_paiement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensualites');
    }
}
