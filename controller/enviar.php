<?php
$connect = new PDO("mysql:host=127.0.0.1;dbname=u217915941_kristta", "u217915941_admin", "Adv@2021");
if($connect == 0){
	$connect = new PDO("mysql:host=127.0.0.1;dbname=kristta", "root", "");
}

$data = [
	'nome' => $_POST["nome"],
	'email' => $_POST["email"],
	'fone' => $_POST["fone"],
	'whatsapp' => $_POST["whatsapp"],
	'msg' => $_POST["msg"],
];

$stmt = $connect->prepare('INSERT INTO contact_request (nome, email, fone, whatsapp, msg) values (:nome, :email, :fone, :whatsapp, :msg)');

try{
	$connect->beginTransaction();
	$stmt->execute($data);
	$connect->commit();
	echo 'Registro salvo com sucesso';
}catch (Exception $e) {
	$connect->rollback();
	throw $e;
}