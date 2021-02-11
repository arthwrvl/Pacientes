<?php
    class Pacientes{
        public static function selectAll(){
            $con = Connection::getConn();

            $sql = "select * from pacientes";
            $sql = $con->prepare($sql);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchObject('Pacientes')){
                $row->nome = explode(' ', $row->nome);
                $row->sintomas = explode(';', $row->sintomas);
                $d1 = strtotime($row->data_nasc); 
                $d2 = strtotime(date("Y-m-d"));
                $row->idade = floor((($d2 - $d1) /86400) / 365);
                $result[] = $row;
            }
            return $result;

            /*if($result == null){
                throw new Exception("não há pacientes cadastrados");
            }*/
        }
        public static function selectKey($key){
            $con = Connection::getConn();
            $sql = "select * from pacientes where nome like :nam";
            $sql = $con->prepare($sql);
            $sql->bindValue(':nam', "%".$key['nome']."%");
            $sql->execute();
            $_SESSION['location'] = $key['place'];
            if($sql->rowCount() == 0){
                $sql = "select * from pacientes where cpf = :nam";
                $sql = $con->prepare($sql);
                $sql->bindValue(':nam', $key['nome']);
                $sql->execute();
                if($sql->rowCount() == 0){
                    throw new Exception("não encontrado!");
                    return false;

                }else{
                    $result = $sql->fetchObject('Pacientes');
                }
            }else{
                $result = array();
                while($row = $sql->fetchObject('Pacientes')){
                    $row->nome = explode(' ', $row->nome);
                    $row->sintomas = explode(';', $row->sintomas);
                    $d1 = strtotime($row->data_nasc); 
                    $d2 = strtotime(date("Y-m-d"));
                    $row->idade = floor((($d2 - $d1) /86400) / 365);
                    $result[] = $row;
                }

                $_SESSION['paclist'] = serialize($result);
                return true;
            }

            

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
            $sql->bindValue(':end', $dados['rua'].", ".$dados['num']." - ".$dados['bairro']."; ".$dados['city']." - ".$dados['est']);
            $sql->bindValue(':gen', $dados['gen']);
            $sql->bindValue(':grav', $dados['gravid']);
            $sql->bindValue(':nome', $dados['user']." ".$dados['Sobrenome']);
            $sql->bindValue(':sint', $dados['sintomas']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("falha ao inserir paciente");

                return false;
            }

            return true;


             
        }
        public static function update($dados){
            $con = Connection::getConn();
            
            $sql = "update pacientes set nome = :nom, endereco = :end, sintomas = :sint, cpf = :cpf, data_nasc = :dtnasc, data_sintomas = :dtsin, genero = :gen, gravidade = :grav, acompanhante = :acomp where cod = :cod";
            $sql = $con->prepare($sql);
            $sql->bindValue(':nom', $dados['nome']);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->bindValue(':dtnasc', $dados['dt_nasc']);
            $sql->bindValue(':end', $dados['end']);
            $sql->bindValue(':cod', $dados['cod']);
            $sql->bindValue(':sint', $dados['sintomas']);
            $sql->bindValue(':dtsin', $dados['dt_inic']);
            $sql->bindValue(':gen', $dados['gen']);
            $sql->bindValue(':grav', $dados['est']);
            $sql->bindValue(':acomp', $dados['acom']);
            $res = $sql->execute();


            if($res == 0){
                throw new Exception("Falha ao editar paciente");
                
                return false;
            }

            return true;

        }
        public static function delete($id){
            $con = Connection::getConn();
            $sql = "delete from pacientes where cod = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $id['cod']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao excluir paciente");
                
                return false;
            }

            return true;

        }
    }