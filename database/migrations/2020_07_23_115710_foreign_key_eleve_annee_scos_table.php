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
        Schema::table('eleveAnneeScos', function (Blueprint $table) {

            $table->foreign(['loginEleve','code'])->references(['loginEleve','code'])->on('eleves')
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
        Schema::table('eleveAnneeScos', function (Blueprint $table) {
            $table->dropForeign(['loginEleve','code']);
        });
    }
}
