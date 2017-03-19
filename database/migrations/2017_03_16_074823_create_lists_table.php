<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');

            // name of the list
            $table->string('name');

            // description for the list
            $table->string('description');

            // Indicates whether the list is public or private
            // when true, it means the list is public
            // by default it is public
            $table->boolean('is_public')->default(1);

            // id of the user to which this list belongs
            $table->integer('user_id')->unsigned();

            $table->timestamps();

            // Define the foreign key constraints.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists');
    }
}
