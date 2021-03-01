<?php

    include_once("DataBase/Connection.php");
    include_once("Model/consulta.php");  //  //para conectar ao banco ; coloca o nome da classe q faz a nossa conexao coloquei essa como modelo
    $con = Connection::getConn();
    $html .= '<table border="1"';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td>IDCONSULTA</td>';
    $html .= '<td>NOME DO MÉDICO</td>';
    $html .= '<td>ID DO MÉDICO</td>';
    $html .= '<td>NOME DO PACIENTE</td>';
    $html .= '<td>ID PACIENTE/td>';
    $html .= '<td>DATA/td>';
    $html .= '<td>HORARIO DE CHEGADA/td>';
    $html .= '</tr>';
    $html .= '</thead>';

    $sql = "select * from consulta";
    $sql = $con->prepare($sql);
    //$sql->bindValue(':data', $dados['cpf']);
    $sql->execute();


    //$result_pacientes = "SELECT * FROM pacientes";


   // $resultado_pacientes = mysqli_query($conn, $result_pacientes); //conexao e variavel q criei
    while($row = $sql->fetchObject('Consulta')){
        $html .= '<tbody>';
        $html .= '<tr><td>' .$row->id_consulta . "</td>";
        $html .= '<tr><td>' .$row->nomeMedico. "</td>"; // oq quer imprimir
        $html .= '<tr><td>' .$row->codAdmin_FK  . "</td>";
        $html .= '<tr><td>' .$row->nomePaciente. "</td>";
        $html .= '<tr><td>' .$row->codPac_FK . "</td>";
        $html .= '<tr><td>' .$row->data. "</td>";
        $html .= '<tr><td>' .$row->horarioChegada. "</td>";  
        $html .= '</tbody>';
        //$result[] = $row;
    }
    $html .= '</table';
   
   

    
    // referenciar o DOMPDF com namespace -> evitar conflitos com nomes iguais
    use Dompdf\Dompdf;

    //include autoloader
    require_once("dompdf/autoload.inc.php");

    //criando a instancia
    $teste = new TESTE();

    //carregar html
    $teste->load_html('
        <h1>TESTE DO RELATÓRIO</h1>
        '. $html .'


    ');

    //renderizar o html
    $teste->render();

    //exibir a página
    $teste->stream(
        "testando_PDF",
        Array(
            "attachment" => false //para realizar o download automatico alterar para true

        )
    );



?>