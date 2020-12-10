<html>
    <body>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css"/>
    <title>Vc consultaria agui</title>
    <nav>
        <ul class="nav-list">
            <img src="../Resources/remedio.svg" alt="home">
            <li><a class="nav-links">vc ta consultando agui</a></li>

        </ul>
    </nav>
    <main data-router-wrapper>
        <section data-router-view="home" class="home">
            <table>
                <tr>
                  <th>Nome</th>
                  <th>Genero</th>
                  <th>Situação</th> 
                  <th>Sintomas</th>
                  <th>Acompanhante</th>
                  <th>Endereço</th>
                  <th>Data Sintomas</th>
                </tr>
                
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
            
        </section>
    </main>
        </table>
        <a href="../HTML/inicio.html"><button>Adicionar Paciente</button></a>
    </body>
</html>