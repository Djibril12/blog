<?php

require __DIR__ . DIRECTORY_SEPARATOR .'config' . DIRECTORY_SEPARATOR .'config.php';
//echo dirname(__DIR__);

// fonction de debug
//function debug_value ( $variable ) {
//    echo '<pre>';
//    if ( is_array( $variable ) )  {
//        print_r ( $variable );
//    } else {
//        var_dump ( $variable );
//    }
//    echo '</pre>';
//}

set_include_path(
    LIBRARY_PATH .
    PATH_SEPARATOR .
    MODEL_PATH
);

function loadClass($className) {
    require $className . '.php';
}

spl_autoload_register('loadClass');

try {
    $dsn = sprintf(
        '%s:host=%s;dbname=%s;charset=utf8',
        DB_DRIVER,
        DB_HOST,
        DB_NAME
    );
    $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    
} catch (Exception $e) {
    $titlePage = "Une erreur interne s'est produite";
    include '/web/error.php';
    exit;
}
session_start();