<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyEleveAnneeScosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleveAnneeClasse', function (Blueprint $table) {

            $table->foreign('loginEleve')->references('loginEleve')->on('eleves')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('classe_id')->references('classe_id')->on('classes')
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
        Schema::table('eleveAnneeClasse', function (Blueprint $table) {
            $table->dropForeign(['loginEleve']);
        });
    }
}
