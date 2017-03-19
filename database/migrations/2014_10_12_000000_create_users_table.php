<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            // The integer representation of the unique identifier for this User.
            $table->increments('id');

            // The screen name, handle, or alias that this user identifies themselves
            // with. screen_names are unique but subject to change.
            $table->string('screen_name', 15)->unique();

            // The name of the user, as they’ve defined it. Not necessarily a person’s name.
            // Typically capped at 20 characters, but subject to change.
            $table->string('name');

            // Users's email
            $table->string('email')->unique();

            // Encrypted password
            $table->string('password');

            // Nullable . A URL provided by the user in association with their profile
            $table->string('url')->nullable();

            // Nullable . The user-defined location for this account’s profile.
            // Not necessarily a location nor parseable. This field will
            // occasionally be fuzzily interpreted by the Search service.
            $table->string('location')->nullable();

            // The user-defined UTF-8 string describing their account. NULLABLE
            $table->string('description')->nullable();

            // When true, indicates that this user has chosen to protect their Tweets.
            // Meaning that the tweets are not available to the public.
            $table->boolean('is_protected')->default(0);

            // Indicates that the user has an account with “contributor mode” enabled,
            // allowing for Tweets issued by the user to be co-authored by
            // another account. Rarely `` true``
            $table->boolean('contributors_enabled')->default(0);

            // When true, indicates that the user has not altered the theme or background
            // of their user profile.
            $table->boolean('default_profile')->default(1);
            
            $table->string('profile_image')->nullable();

            $table->string('profile_banner')->nullable();

            // When true, indicates that the user has a verified account
            $table->boolean('is_verified')->default(0);

            // For auto-login
            $table->rememberToken();

            // The UTC datetime that the user account was created on Twitter.
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
        Schema::dropIfExists('users');
    }
}
