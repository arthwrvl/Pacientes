<html>
    <head>
    
    </head>
    <body>
    </body>
</html>
<?php
class Paciente{
    protected $cpf;
    public      $nome;
    public      $data_nasc;
    public      $genero;
    public      $acompanhante;
    private     $endereco;
    private     $sintomas;
    private     $gravidade;
    private     $data_sintomas;

	function Paciente(){
		$this->cadastroPaciente();
	}

	private function cadastroPaciente(){
        $this->cpf = "99999999999";
        $this->nome = "Octavio";
        $this->data_nasc = "01012000";
        $this->genero = "Masculino";
        $this->acompanhante = "Maria";
        $this->endereco = "Rua Fulano de Tal número 0 apt 999";
        $this->sintomas = "Febre";
        $this->gravidade = "Leve";
		$this->data_sintomas = "01012020";
		
	}

	public function getCpf (){
		return $this->cpf;
	}

	public function getNome(){
		return $this->nome;
    }
    
    public function getData_nasc(){
		return $this->data_nasc;
    }

    public function getGenero(){
		return $this->genero;
    }
    
    public function getAcompanhante(){
		return $this->acompanhante;
	}

	public function getEndereco(){
		return $this->endereco;
    }
    
    public function getSintomas(){
		return $this->sintomas;
    }
    
    public function getGravidade(){
		return $this->gravidade;
    }
    
    public function getData_sintomas(){
		return $this->data_sintomas;
	}

} ?>
