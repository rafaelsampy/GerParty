<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		if($_POST['acao'] = "alterar_cliente"){
			if(!empty($_GET['id'])){
				$db->updateRow("UPDATE tbl_cliente SET numero_identificador = ?, data_nascimento = ?, telefone_1 = ?, email = ?, observacao = ? WHERE id = '".$_GET['id']."'", array($numero_identificador, $data_nascimento, $telefone_1, $email, $observacao));

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