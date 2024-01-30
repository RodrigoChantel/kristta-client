<?php
    include_once('./model/connection.php');
    include_once('controller/show.php');
    class showCourses{

        public function show(){
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

        public function certificates(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $innertest = new show;
            foreach ($innertest->innerJoinCompanies() as $inner){

            $sqlQuery = "SELECT *
                        FROM certificates
                        WHERE CERT_COMPANY = '{$inner['COMP_ID']}'";
            }
            
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }
    }
?>