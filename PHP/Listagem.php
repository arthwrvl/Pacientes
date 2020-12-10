<?php
    require_once 'Paciente.php';

    function imprimePaciente(){
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        
        mysqli_close($con);
        ?>
    }
    imprimePaciente();
?>
