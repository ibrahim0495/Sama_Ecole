<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyAnneeScolaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleveAnneeScos', function (Blueprint $table) {
            $table->foreign('anneeScolaire_id')->references('anneeScolaire_id')->on('anneeScolaires')
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
            //$table->dropForeign('anneeScolaire_id');
        });
    }
}
