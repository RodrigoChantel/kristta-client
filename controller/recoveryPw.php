<?php
include_once('../model/connection.php');

class recovery{
   //Atributos
   private $login;
   private $emailRec;

   //Recuperar Senha
   public function recoveryPw(){
      header('Location: ../login.php');
   }

   //GET

   public function getEmail(){
      return $this->emailRec;
   }

   public function getLogin(){
      return $this->login;
   }

   //SET

   public function setEmail(){
      $conexao = new connection;
      $conexao = $conexao->connect();

      $sqlquery = "SELECT CLIENT_EMAIL FROM clients WHERE CLIENT_CPF = '{$this->login}'";

      $execute = mysqli_query($conexao, $sqlquery);
      $assoc = $execute->fetch_all(MYSQLI_ASSOC);

      if(empty($assoc)){
         header('Location: ../login.php');
      }else{
         $this->emailRec = $assoc[0]['CLIENT_EMAIL'];
      }
   }

   public function setLogin($login){
      if(empty($login)){
         header('Location: ../login.php');
      }else{
         $this->login = $login;
      }
   }

}
?>
