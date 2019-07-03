<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		date_default_timezone_set('America/Sao_Paulo');

		if($_POST['acao'] = "pagar_pagamento_pendente"){
			if(!empty($_GET['id'])){
				$result = $db->getRows("SELECT MAX(id_pagamento) AS id_pagamento FROM tbl_venda");
				foreach($result as $r){}
								
				$db->updateRow("UPDATE tbl_venda SET id_pagamento = ?, data_pagamento = ?, id_forma_pagamento = ?, status_pagamento = ?, observacao = ? WHERE status_pagamento = 0 AND id_pagamento = 0 AND id_cliente = '".$_GET['id']."'", array($r['id_pagamento']+1,date('Y-m-d'),$forma_pagamento,1,$observacao));
				$db->updateRow("UPDATE tbl_cliente SET numero_identificador = ? WHERE id = '".$_GET['id']."'", array('-'));

				header('location:../pagamentos_pendentes.php?msg=paid');
			}else{
				header('location:../pagamentos_pendentes.php?erro=sistema');
			}
		}else{
			header('location:../pagamentos_pendentes.php?erro=sistema');
		}
	}else{
		header('location:../../login/login.php');
	}
?>