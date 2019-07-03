<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	date_default_timezone_set('America/Sao_Paulo');
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
		
		$result = $db->getRows("SELECT v.id AS id, v.data_venda AS data_venda, 
								c.nome_completo AS nome_completo, c.numero_identificador AS numero_identificador, c.data_nascimento,
								p.nome AS nome_produto, p.valor AS valor_produto, v.quantidade AS quantidade 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_cliente AS c ON c.id = v.id_cliente
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE V.status_pagamento = 0 AND v.id = '".$_GET['id']."'");
		
		foreach($result as $r){}
		$valor_total = $r['quantidade'] * $r['valor_produto'];
		
		list($ano, $mes, $dia) = explode('-', $r['data_nascimento']);
		$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
		$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
	}else{
		header('location:../../login/login.php');
	}
?>