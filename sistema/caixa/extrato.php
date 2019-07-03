<?php require('./controller/extrato.php');?>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script language="javascript">
			$(document).ready(function(){
				$("#btn_pagos").click(function(e){
					window.location = "pagamentos_pagos.php";
				});
				
				$("#btn_pendentes").click(function(e){
					window.location = "pagamentos_pendentes.php";
				});
				
				$("#btn_print").click(function(e){
					window.open('print.php', '_blank');
				});
				
				$("#btn_filtro").click(function(e){
					var visivel  = $('#filtro').is(':visible');
					if(visivel){
						document.getElementById('filtro').style.display = 'none';
						$('#btn_filtro').text("Filtrar").attr({
							title:"Filtrar"
						});
					}else{
						document.getElementById('filtro').style.display = 'block';
						$('#btn_filtro').text("Fechar").attr({
							title:"Fechar"
						});
					}
				});
				
				$("#btn_limpar").click(function(e){
					$("#data_de").val("");
					$("#data_ate").val("");
					$('#form-filtro-fluxo-caixa').submit();
				});
				
				$("#btn_filtrar").click(function(e){ 
					var dateObj1 = new Date($('#data_de').val());
					var dateObj2 = new Date($('#data_ate').val());
				  
					if(dateObj1.getTime() > dateObj2.getTime()){
						$("#data_ate").val("");
						$('#data_ate').focus();
					} else{
						$('#form-filtro-fluxo-caixa').submit();
					}
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
	                                    <a href="../cliente/cadastrar.php">Cadastrar</a>
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
	                                    <a href="../caixa/extrato.php" class="active">Extrato</a>
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
					<h2 class="col-sm-12 col-md-12 col-lg-12 page-header"><i class="fa fa-dollar default-color"></i> Extrato</h2>
				</div>
				<div class="row">
					<div class="panel panel-default" style="background-color: #f9f9f9;">
						<div class="panel-body">
							<?php if($p['permissao_caixa'] == 1){ ?>
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="col-sm-2 col-md-2 col-lg-2">
										<button id="btn_filtro" class="btn btn-warning btn-block btn_filtro" type="button" style="overflow:hidden;">Filtrar</button>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6"></div>
									<div class="col-sm-2 col-md-2 col-lg-2">
										<button id="btn_pagos" class="btn btn-primary btn-block btn_pagos" type="button" style="overflow:hidden;">Pagos</button>
									</div>
									<div class="col-sm-2 col-md-2 col-lg-2">
										<button id="btn_pendentes" class="btn btn-primary btn-block btn_pendentes" type="button" style="overflow:hidden;">Pendentes</button>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12" id="filtro" style="display:none;">
										<div class="col-sm-8 col-md-8 col-lg-8" style="margin-top:20px; border:1px solid #ddd; border-radius:10px 10px 10px 10px; background-color:#eeeeee;">
											<form id="form-filtro-fluxo-caixa" action="extrato.php" method="post">
												<div class="col-sm-12 col-md-12 col-lg-12" style=" margin-bottom:15px;">
													<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:8px;">Filtrar por Data de Venda</h3>
													<div class="col-sm-4 col-md-4 col-lg-4">
														<label for="data_de">Data de: </label>
														<input id="data_de" type="date" class="form-control" name="data_de" value="<?php echo isset($data_de_d)?$data_de_d:'';?>"/>
													</div>
													<div class="col-sm-4 col-md-4 col-lg-4">
														<label for="data_ate">Data até: </label>
														<input id="data_ate" type="date" class="form-control" name="data_ate" value="<?php echo isset($data_ate_d)?$data_ate_d:'';?>"/>
													</div>
													<div class="col-sm-2 col-md-2 col-lg-2" style="margin-top:25px;">
														<button id="btn_filtrar" class="btn btn-success btn-block" type="button" style="overflow:hidden;">Filtrar</button>
													</div>  
													<div class="col-sm-2 col-md-2 col-lg-2" style="margin-top:25px;">
														<button id="btn_limpar" class="btn btn-warning btn-block" type="button" style="overflow:hidden;">Limpar</button>
													</div> 
												</div>
											</form> 
										</div>
										<div class="col-sm-4 col-md-4 col-lg-4"></div>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="col-sm-12 col-md-12 col-lg-12">
										<div class="col-sm-12 col-md-12 col-lg-12" style="border:1px solid #ddd; margin-top:20px; border-radius:5px; background-color:#fff;">
											<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="">Extrato <?php echo '<span>'.(isset($data_de_d)?date_format(date_create($data_de_d), 'd/m/Y'):"").(isset($data_ate_d)?' até '.date_format(date_create($data_ate_d), 'd/m/Y'):"").'</span>';?></h3>
											<div class="col-sm-12 col-md-12 col-lg-12">
												<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:10px; border-left:4px solid #2e6da4;">
													<span><b>Total de Vendas</b></span></br>
													<span>Valor: <?php echo isset($ct['valor_total'])?number_format($ct['valor_total'], 2,'.',''):"0.00";?></span></br>
												</div>
												<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:10px; border-left:4px solid #2e6da4;">
													<span><b>Pagamentos Pendentes</b></span></br>
													<span>Valor: <?php echo isset($pp['valor_total'])?number_format($pp['valor_total'], 2,'.',''):"0.00";?></span></br>
												</div>
												<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:10px; border-left:4px solid #2e6da4;">
													<span><b>Pagamentos Pagos</b></span></br>
													<span>Valor: <?php echo isset($pg['valor_total'])?number_format($pg['valor_total'], 2,'.',''):"0.00";?></span></br>
												</div>
												<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:10px;">
													<span><b></b></span></br>
													<span></span></br>
													<span></span></br>
												</div>
												<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:15px;"><hr/></div>
												<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:15px;">Pagamentos Pagos por Forma de Pagamento: </h3>
												<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:10px; border-left:4px solid #2e6da4;">
													<span><b>Dinheiro</b></span></br>
													<span>Valor: <?php echo isset($d['valor_total'])?number_format($d['valor_total'], 2,'.',''):"0.00";?></span></br>
												</div>
												<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:10px; border-left:4px solid #2e6da4;">
													<span><b>Cartão de Débito</b></span></br>
													<span>Valor: <?php echo isset($cd['valor_total'])?number_format($cd['valor_total'], 2,'.',''):"0.00";?></span></br>
												</div>
												<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:10px; border-left:4px solid #2e6da4;">
													<span><b>Cartão de Crédito</b></span></br>
													<span>Valor: <?php echo isset($cc['valor_total'])?number_format($cc['valor_total'], 2,'.',''):"0.00";?></span></br>
												</div>
												<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:10px; border-left:4px solid #2e6da4;">
													<span><b>Outros</b></span></br>
													<span>Valor: <?php echo isset($o['valor_total'])?number_format($o['valor_total'], 2,'.',''):"0.00";?></span></br>
												</div>
												<div class="col-sm-12 col-md-12 col-lg-12">
													<div class="col-sm-12 col-md-12 col-lg-12" style="height:20px;"></div>  
												</div>	 
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:40px;">
									<div class="pull-right col-sm-12 col-md-4 col-lg-2">
										<button id="btn_print" class="btn btn-success btn-block btn_print" type="button" style="overflow:hidden;">Imprimir</button>
									</div>  						
								</div> 
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="col-sm-12 col-md-12 col-lg-12" style="height:10px;"></div>  
								</div>	 
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
	</body>
</html>
