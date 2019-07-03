<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		if($_GET['acao'] = "excluir_categoria"){
			if(isset($_GET['id'])){
				$result = $db->getRows("SELECT id_categoria FROM tbl_produto WHERE id_categoria = '".$_GET['id']."'");
				
				foreach($result as $r){
					$r['id_categoria'];
				}
				
				if(empty($r['id_categoria'])){
					$result = $db->deleteRow("DELETE FROM tbl_categoria WHERE id = '".$_GET['id']."'");
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