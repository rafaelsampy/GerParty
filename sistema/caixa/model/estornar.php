<?php 
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		date_default_timezone_set('America/Sao_Paulo');

		if($_POST['acao'] = "estornar_pagamento"){
			if(!empty($_GET['id'])){
				$result = $db->getRows("SELECT c.id AS id, c.numero_identificador AS numero_identificador 
										FROM tbl_venda AS v 
										LEFT JOIN tbl_cliente AS c ON c.id = v.id_cliente
										WHERE v.status_pagamento = 1
										AND v.id_pagamento = '".$_GET['id']."'");
								
				foreach($result as $r){
					$r['id'];
					$r['numero_identificador'];
				}
				
				if($r['numero_identificador'] == '-'){
					$db->updateRow("UPDATE tbl_venda SET id_pagamento = ?, data_pagamento = ?, id_forma_pagamento = ?, status_pagamento = ? WHERE id_pagamento = '".$_GET['id']."' AND id_cliente = '".$r['id']."'", array(0,'','',0));
					$db->updateRow("UPDATE tbl_cliente SET numero_identificador = ? WHERE id = '".$r['id']."'", array('Estornado'));
				}else{
					$db->updateRow("UPDATE tbl_venda SET id_pagamento = ?, data_pagamento = ?, id_forma_pagamento = ?, status_pagamento = ? WHERE id_pagamento = '".$_GET['id']."' AND id_cliente = '".$r['id']."'", array(0,'','',0));
				}
				
				header('location:../pagamentos_pagos.php?msg=reversed');
			}else{
				header('location:../pagamentos_pagos.php?erro=sistema');
			}
		}else{
			header('location:../pagamentos_pagos.php?erro=sistema');
		}
	}else{
		header('location:../../login/login.php');
	}
?>