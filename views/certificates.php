<div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        CERTIFICADOS
    </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <table class='table border table-hover'>
                <thead class="">
                    <tr>
                        <th class=" fw-normal" scope="col"><span>ATENDIMENTO AO CLIENTE</span></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider text-secondary">
                <?php
                $showCertificates = new showCourses;
                foreach ($showCertificates->certificates() as $listCertificates) {

                $pasta = $listCertificates['CERT_DIRECTORY']; // Substitua pelo caminho da pasta desejada
                
                }
                $files = scandir($pasta);

                foreach ($files as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) == 'pdf') {
                        $caminho = $pasta . '/' . $file;
                        echo "<tr> <td class='d-flex flex-row flex-wrap justify-content-start'> <div class='btn btn-danger small rounded-circle'></div><div class='mx-auto d-flex flex-row flex-nowrap justify-content-between' style='width:90%;'>" . $file . '&nbsp;<div><a class="" href="' . $caminho . '" target="_blank">Abrir</a></div> </td> </tr></div>';
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>