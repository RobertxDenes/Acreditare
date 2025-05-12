<?php

class ContactController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $data['title'] = 'Cos page';
        $data['mainContent'] = '<h1>Cos page specific content</h1>';

        // dacă userul e autentificat
        session_start();
        if (isset($_SESSION['user'])) {
            $data['privateMainContent'] = '<h2>CONTACT private page</h2>';
            echo $this->render(APP_PATH . VIEWS . 'contactAuth.html', $data);
        } else {
            // dacă nu e autentificat
            echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
        }
    }
}