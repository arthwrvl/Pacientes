<?php

    class UserController{
        public function index(){
            //echo file_get_contents('.//View/home.html');;

                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('main.html');
                
                /*$objPostagens = Postagem::selectAll();

                $parametros = array();
                $parametros['postagens'] = $objPostagens;


                $conteudo = $template->render($parametros);
                echo $conteudo;*/

                //cadastrar pacientes //
                //editar pacientes  //
                //listar pacientes //
                //excluir pacientes
                //cadastrar funcionarios//
                //excluir funcionarios

        }
        /*public function create(){
            $loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('main.html');

            $parametros = array();
            $conteudo = $template->render($parametros);
            echo $conteudo;
        }*/
        
        public function insertFunc(){
            try{
                Administrador::insert($_POST);

                echo '<script>alert("Funcionário inserido com sucesso!");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=index"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=create"</script>';
            }
        }
        public function insertPac(){
            try{
                Pacientes::insert($_POST);

                echo '<script>alert("Paciente inserido com sucesso!");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=index"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=create"</script>';
            }
        }
        public function change($paramId){
            $loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('main.html');
            
            $post = Pacientes::selectForId($paramId);

            $parametros = array();
            $parametros['id'] = $post->id;
            $parametros['nome'] = $post->nome;
            //$parametros['conteudo'] = $post->conteudo;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        }
        public function updatePac(){

            try{
                Pacientes::update($_POST);
                echo '<script>alert("Paciente atualizado com sucesso!");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=index"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=change&id='.$_POST['id'].'"</script>';
            }
            
        }

        public function listarPac($id){
            $loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('main.html');

            $post = Pacientes::selectAll();

            
        }

        public function deletePac($paramId){

            
            try{
                Pacientes::delete($paramId);
                echo '<script>alert("Publicação excluida com sucesso!");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=index"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=index"</script>';
            }
            
        }

        public function deleteFunc($paramId){

            
            try{
                Administrador::delete($paramId);
                echo '<script>alert("Publicação excluida com sucesso!");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=index"</script>';
            }catch (Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/example/?pagina=user&metodo=index"</script>';
            }
            
        }
    }