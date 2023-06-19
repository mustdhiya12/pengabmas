<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RabootMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::create('produk', function (Blueprint $table) {
    $table->id('produk_id');
    $table->string('produk_name');
    $table->string('produk_deskripsi');
    $table->string('produk_gambar');
    $table->string('produk_owner_id');
    $table->string('produk_owner_nama');
    $table->string('produk_price');
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
        //
    }
}
