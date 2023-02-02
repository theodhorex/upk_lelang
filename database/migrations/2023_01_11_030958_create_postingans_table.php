<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();
            $table->string('winner')->nullable();
            $table->string('status')->nullable();
            $table->mediumText('gambar')->nullable();
            $table->string('user_id')->nullable();
            $table->string('title');
            $table->string('subtitle');
            $table->string('category');
            $table->string('location');
            $table->mediumText('descandcond');
            $table->string('endauc');
            $table->string('start_price');
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
        Schema::dropIfExists('postingans');
    }
}
