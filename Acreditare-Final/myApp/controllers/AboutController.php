<?php

class AboutController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function table($users)
    {
        $finalTable = '';
        if (is_array($users)) {
            // cap de tabel
            $finalTable .= '<table class="table"><tr>';
            foreach (array_keys($users[0]) as $key => $field) // iau cheile din array
            {
                $finalTable .= "<th>$field</th>";
            }
            $finalTable .= '</tr>';
            foreach ($users as $user) {
                $finalTable .= '<tr>';
                foreach ($user as $key => $val) {
                    $finalTable .= '<td>' . $val . '</td>';
                }
                $finalTable .= '</tr>';
            }
            $finalTable .= '</table>';
        }
        return $finalTable;
    }

    public function init()
    {
        session_start();
        $data['title'] = 'About page';
        $data['mainContent'] = '<h1>About page specific content</h1>';
        // dacă userul e autentificat

        if (isset($_SESSION['user'])) {
            $user = new UsersModel();
            $usersArray = $user->getUsers();
            $data['privateMainContent'] = '<h2>ABOUT private page</h2>';
            $data['privateMainContent'] .= $this->table($usersArray);
            echo $this->render(APP_PATH . VIEWS . 'aboutAuth.html', $data);
        } else {
            // dacă nu e autentificat
            echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
        }
    }
}