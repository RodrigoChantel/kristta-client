<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        CONTRATOS
    </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <table class='table border table-hover'>
                <thead class="">
                    <tr>
                        <th class=" fw-normal" scope="col"><span>CONTRATOS ATIVOS</span></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider text-secondary">
                <?php
                $showContracts = new showContracts;
                foreach ($showContracts->contracts() as $listContracts) {

                $pasta = $listContracts['CONTRACT_DIRECTORY']; // Substitua pelo caminho da pasta desejada
                
                }
                $files = scandir($pasta);

                foreach ($files as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) == 'pdf') {
                        $caminho = $pasta . '/' . $file;
                        echo "<tr> <td class='d-flex flex-row flex-wrap justify-content-start'> <div class='btn btn-success small rounded-circle'></div><div class='mx-auto d-flex flex-row flex-nowrap justify-content-between' style='width:90%;'>" . $file . '&nbsp;<div><a class="" href="' . $caminho . '" target="_blank">Abrir</a></div> </td> </tr></div>';
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
