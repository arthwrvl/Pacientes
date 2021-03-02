<?php

    require_once 'vendor/autoload.php';
    require_once 'Model/Consulta.php';
    require_once 'Model/paciente.php';
    require_once 'Database/Connection.php';

    $stylesheet = file_get_contents('CSS/style.css');

    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/custom/font/directory',
    ]),
    'fontdata' => $fontData + [
        'Roboto' => [
            'B' => 'Roboto-Thin.ttf',
        ]
    ],
    'default_font' => 'Roboto'
]);
    $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML('<div class="head">');
    $mpdf->WriteHTML('<img src="Resources/logoB.svg">');
    $mpdf->WriteHTML('<h3>Vc consultaria agui?</h3>');
    $mpdf->WriteHTML('</div>');
    $mpdf->WriteHTML('<h4>Data de emissão:' .date("d.m.y") .'</h4>');
    date_default_timezone_set("America/sao_paulo");
    $mpdf->WriteHTML('<h4>Hora de emissão:'.date("H:i.s") .'</h4>');
    $mpdf->WriteHTML('<hr>');
    $mpdf->WriteHTML('<h2>Relatório do mês '. $_POST['mont'].'</h2>');
    $mpdf->WriteHTML('<h4>Sintoma mais comum: '. Pacientes::sintomaRepeticao() .'</h4>');
    $mpdf->WriteHTML('<table>');
    $mpdf->WriteHTML('<tr>');
    $mpdf->WriteHTML('<th>IDCONSULTA</th>');
    $mpdf->WriteHTML('<th>NOME DO MÉDICO</th>');
    $mpdf->WriteHTML('<th>NOME DO PACIENTE</th>');
    $mpdf->WriteHTML('<th>DATA</th>');
    $mpdf->WriteHTML('<th>HORARIO DE CHEGADA</th>');
    /*$mpdf->WriteHTML('<td></td>');
    $mpdf->WriteHTML('<td>ID PACIENTE/td>');*/
    $con = Connection::getConn();
    $sql = "select * from consulta where extract(month from data) = :mes";
    $sql = $con->prepare($sql);
    $sql->bindValue(':mes', $_POST['mont']);
    $sql->execute();

    while($row = $sql->fetchObject('Consulta')){
        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td>' .$row->id_consulta. '</td>');
        $mpdf->WriteHTML('<td>' .$row->nomeMedico. '</td>');
        $mpdf->WriteHTML('<td>' .$row->nomePaciente. '</td>');
        $mpdf->WriteHTML('<td>' .$row->data. '</td>');
        $mpdf->WriteHTML('<td>' .$row->horarioChegada. '</td>');
        $mpdf->WriteHTML('</tr>');
    }

    $mpdf->WriteHTML('</tr>');
    $mpdf->WriteHTML('</table>');
    $mpdf->Output();

  /*  include_once("DataBase/Connection.php");
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
    */


?>