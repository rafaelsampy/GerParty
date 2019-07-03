<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		
		if($_GET['acao'] = "excluir_produto"){
			if(isset($_GET['id'])){
				$result = $db->getRows("SELECT id_produto FROM tbl_venda WHERE status_pagamento = 0 AND id_produto = '".$_GET['id']."'");
				
				foreach($result as $r){
					$r['id_produto'];
				}
				
				if(empty($r['id_produto'])){
					$result = $db->deleteRow("DELETE FROM tbl_produto WHERE id = '".$_GET['id']."'");
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