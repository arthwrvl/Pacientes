<?php
    class Administrador{
        public static function selectAll(){
            $con = Connection::getConn();

            $sql = "select * from administrador order by id desc";
            $sql = $con->prepare($sql);
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
        public static function selectCodigo($dados){
            $con = Connection::getConn();
            $sql = "select cod from administrador where cpf = :cpf";
            $sql = $con->prepare($sql);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->execute();

            //$result = $sql->fetchObject('Administrador');

            if($sql->rowCount()==1){

                $res = $sql->fetch();

                var_dump($res['cod']);
                $_SESSION['codigo'] = array(
                    'code_user' =>$res['cod']
                );
                
                return true;
            }

            throw new Exception("Erro ao buscar código do funcionário");
        }

        public static function verificar($dados){
            $con = Connection::getConn();
            $sql = "select * from administrador where login = :em";

            $sql = $con->prepare($sql);
            $sql->bindValue(':em', $dados['email']);
            $sql->execute();

            if($sql->rowCount()==1){

                $res = $sql->fetch();

                if($res['senha'] === $dados['pass']){
                    $_SESSION['usr'] = array(
                        'code_user' =>$res['cod'], 
                        'name_user' => $res['nome'], 
                        'func_user' => $res['funcao']);

                    return true;
                }

            }
            throw new Exception("Login Inválido");
        }
        public static function verificarCadastro($dados){
            $con = Connection::getConn();
            $sql = "select * from administrador where cpf = :cpf";

            $sql = $con->prepare($sql);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->execute();

            if($sql->rowCount()==0){
                Administrador::updateCadastro($dados);
                return true;
            }
            throw new Exception("CPF já existe");
        }

        public static function insert($dados){
            if (empty($dados['login']) || empty($dados['email']) || empty($dados['pass']) || empty($dados['cod'])){
                throw new Exception("Preencha todos os campos");

                return false;
            }

            $con = Connection::getConn();

            $sql = "insert into administrador (codigo, email, senha, login) values (:cod, :email, :senha, :log)";
            $sql = $con->prepare($sql);
            $sql->bindValue(':cod', $dados['cod']);
            $sql->bindValue(':email', $dados['email']);
            $sql->bindValue(':senha', $dados['pass']);
            $sql->bindValue(':log', $dados['login']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("falha ao inserir publicação");

                return false;
            }

            return true;


             
        }
        public static function update($dados){
            $con = Connection::getConn();

            $sql = "update administrador set email = :em, senha = :pass, nome = :nom where id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':nom', $dados['nome']);
            $sql->bindValue(':senha', $dados['pass']);
            $sql->bindValue(':log', $dados['login']);
            $sql->bindValue(':id', $params['id']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao editar publicação");
                
                return false;
            }

            return true;

        }
        
        public static function updateCadastro($dados){
            $con = Connection::getConn();

            $sql = "insert into administrador(nome,cpf,dtnasc,endereco,funcao) 
                    values (:nom, :cpf, :data_nascimento, :end, :func)";


            $sql = $con->prepare($sql);
            $sql->bindValue(':nom', $dados['user']);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->bindValue(':data_nascimento', $dados['dtnasc']);
            $sql->bindValue(':end', $dados['rua'].$dados['bairro'].$dados['num'].$dados['comp'].$dados['city'].$dados['est']);
            $sql->bindValue(':func', $dados['func']);
            //$sql->bindValue(':id', $params['id']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao editar publicação");
                
                return false;
            }
            else{
                Administrador::selectCodigo($dados);
            }

            return true;

        }

        public static function delete($id){
            $con = Connection::getConn();

            $sql = "delete from administrador where id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $id);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao excluir publicação");
                
                return false;
            }

            return true;

        }
    }