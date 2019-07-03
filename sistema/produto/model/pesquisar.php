<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		
		if($_POST['acao'] = "nome"){
			if(isset($_POST['nome'])){
				$result = $db->getRows("SELECT p.id AS nome_id FROM tbl_produto AS p WHERE p.nome = '".$_POST['nome']."'");
				
				foreach($result as $r){
					$r['nome_id'];
				}
				
				if(!empty($r['nome_id'])){
					echo json_encode(array('nome' => 'Ja existe um produto cadastrado com esse nome'));
				}
			}
		}
	}else{
		header('location:../../login/login.php');
	}
?>