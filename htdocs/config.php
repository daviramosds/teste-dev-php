<?php
$autoload = function ($class) {
    include('classes/' . $class . '.php');
};

spl_autoload_register($autoload);

define('INCLUDE_PATH', 'http://localhost/');

$estadoCivil =  array(
    "Solteiro",
    "Casado",
    "Separado",
    "Divorciado",
    "Viúvo"
);
