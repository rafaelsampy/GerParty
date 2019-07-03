<?php require('./controller/print.php');?>
<html>
	<head>
		<title>GerParty</title>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="shortcut icon" href="../../img/favicon/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div style="width:700px; min-height:670px; margin:0 auto;">
			<div style="width:700px; height:90px; background:#F2F2F2; border:1px solid #666; border-radius:10px 10px 0px 0px;">
				<h1 style="margin-top:10px; margin-left:30px; color:#104170;"><strong>Ger</strong><strong style="color:red;">Party</strong></h1>
			</div>
			<div style="width:700px; min-height:460px; background:#F7F7F7; border-left:1px solid #666; border-right:1px solid #666;">
				<br>
				<?php if($p['permissao_blobo_notas'] == 1){ ?>
					<h2 style="margin-left:25px; margin-top:10px; text-align:center;">Bloco de Notas</h2>
					<br>
					<p style="margin-left:25px; margin-right:25px;font-family:AwConqueror, Helvetica Neue, Arial, Helvetica, sans-serif;"><b>Assunto: </b><?php echo($r['assunto']); ?></p>
					
					<p style="margin-left:25px; margin-right:25px;font-family:AwConqueror, Helvetica Neue, Arial, Helvetica, sans-serif;"><?php echo($r['texto']); ?></p>
				<?php }else{ ?>
					<h1 style="text-align:center; margin-top:150px;"><strong style="color:red;">Você não tem permissão para acessar essa página!</strong></h1>
				<?php } ?>
			</div>
			<div style="width:700px; margin-top:-16px; height:20px; background:#F7F7F7; border-left:1px solid #666; border-right:1px solid #666;"></div>
			<div style="width:700px; height:100px; background:#F2F2F2;border:1px solid #666; border-radius:0px 0px 10px 10px;">
				<br>
				<p style = "margin-top:-8px; margin-left:25px; margin-right:25px;font-family:AwConqueror, Helvetica Neue, Arial, Helvetica, sans-serif;">Rafael H M Sampy
					<br>(16) 9 8136-0408
					<br><br>Sisteme de Gestão de Casas Noturnas - GerParty
				</p>
			</div>
		</div>
		<script language="javascript">
			window.print();
			//window.location = "listar.php";
		</script>
	</body>
</html>
