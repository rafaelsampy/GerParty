<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		if($_POST['acao'] = "alterar_usuario"){
			if(empty($permissao_cliente)){
				$permissao_cliente = 0;
			}
			
			if(empty($permissao_categoria)){
				$permissao_categoria = 0;
			}
			
			if(empty($permissao_produto)){
				$permissao_produto = 0;
			}
			
			if(empty($permissao_venda)){
				$permissao_venda = 0;
			}
			
			if(empty($permissao_caixa)){
				$permissao_caixa = 0;
			}
			
			if(empty($permissao_relatorio)){
				$permissao_relatorio = 0;
			}
			
			if(empty($permissao_usuario)){
				$permissao_usuario = 0;
			}
			
			if(empty($permissao_email)){
				$permissao_email = 0;
			}
			
			if(!empty($_GET['id'])){
				$db->updateRow("UPDATE tbl_usuario SET data_nascimento = ?,telefone_1 = ?,telefone_2 = ?,senha_login = ?,permissao_cliente = ?,permissao_categoria = ?,permissao_produto = ?,permissao_venda = ?,permissao_caixa = ?,permissao_relatorio = ?,permissao_usuario = ?,permissao_email = ?, permissao_blobo_notas = ?, observacao = ? WHERE id = '".$_GET['id']."'", array($data_nascimento, $telefone_1, $telefone_2, $senha_login, $permissao_cliente, $permissao_categoria, $permissao_produto, $permissao_venda, $permissao_caixa, $permissao_relatorio, $permissao_usuario, $permissao_email, $permissao_blobo_notas, $observacao));

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