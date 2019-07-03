<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
		
		$result = $db->getRows("SELECT * FROM tbl_bloco_nota WHERE id = '".$_GET['id']."'");
		foreach($result as $r){}
	}else{
		header('location:../../login/login.php');
	}
?>