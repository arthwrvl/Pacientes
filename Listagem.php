<?php
require_once 'Paciente.php';

class AcessaPaciente{
	function imprimePaciente(){
		$paciente = new Paciente;
        echo $paciente->getCpf();
        echo $paciente->getNome();
        echo $paciente->getData_nasc();
        echo $paciente->getGenero();
        echo $paciente->getAcompanhante();
        echo $paciente->getEndereco(); 
        echo $paciente->getSintomas();
		echo $paciente->getGravidade();
		echo $paciente->getData_sintomas();
	}
}
?>
