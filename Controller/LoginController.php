<?php

class LoginController{
    public function index(){
        //echo file_get_contents('.//View/home.html');;

        try{

            $loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('login.html');
            $parametros = array();
            $parametros['error'] = $_SESSION['msg_error'] ?? null;
            $conteudo = $template->render($parametros);
            unset($_SESSION['msg_error']);
            session_destroy();
            echo $conteudo;
            

            //var_dump($colectPosts);
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }
    public function check(){
        
        try{
            Administrador::verificar($_POST);
            echo '<script>location.href="/pacientes/dashboard"</script>';
        }catch (Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            echo '<script>location.href="/pacientes/login"</script>';
        }


    }
}