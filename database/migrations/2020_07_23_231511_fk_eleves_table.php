<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleves', function (Blueprint $table) {
            $table->foreign('loginEleve')->references('login')->on('personnes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('login_parent')->references('login')->on('parents')
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
        Schema::table('eleves', function (Blueprint $table) {
            $table->dropForeign(['loginEleve']);
            $table->dropForeign(['login_parent']);

        });
    }
}
