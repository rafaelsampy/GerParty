<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		
		if($_POST['acao'] = "verificar_rg"){
			if(isset($_POST['rg'])){
				$result = $db->getRows("SELECT c.id AS rg_id FROM tbl_cliente AS c WHERE c.rg = '".$_POST['rg']."'");
				
				foreach($result as $r){
					$r['rg_id'];
				}
				
				if(!empty($r['rg_id'])){
					echo json_encode(array('rg' => 'Ja existe um cliente cadastrado com esse RG'));
				}
			}
		}
		
		if($_POST['acao'] = "verificar_numero_identificador"){
			if(isset($_POST['numero_identificador'])){
				$result = $db->getRows("SELECT numero_identificador FROM tbl_cliente WHERE numero_identificador = '".$_POST['numero_identificador']."'");
				
				foreach($result as $r){
					$r['numero_identificador'];
				}
				
				if(!empty($r['numero_identificador'])){
					echo json_encode(array('numero_identificador' => 'Ja existe um cliente cadastrado com esse número identificador'));
				}
			}
		}
	}else{
		header('location:../../login/login.php');
	}
?>