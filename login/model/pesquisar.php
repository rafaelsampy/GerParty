<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	$db = new Database();

	if($_POST['acao'] = "login"){
		if(!empty($_POST['email']) && !empty($_POST['senha'])){
			
			$login = $db->getRows("SELECT * FROM tbl_usuario WHERE email_login = '".$_POST['email']."' AND senha_login = '".$_POST['senha']."'");
			foreach($login as $l){}

			if(!empty($l['id'])){
					
				$_SESSION['id_usuario'] = $l['id'];
				$_SESSION['permissao_cliente'] = $l['permissao_cliente'];
				$_SESSION['permissao_categoria'] = $l['permissao_categoria'];
				$_SESSION['permissao_produto'] = $l['permissao_produto'];
				$_SESSION['permissao_venda'] = $l['permissao_venda'];
				$_SESSION['permissao_caixa'] = $l['permissao_caixa'];
				$_SESSION['permissao_relatorio'] = $l['permissao_relatorio'];
				$_SESSION['permissao_usuario'] = $l['permissao_usuario'];
				$_SESSION['permissao_email'] = $l['permissao_email'];
				$_SESSION['permissao_blobo_notas'] = $l['permissao_blobo_notas'];
				
				header('location:../../sistema/index.php');
				
			}else{
				header('location:../login.php?msg=danger');
			}
			
		}else{
			header('location:../login.php?erro=sistema');
		}
	}
?>

