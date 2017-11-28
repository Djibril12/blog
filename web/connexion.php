<?php

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'init.php';

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ?: null;
$message = 'Identifiant ou mot de passe invalid';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Validator::validUsername($username) ||
            !Validator::validPassword($password)) {
        $errors[] = $message;
    }
    if (empty($errors)) {
        $userModel = new UserMySQL($db);
        $user = $userModel->authenticate($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: ' . BASE_URL_ADMIN . 'dashboard.php');
        } else {
            $errors[] = $message;
        }
    }
}

include VIEWS_CO . DIRECTORY_SEPARATOR . 'connexion.phtml';
?>