<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
		
		$result = $db->getRows("SELECT p.*,p.id_categoria AS id_categoria, c.nome AS categoria FROM tbl_produto AS p LEFT JOIN tbl_categoria AS c ON c.id = p.id_categoria WHERE p.id = '".$_GET['id']."'");
		foreach($result as $r){}
		
		$categoria = $db->getRows("SELECT nome, id FROM tbl_categoria ORDER BY nome DESC");
	}else{
		header('location:../../login/login.php');
	}
?>