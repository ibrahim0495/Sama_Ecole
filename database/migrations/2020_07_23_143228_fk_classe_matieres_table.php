<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkClasseMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classeMatieres', function (Blueprint $table) {

            $table->foreign('classe_id')->references('classe_id')->on('classes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('matiere_id')->references('matiere_id')->on('matieres')
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
        Schema::table('classeMatieres', function (Blueprint $table) {
            $table->dropForeign(['classe_id','matiere_id']);
        });
    }
}
