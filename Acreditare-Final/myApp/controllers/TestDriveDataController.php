<?php

class TestDriveDataController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $data['title'] = 'Test Drive Data page';
        $data['mainContent'] = '<h1>Cos page specific content</h1>';

        // dacă userul e autentificat
        session_start();
        if (isset($_SESSION['user'])) {
            $data['privateMainContent'] = '<h2>TEST DRIVE DATA private page</h2>';
            echo $this->render(APP_PATH . VIEWS . 'testdrivedataAuth.html', $data);
        } else {
            // dacă nu e autentificat
            echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
        }
    }
}