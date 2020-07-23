<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PkProfMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profMatieres', function (Blueprint $table) {
            $table->primary(['matiere_id', 'login_professeur']);
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
            $table->dropPrimary(['matiere_id', 'login_professeur']);
        });
    }
}
