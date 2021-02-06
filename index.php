<?php

require_once 'Core/Core.php';
require_once 'Controller/HomeController.php';
require_once 'Controller/LoginController.php';
require_once 'Controller/CadastroController.php';
require_once 'Controller/UserController.php';
require_once 'Controller/ErrorController.php';
require_once 'Database/Connection.php';
require_once 'Model/Administrador.php';
require_once 'Model/Paciente.php';
require_once 'vendor/autoload.php';


$template = file_get_contents('View/index.html');

ob_start();
    $core = new Core;
    $core->start($_GET);


    $saida = ob_get_contents();
ob_end_clean();

$tplpronto = str_replace('{{dynamic area}}', $saida, $template);


echo $tplpronto;
