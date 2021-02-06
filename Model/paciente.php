<?php
    class Pacientes{
        public static function selectAll(){
            $con = Connection::getConn();

            $sql = "select * from pacientes order by id desc";
            $sql = $con->prepare($sql);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchObject('Pacientes')){
                $result[] = $row;
            }

            if($result == null){
                throw new Exception("não há pacientes cadastrados");
            }

            return $result;
        }
        public static function selectForId($id){
            $con = Connection::getConn();
            $sql = "select * from pacientes where id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->execute();

            $result = $sql->fetchObject('Pacientes');

            if(!$result){
                throw new Exception("não há pacientes no banco");
            } else{
                $result->comentarios = Comentario::selectComent($result->id);
            }

            return $result;
        }

        public static function insert($dados){
            if (empty($dados['user']) || empty($dados['Sobrenome']) || 
            empty($dados['cpf']) || empty($dados['dtnasc']) || empty($dados['rua']) || empty($dados['bairro']) || 
            empty($dados['num']) || empty($dados['gen']) || empty($dados['city']) || empty($dados['est']) || 
            empty($dados['sintomas']) || empty($dados['acom']) || empty($dados['dti']) || empty($dados['gravid'])){
                throw new Exception("Preencha todos os campos");

                return false;
            }

            $con = Connection::getConn();

            $sql = "insert into pacientes (acompanhante, cpf, data_nasc, data_sintomas, endereco, genero, gravidade,
             nome, sintomas ) values (:acomp, :cpf, :data_nasc, :data_sint, :end, :gen, :grav, :nome, :sint)";
            $sql = $con->prepare($sql);
            $sql->bindValue(':acomp', $dados['acom']);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->bindValue(':data_nasc', $dados['dtnasc']);
            $sql->bindValue(':data_sint', $dados['dti']);
            $sql->bindValue(':end', $dados['rua'].$dados['bairro'].$dados['num'].$dados['comp'].$dados['city'].$dados['est']);
            $sql->bindValue(':gen', $dados['gen']);
            $sql->bindValue(':grav', $dados['gravid']);
            $sql->bindValue(':nome', $dados['user']);
            $sql->bindValue(':sint', $dados['sintomas']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("falha ao inserir paciente");

                return false;
            }

            return true;


             
        }
        public static function update($params){
            $con = Connection::getConn();
            
            $sql = "update paciente set acompanhante = :acomp, endereco = :end, sintomas = :sint where id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':acomp', $dados['acom']);
            $sql->bindValue(':end', $dados['rua'].$dados['bairro'].$dados['num'].$dados['comp'].$dados['city'].$dados['est']);
            $sql->bindValue(':sint', $dados['sintomas']);
            $sql->bindValue(':id', $params['id']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao editar publicação");
                
                return false;
            }

            return true;

        }
        public static function delete($id){
            $con = Connection::getConn();

            $sql = "delete from pacientes where id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $id);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao excluir paciente");
                
                return false;
            }

            return true;

        }
    }