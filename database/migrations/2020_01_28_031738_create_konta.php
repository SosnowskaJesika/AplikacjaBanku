<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('kredyt');
        Schema::dropIfExists('konto_detale');
        Schema::dropIfExists('saldo');
        Schema::dropIfExists('konta');
        
        Schema::create('konta', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unique('id');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('konta_detale', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unique('id');
            $table->foreign('id')->references('id')->on('konta')->onDelete('cascade');

            $table->string('imie');
            $table->string('nazwisko');
            $table->string('pesel',11);
            $table->date('data_urodzenia');
        });

        Schema::create('saldo', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unique('id');
            $table->foreign('id')->references('id')->on('konta')->onDelete('cascade');

            $table->double('suma_przychodow', 10, 2)->unsigned(true);
            $table->double('suma_wydatkow', 10, 2)->unsigned(true);
            $table->double('stan_konta', 10, 2)->unsigned(true);
        });

        Schema::create('kredyt', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('saldo_id');
            $table->index('saldo_id');
            $table->foreign('saldo_id')->references('id')->on('saldo')->onDelete('cascade');

            $table->double('wielkosc_kredytu', 10, 2)->unsigned(true);
            $table->timestamp('data_wziecia_kredytu');
            $table->timestamp('data_splaty_kredytu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kredyt');
        Schema::dropIfExists('konto_detale');
        Schema::dropIfExists('saldo');
        Schema::dropIfExists('konta');
    }
}
