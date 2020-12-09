<?php
    require_once 'CadastroAdm.php';
    
    function imprimeAdmin(){
        $admin = new Administrador;
        echo $admin->getNome();
        echo "<br>";
        
    }
    imprimeAdmin();
?>