<?php
/*$arquivo = fopen('pweb.txt','w');
if ($arquivo == false) die('Não foi possível criar o arquivo.');
//$texto = “programação web”;
fwrite($arquivo, "programação web");
fclose($arquivo);*/


   
?>

<html>
    <form method="post" enctype="multipart/form-data" action="recebeUpload.php">
    Selecione uma imagem: <input name="arquivo" type="file" />
    <br />
    <input type="submit" value="Salvar" />
    </form> 
</html>
