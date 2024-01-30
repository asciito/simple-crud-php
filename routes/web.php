<?php

use Asciito\SimpleCrud\View;
use Asciito\SimpleCrud\Route;

Route::get('/', function () {
    return View::create('dashboard', ['title' => 'Dashboard']);
});