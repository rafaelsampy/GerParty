<?php
	if($_POST['acao'] = "sair"){
		unset($_GET);
		unset($_POST);
		
		unset($_SESSION['id_usuario']);
		unset($_SESSION['permissao_cliente']);
		unset($_SESSION['permissao_categoria']);
		unset($_SESSION['permissao_produto']);
		unset($_SESSION['permissao_venda']);
		unset($_SESSION['permissao_caixa']);
		unset($_SESSION['permissao_relatorio']);
		unset($_SESSION['permissao_usuario']);
		unset($_SESSION['permissao_email']);
		unset($_SESSION['permissao_blobo_notas']);
				
		session_destroy();
		
		header('location:../login/login.php');
	}
?>