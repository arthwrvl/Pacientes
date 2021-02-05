<?php

    class ContatosController extends Controller
    {
        public function listar()
        {
            $administrador = Administrador::all();
            return $this->view('grade', ['administrador' => $administrador]);
        }
    
        public function criar()
        {
            return $this->view('form');
        }

        public function editar($dados)
        {
            $id      = (int) $dados['id'];
            $administrador = Administrador::find($id);
    
            return $this->view('form', ['administrador' => $administrador]);
        }
    
        public function salvar()
        {
            $administrador           = new Administrador;
            $administrador->nome     = $this->request->nome;
            $administrador->login = $this->request->login;
            $administrador->senha    = $this->request->senha;
            if ($administrador->save()) {
                return $this->listar();
            }
        }
    
        public function atualizar($dados)
        {
            $id                = (int) $dados['id'];
            $administrador           = Administrador::find($id);
            $administrador->nome     = $this->request->nome;
            $administrador->login = $this->request->login;
            $administrador->senha    = $this->request->senha;
            $administrador->save();
    
            return $this->listar();
        }
    
    
        public function excluir($dados)
        {
            $id      = (int) $dados['id'];
            $administrador = Administrador::destroy($id);
            return $this->listar();
        }
    }

?>