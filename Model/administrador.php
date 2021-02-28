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
            $sql = "select * from administrador where cpf = :cpf";
            $sql = $con->prepare($sql);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->execute();

            //$result = $sql->fetchObject('Administrador');

            if($sql->rowCount()==1){

                $res = $sql->fetch();

                var_dump($res['cod']);
                $_SESSION['codigo'] = array(
                    'code_user' =>$res['cod'],
                    'namen_user' =>$res['nome']
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

        public static function verificarC($dados){
            $con = Connection::getConn();
            $sql = "select * from administrador where login = :em";

            $sql = $con->prepare($sql);
            $sql->bindValue(':em', $dados['login']);
            $sql->execute();
            if($sql->rowCount()==0){      
                    Administrador::update2($dados);
                    return true;
            }else{
                throw new Exception("Login já cadastrado");
            }
            
        }
        public static function verificarCadastro($dados){
            $con = Connection::getConn();
            $sql = "select * from administrador where cpf = :cpf";

            $sql = $con->prepare($sql);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->execute();

            if($sql->rowCount()==0){
                Administrador::realizarCadastro($dados);
                return true;
            }
            throw new Exception("CPF já existe");
        }

       /* public static function insert($dados){
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


             
        }*/
        public static function update($dados){
            $con = Connection::getConn();

            $sql = "update administrador set nome = :nom, cpf = :cpf, dtnasc = :data_nasc, endereco = :ende, login = :log, senha = :senha, funcao = :func where cod = :cod";
             
            $sql = $con->prepare($sql);

            $sql->bindValue(':nom', $dados['nome']);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->bindValue(':data_nasc', $dados['dt_nasc']);
            $sql->bindValue(':ende', $dados['end']);
            $sql->bindValue(':log', $dados['login']);
            $sql->bindValue(':senha', $dados['pass']);
            $sql->bindValue(':func', $dados['func']);
            $sql->bindValue(':cod', $dados['cod']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao editar funcionário");
                
                return false;
            }

            return true;

        }
        public static function update2($dados){
            $con = Connection::getConn();

            $sql = "update administrador set login = :log, senha = :senha where cod = :cod";
             
            $sql = $con->prepare($sql);

            
            $sql->bindValue(':log', $dados['login']);
            $sql->bindValue(':senha', $dados['pass']);
            
            $sql->bindValue(':cod', $dados['cod']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao editar funcionário");
                
                return false;
            }

            return true;

        }
        
        public static function realizarCadastro($dados){
            $con = Connection::getConn();

            $sql = "insert into administrador(nome,cpf,dtnasc,endereco,funcao) 
                    values (:nom, :cpf, :data_nascimento, :end, :func)";


            $sql = $con->prepare($sql);
            $sql->bindValue(':nom', $dados['user']);
            $sql->bindValue(':cpf', $dados['cpf']);
            $sql->bindValue(':data_nascimento', $dados['dtnasc']);
            $sql->bindValue(':end', $dados['rua'].", ".$dados['num']." - ".$dados['bairro']." ".$dados['comp']."; ".$dados['city']." - ".$dados['est']);
            $sql->bindValue(':func', $dados['func']);
            //$sql->bindValue(':id', $params['id']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao cadastrar funcionario");      
                return false;
            }
            else{
                Administrador::selectCodigo($dados);
            }

            return true;

        }

        public static function delfunc($id){
            $con = Connection::getConn();

            $sql = "delete from administrador where cod = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $id['cod']);
            var_dump($id['cod']);
            $res = $sql->execute();

            if($res == 0){
                throw new Exception("Falha ao excluir publicação");
                
                return false;
            }

            return true;

        }

        public static function selectKey($key){
            $con = Connection::getConn();
            $sql = "select * from administrador where nome like :nam";
            $sql = $con->prepare($sql);
            $sql->bindValue(':nam', "%".$key['nome']."%");
            $sql->execute();
            $_SESSION['location'] = $key['place'];
            if($sql->rowCount() == 0){
                $sql = "select * from administrador where cpf = :nam";
                $sql = $con->prepare($sql);
                $sql->bindValue(':nam', $key['nome']);
                $sql->execute();
                if($sql->rowCount() == 0){
                    throw new Exception("não encontrado!");
                    return false;

                }else{
                    $result = $sql->fetchObject('Administrador');
                }
            }else{
                $result = array();
                while($row = $sql->fetchObject('Administrador')){
                    $row->nome = explode(' ', $row->nome);
                    $d1 = strtotime($row->dtnasc); 
                    $d2 = strtotime(date("Y-m-d"));
                    $row->idade = floor((($d2 - $d1) /86400) / 365);
                    $result[] = $row;
                }

                $_SESSION['funclist'] = serialize($result);
                return true;
            }

        }
    }