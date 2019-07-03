<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		
		if($_POST['acao'] = "verificar_email_login"){
			if(isset($_POST['email_login'])){
				$result = $db->getRows("SELECT u.id AS email_id FROM tbl_usuario AS u WHERE u.email_login = '".$_POST['email_login']."'");
				
				foreach ($result as $r){
					$r['email_id'];
				}
				
				if(!empty($r['email_id'])){
					echo json_encode(array('email_login' => 'Ja existe um usuário cadastrado com esse e-mail'));
				}
			}
		}
		
		if($_POST['acao'] = "verificar_nome_completo"){
			if(isset($_POST['nome_completo'])){
				$result = $db->getRows("SELECT u.id AS nome_completo FROM tbl_usuario AS u WHERE u.nome_completo = '".$_POST['nome_completo']."'");
				
				foreach ($result as $r){
					$r['nome_completo'];
				}
				
				if(!empty($r['nome_completo'])){
					echo json_encode(array('nome_completo' => 'Ja existe um usuário cadastrado com esse nome'));
				}
			}
		}
	}else{
		header('location:../../login/login.php');
	}
?>