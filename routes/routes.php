<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group([
],function () {
    SimpleRouter::get('/', 'FrontController@index');
    SimpleRouter::post('/login', 'FrontController@login');
    SimpleRouter::get('/logout', 'FrontController@logout');
    SimpleRouter::get('/register', 'FrontController@register');
    SimpleRouter::get('/dashboard', 'DashboardController@index');
});

SimpleRouter::group([
        'prefix' => 'user'
    ],function () {
        SimpleRouter::get('/create', 'UserController@create');
        SimpleRouter::post('/store', 'UserController@store');
        SimpleRouter::get('/edit', 'UserController@edit');
        SimpleRouter::get('/update', 'UserController@update');
        SimpleRouter::get('/destroy', 'UserController@destroy');
});

// SimpleRouter::error(function(Request $request, \Exception $exception) {

//     switch($exception->getCode()) {
//         // Page not found
//         case 404:
//             response()->redirect('/not-found');
//         // Forbidden
//         case 403:
//             response()->redirect('/forbidden');
//     }
    
// });

