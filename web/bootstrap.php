<?php

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'init.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
//include  dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR . 'index.phtml' ; 
$loader = new Twig_Loader_Filesystem(array(VIEWS_BASE, VIEWS_INS, VIEWS_CO));
$twig = new Twig_Environment($loader, array(
    'cache' => false,
    'debug' => true
        ));
$twig->addExtension(new Twig_Extension_Debug());

$session = new Session();
$session->start();
$twig->addGlobal('session', $session);

