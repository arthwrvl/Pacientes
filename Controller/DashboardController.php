<?php

    class DashboardController{
        public function index(){
            //echo file_get_contents('.//View/home.html');;
            try{
                $colectPac = Pacientes::selectAll();

                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('main.html');
                $parametros = array();
                $parametros['codigo'] = $_SESSION['codigo']['code_user']; 
                $parametros['name'] = $_SESSION['usr']['name_user']; 
                $parametros['function'] = $_SESSION['usr']['func_user'];
                $parametros['pacs'] = $colectPac;

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
            try{
                Pacientes::insert($_POST);

                echo '<script>alert("Paciente inserido com sucesso!");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard   "</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }
        }
        public function editpac(){
            //procurar cpf ou nome no paciente
            //se existir mostrar os campos e alterar
            //botao de remover paciente
        }
        public function listPac($id){
            try{
                

                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);
    
                $template = $twig->load('main.html');
    
                $parametros = array();
                
               
    

                
                //$conteudo = $template->render($parametros);
                //echo $conteudo;
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function cadfunc(){
            //cadastrar usuario no banco
            //mostrar o codigo na tela
            try{
                Administrador::insert($_POST);

                echo '<script>alert("Funcionário inserido com sucesso!");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard/index"</script>';
            }
        }
        public function cadfuncDadosCompletos(){
            //cadastrar usuario no banco
            //mostrar o codigo na tela
            try{
                Administrador::verificarCadastro($_POST);

                echo '<script>alert("Dados do funcionário inserido com sucesso!");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard/index"</script>';
            }
        }

        public function edit(){
            //procurar cpf ou nome no funcionario
            //se existir mostrar os campos e alterar
            //botao de remover funcionario
        }

    }