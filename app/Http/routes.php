<?php

Route::group(["middleware" => "guest"], function(){
    Route::get("login", ["as" => "user.login", "uses" => 'Auth\AuthController@getLogin']);
    Route::post("login", ["as" => "user.login", "uses" => 'Auth\AuthController@postLogin']);

    Route::get('register', ["as" => "user.register", "uses" => 'Auth\AuthController@getRegister']);
    Route::post('register', ["as" => "user.register", "uses" => 'Auth\AuthController@postRegister']);

    Route::get('password/email', ["as" => "user.password.email", "uses" => 'Auth\PasswordController@getEmail']);
    Route::post('password/email', ["as" => "user.password.email", "uses" => 'Auth\PasswordController@postEmail']);

    Route::get('password/reset/{token}', ["as" => "user.password.reset", "uses" => 'Auth\PasswordController@getReset']);
    Route::post('password/reset', ["as" => "user.password.reset", "uses" => 'Auth\PasswordController@postReset']);
});

Route::group(["middleware" => "auth"], function(){
    Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);

    Route::get("account-settings", ["as" => "user.getAccount", "uses" => "UserController@getAccount"]);
    Route::post("account-settings", ["as" => "user.postAccount", "uses" => "UserController@postAccount"]);

    Route::get('logout', ["as" => "user.logout", "uses" => 'Auth\AuthController@getLogout']);
});