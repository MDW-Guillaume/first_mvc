<?php
function signin()
{
    if (!isset($_SESSION['email'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // die;
            require_once('models/User.php');

            $username = $_POST['login'];
            $email =  $_POST['email'];
            $password =  $_POST['password'];

            if (
                strlen($password) < 8 ||
                !preg_match('/[A-Z]/', $password) ||   // Au moins une majuscule
                !preg_match('/[a-z]/', $password) ||   // Au moins une minuscule
                !preg_match('/[0-9]/', $password) ||   // Au moins un chiffre
                !preg_match('/[!@#$%^&*]/', $password)
            ) { // Au moins un caractère spécial
                // Mot de passe ne respecte pas les exigences
                $passwordError = "Le mot de passe doit contenir au moins 8 caractères, inclure une majuscule, une minuscule, un chiffre et un caractère spécial.";
            } elseif (strpos($password, $username) !== false) {
                // Mot de passe contient l'identifiant de l'utilisateur
                $passwordError = "Le mot de passe ne doit pas contenir l'identifiant de l'utilisateur.";
            } else {
                $existingUser = User::getByEmail($email);

                if ($existingUser) {
                    $emailTaken = "L'adresse e-mail existe déjà.";
                } else {
                    $user = User::create($username, $email, $password);

                    if ($user) {
                        $message = "Inscription réussie !";
                        $_SESSION['email'] = $email;
                        // Redirect vers l'accueil
                        header('Location: /?action=user/login');
                    } else {
                        $message = "Erreur lors de l'inscription";
                    }
                }
            }
        }

        require_once 'views/auth/signin.php';
    } else {
        header('Location: /?action=home');
    }
}


function login()
{
    if (!isset($_SESSION['email'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once('models/User.php');

            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($email);
            // die;

            $user = User::getByEmail($email);
            if ($user && password_verify($password, $user->getPassword())) {
                session_start();
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['email'] = $user->getEmail();
                header("Location: /?action=home");
                exit();
            } else {
                $message = "identifiants incorrects. Veuillez réessayer.";
            }
        }
        require('views/auth/login.php');
    } else {
        header('Location: /?action=home');
    }
}

function logout(){
    session_destroy();
    header('Location: /');
}
