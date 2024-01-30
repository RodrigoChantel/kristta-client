<div class="position-absolute" id="spinner" style="left:50%; top:50%; display:none; z-index:999;">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="row py-3">
            <div class="col-md-12">
                <button class="btn bg-white border">
                    Acompanhar
                </button>

                <button class="btn bg-white border position-relative">
                    Criar Nova Solicitação
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" style="z-index:999;">
                        !
                    </span>
                </button>

                <button class="btn bg-white border position-relative">
                    Pacotes
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" style="z-index:999;">
                        !
                    </span>
                </button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row" id="requestsForm">
                    <form id="requestForm" action="controller/redirect.php/" method="post">
                        <input type="hidden" name="formRequest" value="sendRequest">
                        <!-- Envia o ID de usuário atual -->
                        <?php
                            $sendClient = new show();
                            $client = $sendClient->__construct();
                            foreach ($client as $sendClients) {
                                echo "<input type='hidden' id='sendClient' name='sendClient' value='" . $sendClients['ID'] . "'>";
                            }
                            $sendComp = new show();
                            $comp = $sendComp->companies();
                            foreach ($comp as $sendComps) {
                                echo "<input type='hidden' id='sendComp' name='sendComp' value='" . $sendComps['COMP_ID'] . "'>";
                            }
                        ?>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row mb-3">
                                    <div class="mb-3">
                                        <label class="m-0 p-0" for="">Tipo de solicitação</label>

                                        <select class="form-control" name="requeType" id="requeType">
                                            <option class="d-none text-secondary" value="0" selected>Clique para selecionar uma opção</option>
                                            <option class='d-none text-secondary'>
                                            <?php
                                                $showRequests = new requests;
                                                foreach ($showRequests->typeListActive() as $typeList) {
                                                    //echo $data['TYPE_NAME'];
                                                    echo "<option value='{$typeList['TYPE_ID']}'>";
                                                    echo $typeList['TYPE_NAME'];
                                                    echo "</option>";
                                                }
                                            ?>
                                            </option>
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label class="m-0 p-0" for="">Solicitante</label>
                                        <?php
                                            $showData = new show;
                                            foreach ($showData->__construct() as $data) {
                                                echo "<input class='form-control' value='{$data['CLIENT_FIRST_NAME']} {$data['CLIENT_LAST_NAME']}' type='text' disabled>";
                                            }
                                        ?>
                                        
                                    </div>

                                    <div class="mb-3">
                                        <label class="m-0 p-0" for="">Detalhes da Solicitação</label>
                                        <textarea name="msg" id="msg" rows="10" cols="40" maxlength="500" class="form-control" ></textarea>
                                    </div>

                                    <div class="d-flex flex-row flex-wrap justify-content-between">
                                        <div class="col-xl-6 pe-1">
                                            <label for="">Data de início desejada</label>
                                            <input name="startDate" class="form-control" type="date">
                                        </div>
                                        <div class="col-xl-6 ps-1">
                                            <label for="">Data estimada para o fim do serviço</label>
                                            <input name="endDate" class="form-control" type="date">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                            
                            <div class="col-xl-6">
                                <div class="row mb-3">
                                    <div class="mb-3">
                                        <label class="m-0 p-0" for="">link para referencia</label>
                                        <input name="link" class="form-control" type="url">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input name="urgency" class="form-check-input" type="checkbox" id="flexCheckDefault">
                                            <div class="p-0 m-0 d-flex flex-row flex-wrap justify-content-between">
                                                <label class="form-check-label" for="flexCheckDefault">Solicitar Urgência</label>
                                                <small class="text-muted">Essa opção poderá ocasionar custos adicionais</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="alert alert-warning" role="alert">
                                            IMPORTANTE!<br>
                                            Ao selecionar a opção de Urgência na sua solicitação, você declara estar ciente de que poderão ser aplicadas cobranças adicionais. Essa opção indica que você necessita de um atendimento prioritário e, por isso, os recursos e esforços da equipe serão direcionados para atender sua solicitação o mais rápido possível.
                                        </div>
                                        <small class="text-muted">Algumas solicitações são cobradas independentemente da marcação na opção de urgência. Marcar a opção fará com que sua solicitação seja tratada como prioritária, porém isso não impede a adição de novas cobranças.</small>
                                    </div>

                                </div>
                            </div> <!-- end col-->
                        </div><!-- end row -->
                    </form> <!-- End form -->

                    <div class="row mx-0">
                        <div class="col-md-12 px-0">
                            <button type="submit" form="requestForm" class="btn btn-primary mx-0" onclick="aguardarTresSegundosRequest()">Enviar</button>
                            <button type="reset" form="requestForm" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
