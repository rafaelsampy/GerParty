<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	date_default_timezone_set('America/Sao_Paulo');
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
		
		$result = $db->getRows("SELECT c.id AS id, c.nome_completo AS nome_completo, c.numero_identificador AS numero_identificador, c.data_nascimento AS data_nascimento, c.rg AS rg
								FROM tbl_venda AS v 
								LEFT JOIN tbl_cliente AS c ON c.id = v.id_cliente
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.status_pagamento = 0
                                AND v.id_cliente = '".$_GET['id']."' AND v.status_pagamento = 0 AND v.id_pagamento = 0
                                GROUP BY v.id_cliente
                                ORDER BY v.id DESC");
							
		foreach($result as $r){}
								
		$produtos = $db->getRows("SELECT v.id AS id, p.valor AS valor_prodtudo, v.quantidade AS quantidade, (p.valor * v.quantidade) AS valor_total, v.data_venda AS data_venda, p.nome AS nome_produto
								FROM tbl_venda AS v 
								LEFT JOIN tbl_cliente AS c ON c.id = v.id_cliente
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.status_pagamento = 0
                                AND v.id_cliente = '".$_GET['id']."' AND v.status_pagamento = 0 AND v.id_pagamento = 0
								ORDER BY v.id DESC");
					
		$valor_total = 0;
		
		foreach($produtos as $pd){
			$valor_total = $valor_total + $pd['valor_total'];
		}
		
		$forma_pagamento = $db->getRows("SELECT nome, id FROM tbl_forma_pagamento ORDER BY id ASC");
		
		list($ano, $mes, $dia) = explode('-', $r['data_nascimento']);
		$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
		$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
	}else{
		header('location:../../login/login.php');
	}
?>