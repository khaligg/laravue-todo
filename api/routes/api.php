<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function(){
    Route::post('signin', 'SignInController');
    Route::post('signout', 'SignOutController');
    Route::get('me', 'MeController');
});

Route::middleware('auth:api')->group(function () {
    Route::resources([
        'todo' => 'TodosController'
    ]);
});


