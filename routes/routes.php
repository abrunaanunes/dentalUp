<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group([
    'namespace' => 'Front'
],function () {
    SimpleRouter::get('/', 'FrontController@index');
    SimpleRouter::get('/login', 'FrontController@login');
    SimpleRouter::get('/register', 'FrontController@register');
    SimpleRouter::get('/dashboard', 'FrontController@dashboard');
});

SimpleRouter::group([
        'prefix' => 'user',
        'namespace' => 'Admin'
    ],function () {
        SimpleRouter::get('/', 'UserController@index');
        SimpleRouter::get('/create', 'UserController@create');
        SimpleRouter::get('/create', 'UserController@create');
        SimpleRouter::get('/store', 'UserController@store');
        SimpleRouter::get('/edit', 'UserController@edit');
        SimpleRouter::get('/update', 'UserController@update');
        SimpleRouter::get('/destroy', 'UserController@destroy');
});

SimpleRouter::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
],function () {
    SimpleRouter::get('/', 'DashboardController@index');
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

