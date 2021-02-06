<?php

class LoginController{
    public function index(){
        //echo file_get_contents('.//View/home.html');;

        try{

            $loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('main.html');
            $parametros = array();
            $conteudo = $template->render($parametros);
            echo $conteudo;
            

            //var_dump($colectPosts);
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }

    public function erroLogin(){
        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);

        $template = $twig->load('login.html');

        $parametros = array();
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function verificarLogin(){
        
        try{
            Administrador::verificar($_POST);
            
            //echo '<script>alert("Funcionário inserido com sucesso!");</script>';
            echo '<script>location.href="http://localhost/pacientes/?page=login&method=index"</script>';
        }catch (Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/pacientes/?page=login&method=erroLogin"</script>';
        }


    }
}