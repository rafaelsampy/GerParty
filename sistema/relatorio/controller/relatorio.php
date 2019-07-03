<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
	date_default_timezone_set( 'America/Sao_Paulo' );
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
		
		if(isset($_POST['data_de']) || isset($_POST['data_ate'])){
			if(!empty($_POST['data_de'])){
				$data_de = " AND v.data_venda >= '".$_POST['data_de']."' ";	
				$data_de_d = $_POST['data_de'];
				$_SESSION['data_de'] = $data_de_d;
				
			}else{	
				$data_de = '';
				
			}
		
			if(!empty($_POST['data_ate'])){
				$data_ate = " AND v.data_venda <= '".$_POST['data_ate']."' ";
				$data_ate_d = $_POST['data_ate'];
				$_SESSION['data_ate'] = $data_ate_d;
				
			}else{	
				$data_ate = '';
				
			}
		}else{
			$data_de = '';
			$data_ate = '';
			
		}
		
		$mes = $db->getRows("SELECT sum(p.valor * v.quantidade) AS valor_total,
								YEAR(data_venda) AS ano, MONTH(data_venda) AS mes 
								FROM tbl_venda AS v
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.id > 0".$data_de.$data_ate."
								GROUP BY YEAR(data_venda), MONTH(data_venda)");
			
		$pagamentos_pendentes = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total, 
								YEAR(data_venda) AS ano, MONTH(data_venda) AS mes  
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.status_pagamento = 0".$data_de.$data_ate."
								GROUP BY YEAR(data_venda), MONTH(data_venda)
								ORDER BY YEAR(data_venda) ASC, MONTH(data_venda) ASC");
		
		$pagamentos_pagos = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total, 
								YEAR(data_venda) AS ano, MONTH(data_venda) AS mes 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.status_pagamento = 1".$data_de.$data_ate."
								GROUP BY YEAR(data_venda), MONTH(data_venda)
								ORDER BY YEAR(data_venda) ASC, MONTH(data_venda) ASC");
												
		$pagamentos_dinheiro = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total, 
								YEAR(data_venda) AS ano, MONTH(data_venda) AS mes 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.id_forma_pagamento = 1 AND v.status_pagamento = 1".$data_de.$data_ate."
								GROUP BY YEAR(data_venda), MONTH(data_venda)
								ORDER BY YEAR(data_venda) ASC, MONTH(data_venda) ASC");
								
		$pagamentos_debito = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total, 
								YEAR(data_venda) AS ano, MONTH(data_venda) AS mes 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.id_forma_pagamento = 2 AND v.status_pagamento = 1".$data_de.$data_ate."
								GROUP BY YEAR(data_venda), MONTH(data_venda)
								ORDER BY YEAR(data_venda) ASC, MONTH(data_venda) ASC");
												
		$pagamentos_credito = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total, 
								YEAR(data_venda) AS ano, MONTH(data_venda) AS mes 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.id_forma_pagamento = 3 AND v.status_pagamento = 1".$data_de.$data_ate."
								GROUP BY YEAR(data_venda), MONTH(data_venda)
								ORDER BY YEAR(data_venda) ASC, MONTH(data_venda) ASC");
												
		$pagamentos_outros = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total, 
								YEAR(data_venda) AS ano, MONTH(data_venda) AS mes 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.id_forma_pagamento = 4 AND v.status_pagamento = 1".$data_de.$data_ate."
								GROUP BY YEAR(data_venda), MONTH(data_venda)
								ORDER BY YEAR(data_venda) ASC, MONTH(data_venda) ASC");
												
		$vendas_categoria = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total, c.nome AS nome
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								LEFT JOIN tbl_categoria AS c ON c.id = p.id_categoria 
								WHERE v.status_pagamento = 1".$data_de.$data_ate."
								GROUP BY c.id
								ORDER BY sum(p.valor * v.quantidade) ASC");
				
		$vendas = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.id > 0".$data_de.$data_ate."");
								foreach($vendas as $v){}
		
		$dinheiro = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.status_pagamento = 1".$data_de.$data_ate."
								AND v.id_forma_pagamento = 1");
								foreach($dinheiro as $d){}
		
		$cartao_debito = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.status_pagamento = 1".$data_de.$data_ate."
								AND v.id_forma_pagamento = 2");
								foreach($cartao_debito as $cd){}
		
		$cartao_credito = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.status_pagamento = 1".$data_de.$data_ate."
								AND v.id_forma_pagamento = 3");			
								foreach($cartao_credito as $cc){}
		
		$outros = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total  
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.status_pagamento = 1".$data_de.$data_ate."
								AND v.id_forma_pagamento = 4");
								foreach($outros as $o){}
		
		$pendentes = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total  
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.status_pagamento = 0".$data_de.$data_ate."");
								foreach($pendentes as $pen){}
		
		$mais_vendidos = $db->getRows("SELECT COUNT(v.id) AS qtd, v.id_produto AS id_produto, sum(p.valor * v.quantidade) AS valor_total , p.nome AS nome 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.id > 0".$data_de.$data_ate." 
								GROUP BY v.id_produto
								ORDER BY sum(p.valor * v.quantidade) 
								DESC
								LIMIT 15");
		
		$menos_vendidos = $db->getRows("SELECT COUNT(v.id) AS qtd, v.id_produto AS id_produto, sum(p.valor * v.quantidade) AS valor_total , p.nome AS nome 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
								WHERE v.id > 0".$data_de.$data_ate." 
								GROUP BY v.id_produto
								ORDER BY sum(p.valor * v.quantidade) 
								ASC
								LIMIT 15");
								
		if(count($mes) > 0){
			$media = $v['valor_total']/count($mes);
			
		}else{
			$media = 0;
			
		}
		
	}else{
		header('location:../../login/login.php');
		
	}
	
?>