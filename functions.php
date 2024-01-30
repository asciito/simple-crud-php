<?php

if (! defined('VIEW_ROOT_PATH')) {
    die('Silence is gold');
}

use Asciito\SimpleCrud\View;

function view(string $name, array $data = []): void
{
    View::create($name, $data)->render();
}