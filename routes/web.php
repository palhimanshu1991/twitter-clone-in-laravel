<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', 'User\UsersController@home');
Route::resource('users', 'User\UsersController');


//Route::get('/users/{id}', function ($id) {
//
//    $user = \App\User::find($id);
//
//    var_dump('Followers: ' . $user->followers_count);
//
//    foreach ($user->followers as $follower) {
//        echo $follower->name . '<br/>';
//    }
//
//    var_dump('Friends: ' . $user->friends_count);
//
//    foreach ($user->friends as $friend) {
//        echo $friend->name . '<br/>';
//    }
//
//    var_dump('Favourites: ' . $user->favourites_count);
//
//    foreach ($user->favourites as $tweet) {
//        echo "@{$tweet->user->screen_name} :  {$tweet->text} <br/>";
//    }
//
//});
