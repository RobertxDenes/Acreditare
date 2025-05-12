<?php

class InfoController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $data['title'] = 'Info page';
        $data['mainContent'] = '<h1>Info page specific content</h1>';

        // dacă userul e autentificat
        session_start();
        if (isset($_SESSION['user'])) {
            $data['privateMainContent'] = '<h2>INFO private page</h2>';
            echo $this->render(APP_PATH . VIEWS . 'infoAuth.html', $data);
        } else {
            // dacă nu e autentificat
            echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
        }
    }
}