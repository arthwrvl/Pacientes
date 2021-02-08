<?php

    class Core {

        private $url;
        private $controller;
        private $method = 'index';
        private $params = array();

        private $user;

        public function __construct(){
            $this->user = $_SESSION['usr'] ?? null;
        }

        public function start($request){

            if(isset($request['url'])){
                $this->url = explode('/', $request['url']);      
                $this->controller = ucfirst($this->url[0].'Controller');
                array_shift($this->url);
                if(isset($this->url[0]) && $this->url != ''){
                    $this->method = $this->url[0];
                    array_shift($this->url);
                    if(isset($this->url[0]) && $this->url != ''){
                        $this->params = $this->url[0];
                    }

                }
            }else{
                if($this->user){
                    $this->controller = 'DashboardController';
                    $this->method = 'index';
                }else{
                    $this->controller = 'HomeController';
                    $this->method = 'index';
                }
            }

            if($this->user){
                $pg_permission = ['DashboardController'];

                if(!class_exists($this->controller)){
                    $this->controller = 'Error404Controller';
                }else if(!in_array($this->controller, $pg_permission)){
                    $this->controller = 'Error401Controller';
                }

            }else{
                $pg_permission = ['HomeController', 'LoginController', 'CadastroController'];

                if(!class_exists($this->controller)){
                    $this->controller = 'Error404Controller';

                }else if(!in_array($this->controller, $pg_permission)){
                    $this->controller = 'Error401Controller';
                }
            }

            call_user_func_array(array(new $this->controller, $this->method), $this->params);

            /*if(isset($urlGet['method'])){
                $action = $urlGet['method'];
            }else{
                $action = 'index';
            }


            if(isset($urlGet['page'])){
                $controller = ucfirst($urlGet['page'].'Controller');
            }else{
                $controller = 'HomeController';
            }
            
            if(!class_exists($controller)){
                $controller = 'ErrorController';
            }
            
            if(isset($urlGet['id']) && $urlGet['id'] != null){
                $id = $urlGet['id'];                
            }else{
                $id = null;
            }
            
            call_user_func_array(array(new $controller, $action), array('id' => $id));*/
        }
    }
