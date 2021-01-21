<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('lieuNaiss');
            $table->date('dateNaiss');
            $table->time('heure');
            $table->bigInteger('CNIpere')->nullable()->unsigned();
            $table->string('prenomPere');
            $table->bigInteger('CNImere')->nullable()->unsigned();
            $table->string('nomMere');
            $table->string('prenomMere');
            $table->string('bulletin');
            $table->bigInteger('jugement')->nullable()->unsigned();
            $table->bigInteger('CNIDeclarant');
            $table->string('nomDeclarant');
            $table->string('prenomDeclarant');
            $table->bigInteger('officier')->unsigned();
            $table->timestamps();
            $table->foreign('officier')->references('id')->on('users');
            $table->foreign('CNIpere')->references('numeroCNI')->on('darons');
            $table->foreign('CNImere')->references('numeroCNI')->on('darons');
            $table->foreign('jugement')->references('id')->on('jugements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfants');
    }
}
