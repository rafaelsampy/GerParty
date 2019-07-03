<?php
	require_once("../../../funcoes/database.php");
	session_start();
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		if($_POST['acao'] = "produtos"){
			$result = $db->getRows("SELECT p.nome AS nome, p.valor, c.nome AS categoria FROM tbl_produto AS p LEFT JOIN tbl_categoria AS c ON c.id = p.id_categoria WHERE p.nome like '%".$_GET["term"]."%'");
			
			echo '[';
			foreach($result as $r){
				$r['nome'];
				$r['categoria'];
				echo json_encode(array('label' => $r['nome'], 'category' => $r['categoria'])).',';
			}
			echo json_encode(array('label' => '', 'category' => ''));
			echo ']';
		}
	}else{
		header('location:../../login/login.php');
	}
?>