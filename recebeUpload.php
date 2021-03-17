<?php
    require_once 'Database/Connection.php';

    $arquiivo = $_FILES["arquivo"]["tmp_name"]; 
    $tamanho = $_FILES["arquivo"]["size"];
    $tipo    = $_FILES["arquivo"]["type"];
    $nome  = $_FILES["arquivo"]["name"];
    
    if ( $arquiivo != "none" )
    {
        $con = Connection::getConn();

        $fp = fopen($arquiivo, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp); 
        $sql = "insert into pacientes (arquivo) values (:conteudo)";
       

        //$sql = "INSERT INTO (arquivo) pacientes VALUES (:conteudo)";

        $sql = $con->prepare($sql);
        $sql->bindValue(':conteudo', $conteudo);
        $res = $sql->execute();
       
        if($res == 0){
            throw new Exception("Não foi possível gravar o arquivo na base de dados.");

            return false;
        }

        return true;

        /*mysql_query($qry);
       
        if(mysql_affected_rows($conn) > 0){
        print "O arquivo foi gravado na base de dados.";
        }
        else{
        print "Não foi possível gravar o arquivo na base de dados.";
        }*/
        
    }
    else{
        print "Não foi possível carregar o arquivo para o servidor.";
    }

    /*$destino = 'imagens/'. $_FILES['arquivo']['name'];

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];


    move_uploaded_file($arquivo_tmp, __DIR__.'/imagens/'.$_FILES['arquivo']['name']);

    echo 'tipo do arquivo <strong>' . $_FILES[ 'arquivo' ][ 'type' ] . '</strong><br />';*/



?>