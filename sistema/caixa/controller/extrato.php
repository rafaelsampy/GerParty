<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	date_default_timezone_set('America/Sao_Paulo');
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
		
		if(isset($_POST['data_de']) || isset($_POST['data_ate'])){
			if(!empty($_POST['data_de'])){
				$data_de = " AND v.data_venda >= '".$_POST['data_de']."' ";	
				$data_de_d = $_POST['data_de'];
			}else{	
				$data_de = '';
			}
		
			if(!empty($_POST['data_ate'])){
				$data_ate = " AND v.data_venda <= '".$_POST['data_ate']."' ";
				$data_ate_d = $_POST['data_ate'];
			}else{	
				$data_ate = '';
			}
		}else{
			$data_de = '';
			$data_ate = '';
		}
		
		$caixa_total = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total 
									FROM tbl_venda AS v 
									LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
									WHERE v.id > 0".$data_de.$data_ate."");
		foreach($caixa_total as $ct){}
		
		$pagamentos_pendentes = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total 
									FROM tbl_venda AS v 
									LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
									WHERE v.status_pagamento = 0".$data_de.$data_ate);
		foreach($pagamentos_pendentes as $pp){}
		
		$pagamentos_pagos = $db->getRows("SELECT COUNT(v.id) AS qtd, sum(p.valor * v.quantidade) AS valor_total 
									FROM tbl_venda AS v 
									LEFT JOIN tbl_produto AS p ON p.id = v.id_produto
									WHERE v.status_pagamento = 1".$data_de.$data_ate);
		foreach($pagamentos_pagos as $pg){}
		
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
		
		if(isset($_GET['erro'])){
			if($_GET['erro'] == "sistema"){
				$mensagem = '<div class="alert alert-danger .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erro!</strong> Por favor, informe o suporte técnico.
							</div>';
			}else {
				$mensagem = "";
			}
		
			unset($_GET['erro']);
		}else if(isset($_GET['msg'])){
			if($_GET['msg'] == "success"){
				$mensagem = '<div class="alert alert-success .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>Cliente cadastrado com <strong>Sucesso</strong>
							</div>';
			}else if($_GET['msg'] == "excluido"){
				$mensagem = '<div class="alert alert-success .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>Cliente excluído com <strong>Sucesso</strong>
							</div>';
			}else if($_GET['msg'] == "used"){
				$mensagem = '<div class="alert alert-danger .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>O <strong>cliente</strong> não pode ser excluído, pois está sendo usada
							</div>';
			} else {
				$mensagem = "";
			}
			
			unset($_GET['msg']);
		}else {
			$mensagem = "";
		}
	}else{
		header('location:../../login/login.php');
	}
?>