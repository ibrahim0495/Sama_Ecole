<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkDevoirsElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devoirs', function (Blueprint $table) {
            $table->string('loginEleve')->after('matiere_id');
            $table->string('code')->after('loginEleve');

            $table->foreign(['loginEleve', 'code'])->references(['loginEleve','code'])->on('eleves')
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
        Schema::table('devoirs', function (Blueprint $table) {
            $table->dropColumn(['loginEleve','code']);
            $table->dropForeign(['loginEleve','code']);
        });
    }
}
