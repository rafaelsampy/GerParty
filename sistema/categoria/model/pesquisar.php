<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		if($_POST['acao'] = "nome"){
			if(isset($_POST['nome'])){
				$result = $db->getRows("SELECT c.id AS nome_id FROM tbl_categoria AS c WHERE c.nome = '".$_POST['nome']."'");
				
				foreach($result as $r){
					$r['nome_id'];
				}
				
				if(!empty($r['nome_id'])){
					echo json_encode(array('nome' => 'Ja existe uma categoria cadastrada com esse nome'));
				}
			}
		}
	}else{
		header('location:../../login/login.php');
	}
?>