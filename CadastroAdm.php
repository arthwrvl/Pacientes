<?php
class Administrador{
    public      $nome;
    private     $login;
    private     $senha;
    private     $codigo;

	function Administrador(){
		$this->cadastroAdministrador();
	}

	private function cadastroAdministrador(){
        $this->nome = "Octavio";
        $this->login = "@admim";
        $this->senha = "123456";
        $this->codigo = "069";
		
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