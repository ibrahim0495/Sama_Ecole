<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkProfMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profMatieres', function (Blueprint $table) {

            $table->foreign('matiere_id')->references('matiere_id')->on('matieres')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('login_professeur')->references('login')->on('personnes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profMatieres', function (Blueprint $table) {
            $table->dropForeign(['matiere_id', 'login_professeur']);
        });
    }
}
