<?php require('./controller/pagar_pagamentos_pendentes.php');?>
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
	    <link href="../../funcoes/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/jquery-confirm.js"></script>
		<script  src="../../js/jquery-ui.min.js"></script>
		<script src="../../js/jquery.livejquery.js"></script>
		<script src="../../js/j-alerts.js"></script>
		<script language="javascript">
			$(document).ready(function(){
				$("#btn_voltar").click(function(e){
					window.location = "pagamentos_pendentes.php";
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
	                                    <a href="../caixa/pagamentos_pendentes.php" class="active">Pagamentos Pendentes</a>
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
					<h2 class="page-header"><i class="fa fa-dollar default-color"></i> Pagar Pagamento Pendente</h2>
				</div>
				<div class="row">
					<div class="panel panel-default" style="background-color: #f9f9f9;">
						<div class="panel-body">
							<?php if($p['permissao_caixa'] == 1){ ?>
								<form class="form-signin" id="form-signin" action="./model/editar.php?acao=pagar_pagamento_pendente&id=<?php echo $r['id']?>" method="POST">	
									<div class="col-sm-12 col-md-12 col-lg-12">
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="">Dados do Cliente</h3>
										<div class="col-sm-3 col-md-3 col-lg-3">
											<label for="numero_identificador">N° Identificador: </label>
											<input id="numero_identificador" type="text" class="form-control" name="numero_identificador" readonly value="<?php echo isset($r['numero_identificador'])?$r['numero_identificador']:""?>"/>
										</div>
										<div class="col-sm-4 col-md-4 col-lg-4">
											<label for="nome_completo">Nome: </label>
											<input id="nome_completo" type="text" class="form-control" name="nome_completo" readonly value="<?php echo isset($r['nome_completo'])?$r['nome_completo']:""?>"/>
										</div>
										<div class="col-sm-3 col-md-3 col-lg-3">
											<label for="rg">RG: </label>
											<input id="rg" type="text" class="form-control" name="rg" readonly value="<?php echo isset($r['rg'])?$r['rg']:""?>"/>
										</div>
										<div class="col-sm-2 col-md-2 col-lg-2">
											<label for="idade">Idade: </label>
											<input id="idade" type="text" class="form-control" name="idade" readonly value="<?php echo isset($idade)?$idade:""?>"/>
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="">Dados da Venda</h3>
										<div class="col-sm-12 col-md-12 col-lg-12">
											<div style="width:15%; float:left; text-align:center; border-top:1px solid #777; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; font-weight: bold; background: #f6f6f6;">ID</div>
											<div style="width:15%; float:left; text-align:center; border-top:1px solid #777; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; font-weight: bold; background: #f6f6f6;">Data Venda</div>
											<div style="width:25%; float:left; text-align:center; border-top:1px solid #777; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; font-weight: bold; background: #f6f6f6;">Produto</div>
											<div style="width:15%; float:left; text-align:center; border-top:1px solid #777; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; font-weight: bold; background: #f6f6f6;">Valor</div>
											<div style="width:15%; float:left; text-align:center; border-top:1px solid #777; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; font-weight: bold; background: #f6f6f6;">Quantidade</div>
											<div style="width:15%; float:left; text-align:center; border-top:1px solid #777; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; font-weight: bold; background: #f6f6f6; border-right:1px solid #777; ">Valor Total</div>
										</div>
										<div class="grid col-sm-12 col-md-12 col-lg-12" style="display:block;">	
											<?php foreach($produtos as $pd){?>
												<div style="width:15%; float:left; text-align:center; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px;  background: #FFF;"><?php echo isset($pd['id'])?$pd['id']:"-";?></div> 
												<div style="width:15%; float:left; text-align:center; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px;  background: #FFF;"><?php echo isset($pd['data_venda'])?date_format(date_create($pd['data_venda']), 'd/m/Y'):"-";?></div> 
												<div style="width:25%; float:left; text-align:center; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; background: #FFF;"><?php echo isset($pd['nome_produto'])?$pd['nome_produto']:"-";?></div>
												<div style="width:15%; float:left; text-align:center; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; background: #FFF;"><?php echo isset($pd['valor_prodtudo'])?$pd['valor_prodtudo']:"-";?></div>
												<div style="width:15%; float:left; text-align:center; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; background: #FFF;"><?php echo isset($pd['quantidade'])?$pd['quantidade']:"-";?></div>
												<div style="width:15%; float:left; text-align:center; border-left:1px solid #777; white-space: nowrap; border-bottom:1px solid #777; line-height: 28px; font-size: 13px; background: #FFF;border-right:1px solid #777; "><?php echo isset($pd['valor_total'])?number_format($pd['valor_total'], 2,'.',''):"-";?></div>
											<?php } ?>
										</div>
										<div class="col-sm-3 col-md-3 col-lg-3" style="margin-top:20px;">
											<label for="valor_total">Valor Total: </label>
											<input id="valor_total" type="text" class="form-control" name="valor_total" readonly value="<?php echo isset($valor_total)?number_format($valor_total, 2,'.',''):"-";?>"/>   
										</div>
										<div class="col-sm-4 col-md-4 col-lg-4" style="margin-top:20px;">
											<label for="forma_pagamento">Forma de Pagamento: </label>
											<select class="form-control" id="forma_pagamento" name="forma_pagamento"  placeholder="" required="" autofocus="" >
												<?php foreach($forma_pagamento as $fp){
													echo "<option value='".$fp['id']."'>".$fp['nome']."</option>";
												}?>
											</select>
										</div>
										<div class="col-sm-5 col-md-5 col-lg-5" style="margin-top:20px;"></div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:30px;">Observação</h3>
										<div class="col-sm-12 col-md-12 col-lg-12">
											<textarea id="observacao" class="form-control" rows="5" name="observacao"  value=""></textarea>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:50px;">
											<div class="pull-right col-sm-12 col-md-4 col-lg-2">
												<button id="btn_alterar" class="btn btn-success btn-block btn_alterar" type="submit" style="overflow:hidden;">Pagar</button>
											</div>  
											<div class="pull-right col-sm-12 col-md-4 col-lg-2">
												<button id="btn_voltar" class="btn btn-warning btn-block btn_voltar" type="button" style="overflow:hidden;">Voltar</button>
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
	</body>
	</body>
</html>
