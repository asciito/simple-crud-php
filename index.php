<?php

// DEFINE CONSTANTS
define( 'VIEW_ROOT_PATH', __DIR__.'/views' );

// Includes
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/routes/web.php';

use Asciito\SimpleCrud\Route;

Route::dispatch();