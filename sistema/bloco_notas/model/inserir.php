<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database() ;
		if($_POST['acao'] = "cadastrar_bloco_nota"){
			
			$db->insertRow("INSERT INTO tbl_bloco_nota(assunto, texto) VALUES(?,?)", array($nome, $observacao));
			header('location:../listar.php?msg=success');
		}
	}else{
		header('location:../../login/login.php');
	}
?>