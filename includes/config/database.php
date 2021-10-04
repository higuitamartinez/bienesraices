<?php

function conectarDB(): mysqli{
    $db = new mysqli('localhost', 'your_user', 'your_pass', 'bienes_raices');
    mysqli_set_charset($db, 'utf8');

    if(!$db){
        echo('No se pudo conectar a la base de datos');
        exit;
    }

    return $db;
}