<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneeScolairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anneeScolaires', function (Blueprint $table) {
            $table->id('anneeScolaire_id');
            $table->string('nom_anneesco')->unique();
            $table->boolean('isDeleted')->default(0);
            $table->boolean('enCours')->default(0);
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
        Schema::dropIfExists('anneeScolaires');
    }
}
