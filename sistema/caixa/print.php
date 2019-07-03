<?php require('./controller/extrato.php');?>
<html>
	<head>
		<title>GerParty</title>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="shortcut icon" href="../../img/favicon/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div style="width:700px; height:640px; margin:0 auto;">
			<div style="width:700px; height:90px; background:#F2F2F2; border:1px solid #666; border-radius:10px 10px 0px 0px;">
				<h1 style="margin-top:10px; margin-left:30px; color:#104170;"><strong>Ger</strong><strong style="color:red;">Party</strong></h1>
			</div>
			<div style="width:700px; height:460px; background:#F7F7F7; border-left:1px solid #666; border-right:1px solid #666; margin-top:-20px;">
				<?php if($p['permissao_caixa'] == 1){ ?>
					<h2 style="margin-left:25px; text-align:center;">Extrato</h2>
					<div style="margin-top:10px; margin-left:25px; border-left:4px solid #2e6da4;">
						<span style="margin-left:5px;"><b>Total de Vendas</b></span></br>
						<span style="margin-left:5px;">Valor: <?php echo isset($ct['valor_total'])?number_format($ct['valor_total'], 2,'.',''):"0.00";?></span></br>
					</div>
					<div style="margin-top:10px; margin-left:25px; border-left:4px solid #2e6da4;">
						<span style="margin-left:5px;"><b>Pagamentos Pendentes</b></span></br>
						<span style="margin-left:5px;">Valor: <?php echo isset($pp['valor_total'])?number_format($pp['valor_total'], 2,'.',''):"0.00";?></span></br>
					</div>
					<div style="margin-top:10px; margin-left:25px; border-left:4px solid #2e6da4;">
						<span style="margin-left:5px;"><b>Pagamentos Pagos</b></span></br>
						<span style="margin-left:5px;">Valor: <?php echo isset($pg['valor_total'])?number_format($pg['valor_total'], 2,'.',''):"0.00";?></span></br>
					</div>
					<div style="margin-top:15px;"><hr/></div>
					<h2 style="margin-top:15px; margin-left:25px;  text-align:center;">Pagamentos Pagos por Forma de Pagamento: </h2>
					<div style="margin-top:10px; margin-left:25px; border-left:4px solid #2e6da4;">
						<span style="margin-left:5px;"><b>Dinheiro</b></span></br>
						<span style="margin-left:5px;">Valor: <?php echo isset($d['valor_total'])?number_format($d['valor_total'], 2,'.',''):"0.00";?></span></br>
					</div>
					<div  style="margin-top:10px; margin-left:25px; border-left:4px solid #2e6da4;">
						<span style="margin-left:5px;"><b>Cartão de Débito</b></span></br>
						<span style="margin-left:5px;">Valor: <?php echo isset($cd['valor_total'])?number_format($cd['valor_total'], 2,'.',''):"0.00";?></span></br>
					</div>
					<div style="margin-top:10px; margin-left:25px; border-left:4px solid #2e6da4;">
						<span style="margin-left:5px;"><b>Cartão de Crédito</b></span></br>
						<span style="margin-left:5px;">Valor: <?php echo isset($cc['valor_total'])?number_format($cc['valor_total'], 2,'.',''):"0.00";?></span></br>
					</div>
					<div style="margin-top:10px; margin-left:25px; border-left:4px solid #2e6da4;">
						<span style="margin-left:5px;"><b>Outros</b></span></br>
						<span style="margin-left:5px;">Valor: <?php echo isset($o['valor_total'])?number_format($o['valor_total'], 2,'.',''):"0.00";?></span></br>
					</div>
				<?php }else{ ?>
					<h1 style="text-align:center; margin-top:150px;"><strong style="color:red;">Você não tem permissão para acessar essa página!</strong></h1>
				<?php } ?>
			</div>
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
			//window.location = "extrato.php";
		</script>
	</body>
</html>
