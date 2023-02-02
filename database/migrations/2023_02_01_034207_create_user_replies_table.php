<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_replies', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('postingan_id');
            $table->string('inbox_id');
            $table->string('receipent_name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('postal_code');
            $table->longText('desc');
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
        Schema::dropIfExists('user_replies');
    }
}
