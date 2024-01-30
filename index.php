<?php
	include_once('model/autentication.php');
	include_once('controller/show.php');
	include_once('controller/showCourses.php');
	include_once('controller/showContracts.php');
	include_once('controller/showFiles.php');
	include_once('controller/showInvoices.php');
	include_once('controller/sendRequest.php');
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/style-dashboard.css" rel="stylesheet">
    <link href="./assets/css/style-botchat.css" rel="stylesheet" type="text/css">
    <link href="./assets/css/animation.css" rel="stylesheet" type="text/css">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-ico" href="./assets/images/fav/favteste.webp">
    <script type="text/javascript" src="./assets/js/jquery-3.3.1.min.js"></script>
    <title>Dashboard</title>
  </head>
<body class="bg-light">
	<header>
		<div class="container-fluid bg-primary">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<div class="row w-100 mx-0">
						<div class="col-md-6">
							<a href="#" class="navbar-brand text-white fw-bold">Kristta Dashboard <span class="fs-6 fw-normal opacity-50">(Beta V-1.5.1 2023)</span></a>
						</div>
						<div class="col-md-6 text-end mx-0">
							
							<?php
								$showData = new show;
								foreach ($showData->__construct() as $data) {
							?>
							<div id="timer" style="display: none;"></div>
							<a class="btn text-light" href="#"><i class="fa-solid fa-coins"></i> <?php echo intval($data['CLIENT_MONEY']) ?></a>
							
							<a href="#" class="btn text-light"><i class="fa-sharp fa-solid fa-bell"></i></a>
							<a href="#" class="btn text-light" disabled><i class="fa-sharp fa-solid fa-envelope"></i></a>
							<!-- INICIO DROP -->
								<button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa-sharp fa-solid fa-circle-user"></i>
								</button>
								<ul class="dropdown-menu shadow px-2" style="right:0; left:auto;">
									<p class="fs-1 text-center my-0"><i class="fa-sharp fa-solid fa-circle-user"></i></p>
									<p id="compName" class="fs-5 text-center my-0"><?php echo ucwords($data['CLIENT_FIRST_NAME']); ?></p>
									<?php
										$innertest = new show;
										foreach ($innertest->innerJoinCompanies() as $inner){
									?>
									<p id="compName" class="text-center my-0">(<span><?php echo ucwords($inner['COMP_FANTASY_NAME']);?></span>)</p>
									<?php
										}
									?>

									<li>
									<a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#trocarSenhaModal">
										<i class="fa-solid fa-key"></i> Trocar Senha
									</a>
									</li>
									<li><a class="dropdown-item text-center" href="controller/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a></li>
								</ul>
							<!-- FIM DROP -->
							<?php
								}
							?>
						</div>
						
					</div>
				</div>
			</nav>
		</div>
	</header>

	<!-- AVISO -->

	<div id="floatingNotice" class="floating-notice shadow bg-primary px-4" style="display: none;">
		<div class="row pt-0">
			<h2 class="text-white">Aviso Importante</h2>
		</div>
		<div class="row">
			<p class="my-auto text-white">Navegue sem problemas! Limpe a memória cache regularmente para uma experiência perfeita. Estamos aqui para ajudar!</p>
		</div>
		<div class="row pt-3">
			<div class="col-md-12">
				<button onclick="submitWarning()" class="btn bg-white w-25">ENTENDI</button>
			</div>
		</div>
	</div>
		
	<main id="main" style="filter: 0;">
		<div class="container-fluid m-0 p-0">
			<div  style="height:92vh;" class="container-fluid border px-0 m-0 d-flex flex-row flex-nowrap">
				<div class="border d-block m-0 h-100" id="">

					<button class="btn w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
						<i class="fa-sharp fa-solid fa-bars"></i>
					</button>
					<p onclick="geralSubmit()"><a class="btn w-100 text-start text-secondary py-2 mt-1 d-flex flex-row flex-nowrap"><i class="fa-solid fa-house"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Visão&nbsp;Geral</span></a></p>
					<p onclick="requestSubmit()"><a class="btn w-100 text-start text-secondary py-2 mt-1 d-flex flex-row flex-nowrap"><i class="fa-solid fa-user-plus fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Solicitações</span></a></p>
					<p class="d-none" onclick="plansSubmit()"><a class="btn w-100 text-start text-secondary py-2 mt-1 d-flex flex-row flex-nowrap"><i class="fa-solid fa-receipt fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Planos</span></a></p>
					<p onclick="financialSubmit()"><a class="btn w-100 text-start text-secondary py-2 mt-1 d-flex flex-row flex-nowrap"><i class="fa-solid fa-credit-card fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Financeiro</span></a></p>
					<p onclick="workflowSubmit()"><a class="btn w-100 text-start text-secondary py-2 mt-1 d-flex flex-row flex-nowrap"><i class="fa-solid fa-sitemap fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Workflow</span></a></p>
					<p onclick="supportSubmit()"><a class="btn w-100 text-start text-secondary py-2 mt-1 d-flex flex-row flex-nowrap"><i class="fa-solid fa-phone fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Suporte</span></a></p>

				</div>
	
				<div class="container-fluid overflow-auto h-100" id="financial" style="display:none">
					<?php
						include_once('views/financial.php')
					?>
				</div>

				<div class="container-fluid overflow-auto h-100" id="requests" style="display:none;">
					<?php
						include_once('views/request.php');
					?>
				</div>

				<div class="container-fluid overflow-auto h-100" id="plans" style="display:none;">
					<?php
						include_once('views/plans.php');
					?>
				</div>

				<div class="container-fluid overflow-auto h-100" id="workflow" style="display:none;">
					<?php
						include_once('views/workflow.php');
					?>
				</div>

				<div class="container-fluid overflow-auto h-100" id="support" style="display:none;">
					<?php
						include_once('views/support.php');
					?>
				</div>
				
				<div class="container-fluid overflow-auto h-100" id="geral">
					<?php
						include_once('views/geral.php');
					?>
				</div>

			</div>

			<!-- Modal de troca de senha -->
			<div class="modal fade" id="trocarSenhaModal" tabindex="-1" aria-labelledby="trocarSenhaModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="trocarSenhaModalLabel">Alterar Senha</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
						</div>
						<div class="modal-body">
							<form onsubmit="return validarFormulario()" action="controller/redirect.php" method="POST">
								<?php
								$sendData = new show();
								$passwords = $sendData->__construct();
								foreach ($passwords as $sendPassword) {
									echo "<input type='hidden' id='sendPassword' name='sendPassword' value='" . $sendPassword['CLIENT_PASSWORD'] . "'>";
								}
								?>
								<?php
								$sendClient = new show();
								$client = $sendClient->__construct();
								foreach ($client as $sendClients) {
									echo "<input type='hidden' id='sendClient' name='sendClient' value='" . $sendClients['ID'] . "'>";
								}
								?>
								<input type="hidden" id="alterarSenha" name="alterarSenha" value="01820">
								<div class="mb-3">
									<label for="senhaAtual" class="form-label">Senha Atual</label>
									<input type="password" class="form-control" id="senhaAtual" name="senhaAtual">
								</div>
								<div class="mb-3">
									<label for="novaSenha" class="form-label">Nova Senha</label>
									<input type="password" class="form-control" id="novaSenha" name="novaSenha">
								</div>
								<div class="mb-3">
									<label for="repeteNovaSenha" class="form-label">Repita a Nova Senha</label>
									<input type="password" class="form-control" id="repeteNovaSenha" name="repeteNovaSenha">
								</div>
								<div class="alert alert-danger" id="erroSenha" style="display: none;"></div>
								<div class="alert alert-danger" id="vazioSenha" style="display: none;"></div>
								<div class="alert alert-danger" id="erroSenhaAntiga" style="display: none;"></div>
								<button type="submit" class="btn btn-primary">Enviar</button>
								<input type="reset" class="btn btn-secondary" value="Cancelar" data-bs-dismiss="modal"></button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<script>
				function validarFormulario() {
					var novaSenha = document.getElementById("novaSenha").value.trim();
					var repeteNovaSenha = document.getElementById("repeteNovaSenha").value.trim();
					var erroSenha = document.getElementById("erroSenha");

					if (novaSenha !== repeteNovaSenha) {
						erroSenha.innerHTML = "A nova senha não corresponde à repetição da nova senha. Por favor, verifique os campos.";
						erroSenha.style.display = "block";
						return false;
					}
					if (novaSenha.length === 0 && repeteNovaSenha.length === 0) {
						vazioSenha.innerHTML = "Campos vazios não são permitidos.";
						vazioSenha.style.display = "block";
						return false;
					}
				}
			</script>

				<!--LIMITAR CARACTERES -->
			<script>
				var paragrafo = document.getElementById("compName");
				var limiteLetras = 20;

				if (paragrafo.textContent.length > limiteLetras) {
					paragrafo.textContent = paragrafo.textContent.substring(0, limiteLetras) + "...";
				}
			</script>

		</div>
		<div id="cookie-aviso" class="alert alert-info rounded-0" role="alert">
			Este site utiliza cookies. Clique em Aceitar para continuar.
			<button id="aceitar-cookie" class="btn btn-primary btn-sm">Aceitar</button>
		</div>
	
	</main>
	

</body>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/style.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="assets/js/timer.js"></script>
	<script src="assets/js/floatMsg.js"></script>
	<script src="assets/js/cookies.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/fontawesome.js"></script>
	<script>
		const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
		const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
	</script>

	<!-- AOS -->
	<script src="assets/js/aos.js"></script>
	<script>
	AOS.init({
	});
	</script>
</html>
