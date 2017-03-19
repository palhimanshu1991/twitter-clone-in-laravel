<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->increments('id');

            // id of the user to which
            $table->integer('user_id')->unsigned();

            $table->string('text', 140);

            $table->boolean('has_media')->default(0);

            // Whether this tweet is a retweet or not
            // True means, yes this is retweet
            // by default false
            $table->boolean('is_retweeted')->default(0);

            // id of the retweeted tweet
            $table->integer('retweeted_tweet_id')->nullable()->unsigned();

            // Whether this tweet is quoting another tweet or not
            // True means, it is quoting another tweet
            // by default fale
            $table->boolean('is_quoted')->default(0);

            // id of the quoted tweet
            $table->integer('quoted_tweet_id')->nullable()->unsigned();

            $table->timestamps();

            // Define the foreign key constraints.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('retweeted_tweet_id')->references('id')->on('tweets')->onDelete('cascade');
            $table->foreign('quoted_tweet_id')->references('id')->on('tweets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
