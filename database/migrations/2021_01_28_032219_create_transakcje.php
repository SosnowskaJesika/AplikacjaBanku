<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransakcje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('transakcje');
        Schema::dropIfExists('wplata_gotowki');
        Schema::dropIfExists('wyplata_gotowki');

        Schema::create('transakcje', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('wykonujacy_przelew_id');
            $table->index('wykonujacy_przelew_id');
            $table->foreign('wykonujacy_przelew_id')->references('id')->on('saldo')->onDelete('cascade');

            $table->unsignedInteger('otrzymujacy_przelew_id');
            $table->foreign('otrzymujacy_przelew_id')->references('id')->on('saldo')->onDelete('cascade');

            $table->double('wielkosc_przelewu', 10, 2)->unsigned(true);
            $table->string('tytul_przelewu',64)->nullable();
            $table->string('kategoria_przelewu',64);
            $table->timestamp('data_wykonania_przelewu');
        });

        Schema::create('wplata_gotowki', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('wykonujacy_wplate_id');
            $table->index('wykonujacy_wplate_id');
            $table->foreign('wykonujacy_wplate_id')->references('id')->on('saldo')->onDelete('cascade');

            $table->double('wielkosc_wplaty', 10, 2)->unsigned(true);
            $table->timestamp('data_wykonania_wpłaty');
        });
        
        Schema::create('wyplata_gotowki', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('wykonujacy_wyplate_id');
            $table->index('wykonujacy_wyplate_id');
            $table->foreign('wykonujacy_wyplate_id')->references('id')->on('saldo')->onDelete('cascade');

            $table->double('wielkosc_wyplaty', 10, 2)->unsigned(true);
            $table->timestamp('data_wykonania_wypłaty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transakcje');
        Schema::dropIfExists('wplata_gotowki');
        Schema::dropIfExists('wyplata_gotowki');
    }
}
