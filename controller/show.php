<?php
    include_once('./model/connection.php');
    include_once('./model/autentication.php');
    class show{
        private $name;

        public function __construct(){
            if($_SESSION['name'] == true){

                $conexao = new connection;
                $conexao = $conexao->connect();

                $query = "select *
                from `clients`
                where ID = '{$_SESSION['id']}' and CLIENT_FIRST_NAME = '{$_SESSION['name']}'";
                $result = mysqli_query($conexao, $query);
                //$row = mysqli_fetch_assoc($result);
                $resultAssoc = $result->fetch_all(MYSQLI_ASSOC);
                return $resultAssoc;
                
            }else{
                echo "Falha na verificação da sessão, contate o Administrador.";
            }
        }

        public function innerJoinCompanies(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $showData = new show;
			foreach ($showData->__construct() as $data) {

            $sqlQuery = "SELECT *
                        FROM clients
                        INNER JOIN companies
                        ON clients.ID = companies.COMP_RESPONSIBLE_ID
                        WHERE clients.ID = '{$data['ID']}'";
            }

                        
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function innerJoinStatus(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $showData = new show;
			foreach ($showData->__construct() as $data) {


            $sqlQuery = "SELECT *
                        FROM companies
                        INNER JOIN statuscontract
                        ON companies.COMP_ACTIVE = statuscontract.STATUS_ID
                        INNER JOIN clients 
                        ON companies.COMP_RESPONSIBLE_ID = clients.ID
                        WHERE clients.ID = '{$data['ID']}'";
            }
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function innerJoinSituation(){
            $conexao = new connection;
            $conexao = $conexao->connect();
            
            $showData = new show;
			foreach ($showData->__construct() as $data) {

            $sqlQuery = "SELECT *
                        FROM companies
                        INNER JOIN situation
                        ON companies.COMP_SITUATION = situation.SIT_ID
                        INNER JOIN clients 
                        ON companies.COMP_RESPONSIBLE_ID = clients.ID
                        WHERE clients.ID = '{$data['ID']}'";

            }
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function innerJoinPlan(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $showData = new show;
			foreach ($showData->__construct() as $data) {

            $sqlQuery = "SELECT *
                        FROM clients
                        INNER JOIN plans
                        ON plans.PLAN_ID = clients.CLIENT_PLAN 
                        WHERE clients.ID = '{$data['ID']}'";
            }
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function companies(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $showData = new show;
			foreach ($showData->__construct() as $data) {

            $sqlQuery = "SELECT *
                        FROM companies
                        WHERE COMP_RESPONSIBLE_ID = '{$data['ID']}'";
            }
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function requests(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $showData = new show;
			foreach ($showData->companies() as $dataCompany) {

            $sqlQuery = "SELECT *
                        FROM requests
                        WHERE REQ_CLIENT = '{$dataCompany['COMP_RESPONSIBLE_ID']}' AND REQ_COMPANY = '{$dataCompany['COMP_ID']}'
                        ORDER BY REQ_ID DESC
                        LIMIT 6";
            }
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function clientList(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $showData = new show;
			foreach ($showData->__construct() as $data) {

            $sqlQuery = "SELECT *
                        FROM clients
                        WHERE ID = '{$data['ID']}'";
            }
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function requestsList(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $sql = "SELECT *
                    FROM requests, request_types
                    WHERE REQ_TYPE = TYPE_ID";

            $check = mysqli_query($conexao, $sql);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function typeList(){
            $conexao = new connection;
            $conexao = $conexao->connect();
            
            $showTypes = new show;
            foreach($showTypes->requestsList() as $types){

            $sqlQuery = "SELECT *
                        FROM request_types
                        INNER JOIN requests
                        ON requests.REQ_TYPE = request_types.TYPE_ID";
            }
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function companiesDir(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $showData = new show;
			foreach ($showData->companies() as $dataCompany) {

            $sqlQuery = "SELECT *
                        FROM companies
                        WHERE COMP_DIR = '{$dataCompany['COMP_RESPONSIBLE_ID']}' AND REQ_COMPANY = '{$dataCompany['COMP_ID']}'
                        ";
            }

                        
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }
    }

    