<?php 
	require_once("../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();

		$permissao = $db->getRows("SELECT * FROM tbl_usuario WHERE id = '".$_SESSION['id_usuario']."'");
		foreach($permissao as $p){}
		
		$result = $db->getRows("SELECT * FROM tbl_categoria WHERE id <> 24 AND id <> 25 ORDER BY id DESC");
		
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
			if($_GET['msg'] == "success"){
				$mensagem = '<div class="alert alert-success .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>Categoria cadastrada com <strong>Sucesso</strong>
							</div>';
			}else if($_GET['msg'] == "excluido"){
				$mensagem = '<div class="alert alert-success .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>Categoria excluída com <strong>Sucesso</strong>
							</div>';
			}else if($_GET['msg'] == "used"){
				$mensagem = '<div class="alert alert-danger .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>A <strong>categoria</strong> não pode ser excluída, pois está sendo usada
							</div>';
			}else if($_GET['msg'] == "changed"){
				$mensagem = '<div class="alert alert-success .alert-dismissable col-sm-12 col-md-12 col-lg-12">
								<a class="close" data-dismiss="alert" aria-label="close">&times;</a>Categoria alterada com <strong>Sucesso</strong>
							</div>';
			}else {
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