<?php
    include_once('controller/showInvoices.php');
    include_once('controller/show.php');

    $showData = new show;
	foreach ($showData->companies() as $dataCompany) {

        
        $showDir = new showInvoices;
        foreach($showDir->invoices() as $companiesDir){
            var_dump($dataCompany['COMP_DIR'] . $companiesDir['INV_DIRECTORY']);
        }
    }