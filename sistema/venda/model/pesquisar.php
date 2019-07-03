<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		
		if($_POST['acao'] = "numero_identificador"){
			if(!empty($_POST['numero_identificador'])){
				$result = $db->getRows("SELECT nome_completo, data_nascimento, rg FROM tbl_cliente WHERE numero_identificador = '".$_POST['numero_identificador']."'");
				
				foreach($result as $r){
					$r['nome_completo'];
					$r['data_nascimento'];
					$r['rg'];
				}
				
				if(!empty($r['nome_completo']) && !empty($r['data_nascimento']) && !empty($r['rg'])){
					echo json_encode(array('nome_completo' => $r['nome_completo'],'data_nascimento' => $r['data_nascimento'],'rg' => $r['rg']));
				}else{
					echo json_encode(array('nome_completo' => '','data_nascimento' => '','rg' => ''));
				}
			}
		}
		
		if($_POST['acao'] = "valor_produto"){
			if(!empty($_POST['nome_produto'])){
				$result = $db->getRows("SELECT valor FROM tbl_produto WHERE nome = '".$_POST['nome_produto']."'");
				
				foreach($result as $r){
					$r['valor'];
				}
				
				if(!empty($r['valor'])){
					echo json_encode(array('valor' => $r['valor']));
				}else{
					echo json_encode(array('valor' => ''));
				}
			}
		}
	}else{
		header('location:../../login/login.php');
	}
?>