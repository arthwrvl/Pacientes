<?php
class Administrador{
    public      $nome;
    private     $login;
    private     $senha;
    private     $codigo;

  function __construct (){
		$this->cadastroAdministrador();
	}

	private function cadastroAdministrador(){
        $this->nome =  $_POST['nomeAdmin'];
        $this->login = $_POST['loginAdmin'];
        $this->senha =  $_POST['senhaAdmin'];
        $this->codigo =  $_POST['codAdmin'];
		
	}

	public function getNome(){
		return $this->nome;
    }
    
    public function getLogin(){
		return $this->Login;
    }

    public function getSenha(){
		return $this->senha;
    }
    
    public function getCodigo(){
		return $this->codigo;
	}

} ?>