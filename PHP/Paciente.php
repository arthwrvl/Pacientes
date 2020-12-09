<?php
class Paciente{
    protected   $cpf;
    public      $nome;
    public      $data_nasc;
    public      $genero;
    public      $acompanhante;
    private     $endereco;
    private     $sintomas;
    private     $gravidade;
    private     $data_sintomas;

  function __construct (){
		$this->cadastroPaciente();
	}

	private function cadastroPaciente(){
        $this->cpf = $_POST['cpfPac'];
        $this->nome = $_POST['nomePac'];
        $this->data_nasc = $_POST['data_nasc'];
        $this->genero = $_POST['generoPac'];
        $this->acompanhante = $_POST['acompanhantePac'];
        $this->endereco = $_POST['endPac'];
        $this->sintomas = $_POST['sintomasPac'];
        $this->gravidade = $_POST['gravidadePac'];
		    $this->data_sintomas = $_POST['dataSintomas'];
		
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
