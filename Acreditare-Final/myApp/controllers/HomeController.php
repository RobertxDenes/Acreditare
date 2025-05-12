<?php

class HomeController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        // echo '<h2>Home page</h2>';
        // include APP_PATH.VIEWS.'index.html';
        $data['title'] = 'Home page';
        $data['mainContent'] = '<h1>Home page specific content</h1>';

        // dacă userul e autentificat
        session_start();
        if (isset($_SESSION['user'])) {
            $data['privateMainContent'] = '<h2>HOME private(log-in) page</h2>';
            $data['privateMainContent'] .= $this->render(APP_PATH . VIEWS . 'homeView.html');
            echo $this->render(APP_PATH . VIEWS . 'layoutAuth.html', $data);
        } else {
            // dacă nu e autentificat
            echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
        }
    }
}