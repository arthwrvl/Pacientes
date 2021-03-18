<?php
    class Consulta{
        public static function selectAll(){
            $con = Connection::getConn();

            $sql = "select * from consulta";
            $sql = $con->prepare($sql);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchObject('Consulta')){
                $result[] = $row;
            }

            /*if($result == null){
                throw new Exception("não há consultas marcadas");
            }*/

            return $result;
        }
        public static function ordem($dados){
            $con = Connection::getConn();

            $sql = "select * from consulta where data = :data order by horarioChegada desc";
            $sql = $con->prepare($sql);
            $sql->bindValue(':data', $dados["data"]);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchObject('Consulta')){
                $result[] = $row;
            }

            if($result == null){
                throw new Exception("não há funcionarios cadastrados");
            }

            return $result;
        }

        public static function inserirConsulta($dados){
            $con = Connection::getConn();
            //var_dump($dados['pac']);
            $codPac = Consulta::resgatarCodigoPac($dados['pac']);
            $codMed = Consulta::resgatarCodigoMed($dados['med']);
            //var_dump($codPac);
            echo $codPac;
            echo $codMed;
    
            $sql = "insert into consulta(codPac_FK, codAdmin_FK, data, nomePaciente, nomeMedico) 
                        values (:codPac, :codAdmin, :data, :nomPac, :nomMed)";
    
    
            $sql = $con->prepare($sql);
            $sql->bindValue(':codPac', $codPac);
            $sql->bindValue(':codAdmin', $codMed);
            $sql->bindValue(':data', $dados['dat']);
            $sql->bindValue(':nomPac', $dados['pac']);
            $sql->bindValue(':nomMed', $dados['med']);
                
            $res = $sql->execute();
    
            if($res == 0){
               throw new Exception("Falha ao cadastrar consulta");      
                return false;
            }
                
            return true;
        }


        public static function resgatarCodigoPac($pac){
            $con = Connection::getConn();
    
            $sql = "select cod from pacientes where nome = :nome";

            $sql = $con->prepare($sql);
            $sql->bindValue(':nome', $pac);
            $sql->execute();
            $cod = 0;
            if($sql->rowCount()==1){

                $res = $sql->fetch();
                $cod = $res['cod'];
            }
            var_dump($cod);
            return $cod;
               
        }
        public static function resgatarCodigoMed($med){
            $con = Connection::getConn();
    
            $sql = "select cod from administrador where nome = :nome";

            $sql = $con->prepare($sql);
            $sql->bindValue(':nome', $med);
            $sql->execute();
            $cod=0;
            if($sql->rowCount()==1){

                $res = $sql->fetch();
                $cod = $res['cod'];
            }
            var_dump($cod);
            return $cod;
               
        }

        public static function listaChegada($dados){     
            $con = Connection::getConn();

            $sql = "select * from consulta order by time asc where data = :data";
            $sql = $con->prepare($sql);
            $sql->bindValue(':data', $dados['data']);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchObject('Administrador')){
                $result[] = $row;
            }

            if($result == null){
                throw new Exception("não há funcionarios cadastrados");
            }

            return $result;
        }

        public static function atualizarConsulta($dados){

            $arquiivo = $_FILES["arq2"]["tmp_name"]; 
            $tamanho = $_FILES["arq2"]["size"];
            $tipo    = $_FILES["arq2"]["type"];
            $nome  = $_FILES["arq2"]["name"];
            
            $con = Connection::getConn();

            $fp = fopen($arquiivo, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp); 
            echo $dados['pac'];
            echo $dados['med'];

            $codPac = Consulta::resgatarCodigoPac($dados['pac']);
            $codMed = Consulta::resgatarCodigoMed($dados['med']);

            $sql = "update consulta set horarioChegada = :horario, nomePaciente = :nomePaci, nomeMedico = :nomeMedi, data = :dat, arquivo = :arquivo where codPac_FK = :codPac and codAdmin_FK = :codAdmin";
            $sql = $con->prepare($sql);
            $sql->bindValue(':dat', $dados['dat']);
            $sql->bindValue(':arquivo', $conteudo);
            $sql->bindValue(':codPac', $codPac);
            $sql->bindValue(':codAdmin', $codMed);
            $sql->bindValue(':nomePaci', $dados['pac']);
            $sql->bindValue(':nomeMedi', $dados['med']);
            $sql->bindValue(':horario', $dados['hr']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("falha ao atualizar consulta");

                return false;
            }

            return true;

        }
    }

    

?>