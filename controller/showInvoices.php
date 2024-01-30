<?php
    include_once('./model/connection.php');
    include_once('controller/show.php');
    class showInvoices{

        public function invoices(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $innerinvoices = new show;
            foreach ($innerinvoices->innerJoinCompanies() as $inner){

            $sqlQuery = "SELECT *
                        FROM invoice
                        WHERE INV_COMPANY = '{$inner['COMP_ID']}'
                        ORDER BY INV_REGDATE DESC
                        LIMIT 10";
            }
            
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function enumInvoices(){
            $conexao = new connection;
            $conexao = $conexao->connect();

            $innerinvoices = new show;
            foreach ($innerinvoices->innerJoinCompanies() as $inner){
                $sqlQuery = "SELECT COUNT(INV_STATUS)
                FROM invoice
                WHERE INV_COMPANY = '{$inner['COMP_ID']}'
                AND INV_STATUS = 0";
            }
    
            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
            }
    }
?>