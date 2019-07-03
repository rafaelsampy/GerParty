<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		date_default_timezone_set('America/Sao_Paulo');

		if($_POST['acao'] = "cadastrar_venda"){
			$result1 = $db->getRows("SELECT id AS id_cliente FROM tbl_cliente WHERE rg = '".$rg."' AND nome_completo =  '".$nome_completo."'");
			foreach($result1 as $r1){}
			
			for($i=0; $i<count($nome_produto); $i++){
				$result2 = $db->getRows("SELECT id AS id_produto FROM tbl_produto WHERE nome = '".$nome_produto[$i]."'");
				foreach($result2 as $r2){}
			
				$db->insertRow("INSERT INTO tbl_venda(id_cliente, id_produto, quantidade, data_venda, data_pagamento, id_forma_pagamento, status_pagamento) VALUES(?,?,?,?,?,?,?)", array($r1['id_cliente'], $r2['id_produto'], $quantidade[$i], date('Y-m-d'), '', 0, 0));
				
			}
			
			header('location:../listar.php?msg=success');
		}
	}else{
		header('location:../../login/login.php');
	}
?>