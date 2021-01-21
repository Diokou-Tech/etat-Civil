<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaronsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('darons', function (Blueprint $table) {
            $table->bigInteger('numeroCNI')->unsigned();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('domicile');
            $table->date('dateNaiss');
            $table->string('profession');
            $table->string('sexe');
            $table->timestamps();
            $table->primary('numeroCNI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('darons');
    }
}
