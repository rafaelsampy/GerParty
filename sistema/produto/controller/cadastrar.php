<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$categoria = $db->getRows("SELECT nome, id FROM tbl_categoria ORDER BY nome ASC");
		
		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
	}else{
		header('location:../../login/login.php');
	}
?>