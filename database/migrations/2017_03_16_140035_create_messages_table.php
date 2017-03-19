<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');

            // Maximum length of a message
            $table->string('text', 140);

            // id of the user who sent this message
            $table->integer('to_user_id')->unsigned();

            // id of the user who recieved this message
            $table->integer('from_user_id')->unsigned();

            // is the relation approved by user
            $table->boolean('is_seen')->default(0);

            $table->timestamps();

            // Define the foreign key constraints.
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
