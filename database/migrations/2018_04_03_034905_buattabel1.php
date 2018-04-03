<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Buattabel1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negara', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nama');
        $table->timestamps();       
        });
        Schema::create('kota',function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_negara');
            $table->string('nama');
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
        Schema::table('negaras', function (Blueprint $table) {
            //
        });
    }
}
