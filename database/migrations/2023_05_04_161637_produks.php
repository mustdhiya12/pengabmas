<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('produks', function (Blueprint $table) {
    $table->id('id');
    $table->string('produk_name');
    $table->string('produk_deskripsi');
    $table->string('produk_gambar');
    $table->string('produk_owner_id');
    $table->string('produk_owner_nama');
    $table->string('produk_price');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    
    }
}
