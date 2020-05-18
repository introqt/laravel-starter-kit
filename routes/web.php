<?php

use Illuminate\Support\Facades\Route;

Route::get('/{route_entity}', 'FactoryController@create');
