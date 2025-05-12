<?php

class LoginController extends AppController
{
    public function __construct()
    {
        // Inițializare
        $this->init();
    }

    public function init()
    {
        // Verific dacă formularul este trimis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Verific dacă datele există
            if (isset($_POST['userName']) && isset($_POST['userPass'])) {

                // Preiau datele din formular
                $userName = $_POST['userName'];
                $userPass = $_POST['userPass'];

                // Instanțiez un obiect din clasa UsersModel
                $user = new UsersModel();

                // Verific autentificarea
                if ($user->isAuth($userName, $userPass)) {
                    // Start sesiune
                    session_start();
                    $_SESSION['user'] = $userName;

                    // Afișez mesajul de succes
                    echo '<h2 style="color:blue">User autentificat!</h2>';

                    // Redirecționez către pagina home
                    header('Location: home');
                    exit;
                } else {
                    // Afișez mesajul de eroare
                    echo '<h2 style="color:red">NU AI ACCES!</h2>';

                    // Redirecționez către pagina home
                    header('Location: home');
                    exit;
                }
            } else {
                // Dacă datele nu sunt setate
                echo '<h2 style="color:red">Te rugăm să completezi toate câmpurile!</h2>';
            }
        }
    }
}