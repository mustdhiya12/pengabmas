<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PesananUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_users', function (Blueprint $table) {
    $table->id('id');
    $table->string('nama_produk_yang_dipesan');
    $table->string('harga_produk');
    $table->string('produk_buyer_name');
    $table->string('produk_buyer_id');
    $table->string('produk_owner_name');
    $table->string('produk_owner_id');
    $table->string('produk_id');
    $table->string('created_at');
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
