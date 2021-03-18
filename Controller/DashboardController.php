<?php

    class DashboardController{
        public function index(){
            //echo file_get_contents('.//View/home.html');;
            //try{
                $colectPac = Pacientes::selectAll();
                $consulta = Consulta::selectAll();

                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('main.html');
                $parametros = array();
                $parametros['codigo'] = $_SESSION['codigo']['code_user'] ?? null; 
                $parametros['adname'] = $_SESSION['codigo']['namen_user'] ?? null; 
                $parametros['name'] = $_SESSION['usr']['name_user'] ?? null; 
                $parametros['function'] = $_SESSION['usr']['func_user'] ?? null;
                $parametros['pacs'] = $colectPac;
                $parametros['cons'] = $consulta;
                $parametros['location'] = $_SESSION['location'] ?? null;
                $parametros['lispac'] = unserialize($_SESSION['paclist'] ?? null);
                $parametros['lisfunc'] = unserialize($_SESSION['funclist'] ?? null);
                $conteudo = $template->render($parametros);
                unset($_SESSION['codigo']);
                unset($_SESSION['location']);
                unset($_SESSION['paclist']);
                unset($_SESSION['funclist']);
                echo $conteudo;
            
                //var_dump($colectPosts);
           // }catch (Exception $e){
           //     header('Location: /pacientes/dashboard');
          //  }

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
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }
        }
        public function delfunc(){
            try{
                Administrador::delfunc($_POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }
        }public function del(){
            try{
                Pacientes::delete($_POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }
        }
        public function editpac(){       
            try{
                Pacientes::selectKey($_POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                //echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }
        }
        public function updpac(){
            try{
                Pacientes::update($_POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }
        }
        public function cadfuncDadosCompletos(){
            //cadastrar usuario no banco
            //mostrar o codigo na tela
            try{
                Administrador::verificarCadastro($_POST);
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }
        }

        public function editfunc(){       
            try{
                Administrador::selectKey($_POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/pacientes/dashboard"</script>';
            }
        }
        public function updfunc(){
            try{
                Administrador::update($_POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }
        }
        public function addConsulta(){
            try{
                Consulta::inserirConsulta($_POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }
        }
        public function ordemDeChegada(){
            try{
                Consulta::ordem($POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }
        }
        public function attConsulta(){
            try{
                Consulta::atualizarConsulta($_POST);
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="/pacientes/dashboard"</script>';
            }
        }
    }