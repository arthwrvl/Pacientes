<?php
    $user = "root";
    $password = "";
    $database = "SUS";
    $hostname = "localhost";
    
    $link = mysqli_connect($hostname, $user, $password, $database) or die("Erro "
            . "conexão");
               
   
    if(isset($_POST['nomeAdmin']) && isset($_POST['loginAdmin']) && isset($_POST['senhaAdmin']) && isset($_POST['codAdmin'])){


        $nome = $_POST['nomeAdmin'];
        $login = $_POST['loginAdmin'];
        $senha = $_POST['senhaAdmin'];
        $codigo = $_POST['codAdmin'];

        //$sintomas = addslashes(implode(",", $_POST['sintomas']));
        
        $nome = addslashes($nome);
        $login = addslashes($login);
        $senha = addslashes($senha);
        $codigo = addslashes($codigo);

        
        
        
        $sql = "INSERT INTO Administrador(nome, login, senha, codigo) VALUES "
                . "('".$cpf."', '".$login."', '".$senha."', '".$codigo."')";

        if(mysqli_query($link, $sql)) {
            echo "Dados inseridos com sucesso";
        } else {
            echo "Erro no MySQL: ".mysqli_error($link);
        }
    }
?>
<div>
    <a href="codigo.php">Mostrar dados</a>
</div>

