<?php
    //login
    include_once('../model/connection.php');
    session_start();
    class ControllerLogin{
        private $login;
        private $password;
        private $sessionStart;
        public $client;

        //METHODE

        public function verify(){
            if(empty($this->getLogin()) or empty($this->getPassword())){
                header('location: ../login.php');
                exit();
            }
            $this->compareWithDb();
        }

        public function compareWithDb(){
            $conexao = new connection;
            $conexao = $conexao->connect();
        
            $userString = mysqli_real_escape_string($conexao, $this->getLogin());
            $passwordString = $this->getPassword();
            $passwordHash = password_hash($passwordString, PASSWORD_DEFAULT);
        
            $query = "SELECT *
                      FROM `clients`
                      WHERE CLIENT_CPF = '{$userString}' OR CLIENT_CNPJ = '{$userString}'";
        
            $result = mysqli_query($conexao, $query);
            $senhaArmazenada = mysqli_fetch_assoc($result);
        
            if (password_verify($passwordString, $senhaArmazenada['CLIENT_PASSWORD'])) {
                $_SESSION['name'] = $senhaArmazenada['CLIENT_FIRST_NAME'];
                $_SESSION['id'] = $senhaArmazenada['ID'];
                $this->data($_SESSION['name']);
                header('Location: ../index.php');
                exit();
            } else {
                header('Location: ../login.php');
                exit();
            }

        }

        public function data($session){
            if($session = true){
                echo "true";
            }else{
                echo "Algo deu errado.";
            }
        }

        //GET
        public function getLogin(){
            return $this->login;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getSession(){
            return $this->setSession();
        }

        //SET
        public function setLogin($importUser){
            $this->login = $importUser;
        }

        public function setPassword($importPassword){
            $this->password = $importPassword;
        }

        public function setSession($row){
            $this->client = $row;
        }

    }