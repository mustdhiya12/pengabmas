<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->text('body');
            $table->foreignId('comments_id')->nullable();
            $table->timestamps();
        });

        Schema::create('likes_com', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('produk_id')->constrained('comments')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('likes_pro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('likes_com');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('likes_pro');
    }
}
