<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		
		if($_GET['acao'] = "excluir_cliente"){
			if(isset($_GET['id'])){
				$result = $db->getRows("SELECT id_cliente FROM tbl_venda WHERE status_pagamento = 0 AND id_cliente = '".$_GET['id']."'");
				
				foreach($result as $r){
					$r['id_cliente'];
				}
				
				if(empty($r['id_cliente'])){
					$result = $db->deleteRow("DELETE FROM tbl_cliente WHERE id = '".$_GET['id']."'");
					header('location:../listar.php?msg=excluido');
				}else{
					header('location:../listar.php?msg=used');
				}
			}else{
				header('location:../listar.php?erro=sistema');
			}
		}
	}else{
		header('location:../../login/login.php');
	}
?>