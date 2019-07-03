<?php require('./controller/cadastrar.php');?>
<html>
	<head>
		<title>GerParty</title>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="shortcut icon" href="../../img/favicon/favicon.ico" type="image/x-icon">
	    <link href="../../funcoes/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../../funcoes/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	    <link href="../../css/sb-admin-2.css" rel="stylesheet">
	    <link href="../../funcoes/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/jquery.mask.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script language="javascript">
			$(document).ready(function(){
				$("#rg").blur(function(){
					var rg = $("#rg");
					$.ajax({ 
							url: 'model/pesquisar.php?acao=verificar_rg', 
							type: 'POST', 
							data:{"rg" : rg.val()}, 
							success: function(data){
								data = $.parseJSON(data); 
								$("#resposta").text(data.rg);
								$("#rg").val("");
							}
					});
				});
				
				$("#numero_identificador").blur(function(){
					var numero_identificador = $("#numero_identificador");
					$.ajax({ 
							url: 'model/pesquisar.php?acao=verificar_numero_identificador', 
							type: 'POST', 
							data:{"numero_identificador" : numero_identificador.val()}, 
							success: function(data){
								data = $.parseJSON(data); 
								$("#resposta_2").text(data.numero_identificador);
								$("#numero_identificador").val("");
							}
					});
				});
				
				$('#rg').mask('00.000.000-00');
				$('#telefone_1').mask('(00) 0 0000-0000');
				
				setInterval(function(){
     				$('#resposta').text("");
     			},10000);
			
				setInterval(function(){
     				$('#resposta_2').text("");
     			},3000);
				
				$('.close').click(function(e){					
     				$('.alert').hide();
     			});

     			setInterval(function(){
     				$('.alert').hide();
     			},4000);
				
				$("#btn_listar").click(function(e){
					window.location = "listar.php";
				});
			});
		</script>
	</head>
	<body>
	    <div id="wrapper">
	        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="sr-only"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
					<h2 style="margin-top:7px; margin-left:10px; color:#104170;"><strong>Ger</strong><strong style="color:red;">Party</strong></h2>
				</div>
	            <ul class="nav navbar-top-links navbar-right">
	                <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-user">
	                        <li>
								<a href="../../funcoes/funcoes.php?acao=sair"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	            <div class="navbar-default sidebar" role="navigation">
	                <div class="sidebar-nav navbar-collapse">
	                    <ul class="nav" id="side-menu">
	                        <li>
	                            <a href="../index.php"><i class="fa fa-home fa-fw"></i> Início</a>
	                        </li>
	                        <?php if($p['permissao_cliente'] == 1){ ?>
	                        <li>
	                            <a><i class="fa fa-users fa-fw"></i> Cliente<span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    <a href="../cliente/cadastrar.php" class="active">Cadastrar</a>
	                                </li>
	                                <li>
	                                    <a href="../cliente/listar.php">Listar</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <?php } ?>
	                        <?php if($p['permissao_categoria'] == 1){ ?>
	                        <li>
	                            <a><i class="fa fa-cube fa-fw"></i> Categoria<span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    <a href="../categoria/cadastrar.php">Cadastrar</a>
	                                </li>
	                                <li>
	                                    <a href="../categoria/listar.php" >Listar</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <?php } ?>
	                        <?php if($p['permissao_produto'] == 1){ ?>
	                        <li>
	                            <a><i class="fa fa-cubes fa-fw"></i> Produto<span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    <a href="../produto/cadastrar.php">Cadastrar</a>
	                                </li>
	                                <li>
	                                    <a href="../produto/listar.php">Listar</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <?php } ?>
	                        <?php if($p['permissao_venda'] == 1){ ?>
	                        <li>
	                            <a><i class="fa fa-shopping-cart fa-fw"></i> Venda<span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    <a href="../venda/cadastrar.php">Cadastrar</a>
	                                </li>
	                                <li>
	                                    <a href="../venda/listar.php">Listar</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <?php } ?>
	                        <?php if($p['permissao_caixa'] == 1){ ?>
	                        <li>
	                            <a><i class="fa fa-dollar fa-fw"></i> Caixa<span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    <a href="../caixa/pagamentos_pendentes.php">Pagamentos Pendentes</a>
	                                </li>
	                                <li>
	                                    <a href="../caixa/pagamentos_pagos.php">Pagamentos Pagos</a>
	                                </li>
	                                <li>
	                                    <a href="../caixa/extrato.php">Extrato</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <?php } ?>
							<?php if($p['permissao_relatorio'] == 1){ ?>
							<li>
	                            <a href="../relatorio/relatorio.php"><i class="fa fa-bar-chart-o fa-fw"></i> Relatório</a>
	                        </li>
	                        <?php } ?>
	                        <?php if($p['permissao_usuario'] == 1){ ?>
	                        <li>
	                            <a><i class="fa fa-user fa-fw"></i> Usuário<span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    <a href="../usuario/cadastrar.php">Cadastrar</a>
	                                </li>
	                                <li>
	                                    <a href="../usuario/listar.php">Listar</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <?php } ?>
	                        <?php if($p['permissao_email'] == 1){ ?>
	                        <li>
	                            <a href="../email/email.php"><i class="fa fa-envelope fa-fw"></i> E-mail</a>
	                        </li>
	                        <?php } ?>
							<?php if($p['permissao_blobo_notas'] == 1){ ?>
	                         <li>
	                            <a><i class="fa fa-file-text fa-fw"></i> Bloco de Notas<span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    <a href="../bloco_notas/cadastrar.php">Cadastrar</a>
	                                </li>
	                                <li>
	                                    <a href="../bloco_notas/listar.php">Listar</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <?php } ?>
	                    </ul>
	                </div>
	            </div>
	        </nav>
	        <div id="page-wrapper">
				<div class="row">
					<h2 class="page-header"><i class="fa fa-users default-color"></i> Cadastrar Cliente</h2>
				</div>
				<div class="row">
					<div class="panel panel-default" style="background-color: #f9f9f9;">
						<div class="panel-body">
							<?php if($p['permissao_cliente'] == 1){ ?>
								<form class="form-signin" id="form-signin" action="./model/inserir.php?acao=cadastrar_cliente" method="POST">
									<div class="col-sm-12 col-md-12 col-lg-12">
										<div class="pull-right col-sm-12 col-md-4 col-lg-2">
											<button id="btn_listar" class="btn btn-primary btn-block btn_listar" type="button" style="overflow:hidden;">Listar</button>
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="">Dados do Cliente</h3>
										<div class="col-sm-12 col-md-12 col-lg-12">
											<label for="nome_completo">Nome: </label>
											<input id="nome_completo" type="text" class="form-control" name="nome_completo" placeholder="" required="" autofocus="" value=""/>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top:10px;">
											<label for="rg">RG: </label>
											<input id="rg" type="text" class="form-control" name="rg" placeholder="" required="" autofocus="" value=""/>
											<div id='resposta'></div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top:10px;">
											<label for="data_nascimento">Data de Nascimento: </label>
											<input id="data_nascimento" type="date" class="form-control" name="data_nascimento" placeholder="" required="" autofocus="" value=""/>
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:30px;">Contato</h3>
										<div class="col-sm-6 col-md-6 col-lg-6">
											<label for="telefone_1">Celular: </label>
											<input id="telefone_1" type="text" class="form-control" name="telefone_1"  placeholder="" required="" autofocus="" value=""/>   
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top:10px;">
											<label for="email">E-mail: </label>
											<input id="email" type="email" class="form-control" name="email" placeholder="" required="" autofocus=""  value=""/>
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:30px;">Identificador</h3>
										<div class="col-sm-6 col-md-6 col-lg-6">
											<label for="numero_identificador">Número: </label>
											<input id="numero_identificador" type="text" class="form-control" name="numero_identificador" placeholder="" required="" autofocus=""  value=""/>
											<div id='resposta_2'></div>
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:30px;">Observação</h3>
										<div class="col-sm-12 col-md-12 col-lg-12">
											<textarea id="observacao" class="form-control" rows="5" name="observacao"  value=""></textarea>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:50px;">
											<div class="pull-right col-sm-12 col-md-4 col-lg-2">
												<button id="btn_cadastrar" class="btn btn-success btn-block" type="submit" style="overflow:hidden;">Cadastrar</button>
											</div>  						
										</div>  
										<div class="col-sm-12 col-md-12 col-lg-12" style="height:40px;"></div>  
									</div>						
								</form>	
							<?php }else{ ?>
								<h1 style="text-align:center; margin-top:150px;"><strong style="color:red;">Você não tem permissão para acessar essa página!</strong></h1>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
	    </div>
	    <script src="../../funcoes/vendor/jquery/jquery.min.js"></script>
	    <script src="../../funcoes/vendor/bootstrap/js/bootstrap.min.js"></script>
	    <script src="../../funcoes/vendor/metisMenu/metisMenu.min.js"></script>
	    <script src="../../js/sb-admin-2.js"></script>
	    <script src="../../js/jquery.mask.min.js"></script>
	</body>
</html>
