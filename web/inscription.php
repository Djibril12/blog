<?php

// register.php
include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'init.php';

$email = isset($_POST['email']) ? $_POST['email'] : null;
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// tableau des messsages d'erreurs
$errors = [];

// test si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //debug_value($_POST);

    if (!Validator::validUsername($username)) {
        $errors[] = 'Username incorrect';
    }
    if (strpos($email, '@') === false) {
        $errors[] = 'Email incorrect';
    }
    if (!Validator::validPassword($password)) {
        $errors[] = 'Mot de passe incorrect (entre 6 & 12)';
    }

    if (empty($errors)) {
        // création d'un user
        $user = new User();
        
        // insertion des données dans un tableau
        $donnees = array(
            $username,
            $email,
            $password,
            new DateTime()
        );

        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setCreatedAt(new DateTime());

        $userModel = new UserMySQL($db);
        
        if ($userModel->add($user)) {

            // par défaut on connecte l'utilisateur avec la fonction authenticate
            $user = $userModel->authenticate($username, $password);
            if ($user) {

                $_SESSION['user'] = $user;
                header('Location: index.php');
            } else {
                $errors[] = 'Impossible de vous connecter';
            }
        } else {
            echo "Une erreur s'est produite";
        }
    }
}

include VIEWS_INS . DIRECTORY_SEPARATOR . 'inscription.phtml';
?>
