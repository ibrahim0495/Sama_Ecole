<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkProfClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profClasses', function (Blueprint $table) {
            
            $table->foreign('login_professeur')->references('login')->on('professeurs')
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
        Schema::table('profClasses', function (Blueprint $table) {
            //
        });
    }
}
