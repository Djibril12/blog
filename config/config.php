<?php

// System
define('CONFIG_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'config');
define('VIEWS_BASE', dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR); 
define('VIEWS_CO', dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR .'connexion' . DIRECTORY_SEPARATOR); 
define('VIEWS_INS', dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR .'inscription' . DIRECTORY_SEPARATOR); 
define('BASE_URL', dirname(__DIR__). '\\web\\');
define('ERREUR', '/blogger/views/pages-erreurs/');
define('LIBRARY_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR .'library');
define('MODEL_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR .'model');

// Database
define('DB_HOST', '127.0.0.1');
define('DB_DRIVER', 'mysql');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'blogger');


