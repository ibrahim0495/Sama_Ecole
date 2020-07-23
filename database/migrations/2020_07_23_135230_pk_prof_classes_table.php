<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PkProfClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profClasses', function (Blueprint $table) {
            $table->primary(['login_professeur', 'classe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profClasses', function (Blueprint $table) {
            $table->dropPrimary(['login_professeur', 'classe_id']);
        });
    }
}
