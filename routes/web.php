<?php

use Asciito\SimpleCrud\View;
use Asciito\SimpleCrud\Route;

Route::get('/', function () {
    return View::create('dashboard', ['title' => 'Dashboard']);
});

Route::get('/students', function () {
   return View::create('students.index', ['title' => 'Students']);
});