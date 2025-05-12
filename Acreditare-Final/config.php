<?php

//constantele globale ale proiectului
define('APP_PATH', 'myApp/');
define('MODELS', 'models/');
define('VIEWS', 'views/');
define('CONTROLLERS', 'controllers/');

spl_autoload_register(function ($className) {
    // caut clasa în funcție de TIPUL fișierului
    $relPath = '';
    $class = strtolower($className);
    if (str_contains($class, 'model'))
        $relPath = MODELS;
    if (str_contains($class, 'views'))
        $relPath = VIEWS;
    if (str_contains($class, 'controller'))
        $relPath = CONTROLLERS;

    // calea și numele complet al fișierului
    $filePath = APP_PATH . $relPath . $className . '.php';
    if ($filePath == '')
        die('invalid PATH!');

    if (file_exists($filePath))
        require_once $filePath;
    else
        die("File $filePath NOT found");
});