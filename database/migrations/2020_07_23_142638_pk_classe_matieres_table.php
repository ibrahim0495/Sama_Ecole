<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PkClasseMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classeMatieres', function (Blueprint $table) {
            $table->primary(['classe_id','matiere_id']);
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
            $table->dropPrimary(['classe_id','matiere_id']);
        });
    }
}
