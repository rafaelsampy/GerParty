<?php
	require_once('../../../funcoes/phpmailer/class.phpmailer.php');
	require_once("../../../funcoes/database.php");
	session_start();
	extract($_POST);
	
	if(isset($_SESSION['id_usuario'])){ 
		$db = new Database();
		
		try {
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Mailer = "smtp";
			$mail->SMTPDebug = 1;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->Username = "rafaelsampy92@gmail.com";
			$mail->Password = "engsoftware2014";
			
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			
			$mail->setFrom("rafaelsampy92@gmail.com", "GerParty"); 
			
			if(!empty($enviar_cliente) && empty($enviar_usuario)){
				$result = $db->getRows("SELECT email FROM tbl_cliente WHERE email <> ''");
				
			}else if(!empty($enviar_usuario) && empty($enviar_cliente)){
				$result = $db->getRows("SELECT u.email_login AS email FROM tbl_usuario AS u WHERE u.email_login <> ''");
				
			}else if(!empty($enviar_usuario) && !empty($enviar_cliente)){
				$result = $db->getRows("SELECT u.email_login AS email FROM tbl_usuario AS u WHERE u.email_login <> '' UNION SELECT c.email AS email FROM tbl_cliente AS c WHERE c.email <> ''");
					
			}else{
				$result = $db->getRows("SELECT u.email_login AS email FROM tbl_usuario AS u WHERE u.email_login <> ''");
			}
		
			foreach($result as $r){
				$mail->AddAddress($r['email']);
			}
			
			$mail->Subject  = utf8_decode($assunto);
			$mail->WordWrap   = 80;
			
			$body = '<div style="width:700px; height:590px; margin:0 auto;">';
			$body .= '<div style="width:700px; height:90px; background:#F2F2F2; border:1px solid #666; border-radius:10px 10px 0px 0px;">';
			$body .= '<h1 style="margin-top:10px; margin-left:30px; color:#104170;"><strong>Ger</strong><strong style="color:red;">Party</strong></h1>';
			$body .= '</div>';
			$body .= '<div style="width:700px; height:360px; background:#F7F7F7; border-left:1px solid #666; border-right:1px solid #666;">';
			$body .= '<br>';
			$body .= '<b style="margin-left:25px; margin-right:25px;font-family:AwConqueror, Helvetica Neue, Arial, Helvetica, sans-serif;">'.utf8_decode($assunto).'</b>';
			$body .= '<br>';
			$body .= '<p style="margin-left:25px; margin-right:25px;font-family:AwConqueror, Helvetica Neue, Arial, Helvetica, sans-serif;">'.utf8_decode($mensagem).'</p>';
			$body .= '</div>';
			$body .= '<div style="width:700px; height:100px; background:#F2F2F2;border:1px solid #666; border-radius:0px 0px 10px 10px;">';
			$body .= '<br>';
			$body .= '<p style = "margin-top:-8px; margin-left:25px; margin-right:25px;font-family:AwConqueror, Helvetica Neue, Arial, Helvetica, sans-serif;">Rafael H M Sampy';
			$body .= '<br>(16) 9 8136-0408';
			$body .= '<br>Sisteme de Gestão de Casas Noturnas - GerParty';
			$body .= '</p>';
			$body .= '</div>';
			$body .= '</div>';
			
			$mail->MsgHTML($body);
			$mail->IsHTML(true);
			
			if(!$mail->Send()) {
				//header('location:../email.php?erro=sistema');
			} else {
				header('location:../email.php?msg=success');
			}
			
		}catch (phpmailerException $e) {
			header('location:../email.php?erro=sistema');
		}
	}else{
		header('location:../../login/login.php');
	}
?>