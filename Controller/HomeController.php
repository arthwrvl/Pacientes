<?php

    class HomeController{
        public function index(){
            //echo file_get_contents('.//View/home.html');;
            try{

                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('home.html');
                $parametros = array();
                $conteudo = $template->render($parametros);
                echo $conteudo;
                

                //var_dump($colectPosts);
            }catch (Exception $e){
                echo $e->getMessage();
            }

        }
    }