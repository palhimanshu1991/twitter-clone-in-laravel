<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_preferences', function (Blueprint $table) {

            // `id` of the user to which the preference belongs
            $table->integer('user_id')->unsigned();

            // When true, indicates that this user has chosen to protect their Tweets.
            // Meaning that the tweets are not available to the public.
            $table->boolean('is_protected')->default(0);

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
        Schema::dropIfExists('user_preferences');
    }
}
