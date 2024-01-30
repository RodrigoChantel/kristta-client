
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/style-dashboard.css" rel="stylesheet">
    <link href="../assets/css/style-botchat.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/animation.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-ico" href="../assets/images/fav/favteste.webp">
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <title>Dashboard</title>
  </head>
<body class="bg-light">
<?php
    class reportUpdatePassword{
        public function updatePasswordReport(){
            $_GET['id'];
            if($_GET['id'] == "alterPasswordFail"){
                
?>

<script type='text/javascript'>alert('Senha atual digitada incorretamente! Por favor, tente novamente.');
    location='../index.php';
</script>

<?php
            }
        }
    }
    $teste = new reportUpdatePassword;
    $teste->updatePasswordReport();
?>

</body>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/style.js"></script>
	<script src="../assets/js/script.js"></script>
	<script src="../assets/js/timer.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/fontawesome.js" crossorigin="anonymous"></script>
	<script>
		const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
		const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
	</script>


	<!-- AOS -->
	<script src="../assets/js/aos.js"></script>
	<script>
	AOS.init({
	});
	</script>
</html>