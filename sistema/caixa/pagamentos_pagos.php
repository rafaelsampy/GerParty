<?php require('./controller/pagamentos_pagos.php');?>
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
		<link href="../../css/jquery-confirm.css" rel="stylesheet">
	    <link href="../../css/jquery-ui.css" rel="stylesheet">
	    <link href="../../css/j-alerts.css" rel="stylesheet">
		<link href="../../css/style.css" rel="stylesheet">
	    <link href="../../funcoes/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/jquery-confirm.js"></script>
		<script  src="../../js/jquery-ui.min.js"></script>
		<script src="../../js/jquery.livejquery.js"></script>
		<script src="../../js/j-alerts.js"></script>
		<script src="../../js/paging.js"></script>
		<script language="javascript">
		$(document).ready(function(){
			$('.close').click(function(e){					
				$('.alert').hide();
			});

			setInterval(function(){
				$('.alert').hide();
			},4000);
			
			$("div[name=visualizar]").click(function(e){
				id = $(this).attr("id").split("-");
				window.location = "visualizar_pagamentos_pagos.php?id="+id[0];
			});
			
			$("div[name=estornar]").click(function(e){
				id = $(this).attr("id").split("-");
				jConfirm('Tem certeza que deseja estornar esse pagamento ?', 'Estornar Pagamento',function(result){
					if(result){
						window.location = "model/estornar.php?acao=estornar_pagamento&id="+id[0];
					}
				});
			});
		
			$("#btn_pendentes").click(function(e){
				window.location = "pagamentos_pendentes.php";
			});
			
			$("#btn_extrato").click(function(e){
				window.location = "extrato.php";
			});
			
			$("#btn_limpar_filtro").click(function(e){
				location.reload();
			});
			
			$(function(){
				$("#tabela input").keyup(function(){       
					var index = $(this).parent().index();
					var nth = "#tabela td:nth-child("+(index+1).toString()+")";
					var valor = $(this).val().toUpperCase();
					$("#tabela tbody tr").show();
					$(nth).each(function(){
						if($(this).text().toUpperCase().indexOf(valor) < 0){
							$(this).parent().hide();
						}
					});
				});
				
				$("#tabela input").blur(function(){
					$(this).val("");
				});
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
	                                    <a href="../caixa/pagamentos_pagos.php" class="active">Pagamentos Pagos</a>
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
					<h2 class="page-header"><i class="fa fa-dollar default-color"></i> Pagamentos Pagos</h2>
				</div>
				<div class="row">
					<div class="panel panel-default" style="background-color: #f9f9f9;">
						<div class="panel-body">
							<?php if($p['permissao_caixa'] == 1){ ?>
								<?php echo $mensagem ?>
								<div class="pull-right col-sm-12 col-md-4 col-lg-2">
									<button id="btn_extrato" class="btn btn-primary btn-block btn_extrato" type="button" style="overflow:hidden;">Extrato</button>
								</div>
								<div class="pull-right col-sm-12 col-md-4 col-lg-2">
									<button id="btn_pendentes" class="btn btn-primary btn-block btn_pendentes" type="button" style="overflow:hidden;">Pendentes</button>
								</div>
								<div class="pull-left col-sm-12 col-md-4 col-lg-2">
									<button id="btn_limpar_filtro" class="btn btn-warning btn-block btn_limpar_filtro" type="button" style="overflow:hidden;">Limpar Filtro</button>
								</div> 
								<div id="grid" class="col-sm-12 col-md-12 col-lg-12" style="display:block; margin-top:15px;">	
									<table id="tabela" class="col-sm-12 col-md-12 col-lg-12">
										<thead style="width:100%;  background-color:#ececec;">
											<tr style="width:100%;">
												<th style="width:10%; text-align:center; line-height: 28px;">#</th>
												<th style="width:20%; text-align:center; line-height: 28px;">Nome</th>
												<th style="width:15%; text-align:center; line-height: 28px;">RG</th>
												<th style="width:10%; text-align:center; line-height: 28px;">Idade</th>
												<th style="width:15%; text-align:center; line-height: 28px;">Valor Total</th>
												<th style="width:20%; text-align:center; line-height: 28px;">Data Pagamento</th>
												<th style="width:10%; text-align:center; line-height: 28px;">Ações</th>
											</tr>
											<tr style="width:100%;">
												<th style="width:10%; text-align:center; line-height: 28px;"></th>
												<th style="width:20%; text-align:center;"><input type="text" style="width:97%; margin:2px;"/></th>
												<th style="width:15%; text-align:center;"><input type="text" style="width:97%; margin:2px;"/></th>
												<th style="width:10%; text-align:center;"><input type="text" style="width:97%; margin:2px;"/></th>
												<th style="width:15%; text-align:center;"><input type="text" style="width:97%; margin:2px;"/></th>
												<th style="width:20%; text-align:center;"><input type="text" style="width:97%; margin:2px;"/></th>
												<th style="width:10%; text-align:center; line-height: 28px;"></th>
											</tr>            
										</thead>
										<tbody>
											<?php foreach($result as $r){ 
												if(isset($r['data_nascimento'])){
													date_default_timezone_set('America/Sao_Paulo');
													list($ano, $mes, $dia) = explode('-', $r['data_nascimento']);
													$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
													$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
													$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
												}
												$count--;?>
												<tr style="width:100%;">
													<td style="width:10%; text-align:center; background-color:#fff;"><?php echo isset($count)?$count:"-";?></td>
													<td style="width:20%; text-align:center; background-color:#fff;"><?php echo isset($r['nome_completo'])?$r['nome_completo']:"-";?></td>
													<td style="width:15%; text-align:center; background-color:#fff;"><?php echo isset($r['rg'])?$r['rg']:"-";?></td>
													<td style="width:10%; text-align:center; background-color:#fff;"><?php echo isset($r['data_nascimento'])?$idade<0?0:$idade:"-";?></td>
													<td style="width:15%; text-align:center; background-color:#fff;"><?php echo isset($r['valor_total'])?number_format($r['valor_total'], 2,'.',''):"-";?></td>
													<td style="width:20%; text-align:center; background-color:#fff;"><?php echo isset($r['data_pagamento'])?date_format(date_create($r['data_pagamento']), 'd/m/Y'):"-";?></td>
													<td style="width:10%; text-align:center; background-color:#fff;">
														<div id="<?php echo $r['id_pagamento']?>-visualizar" name="visualizar" class="fa fa-eye fa-fw" style="width:50%; height:29px; float:left; text-align:center;  white-space: nowrap;  line-height: 28px; font-size: 15px; background-color:#fff;" title="Visualizar"></div>
														<div id="<?php echo $r['id_pagamento']?>-estornar" name="estornar" class="fa fa-undo fa-fw" style="width:50%; height:29px; float:left; text-align:center; border-left:1px solid #000; white-space: nowrap; line-height: 28px; font-size: 15px; background-color:#fff;" title="Estornar"></div>	
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
									<br/>
									<div id="pageNav"></div>
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
		<script>
			var pager = new Pager('tabela', 11);
			pager.init();
			pager.showPageNav('pager', 'pageNav');
			pager.showPage(1);
		</script>
	</body>
</html>