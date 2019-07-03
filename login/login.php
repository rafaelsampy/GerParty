<?php require('./controller/login.php');?>
<!DOCTYPE html>
<html>
	<head>
		<title>GerParty</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
		<link href="./css/css.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(e){
				$('.close').click(function(e){					
     				$('.alert').hide();
     			});

     			setInterval(function(){
     				$('.alert').hide();
     			},4000);
			});
		</script>
	</head>
	<body style="background-color:#f9f9f9;">
		<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:100px; text-align:center; color:#104170;">
			<h1><strong class="pull-left">Ger</strong><strong class="pull-left" style="color:red;">Party</strong></h1>
		</div>	
		<div class="wrapper col-sm-12 col-md-12 col-lg-12" style="margin-top:20px;">
    		<form class="form-signin" action="./model/pesquisar.php?acao=login" method="POST" style="border:1px solid #dddddd; border-radius:3px;">
				<h5 class="form-signin-heading" style="text-align:center;">Faça login para entrar no sistema</h5>			
      			<input class="form-control" type="Email" style="margin-top:30px;" name="email" placeholder="E-mail" required="" autofocus=""/>
      			<input class="form-control" type="password" style="margin-top:10px;" name="senha" placeholder="Senha" required="" autofocus=""/>       		
      			<button class="btn btn-md btn-success btn-block" type="submit" style="margin-top:30px;">Fazer Login</button>
      			<?php echo $messagem;?>
    		</form>				
  		</div>
  		<script src="../js/jquery.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>	
	</body>
</html>