<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugements', function (Blueprint $table) {
            $table->bigInteger('idJugement')->unsigned();
            $table->string('tribunal');
            $table->string('motif');
            $table->date('dateJugement');
            $table->timestamps();
            $table->primary('idJugement');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugements');
    }
}
