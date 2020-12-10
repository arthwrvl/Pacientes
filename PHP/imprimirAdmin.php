<html>
    <body>
<?php
    $user = "root";
    $password = "";
    $database = "SUS";
    $hostname = "localhost";
    
    $link = mysqli_connect($hostname, $user, $password, $database) or die("Erro "
            . "conexão");
    
    $sql = "SELECT * FROM Administrador";
    
    $result = mysqli_query($link, $sql);
    ?>
        <table>
            <?php
            while($row = mysqli_fetch_array($result)){
            ?>
                    <tr>
                        <td><?php echo $row['nome'];?></td>
                        <td><?php echo $row['login'];?></td>
                        <td><?php echo $row['senha'];?></td>
                        <td><?php echo $row['codigo'];?></td>
                    </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>