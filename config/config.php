<?php

//echo __DIR__ .'<br>';
//echo dirname(__DIR__) .'<br>';


// System
define('CONFIG_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'config');
define('VIEWS_BASE', dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR); 
define('VIEWS_CO', dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR .'connexion' . DIRECTORY_SEPARATOR); 
define('VIEWS_INS', dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR .'inscription' . DIRECTORY_SEPARATOR); 

define('ERREUR', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views'. DIRECTORY_SEPARATOR .'pages-erreurs'. DIRECTORY_SEPARATOR);
define('LIBRARY_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR .'library');
define('MODEL_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR .'model');


// Database
define('DB_HOST', '127.0.0.1');
define('DB_DRIVER', 'mysql');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'blogger');

// Url
define('BASE_URL', '/blog/web/');

