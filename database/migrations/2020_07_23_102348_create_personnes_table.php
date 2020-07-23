<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->string('login')->primary();
            $table->string('prenom');
            $table->string('nom');
            $table->string('telephone');
            $table->string('adresse');
            $table->string('motDePasse');
            $table->string('nomImgPers');
            $table->string('etatPers');
            $table->string('profil');
            $table->string('langue');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnes');
    }
}
