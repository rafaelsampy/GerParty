<?php
	if(isset($_GET['erro'])){
		if($_GET['erro'] == "sistema"){
			
			$messagem = '<div class="alert alert-danger .alert-dismissable col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
							<a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erro!</strong> Por favor, informe o suporte técnico.
						</div>';
						
		}else{
			$messagem = "";
		}
		
		unset($_GET['erro']);
		
	}else if(isset($_GET['msg'])){
		if($_GET['msg'] == "danger"){
			
			$messagem = '<div class="alert alert-danger .alert-dismissable col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
							<a class="close" data-dismiss="alert" aria-label="close">&times;</a> E-mail ou Senha <strong>Inválida!</strong>
						</div>';
						
		}else{
			$messagem = "";
		}
		
		unset($_GET['msg']);
		
	}else {
		$messagem = "";
	}
?>