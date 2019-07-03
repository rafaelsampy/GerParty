<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
		
		$result = $db->getRows("SELECT c.id AS id, c.nome_completo AS nome_completo, c.data_nascimento AS data_nascimento, c.rg AS rg, 
								p.valor , v.quantidade, sum(p.valor * v.quantidade) AS valor_total, v.data_pagamento AS data_pagamento, v.id_pagamento AS id_pagamento 
								FROM tbl_venda AS v 
								LEFT JOIN tbl_cliente AS c ON c.id = v.id_cliente
								LEFT JOIN tbl_produto AS p ON p.id = v.id_produto 
								WHERE v.status_pagamento = 1 
								GROUP BY v.id_pagamento
								ORDER BY v.id DESC");
			
		$count = 1;
		foreach($result as $r){
			$count++;
		}

		
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
			if($_GET['msg'] == "reversed"){
				$mensagem = '<div class="alert alert-success .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>Pagamento pago estornado com <strong>Sucesso</strong>
							</div>';
			}else if($_GET['msg'] == "excluido"){
				$mensagem = '<div class="alert alert-success .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>Pagamento excluído com <strong>Sucesso</strong>
							</div>';
			}else if($_GET['msg'] == "used"){
				$mensagem = '<div class="alert alert-danger .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>O <strong>pagamento</strong> não pode ser estornado
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