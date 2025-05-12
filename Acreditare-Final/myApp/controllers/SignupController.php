<?php

class SignupController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        // preiau din formular datele
        $userName = $_POST['signUpName'];
        $userPass = $_POST['signUpPass1'];
        // instanțiez un obiect din clasa UsersModel;
        $user = new UsersModel;

        if ($user->addUser($userName, $userPass)) {
            echo '<h2 style="color:blue">User autentificat!</h2>';
            session_start();
            $_SESSION['user'] = $userName;
            header('Refresh:3, home');
        } else {
            echo '<h2 style="color:red">USERNAME taken!</h2>';
            header("Refresh:3, home");
        }
    }
}