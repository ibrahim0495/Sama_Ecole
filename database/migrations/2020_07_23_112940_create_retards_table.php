<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retards', function (Blueprint $table) {
            $table->id('retard_id');
            $table->string('loginEleve');
            $table->string('code');
            $table->integer('duree_retard');
            $table->string('motif');
            $table->boolean('justificatif')->nullable();
            $table->boolean('isDeleted')->default(0);

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
        Schema::dropIfExists('retards');
    }
}
