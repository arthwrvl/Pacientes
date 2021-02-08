<?php

    class DashboardController{
        public function index(){
            //echo file_get_contents('.//View/home.html');;
            try{

                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('main.html');
                $parametros = array();
                $parametros['name'] = $_SESSION['usr']['name_user']; 
                $parametros['function'] = $_SESSION['usr']['func_user']; 
                $conteudo = $template->render($parametros);
                echo $conteudo;
                

                //var_dump($colectPosts);
            }catch (Exception $e){
                echo $e->getMessage();
            }

        }
        public function logout(){
            unset($_SESSION['usr']);
            session_destroy();
            header('Location: /pacientes');
        }
        public function cadpac(){
            //cadastrar paciente no banco
            //se cpf já existir, fazer update nos valores
        }
        public function editpac(){
            //procurar cpf ou nome no paciente
            //se existir mostrar os campos e alterar
            //botao de remover paciente
        }
        public function listpac(){
            //exibir todos os pacientes do banco
        }
        public function cadfunc(){
            //cadastrar usuario no banco
            //mostrar o codigo na tela
        }
        public function edit(){
            //procurar cpf ou nome no funcionario
            //se existir mostrar os campos e alterar
            //botao de remover funcionario
        }

    }