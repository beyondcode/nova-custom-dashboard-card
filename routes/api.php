<?php

use Illuminate\Support\Facades\Route;

Route::get('/cards', 'Beyondcode\CustomDashboardCard\Http\Controllers\DashboardCardController@cards');