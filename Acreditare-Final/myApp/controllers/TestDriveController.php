<?php

class TestDriveController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $data['title'] = 'Test Drive page';
        $data['mainContent'] = '<h1>Test Drive page specific content</h1>';

        // dacă userul e autentificat
        session_start();
        if (isset($_SESSION['user'])) {
            $data['privateMainContent'] = '<h2>TEST DRIVE private page</h2>';
            echo $this->render(APP_PATH . VIEWS . 'testdriveAuth.html', $data);
        } else {
            // dacă nu e autentificat
            echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
        }
    }
}