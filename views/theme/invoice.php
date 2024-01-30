<!DOCTYPE html>
<html lang="pt-br" class="m-0 p-0 w-100 h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Custom CSS -->
    
    <title>Invoice</title>

    <style>
    body, html{
        margin: 0 !important;
        padding: 0 !important;
        min-width: 100% !important;
        min-height: 100% !important;
        background-color: rgb(255, 255, 255);
        font-family: Arial, Helvetica, sans-serif;
    }

    #invoice{
        /*width: 595px;
        height: 842px;*/

        background-color: rgb(255, 255, 255);
    }

    #bodyInvoice{
        height: 100% !important;
    }

    #bodyInvoice2{
        width: 100%;
        height: 100% !important;
        margin-top: 15px;
    }

    .field{
        min-height: 300px;
        max-height: 300px;
    }

    .field2{
        min-height: 300px;
        max-height: 300px;
    }

    .invoice-row{
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: center;
    }

    .invoice-col-10{
        width: 10%;
        height: 100%;
    }
    .invoice-col-20{
        width: 20%;
        height: 100%;
    }
    .invoice-col-30{
        width: 30%;
        height: 100%;
    }
    .invoice-col-40{
        width: 40%;
        height: 100%;
    }
    .invoice-col-50{
        width: 50%;
        height: 100% !important;
    }
    .invoice-col-60{
        width: 60%;
        height: 100%;
    }
    .invoice-col-70{
        width: 70%;
        height: 100%;
    }
    .invoice-col-80{
        width: 80%;
        height: 100%;
    }
    .invoice-col-90{
        width: 90%;
        height: 100%;
    }
    .invoice-col-100{
        width: 100% !important;
        height: 100%;
    }

    .full-name{
        font-size: 100%;
        font-weight: bold;
    }

    .text-data{
        font-size: 90%;
    }

    .text-end{
        text-align: end;
    }

    .text-center{
        text-align: center;
    }

    .text-start{
        text-align: start;
    }

    .fw-bold{
        font-weight: bold;
    }

    .fw-normal{
        font-weight: lighter;
    }

    .fs-large{
        font-size:x-large;
    }

    .px-1{
        padding-left: 10px;
        padding-right: 10px;
    }

    .py-0{
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    .py-1{
        padding-top: 10px !important;
        padding-bottom: 10px !important;
    }

    .my-0{
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .mb-3{
        margin-bottom: 10px;
    }

    .border-body{
        border: 1px;
        border-color: rgb(0, 0, 0) !important;
        border-radius: 15px;
        border-style:solid;
    }

    .border-body2{
        border: 1px;
        border-color: rgb(0, 0, 0) !important;
        border-radius: 15px;
        border-style:solid;
    }

    .description{
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-between;
        font-weight: bold;
    }

    </style>
</head>
<body class="m-0 py-0 w-100 h-100">
    <div id="invoice">
        <div id="headerInvoice" style="border: 0px; border-bottom: 1px; border-style: solid; margin-bottom: 15px; padding-bottom: 15px;">
            <div class="invoice-row">
                <div class="invoice-col-30 px-1" style="margin-top: auto; margin-bottom: auto;">
                    <img src="assets/imgages/logob.webp" width="200vh" alt="">
                </div>
                <div class="invoice-col-50 px-1">
                    <span class="full-name">NOME COMPLETO DO CLIENTE</span>
                    <p class="text-data">
                        <span>Endereço completo do cliente</span><br>
                        <span>49200-000 Estância-SE</span>
                    </p>
                </div>
                <div class="invoice-col-20 px-1">
                    <div>
                        <label for="contrato">Código</label>
                        <p class="my-0 fw-bold" id="contrato">1234/23</p>
                    </div>
                    <div class="py-0">
                        <label for="cod">CPF/CNPJ</label>
                        <p class="my-0 fw-bold" id="cod">12345678910</p>
                    </div>
                </div>
                <div class="invoice-col-20 px-1 text-end">
                    <p class="my-0">Vencimento <span class="fw-bold">01/01/0001</span></p>
                    <div>
                        <label for="valor">Valor</label>
                        <p class="my-0 fs-large fw-bold" id="valor">00,00</p>
                    </div>
                </div>
            </div><!--END ROW-->        
        </div>

        <div id="bodyInvoice">
            <div class="invoice-row">
                <div class="invoice-col-50 border-body px-1 field" style="margin-right: 5px;">
                    <p style="font-weight: bold;">Mensagem:</p>
                    <p style="font-size: small;">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nisi a earum fugit magnam asperiores. Ea laboriosam laborum quia explicabo recusandae aperiam nemo repellendus voluptas amet, voluptatum dolore iure repudiandae.
                    </p>
                </div>
                <div class="invoice-col-50 border-body px-0 py-0 field" style="margin-left: 5px;">
                    <div class="px-1" style="height: 200px;">
                        <p class="description"><span>Descrição:</span><span>Total</span></p>
                        <p class="description"><span>Hospedagem e Domínio</span><span>00,00</span></p>
                        <p class="description"><span>Itens Eventuais</span><span>00,00</span></p>
                    </div>
                    <div class="invoice-col-100" style="display: flex; flex-direction: row; flex-wrap: nowrap;">
                        <div class="vazio" style="width: 70%;"></div>
                        <div class="border-body m-0 p-0 price" style="width: 30%; height: 83px; display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: center; align-items: center;"><span class="fw-bold p-0 m-0 fs-large text-center">00,00</span></div>
                    </div>
        
                </div>
            </div>
        </div>

        <div id="bodyInvoice2">
            <div class="invoice-row border-body field2" style="max-width: 99.7%;">

                <div class="invoice-col-50 px-1 py-1">
                    <div class="invoice-row">
                        <div class="invoice-col-20">
                            <img src="assets/img/k-websites.webp" width="100%" alt="">
                        </div>
                        <div class="invoice-col-80" style="border-top: 0px; border-bottom: 1px; border-left: 0; border-right: 0; border-style: solid; padding-top: 10px;">
                            <span class="fw-bold fs-large">Motivo</span>
                        </div>
                    </div>
                    <div class="invoice-row">
                        <table style="border-spacing: 0; margin-top: 10px; width: 100%;">
                            <tr style="width: 100%;">
                              <td style="border-bottom: 1px solid; width: 50%; font-size: 12px;">Motivo</td>
                              <td class="text-end" style="border-bottom: 1px solid; width: 50%; font-size: 12px;">00,00</td>
                            </tr>
                            <tr>
                                <th class="text-start">TOTAL</th>
                                <th class="text-end">00,00</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div style="margin-top: auto; margin-bottom: auto; border:0px; border-right: 1px; border-style:solid; height: 250px !important;"></div>

                <div class="invoice-col-50 px-1 py-1">
                    <div class="invoice-row">
                        <div class="invoice-col-100" style="border-top: 0px; border-bottom: 1px; border-left: 0; border-right: 0; border-style: solid; padding-top: 10px;">
                            <span class="fw-bold fs-large">Itens Eventuais</span>
                        </div>
                    </div>
                    <div class="invoice-row">
                        <table style="border-spacing: 0; margin-top: 10px; width: 100%;">
                            <tr style="width: 100%;">
                              <td style="border-bottom: 1px solid; width: 50%; font-size: 12px;">Motivo</td>
                              <td class="text-end" style="border-bottom: 1px solid; width: 50%; font-size: 12px;">00,00</td>
                            </tr>
                            <tr>
                                <th class="text-start">TOTAL</th>
                                <th class="text-end">00,00</th>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="invoice-row py-1">
            <div class="invoice-col-80" style="font-size: 12px;">
                <span>- Para atendimento presencial, consulte-nos para o agendamento através do site www.kristta.com.br</span><br>
                <span>- Evite a desativação do seu serviço efetuando o pagamento até a data do vencimento.</span><br>
                <span>- Para pagamentos após o vencimento serão cobrados juros diários de 0,033% e multa de 2%.</span><br>
                <span>- Caso existam serviços que não foram cobrados, esses serão incluídos nas suas próximas faturas.</span>
            </div>
            <div class="invoice-col-20" style="font-size: 12px; padding-left: 5px;">
                    <span>Atendimento:</span><br>
                    <span>+55 (79) 9 9833-4969</span><br>
                    <span>+55 (79) 9 9934-5626</span><br>
                    <span>www.kristta.com.br</span><br>
                    <span>contato@kristta.com.br</span>
            </div>
        </div>

        <div class="invoice-row" style="font-size: 12px;">
            <span class="text-center">Pagamentos após o vencimento serão cobrados juros diários de 0,033% e multa de 2%. Os encargos de pagamentos efetuados após o vencimento serão cobrados na próxima fatura.</span>
        </div>

        <div class="invoice-row">
            <div class="invoice-col-70" style="padding-top: 10px;">
                <span style="font-weight: bold;">Caso não consiga efetuar o pagamento através do QR Code:</span><br>
                <span style="font-size: 12px;">Efetue o pagamento através da nossa chave pix com o valor exato da fatura, em seguida, envie o comprovante
                de pagamento através de um dos nossos canais de atendimento juntamente com o número do seu CPF/CNPJ.</span><br>
                <span style="font-weight: bold;">CHAVE PIX CNPJ:	49.079.343/0001-82</span><br>
                <span style="font-size: 12px;">E-mail:	Contato@Kristta.com.br	Whatsapp:		+55 (79) 9 9833-4969		ou	+55 (79) 9 9934-5626</span>
            
                <table style="border-spacing: 0; margin-top: 10px;">
                    <tr>
                      <th style="border: 1px solid; font-size: 12px; width: 225px;">Cliente</th>
                      <th style="border: 1px solid; font-size: 12px; width: 225px;">Identificação para o Débito</th>
                      <th style="border: 1px solid; font-size: 12px; width: 100px;">Banco</th>
                      <th style="border: 1px solid; font-size: 12px; width: 100px;">Mês de ref.</th>
                      <th style="border: 1px solid; font-size: 12px; width: 75px;">Valor</th>
                    </tr>
                    <tr>
                      <td style="border: 1px solid; font-size: 12px;">Rodrigo</td>
                      <td style="border: 1px solid; font-size: 12px;">KRISTTA DEVELOPMENT</td>
                      <td style="border: 1px solid; font-size: 12px;">Banco</td>
                      <td class="text-center" style="border: 1px solid; font-size: 12px;">07/2023</td>
                      <td class="text-center" style="border: 1px solid; font-size: 12px;">00,00</td>
                    </tr>
                </table>

            </div>
            <div class="invoice-col-30" style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: end;">
                <img src="../../assets/imgages/qrcodekristta.png" style="width: 80%;" alt="49079343000182">
            </div>

        </div>

    </div>
</body>

<!-- JAVASCRIPT -->
<script src="assets/js/fontawesome.js"></script>

</html>