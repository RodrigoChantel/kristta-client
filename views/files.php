<div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        MÍDIA DIGITAL
    </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <table class='table border table-hover'>
                <thead class="">
                    <tr>
                        <th class=" fw-normal" scope="col"><span>FILES</span></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider text-secondary">
                <?php
                $showFiles = new showFiles;
                foreach ($showFiles->files() as $listFiles) {

                $pasta = $listFiles['FILES_DIRECTORY']; // Substitua pelo caminho da pasta desejada
                
                }
                $files = scandir($pasta);

                foreach ($files as $file) {
                    if ($file != '.' && $file != '..') {
                        $caminho = $pasta . '/' . $file;
                        
                        if (is_dir($caminho)) {
                            echo "<tr>
                                    <td class='d-flex flex-row flex-wrap justify-content-start'>
                                        <i class='fa-sharp fa-solid fa-file-arrow-down'></i>
                                        <div class='mx-auto d-flex flex-row flex-nowrap justify-content-between' style='width:90%;'>
                                            <a class='' href='" . $caminho . "'>" . $file . "</a>
                                        </div>
                                    </td>
                                  </tr>";
                        } else {
                            $extensao = pathinfo($file, PATHINFO_EXTENSION);
                            if (strtolower($extensao) == 'txt') {
                                echo "<tr>
                                        <td class='d-flex flex-row flex-wrap justify-content-start'>
                                            <i class='fa-sharp fa-solid fa-file-arrow-down'></i>
                                            <div class='mx-auto d-flex flex-row flex-nowrap justify-content-between' style='width:90%;'>
                                                " . $file . '&nbsp;
                                                <div><a class="" href="' . $caminho . '" download>Baixar</a></div>
                                            </div>
                                        </td>
                                      </tr>';
                            } else {
                                echo "<tr>
                                        <td class='d-flex flex-row flex-wrap justify-content-start'>
                                            <i class='fa-sharp fa-solid fa-file-arrow-down'></i>
                                            <div class='mx-auto d-flex flex-row flex-nowrap justify-content-between' style='width:90%;'>
                                                " . $file . '&nbsp;
                                                <div><a class="" href="' . $caminho . '" target="_blank">Abrir</a></div>
                                            </div>
                                        </td>
                                      </tr>';
                            }
                        }
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>