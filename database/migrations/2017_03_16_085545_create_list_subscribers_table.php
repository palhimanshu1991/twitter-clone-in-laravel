<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_subscribers', function (Blueprint $table) {
            $table->increments('id');

            // id of the list to which this member belongs to
            $table->integer('list_id')->unsigned();

            // id of the user/subscriber
            $table->integer('user_id')->unsigned();

            $table->timestamps();

            // no duplicate subscribers
            $table->unique(['list_id', 'user_id']);

            // Define the foreign key constraints.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_subscribers');
    }
}
