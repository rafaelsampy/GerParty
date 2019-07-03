<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		if($_POST['acao'] = "cadastrar_produto"){
			
			$db->insertRow("INSERT INTO tbl_produto(nome, valor, id_categoria, observacao) VALUES(?,?,?,?)", array($nome, $valor, $categoria, $observacao));
			header('location:../listar.php?msg=success');
		}
	}else{
		header('location:../../login/login.php');
	}
?>