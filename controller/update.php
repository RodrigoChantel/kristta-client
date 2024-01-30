<?php
    include_once('../model/connection.php');
    class update{
        private $telefone;
        private $whtasapp;
        private $email;
        private $endereco;
        private $cep;
        private $cidade;
        private $estado;
        private $complemento;
        public $nome;
        private $sobrenome;
        private $id;

        public function updateProfile(){

            $conexao = new connection;
            $conexao = $conexao->connect();
            $contactString = mysqli_real_escape_string($conexao, $this->getContact());
            $whatsappString = mysqli_real_escape_string($conexao, $this->getWhatsapp());
            $emailString = mysqli_real_escape_string($conexao, $this->getEmail());
            $enderecoString = mysqli_real_escape_string($conexao, $this->getEndereco());
            $cepString = mysqli_real_escape_string($conexao, $this->getCep());
            $cidadeString = mysqli_real_escape_string($conexao, $this->getCidade());
            $estadoString = mysqli_real_escape_string($conexao, $this->getEstado());
            $complementoString = mysqli_real_escape_string($conexao, $this->getComplemento());
            //$solicitanteNomeString = mysqli_real_escape_string($conexao, $this->getSolicitanteNome());
            //$solicitanteSobrenomeString = mysqli_real_escape_string($conexao, $this->getSolicitanteSobrenome());

            $query = "UPDATE clients
                    SET 
                    `CLIENT_ADDRESS`='$enderecoString',
                    `CLIENT_CITY`='$cidadeString',
                    `CLIENT_STATE`='$estadoString',
                    `CLIENT_CEP`='$cepString',
                    `CLIENT_COMPLEMENT`='$complementoString',
                    `CLIENT_EMAIL`='$emailString',
                    `CLIENT_PHONE`='$contactString',
                    `CLIENT_WPP`='$whatsappString'
                    WHERE ID = '{$this->getUserId()}'";
            $updateRegister = mysqli_query($conexao, $query);
            
            if($updateRegister == true){
                header('Location: ../../index.php');
            }
        }

        public function updatePassword($senhaAtual, $novaSenha, $repeteNovaSenha, $sendOldPassword, $sendClient){

            if(password_verify($senhaAtual, $sendOldPassword)){
                $conexao = new connection;
                $conexao = $conexao->connect();
                $passwordHash1 = password_hash($novaSenha, PASSWORD_DEFAULT);
                $passwordHash2 = password_hash($repeteNovaSenha, PASSWORD_DEFAULT);
                $returnClient = $sendClient;

                $query = "UPDATE clients
                        SET CLIENT_PASSWORD='$passwordHash1'
                        WHERE ID = $returnClient";
                $updatePasswordNow = mysqli_query($conexao, $query);

                if($updatePasswordNow == true){
                    echo "
                    <script type='text/javascript'>alert('Senha alterada com sucesso! Faça login novamente para validar.');
                        location='logout.php';
                    </script>
                    ";
                }else{
                    header('Location: ../views/report.php?id=alterPasswordFail');
                }

            }else{
                header('Location: ../views/report.php?id=alterPasswordFail');
            }

        }

        //get

        public function getContact(){
            return $this->telefone;
        }

        public function getWhatsapp(){
            return $this->whatsapp;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function getCep(){
            return $this->cep;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function getComplemento(){
            return $this->complemento;
        }

        public function getSolicitanteNome(){
            return $this->nome;
        }

        public function getSolicitanteSobrenome(){
            return $this->sobrenome;
        }

        public function getUserId(){
            return $this->id;
        }
        //set

        public function setContact($setTelefone){
            $this->telefone = $setTelefone;
        }

        public function setWhatsapp($setWhatsapp){
            $this->whatsapp = $setWhatsapp;
        }

        public function setEmail($setEmail){
            $this->email = $setEmail;
        }

        public function setEndereco($setEndereco){
            $this->endereco = $setEndereco;
        }

        public function setCep($setCep){
            $this->cep = $setCep;
        }

        public function setCidade($setCidade){
            $this->cidade = $setCidade;
        }

        public function setEstado($setEstado){
            $this->estado = $setEstado;
        }

        public function setComplemento($setComplemento){
            $this->complemento = $setComplemento;
        }

        public function setSolicitanteNome($setSolicitanteNome){
            $this->nome = $setSolicitanteNome;
        }

        public function setSolicitanteSobrenome($setSolicitanteSobrenome){
            $this->sobrenome = $setSolicitanteSobrenome;
        }

        public function setUserId($userId){
            $this->id = $userId;
        }
        
    }
    