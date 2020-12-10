<?php
    $user = "root";
    $password = "";
    $database = "SUS";
    $hostname = "localhost";
    
    $link = mysqli_connect($hostname, $user, $password, $database) or die("Erro "
            . "conexão");
               
   
    if(isset($_POST['nomePac']) && isset($_POST["cpfPac"]) && isset($_POST["endPac"]) && isset($_POST["data_nasc"]) 
    && isset($_POST["generoPac"]) && isset($_POST["acompanhantePac"]) && isset($_POST["gravidadePac"])
     && isset($_POST["sintomasPac"]) && isset($_POST["dataSintomas"])){

        $cpf = $_POST['cpfPac'];
        $nome = $_POST['nomePac'];
        $data_nasc = $_POST['data_nasc'];
        $genero = $_POST['generoPac'];
        $acompanhante = $_POST['acompanhantePac'];
        $endereco = $_POST['endPac'];
        $sintomas = $_POST['sintomasPac'];
        $gravidade = $_POST['gravidadePac'];
        $data_sintomas = $_POST['dataSintomas'];


        //$sintomas = addslashes(implode(",", $_POST['sintomas']));
        
        $cpf = addslashes($cpf);
        $nome = addslashes($nome);
        $data_nasc = addslashes($data_nasc);
        $genero = addslashes($genero);
        $acompanhante = addslashes($acompanhante);
        $endereco = addslashes($endereco);
        $sintomas = addslashes($sintomas);
        $gravidade= addslashes($gravidade);
        $data_sintomas = addslashes($data_sintomas);

        
        
        
        $sql = "INSERT INTO Pacientes(cpf, nome, data_nasc , endereco, genero, sintomas, acompanhante, gravidade, data_sintomas) VALUES "
                . "('".$cpf."','".$nome."','".$data_nasc."','".$genero."','".$acompanhante."','".$endereco."','".$sintomas."','".$gravidade."','".$data_sintomas."')";

        if(mysqli_query($link, $sql)) {
            echo "Dados inseridos com sucesso";
        } else {
            echo "Erro no MySQL: ".mysqli_error($link);
        }
    }
?>
<div>
    <a href="imprimirPac.php">Mostrar dados</a>
</div>

