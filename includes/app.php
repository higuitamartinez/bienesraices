<?php
include(__DIR__.'/../vendor/autoload.php');
include('config/database.php');
include('funciones.php');

use Model\ActiveRecord;
$db = conectarDB();

ActiveRecord::setDB($db);