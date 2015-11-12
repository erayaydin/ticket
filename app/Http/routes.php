<?php

Route::model('ticket', 'App\Ticket');
Route::model('file', 'App\File');
Route::model('priority', 'App\Priority');
Route::model('status', 'App\Status');

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

    Route::get("ticket", ["as" => "ticket.index", "uses" => "TicketController@index"]);
    Route::get("ticket/create", ["middleware" => "permission:ticket.create", "as" => "ticket.create", "uses" => "TicketController@create"]);
    Route::post("ticket", ["middleware" => "permission:ticket.create", "as" => "ticket.store", "uses" => "TicketController@store"]);
    Route::get("ticket/{ticket}", ["as" => "ticket.show", "uses" => "TicketController@show"]);
    Route::get("ticket/{ticket}/file/{file}", ["as" => "ticket.file", "uses" => "TicketController@getFile"]);
    Route::post("ticket/{ticket}/comment", ["middleware" => "permission:comment.create", "as" => "ticket.comment", "uses" => "TicketController@comment"]);

    Route::get("priority", ["middleware" => "permission:priority.index", "as" => "priority.index", "uses" => "PriorityController@index"]);
    Route::get("priority/create", ["middleware" => "permission:priority.create", "as" => "priority.create", "uses" => "PriorityController@create"]);
    Route::post("priority", ["middleware" => "permission:priority.create", "as" => "priority.store", "uses" => "PriorityController@store"]);
    Route::get("priority/{priority}/edit", ["middleware" => "permission:priority.edit", "as" => "priority.edit", "uses" => "PriorityController@edit"]);
    Route::put("priority/{priority}", ["middleware" => "permission:priority.edit", "as" => "priority.update", "uses" => "PriorityController@update"]);
    Route::get("priority/{priority}/delete", ["middleware" => "permission:priority.delete", "as" => "priority.delete", "uses" => "PriorityController@destroy"]);

    Route::get("status", ["middleware" => "permission:status.index", "as" => "status.index", "uses" => "StatusController@index"]);
    Route::get("status/create", ["middleware" => "permission:status.create", "as" => "status.create", "uses" => "StatusController@create"]);
    Route::post("status", ["middleware" => "permission:status.create", "as" => "status.store", "uses" => "StatusController@store"]);
    Route::get("status/{status}/edit", ["middleware" => "permission:status.edit", "as" => "status.edit", "uses" => "StatusController@edit"]);
    Route::put("status/{status}", ["middleware" => "permission:status.edit", "as" => "status.update", "uses" => "StatusController@update"]);
    Route::get("status/{status}/delete", ["middleware" => "permission:status.delete", "as" => "status.delete", "uses" => "StatusController@destroy"]);

    Route::get("account-settings", ["as" => "user.getAccount", "uses" => "UserController@getAccount"]);
    Route::post("account-settings", ["as" => "user.postAccount", "uses" => "UserController@postAccount"]);

    Route::get('logout', ["as" => "user.logout", "uses" => 'Auth\AuthController@getLogout']);
});