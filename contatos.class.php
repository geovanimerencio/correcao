<?php
    class contato{
        private $pdo;

        public function __construct(){
            $this->pdo = new pdo("mysql:dbname=crudoo;host=localhost","root","");
        }
        public function adicionar($email,$nome=''){
            if($this->existeEmail($email)== false){
                $sql = "INSERT INTO contatos (nome,email) VALUES(:nome, :email)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':nome',$nome);
                $sql->bindValue(':email',$email);
                $sql->execute();

                return true;
            }else{
                return false;
            }
        }
        public function getNome($email){
           $sql= "SELECT nome FROM contatos WHERE email = :email";
           $sql = $this->pdo->prepare($sql);
           $sql->bindValue(':email',$email);
           $sql->execute();

           if($sql->rowCount() > 0){
            $info = $sql->fetch();

            return $info['nome'];
           }else{
               return '';
           }
        }
        public function getInfo($id){
            $sql = "SELECT * FROM contatos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindvalue(':id',$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                return $sql->fetch();

            }else{
                return array();
            }
        }
        public function getAll() {
            $sql = "SELECT * FROM contatos";
            $sql = $this->pdo->query($sql);

            if($sql->rowCount() > 0){
                return $sql->fetchAll();

            }else{
                return array();
            }
        }
        public function editar($nome,$id){
            $sql = "UPDATE contato SET nome = :nome WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':id',$id);
            $sql->execute();
            
        }
        public function excluir($email){
                $sql = "DELETE FROM contatos WHERE email = :email";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':email',$email);
                $sql->execute();
        }
        private function existeEmail($email){
            $sql = "SELECT * FROM contatos WHERE 'email'=:email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email',$email);
            $sql->execute();

            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }
?>