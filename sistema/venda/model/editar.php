<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		date_default_timezone_set('America/Sao_Paulo');

		if($_POST['acao'] = "alterar_venda"){
			if(!empty($_GET['id'])){
				$result2 = $db->getRows("SELECT id AS id_produto FROM tbl_produto WHERE nome = '".$nome_produto."'");
				foreach($result2 as $r2){}
			
				$db->updateRow("UPDATE tbl_venda SET id_produto = ?,quantidade = ?,data_venda = ?,data_pagamento = ?,id_forma_pagamento = ?,status_pagamento = ? WHERE id = '".$_GET['id']."'", array($r2['id_produto'], $quantidade, date('Y-m-d'), '', 0, 0));

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