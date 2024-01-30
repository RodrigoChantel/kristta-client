<?php
class startLogin{
    public function startLogin(){
        if($_POST['loginDashboard'] == "auth2022"){
            include_once('login.php');
            $sendData = new ControllerLogin;
            $sendData->setLogin($_POST['usuario']);
            $sendData->setPassword($_POST['senha']);
            $sendData->verify();
        }
    }
}
$runLogin = new startLogin;
$runLogin->startLogin();


class updateProfile{
    public function updateProfile(){
        if($_POST['valid-edit-provile'] == "edit-success"){
            include_once('update.php');
            $sendNewRegister = new update;
            $sendNewRegister->setContact($_POST['TELEFONE']);
            $sendNewRegister->setWhatsapp($_POST['WPP']);
            $sendNewRegister->setEmail($_POST['EMAIL']);
            $sendNewRegister->setEndereco($_POST['ENDERECO']);
            $sendNewRegister->setCep($_POST['CEP']);
            $sendNewRegister->setCidade($_POST['CIDADE']);
            $sendNewRegister->setEstado($_POST['ESTADO']);
            $sendNewRegister->setComplemento($_POST['COMPLEMENTO']);
            //$sendNewRegister->setSolicitanteNome($_POST['SOLICITANTE']);
            //$sendNewRegister->setSolicitanteSobrenome($_POST['SOLICITANTE2']);
            $sendNewRegister->setUserId($_POST['sendClient']);
            $sendNewRegister->updateProfile();
            $sendNewRegister->companies();
        }
    }
}
$runUpdateProfile = new updateProfile;
$runUpdateProfile->updateProfile();


class updatePassword{
    public function alterPassword(){
        if($_POST['alterarSenha'] == "01820"){
            include_once('update.php');
            $sendNewPassword = new update;
            $sendNewPassword->updatePassword($_POST['senhaAtual'], $_POST['novaSenha'], $_POST['repeteNovaSenha'], $_POST['sendPassword'], $_POST['sendClient']);
        }else{
            echo "Erro ao enviar formulário para a troca de senhas.";
        }
    }
}
$runUpdatePassword = new updatePassword;
$runUpdatePassword->alterPassword();

class recLoginPw{
    public function rec(){
        if($_POST['recPw'] == "rec"){
            include_once('recoveryPw.php');
            $sendRecPw = new recovery;
            $sendRecPw->setLogin($_POST['cpfOrCnpj']);
            $sendRecPw->setEmail();
            $sendRecPw->recoveryPw();
        }else{
            echo "Algo deu errado";
        }
    }
}
$runLogin2 = new recLoginPw;
$runLogin2->rec();

class redRequest{
    public function redirectRequest(){
        if($_POST['formRequest'] == "sendRequest"){
            include_once('sendRequest.php');
            $request = new requests;
            $request->setTypeRequest($_POST['requeType']);
            $request->setRequestMsg($_POST['msg']);
            $request->setStartDate($_POST['startDate']);
            $request->setEndDate($_POST['endDate']);
            $request->setReference($_POST['link']);
            $request->setUrgency($_POST['urgency']);
            $request->setId($_POST['sendClient']);
            $request->setIdComp($_POST['sendComp']);
            $request->createRequest();
        }
    }
}
$runRequest = new redRequest;
$runRequest->redirectRequest();
