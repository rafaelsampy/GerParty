<?php require('./controller/editar.php');?>
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
		<script src="../../js/jquery.mask.min.js"></script>
		<script language="javascript">
			$(document).ready(function(){
				$('#telefone_1').mask('(00) 0 0000-0000');
				$('#telefone_2').mask('(00) 0000-0000');
				
				$("#btn_voltar").click(function(e){
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
	                                    <a href="../usuario/listar.php" class="active">Listar</a>
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
					<h2 class="page-header"><i class="fa fa-user default-color"></i> Editar Usuário</h2>
				</div>
				<div class="row">
					<div class="panel panel-default" style="background-color: #f9f9f9;">
						<div class="panel-body">
							<?php if($p['permissao_usuario'] == 1){ ?>
								<form class="form-signin" id="form-signin" action="./model/editar.php?acao=alterar_usuario&id=<?php echo $_GET['id']?>" method="POST">
									<div class="col-sm-12 col-md-12 col-lg-12">
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="">Dados do Usuário</h3>
										<div class="col-sm-12 col-md-12 col-lg-12">
											<label for="nome_completo">Nome: </label>
											<input id="nome_completo" type="text" class="form-control" name="nome_completo" placeholder="" required="" readonly value="<?php echo isset($r['nome_completo'])?$r['nome_completo']:""?>"/>
										</div>
										<div class="col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;">
											<label for="data_nascimento">Data de Nascimento: </label>
											<input id="data_nascimento" type="date" class="form-control" name="data_nascimento" placeholder="" required="" autofocus="" value="<?php echo isset($r['data_nascimento'])?$r['data_nascimento']:""?>"/>
										</div>
										<div class="col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;">
											<label for="telefone_1">Celular: </label>
											<input id="telefone_1" type="text" class="form-control" name="telefone_1" placeholder="" required="" autofocus="" value="<?php echo isset($r['telefone_1'])?$r['telefone_1']:""?>"/>
										</div>
										<div class="col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;">
											<label for="telefone_2">Fixo: </label>
											<input id="telefone_2" type="text" class="form-control" name="telefone_2"  value="<?php echo isset($r['telefone_2'])?$r['telefone_2']:""?>"/>
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:30px;">Login</h3>
										<div class="col-sm-12 col-md-12 col-lg-12">
											<label for="email_login">E-mail: </label>
											<input id="email_login" type="text" class="form-control" name="email_login" readonly placeholder="" required="" value="<?php echo isset($r['email_login'])?$r['email_login']:""?>"/>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
											<label for="senha_login">Senha: </label>
											<input id="senha_login" type="text" class="form-control" name="senha_login" placeholder="" required="" autofocus="" value="<?php echo isset($r['senha_login'])?$r['senha_login']:""?>"/>   
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:30px;">Permissão</h3>
										<div class="checkbox col-sm-12 col-md-12 col-lg-12">
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_cliente" type="checkbox" name="permissao_cliente" value="1" <?php echo ($r['permissao_cliente']==1)?"checked":""?>>Cliente</label>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_categoria" type="checkbox" name="permissao_categoria" value="1" <?php echo ($r['permissao_categoria']==1)?"checked":""?>>Categoria</label>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_produto" type="checkbox" name="permissao_produto" value="1" <?php echo ($r['permissao_produto']==1)?"checked":""?>>Produto</label>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_venda" type="checkbox" name="permissao_venda" value="1" <?php echo ($r['permissao_venda']==1)?"checked":""?>>Venda</label>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_caixa" type="checkbox" name="permissao_caixa" value="1" <?php echo ($r['permissao_caixa']==1)?"checked":""?>>Caixa</label>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_relatorio" type="checkbox" name="permissao_relatorio"  value="1" <?php echo ($r['permissao_relatorio']==1)?"checked":""?>>Relatório</label>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_usuario" type="checkbox" name="permissao_usuario" value="1" <?php echo ($r['permissao_usuario']==1)?"checked":""?>>Usuário</label>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_email" type="checkbox" name="permissao_email" value="1" <?php echo ($r['permissao_email']==1)?"checked":""?>>E-mail</label>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label><input id="permissao_blobo_notas" type="checkbox" name="permissao_blobo_notas" value="1" <?php echo ($r['permissao_blobo_notas']==1)?"checked":""?>>Bloco de Notas</label>
											</div>
											<div class="col-sm-9 col-md-9 col-lg-9"></div>
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:30px;">Observação</h3>
										<div class="col-sm-12 col-md-12 col-lg-12">
											<textarea id="observacao" class="form-control" rows="5" name="observacao" ><?php echo isset($r['observacao'])?$r['observacao']:""?></textarea>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:50px;">
											<div class="pull-right col-sm-12 col-md-4 col-lg-2">
												<button id="btn_alterar" class="btn btn-success btn-block btn_alterar" type="submit" style="overflow:hidden;">Alterar</button>
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
		<script src="../../js/jquery.mask.min.js"></script>
	</body>
	</body>
</html>
