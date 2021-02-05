<?php

/*require_once 'Core/Core.php';
require_once 'Controller/HomeController.php';
require_once 'Controller/ErroController.php';
require_once 'Controller/PostController.php';
require_once 'Controller/SobreController.php';
require_once 'Controller/AdminController.php';
require_once 'Model/Postagem.php';
require_once 'Model/Comentario.php';
require_once 'Database/Connection.php';
require_once 'vendor/autoload.php';
*/

$template = file_get_contents('View/index.html');

ob_start();
    $core = new Core;
    $core->start($_GET);


    $saida = ob_get_contents();
ob_end_clean();

$tplpronto = str_replace('{{dinamic area}}', $saida, $template);


echo $tplpronto;
