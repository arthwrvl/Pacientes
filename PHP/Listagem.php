<?php
    require_once 'Paciente.php';

    function imprimePaciente(){
        $paciente = new Paciente;
        echo $paciente->getCpf();
        echo "<br>";
        echo $paciente->getNome();
        echo "<br>";
        echo $paciente->getData_nasc();
        echo "<br>";
        echo $paciente->getGenero();
        echo "<br>";
        echo $paciente->getAcompanhante();
        echo "<br>";
        echo $paciente->getEndereco(); 
        echo "<br>";
        echo $paciente->getSintomas();
        echo "<br>";
        echo $paciente->getGravidade();
        echo "<br>";
        echo $paciente->getData_sintomas();
        echo "<br>";
    }
    imprimePaciente();
?>
