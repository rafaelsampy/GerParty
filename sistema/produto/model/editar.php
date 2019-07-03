<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		if($_POST['acao'] = "alterar_produto"){
			if(!empty($_GET['id'])){
				$db->updateRow("UPDATE tbl_produto SET valor = ?, id_categoria = ?, observacao = ? WHERE id = '".$_GET['id']."'", array($valor, $categoria, $observacao));

				header('location:../listar.php?msg=changed');
			}else{
				header('location:../listar.php?erro=sistema');
			}
		}else{
			header('location:../listar.php?erro=sistema');
		}
	}else{
		header('location:../../login/login.php');
	}
?>