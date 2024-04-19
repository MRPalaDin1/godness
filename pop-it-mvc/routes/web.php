<?php

use Src\Route;

Route::add(['GET', 'POST'], '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/view', [Controller\Site::class, 'view']);
Route::add('GET', '/numbers_user', [Controller\Site::class, 'numbersUser']);
Route::add(['GET', 'POST'], '/attatel', [Controller\Site::class, 'attatel']);
Route::add(['GET', 'POST'], '/creatediv', [Controller\Site::class, 'creatediv']);
Route::add(['GET', 'POST'], '/createroom', [Controller\Site::class, 'createroom']);
Route::add(['GET', 'POST'], '/createtel', [Controller\Site::class, 'createtel']);
Route::add(['GET', 'POST'], '/view-phone', [Controller\Site::class, 'viewPhone']);
Route::add(['GET', 'POST'], '/viewdiv', [Controller\Site::class, 'viewdiv']);
Route::add(['GET', 'POST'], '/viewdivroom', [Controller\Site::class, 'viewdivroom']);
Route::add(['GET', 'POST'], '/viewroom', [Controller\Site::class, 'viewroom']);
