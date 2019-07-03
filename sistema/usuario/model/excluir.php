<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		
		if($_GET['acao'] = "excluir_usuario"){
			if(isset($_GET['id'])){
				$result = $db->deleteRow("DELETE FROM tbl_usuario WHERE id = '".$_GET['id']."'");
				
				header('location:../listar.php?msg=excluido');
			}else{
				header('location:../listar.php?erro=sistema');
			}
		}
	}else{
		header('location:../../login/login.php');
	}
?>