<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_relations', function (Blueprint $table) {

            $table->increments('id');

            // id of the user who is being followed
            $table->integer('friend_id')->unsigned();

            // id of the follower
            $table->integer('follower_id')->unsigned();

            // is the relation approved by user
            $table->boolean('is_approved')->default(1);

            $table->timestamps();

            // No duplicate relations
            $table->unique(['friend_id', 'follower_id']);

            // Define the foreign key constraints.
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('friend_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_relations');
    }
}
