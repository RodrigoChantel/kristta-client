
	<div class="position-absolute" id="spinner" style="left:50%; top:50%; display:none; z-index:999;">
		<div class="spinner-border" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-md-12">
			<a class="btn border" id="submitresumo" onclick="editarResume('')">Resumo</a>
			<a class="btn border" id="submitcadastro" onclick="editarCadastro('')">Editar Cadastro</a>
			<a class="btn border" id="submitarchives" onclick="editarArchives('')">Arquivos de mídia</a>
		</div>
	</div>
	<div class="row" id="resume">
	<div class="row">
		<?php
			$showData = new show;
			foreach ($showData->__construct() as $data) {
		?>
		<div class="col-md-6 pe-2">
			<?php
				$innertest = new show;
				foreach ($innertest->innerJoinCompanies() as $inner){
			?>
			<p><i class="fa-solid fa-user"></i> Cliente</p>
			<p class="text-end fst-italic"> <?php echo $inner['COMP_NAME']; ?></p>
			<hr>
			<?php
				}
			?>
			
			<p><i class="fa-solid fa-user"></i> Solicitante</p>
			<p class="text-end fst-italic"><?php echo ucwords("{$data['CLIENT_FIRST_NAME']} " . "{$data['CLIENT_LAST_NAME']}"); ?></p>
			<hr>
			
			<p><i class="fa-solid fa-user"></i> Responsável</p>
			<p class="text-end fst-italic"><?php echo ucwords("{$data['CLIENT_FIRST_NAME']} " . "{$data['CLIENT_LAST_NAME']}"); ?></p>
			<hr>
		</div>
		<div class="col-md-6 px-2">
			<?php
				$innerStatus1 = new show;
				foreach ($innerStatus1->innerJoinStatus() as $innerStatus){
			?>
			<p><i class="fa-sharp fa-solid fa-face-smile-beam"></i> Status</p>
			<p class="text-end fst-italic"><?php echo $innerStatus['STATUS_NAME']; ?></p>
			<?php
				}
				$innerSituation1 = new show;
				foreach ($innerSituation1->innerJoinSituation() as $innerSituation){
			?>
			<hr>
			<p><i class="fa-sharp fa-solid fa-triangle-exclamation"></i> Situação</p>
			<p class="text-end fst-italic"><?php echo $innerSituation['SIT_NAME']; ?></p>
			<?php
				}
				$innerPlan1 = new show;
				foreach ($innerPlan1->innerJoinPlan() as $innerPlan){
			?>
			<hr>
			<p><i class="fa-sharp fa-solid fa-id-card"></i> Plano atual</p>
			<p class="text-end fst-italic"><?php echo $innerPlan['PLAN_NAME']; ?> <a href="#"> Ver mais</a></p>
			<?php
				}
			?>
			<hr>
		</div>
		<?php
			}
		?>
	</div>

	</div>
	<div id="request" class="row overflow-auto w-100">
		<p class="fw-bold">Ultimas Solicitações</p>
		<table class="table">
			<thead>
			<tr>
				<th scope="col">SOLICITANTE</th>
				<th scope="col">TIPO</th>
				<th scope="col">OBSERVAÇÕES</th>
				<th scope="col">DATA INÍCIO</th>
				<th scope="col">ATENDENTE</th>
				<th scope="col">STATUS</th>
				<th scope="col">DATA FIM</th>
			</tr>
			</thead>
			<tbody class="flex-wrap">
				<?php
					$requests = new show;
					foreach($requests->requests() as $listRequests){
				?>
			<tr>
				<?php
					$clientList = new show;
					foreach($clientList->clientList() as $clList){
				?>
				<td style="max-width:10px !important; white-space: nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo $clList['CLIENT_FIRST_NAME'] ?></td>
				<?php
					}
				?>

				<td><?php echo $listRequests['REQ_TYPE'] ?></td>

				<td class="w-25" style="max-width:10px; white-space: nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo $listRequests['REQ_MESSAGE'] ?></td>
				
				<td><?php echo $listRequests['REQ_START_DATE'] ?></td>

				<td><?php echo $listRequests['REQ_USER'] ?></td>

				<td>
					<?php 
						switch ($listRequests['REQ_STATUS']) {
							case '1':
								echo "<span class='badge text-bg-primary'>Em progresso</span>";
								break;
							case '2':
								echo "<span class='badge text-bg-warning'>Pendente</span>";
								break;
							case '3':
								echo "<span class='badge text-bg-danger'>Urgente</span>";
								break;
							case '4':
								echo "<span class='badge text-bg-success'>Completo</span>";
								break;
							case '5':
								echo "<span class='badge text-bg-secondary'>Cancelada</span>";
								break;
							default:
								# code...
								break;
						}
					?>
				</td>

				<td><?php echo $listRequests['REQ_END_DATE'] ?></td>
			</tr>
			<?php
				}
			?>

			</tbody>
		</table>
	</div>

	<div class="row" id="editarcadastro">
		<form class="row g-3 needs-validation" id="meuFormulario" action="controller/redirect.php" method="POST" novalidate>

			<?php
				$showData = new show;
				foreach ($showData->__construct() as $data) {
			?>
			
			<input class="my-0 py-0" type="hidden" value="edit-success" name="valid-edit-provile">

			<?php
				$showDataCompany = new show;
				foreach ($showDataCompany->innerJoinCompanies() as $showDataCompanyList) {
			?>

			<div class="col-md-6 my-0 py-0">
				<label for="NOME" class="form-label">RAZÃO SOCIAL</label>
				<input type="text" class="form-control form-control-sm" value="<?php echo ucwords($showDataCompanyList['COMP_NAME']); ?>" disabled>
			</div>

			<div class="col-md-6 my-0 py-0">
				<label for="NOME" class="form-label">FANTASIA</label>
				<input type="text" class="form-control form-control-sm" name="fantasy" value="<?php echo ucwords($showDataCompanyList['COMP_FANTASY_NAME']); ?>" disabled>
			</div>
			
			<div class="col-md-6">
				<label for="CPFCNPJ" class="form-label">CPF/CNPJ</label>
				<input type="text" class="form-control form-control-sm" placeholder="Somente Números" id="CPFCNPJ" value="<?php echo ucwords($showDataCompanyList['COMP_CNPJ']); ?>" disabled>
			</div>

			<?php
				}
			?>

			<div class="col-md-3" required>
				<label for="validationCustom01" class="form-label">TELEFONE</label>
				<input type="text" id="validationCustom01" class="form-control form-control-sm" placeholder="Somente Números" name="TELEFONE" value="<?php echo ucwords($data['CLIENT_PHONE']); ?>" required>
			</div>

			<div class="col-md-3">
				<label for="WPP" class="form-label">WHATSAPP</label>
				<input type="text" class="form-control form-control-sm" placeholder="Somente Números" name="WPP" value="<?php echo ucwords($data['CLIENT_WPP']); ?>">
			</div>
			
			<div class="col-md-4">
				<label for="EMAIL" class="form-label">E-MAIL</label>
				<input type="text" class="form-control form-control-sm" name="EMAIL" value="<?php echo ucwords($data['CLIENT_EMAIL']); ?>">
			</div>

			<div class="col-md-8">
				<label for="ENDERECO" class="form-label">ENDEREÇO</label>
				<input type="text" class="form-control form-control-sm" name="ENDERECO" value="<?php echo ucwords($data['CLIENT_ADDRESS']); ?>">
			</div>

			<div class="col-md-4">
				<label for="CEP" class="form-label">CEP</label>
				<input type="text" class="form-control form-control-sm" name="CEP"value="<?php echo ucwords($data['CLIENT_CEP']); ?>">
			</div>
			
			<div class="col-md-4">
				<label for="CIDADE" class="form-label">CIDADE</label>
				<input type="text" class="form-control form-control-sm" name="CIDADE" value="<?php echo ucwords($data['CLIENT_CITY']); ?>">
			</div>
			<div class="col-md-4">
				<label for="ESTADO" class="form-label">ESTADO</label>
				<input type="text" class="form-control form-control-sm" name="ESTADO" value="<?php echo ucwords($data['CLIENT_STATE']); ?>">
			</div>
			<div class="col-md-12">
				<label for="COMPLEMENTO" class="form-label">COMPLEMENTO</label>
				<input type="text" class="form-control form-control-sm" name="COMPLEMENTO" value="<?php echo ucwords($data['CLIENT_COMPLEMENT']); ?>">
			</div>
			
			<div class="col-md-4">
				<label for="SOLICITANTE" class="form-label">NOME DO SOLICITANTE</label>
				<input type="text" class="form-control form-control-sm" name="SOLICITANTE" value="<?php echo ucwords($data['CLIENT_FIRST_NAME']); ?>" disabled>
			</div>

			<div class="col-md-4">
				<label for="SOLICITANTE" class="form-label">SOBRENOME DO SOLICITANTE</label>
				<input type="text" class="form-control form-control-sm" name="SOLICITANTE2" value="<?php echo ucwords($data['CLIENT_LAST_NAME']); ?>" disabled>
			</div>

			<div class="col-md-4">
				<label for="CPF" class="form-label">CPF DO SOLICITANTE</label>
				<input type="text" class="form-control form-control-sm" name="CPF" value="<?php echo "********" . substr($data['CLIENT_CPF'], -3); ?>" disabled>
			</div>
			
			<?php
			}
			?>
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary" onclick="aguardarTresSegundos()"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
				<a href="#" class="btn btn-danger border" onclick="cancelarEditarCadastro('editarcadastro')"><i class="fa-solid fa-xmark"></i> Cancelar</a>
			</div>

			<?php
				$sendClient = new show();
				$client = $sendClient->__construct();
				foreach ($client as $sendClients) {
					echo "<input type='hidden' id='sendClient' name='sendClient' value='" . $sendClients['ID'] . "'>";
				}
			?>

		</form>
	</div>

<!-- archives -->
<div class="row" id="archives">
	
	<div class="col-md-12">
		<div class="accordion accordion-flush shadow-sm" id="accordionFlushExample">

			<div class="accordion" id="accordionExample">
				
				<?php
				$contracts = new showContracts;
				$contracts = $contracts->contracts();
				if($contracts){
					include_once('./views/contracts.php'); 
				}else{
					echo "
					<div class='accordion-item'>
						<h2 class='accordion-header' id='headingOne'>
						<button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
							CONTRATOS
						</button>
						</h2>
						<div id='collapseOne' class='accordion-collapse collapse' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
							<div class='accordion-body'>
								<span>Não há contratos no momento...</span>
							</div>
						</div>
					</div>
					";
				}
				?>
			
				<?php
				$courses = new showCourses;
				$courses = $courses->certificates();
				if($courses){
					include_once('./views/certificates.php'); 
				}else{
					echo "
					<div class='accordion-item'>
						<h2 class='accordion-header' id='headingTwo'>
						<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
							CERTIFICADOS
						</button>
						</h2>
						<div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
							<div class='accordion-body'>
								<span>Não há certificados no momento...</span>
							</div>
						</div>
					</div>
					";
				}
				?>

				<?php
				$courses = new showFiles;
				$courses = $courses->files();
				if($courses){
					include_once('./views/files.php'); 
				}else{
					echo "
						<div class='accordion-item'>
							<h2 class='accordion-header' id='headingThree'>
							<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
								MÍDIA DIGITAL
							</button>
							</h2>
							<div id='collapseThree' class='accordion-collapse collapse' aria-labelledby='headingThree' data-bs-parent='#accordionExample'>
								<div class='accordion-body'>
									<span>Não há arquivos no momento...</span>
								</div>
							</div>
						</div>
					";
				}
				?>

			</div>

		</div>
	</div>
	<!-- AQUI TERMINA O NOVO CADASTRO -->	

	<footer class=" position-fixed fixed-bottom">
		teste do footer
	</footer>