<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', 'HomeController@index');

SimpleRouter::get('/user', 'UserController@index');
SimpleRouter::get('/user/store', 'UserController@store');

