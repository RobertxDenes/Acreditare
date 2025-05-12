<?php

class AppController
{
    protected $routes = [
        'home' => 'HomeController',
        'info' => 'InfoController',
        'contact' => 'ContactController',
        'about' => 'AboutController',
        'cos' => 'CosController',
        'testdrive' => 'TestDriveController',
        'testdrivedata' => 'TestDriveDataController',
        'login' => 'LoginController',
        'logout' => 'LogoutController',
        'signup' => 'SignUpController'
    ];

    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
        if (isset($_GET['page'])) {
            // dacă am dat click pe o pagină din meniu, mergi la pagina respectivă
            $page = $_GET['page'];
        } else {
            // mergi la home
            $page = 'home';
        }
        if (array_key_exists($page, $this->routes)) {
            $className = $this->routes[$page];
        } else
            $className = $this->routes['home'];
        // accesez controllerul respectiv
        new $className;
    }

    public function render($page, $data = [])
    {
        $template = file_get_contents($page);
        // caută toate placeholderele
        preg_match_all("[{{\w+}}]", $template, $matches);
        foreach ($matches[0] as $value) {
            // șterg toate {{ }}
            $item = str_replace('{{', '', $value);
            $item = str_replace('}}', '', $item);
            // caut în arrayul data dacă există cheia cu numele placeholderului
            if (array_key_exists($item, $data)) {
                $template = str_replace($value, $data[$item], $template);
            }
        }
        return $template;
    }
}