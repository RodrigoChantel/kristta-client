<?php
    $invoicesCount = new showInvoices;
    foreach($invoicesCount->enumInvoices() as $countInvoices){
?>

<div class="row pt-2">
    <div class="row">
        
        <div class="col-md-4 border-end">
        <?php
            $clientName = new show;
            foreach($clientName->innerJoinCompanies() as $clientNameList){
        ?>
            <p>Responsável pelo pagamento</p>
            <p class="text-primary"><?php echo $clientNameList['COMP_NAME']; ?></p>
        <?php
            }
        ?>
        </div>
        <div class="col-md-4 border-end">
            <p>Status</p>
            <?php
                if($countInvoices['COUNT(INV_STATUS)'] >= 3){
                    echo "<p class='text-danger fw-bold'>Apto a Suspensão</p>";
                }else{
                    echo "<p class='text-success fw-bold'>Ativo</p>";
                }
            ?>
        </div>
        <div class="col-md-4">
            <p>Faturas</p>
            <p class="fst-italic text-danger fw-bold">
                <?php
                    echo $countInvoices['COUNT(INV_STATUS)'] . " Em Aberto";
                }
                ?>
            </p>
        </div>
    </div>
    <hr>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h1>Consulte e Pague Sua Fatura</h1>
                <span>Sua forma de pagamento atual é: <strong>Pix QrCode</strong></span>
            </div>
            <div class="col-md-6">
                <div class="row bg-primary text-white py-3">
                    <div class="col-md-8">
                        <h2 class="fw-bold fs-5">Débito Automático</h2>
                        <small>Aproveite a maneira mais prática e segura para pagar suas contas.</small>
                    </div>
                    <div class="col-md-4 d-flex flex-row flex-wrap justify-content-end align-content-center">
                        <img class="w-100" src="./assets/images/logo-white.png" alt="Logo-Kristta">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Vencimento</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Visualizar</th>
                        <th scope="col">Baixar</th>
                    </tr>
                </thead>
                <?php

                //DIRETÓRIOS DE EMPRESAS E FATURAS
                $showData = new show;
                foreach ($showData->companies() as $dataCompany) {

                    $invoices = new showInvoices;
                    foreach($invoices->invoices() as $listInvoices){
                ?>
                <tbody class="border">
                    <tr>
                        <th scope="row"><?php echo $listInvoices['INV_VALIDATE']; ?></th>

                        <td><?php echo "R$ " . number_format($listInvoices['INV_VALUE'],2,",","."); ?></td>

                        <td><?php
                            if($listInvoices['INV_STATUS'] == 1){
                                echo "<span class='text-success'>Paga</span>";
                            }elseif ($listInvoices['INV_STATUS'] == 2) {
                                echo "<span class='muted'>Cancelada</span>";
                            }else{
                                echo "<span class='text-danger'>Em aberto</span>";
                            }
                        ?></td>
                        
                        <td class="border-end text-black">
                            <?php
                                //DIRETÓRIO - Visualizar
                                $pasta = $dataCompany['COMP_DIR'] . $listInvoices['INV_DIRECTORY'];
                                $files = scandir($pasta);
                                $nomeArquivo = $listInvoices['INV_VALIDATE'];
                                
                                foreach ($files as $file) {
                                    if (!is_dir($pasta . '/' . $file) && strpos($file, $nomeArquivo) !== false) {
                                        $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                        
                                        if ($fileExtension == 'pdf') {
                                            echo "<a class='text-primary text-decoration-none' href='" . $pasta . '/' . $file . "' target='_blank'>Visualizar</a>";
                                            break; // Se encontrar o arquivo PDF correspondente, interrompe o loop
                                        }
                                    }
                                }
                            ?>
                        </td>
                        
                        <td class="border-end text-black">
                            <?php
                            $pasta = $dataCompany['COMP_DIR'] . $listInvoices['INV_DIRECTORY'];
                            $files = scandir($pasta);
                            $nomeArquivo = $listInvoices['INV_VALIDATE'];

                            foreach ($files as $file) {
                                if (!is_dir($pasta . '/' . $file) && strpos($file, $nomeArquivo) !== false) {
                                    $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    
                                    if ($fileExtension == 'pdf') {
                                        echo "<a class='text-primary text-decoration-none' href='" . $pasta . '/' . $file . "' download>Baixar</a>";
                                        break; // Se encontrar o arquivo PDF correspondente, interrompe o loop
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>

                <?php
                    }}
                ?>

            </table>
        </div>
    </div>
    <div class="col-md-4 px-5 py-3 bg-myedit bg-opacity-25 d-none">
        <div class="row">
            <div class="col-md-9 text-white">
                <h2 class="fw-bold">Débito Automático</h2>
                <p>Aproveite a maneira mais prática e segura para pagar suas contas.</p>

                <p class="bg-primary rounded-3 p-1">Confira as <strong>vantagens</strong> de colocar sua conta em débito automático</p>

                <p>Evite juros e multas por atraso</p>
                <p>Serviço gratuito e seguro</p>
                <p>Cadastre e pague sem sair de casa</p>
                <p>Evita filas no banco</p>
            </div>
        </div>
    </div>
</div>
