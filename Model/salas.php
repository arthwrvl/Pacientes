<?php
    class Sala{
        public static function selectAll(){
            $con = Connection::getConn();

            $sql = "select * from sala";
            $sql = $con->prepare($sql);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchObject('Sala')){
                $result[] = $row;
            }

            if($result == null){
                throw new Exception("não salas");
            }

            return $result;
        }
        public static function inserirConsulta($dados){
            $con = Connection::getConn();
    
                $sql = "insert into sala(consultaID_pk) 
                        values (:consultaID)";
    
    
                $sql = $con->prepare($sql);
                $sql->bindValue(':consultaID', $dados['consultaID']);
                
                $res = $sql->execute();
    
                if($res == 0){
                    throw new Exception("Falha ao cadastrar consulta na sala");      
                    return false;
                }
                
            return true;
        }

        public static function update($dados){
            $con = Connection::getConn();

            $sql = "update sala set consultaID_pk = :consultaID where consultaID_pk = :idAntigo";
             
            $sql = $con->prepare($sql);

            $sql->bindValue(':consultaID', $dados['idNovo']);
            $sql->bindValue(':idAntigo', $dados['idAntigo']);
            
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao editar sala");
                
                return false;
            }

            return true;

        }

        public static function delfunc($id){
            $con = Connection::getConn();

            $sql = "delete from sala where consultaID_pk = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $id['idSala']);
            //var_dump($id['cod']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao excluir consulta da sala");
                
                return false;
            }

            return true;

        }
    }


?>