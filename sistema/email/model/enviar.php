<?php
	require_once('../../../funcoes/phpmailer/class.phpmailer.php');
	//require_once("../../../funcoes/database.php");
	//session_start();
	
	/*
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
	$mail->MsgHTML($body);
	$mail->IsHTML(true);
	
	if(!$mail->Send()) {
		//header('location:../email.php?erro=sistema');
	} else {
		header('location:../email.php?msg=success');
	}
	
	*/
	/*
	
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "rafaelsampy92@gmail.com";
	$mail->Password = "engsoftware2014";
	$mail->SetFrom("rafaelsampy92@gmail.com","eu");
	$mail->Subject = "Test";
	$mail->Body = "hello";
	$mail->AddAddress("vi.jmgomes@gmail.com");

	 if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	 } else {
		echo "Message has been sent";
	 }
	 
	 */
	 /*
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

	$mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "rafaelsampy92@gmail.com";
	$mail->Password = "engsoftware2014";
	$mail->SetFrom("rafaelsampy92@gmail.com","Rafael");
	$mail->Subject = "Here is the subject";
	$mail->Body = "This is the HTML message body <b>in bold!</b>";
	$mail->AddAddress("vi.jmgomes@gmail.com");
	
	
	if(!$mail->Send()){
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
	else{
		echo "Message has been sent";
	}
	*/
	$mail = new PHPMailer;
	$mail->IsSMTP();
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.gmail.com"; 
	$mail->Port = 465; 
	$mail->IsHTML(true);
	$mail->SetLanguage("tr", "phpmailer/language");
	$mail->CharSet  ="utf-8";
	$mail->Username = "rafaelsampy92@gmail.com";
	$mail->Password = "engsoftware2014";
	$mail->SetFrom("rafaelsampy92@gmail.com", "Rafael");
	$mail->AddAddress("vi.jmgomes@gmail.com"); 
	$mail->Subject = "You have Message From Site"; 
	$mail->Body = "This is the HTML message body <b>in bold!</b>";
	
	if(!$mail->Send()){
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
?>