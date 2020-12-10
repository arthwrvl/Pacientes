<html>
    <body>
<?php
    $user = "root";
    $password = "";
    $database = "SUS";
    $hostname = "localhost";
    
    $link = mysqli_connect($hostname, $user, $password, $database) or die("Erro "
            . "conexão");
    
    $sql = "SELECT * FROM Pacientes";
    
    $result = mysqli_query($link, $sql);
    ?>
        <table>
    <?php
    while($row = mysqli_fetch_array($result)){
    ?>
            <tr>
                <td><?php echo $row['cpf'];?></td>
                <td><?php echo $row['nome'];?></td>
                <td><?php echo $row['data_nasc'];?></td>
                <td><?php echo $row['endereco'];?></td>
                <td><?php echo $row['genero'];?></td>
                <td><?php echo $row['sintomas'];?></td>
                <td><?php echo $row['acompanhante'];?></td>
                <td><?php echo $row['gravidade'];?></td>
                <td><?php echo $row['data_sintomas'];?></td>
            </tr>
        <?php
    }
    ?>
        </table>
    </body>
</html>