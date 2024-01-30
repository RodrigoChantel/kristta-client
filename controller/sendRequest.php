<div class='d-none'><?php include_once('../model/connection.php') ?></div>
<?php
    include_once('./model/connection.php');
    include_once('./model/autentication.php');
    
    class requests{
        public $requestType;
        private $requestMsg;
        private $startDate;
        private $endDate;
        private $reference;
        private $urgency;
        private $idClient;
        private $idCompId;

        public function companies(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $sqlQuery = "SELECT *
                        FROM companies
                        WHERE COMP_RESPONSIBLE_ID = '{$this->getId()}'";

            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public final function createRequest(){

            if (empty($this->getTypeRequest()) or empty($this->getRequestMsg())) {
                if(empty($this->getTypeRequest())){
                    echo "<script type='text/javascript'>alert('Um tipo de solicitação precisa ser informado.');location='../../index.php';</script>";
                }elseif (empty($this->getRequestMsg())) {
                    echo "<script type='text/javascript'>alert('Você precisa descrever a solicitação.');location='../../index.php';</script>";
                }
            }else{
                echo "<hr>";
                echo $this->getTypeRequest();
                echo "<hr>";
                echo $this->getRequestMsg();
                echo "<hr>";
                echo $this->getStartDate();
                echo "<hr>";
                echo $this->getEndDate();
                echo "<hr>";
                echo $this->getReference();
                echo "<hr>";
                echo $this->getUrgency();
                echo "<hr>";
                echo $this->getId();
                echo "<hr>";
                echo "Abaixo comp";
                echo $this->getIdCompId();

                

                $conexao = new connection;
                $conexao = $conexao->connect();

                $typeString = mysqli_real_escape_string($conexao, $this->getTypeRequest());
                $msgString = mysqli_real_escape_string($conexao, $this->getRequestMsg());
                $startString = mysqli_real_escape_string($conexao, $this->getStartDate());
                $endString = mysqli_real_escape_string($conexao, $this->getEndDate());
                $referenceString = mysqli_real_escape_string($conexao, $this->getReference());
                $urgencyString = mysqli_real_escape_string($conexao, $this->getUrgency());
                $idString = mysqli_real_escape_string($conexao, $this->getId());
                $compIdString = mysqli_real_escape_string($conexao, $this->getIdCompId());
                $invoicing = date('m/Y');

                $sqlQuery = "INSERT INTO `requests`(`REQ_CLIENT`, `REQ_COMPANY`, `REQ_TYPE`, `REQ_MESSAGE`, `REQ_URGENCY`,`REQ_INVOICING`, `REQ_START_DATE`, `REQ_STATUS`, `REQ_END_DATE`,`REQ_REFERENCE`) 
                                            VALUES ('{$idString}','{$compIdString}','{$typeString}','{$msgString}','{$urgencyString}', '{$invoicing}', '{$startString}','1','{$endString}','{$referenceString}')
                            ";
                
                $createRequire = mysqli_query($conexao, $sqlQuery);
            
                if($createRequire == true){
                    header('Location: ../../index.php');
                }

            }
        }

        public function typeListActive(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $sqlQuery = "SELECT * 
                        FROM `request_types` 
                        WHERE 1
                        ";
            
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        //GET
        public function getTypeRequest()
        {
            return $this->requestType;
        }

        public function getRequestMsg()
        {
            return $this->requestMsg;
        }

        public function getStartDate()
        {
            return $this->startDate;
        }

        public function getEndDate()
        {
            return $this->endDate;
        }

        public function getReference()
        {
            return $this->reference;
        }

        public function getUrgency()
        {
            return $this->urgency;
        }

        public function getId()
        {
            return $this->idClient;
        }

        public function getIdCompId()
        {
            return $this->idCompId;
        }

        //SET
        public function setTypeRequest($type)
        {
            $this->requestType = $type;
        }

        public function setRequestMsg($msg)
        {
            $this->requestMsg = $msg;
        }

        public function setStartDate($startR)
        {
            if ($startR) {
                $this->startDate = $startR;
            }
            $this->startDate = date('d/m/Y');
        }

        public function setEndDate($end)
        {
            if(empty($end)){
                $this->endDate = $end; 
            }
            $this->endDate = date('d/m/Y', strtotime('+30 days'));
        }

        public function setReference($ref)
        {
            $this->reference = $ref;
        }

        public function setUrgency($urg)
        {
            if($urg == true){
                $this->urgency = 1;
            }else{
                $this->urgency = 0;
            }
            
        }

        public function setId($clientId)
        {
            $this->idClient = $clientId;
        }

        public function setIdComp($compId)
        {
            $this->idCompId = $compId;
        }
    }