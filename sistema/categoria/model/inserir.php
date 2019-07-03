<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database() ;
		if($_POST['acao'] = "cadastrar_categoria"){
			
			$db->insertRow("INSERT INTO tbl_categoria(nome, observacao) VALUES(?,?)", array($nome, $observacao));
			header('location:../listar.php?msg=success');
		}
	}else{
		header('location:../../login/login.php');
	}
?>