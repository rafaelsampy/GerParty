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
		<script  src="../../js/jquery-ui.min.js"></>
		<script src="../../js/jquery.livejquery.js"></script>
		<script src="../../js/j-alerts.js"></script>
		<script src="../../js/jquery-1.11.2.min.js"></script>
		<script src="../../js/jquery-2.1.3.min.js"></script>
		<script src="../../js/jquery-ui.min.js"></script>
		<script src="../../js/jquery.mask.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script language="javascript">
			$(document).ready(function(){
				$("#quantidade").click(function(e){
					var valor = $("#valor").val();
					var quantidade = $("#quantidade").val();
					$("#valor_total").val(parseFloat(quantidade*valor).toFixed(2));
				});
				
				$("#nome_produto").blur(function(){
					var nome_produto = $("#nome_produto");
					$.ajax({ 
						url: 'model/pesquisar.php?acao=valor_produto', 
						type: 'POST', 
						data:{"nome_produto" : nome_produto.val()}, 
						success: function(data){
							data = $.parseJSON(data); 
							$("#valor").val(data.valor);
							$("#valor_total").val(data.valor);
							$("#quantidade").val("1");
						}
					});
					
					if(nome_produto.val() == ''){
						$("#valor").val("");
						$("#valor_total").val("");
						$("#quantidade").val("1");
					}
				});
				
				$("#btn_voltar").click(function(e){
					window.location = "listar.php";
				});
				
				$( function() {
					$.widget( "custom.catcomplete", $.ui.autocomplete, {
						_create: function() {
							this._super();
							this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
						},
						_renderMenu: function( ul, items ) {
							var that = this,currentCategory = "";
							$.each( items, function( index, item ) {
								var li;
								if ( item.category != currentCategory ) {
									ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
									currentCategory = item.category;
								}
								li = that._renderItemData( ul, item );
								if ( item.category ) {
									li.attr( "aria-label", item.category + " : " + item.label );
								}
							});
						}
					});
				 
					$("#nome_produto").catcomplete({
						delay: 0,
						source: 'model/pesquisar_produtos.php?acao=produtos',
						select: function(event, ui){
							console.log(ui.valor);
						}
					});
				});
			});
		</script>
		<style>
			.ui-autocomplete-category {
				font-weight: bold;
				padding: .2em .4em;
				margin: .8em 0 .2em;
				line-height: 1.5;
			}
		</style>
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
	                                    <a href="../venda/listar.php" class="active">Listar</a>
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
					<h2 class="page-header"><i class="fa fa-shopping-cart default-color"></i> Editar Venda</h2>
				</div>
				<div class="row">
					<div class="panel panel-default" style="background-color: #f9f9f9;">
						<div class="panel-body">
							<?php if($p['permissao_venda'] == 1){ ?>
								<form class="form-signin" id="form-signin" action="./model/editar.php?acao=alterar_venda&id=<?php echo $_GET['id']?>" method="POST">	
									<div class="col-sm-12 col-md-12 col-lg-12">
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="">Dados do Cliente</h3>
										<div class="col-sm-3 col-md-3 col-lg-3">
											<label for="numero_identificador">N° Identificador: </label>
											<input id="numero_identificador" type="text" class="form-control" name="numero_identificador" placeholder="" required=""  readonly value="<?php echo isset($r['numero_identificador'])?$r['numero_identificador']:""?>"/>
										</div>
										<div class="col-sm-7 col-md-7 col-lg-7">
											<label for="nome_completo">Nome: </label>
											<input id="nome_completo" type="text" class="form-control" name="nome_completo" readonly placeholder="" required="" value="<?php echo isset($r['nome_completo'])?$r['nome_completo']:""?>"/>
										</div>
										<div class="col-sm-2 col-md-2 col-lg-2">
											<label for="idade">Idade: </label>
											<input id="idade" type="text" class="form-control" name="idade" readonly placeholder="" required="" value="<?php echo isset($idade)?$idade:""?>"/>
										</div>
										<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="margin-top:30px;">Produto</h3>
										<div class="col-sm-6 col-md-6 col-lg-6">
											<label for="nome_produto">Nome: </label>
											<input id="nome_produto" type="text" class="form-control" name="nome_produto" placeholder="" required="" autofocus=""  value="<?php echo isset($r['nome_produto'])?$r['nome_produto']:""?>"/>   
										</div>
										<div class="col-sm-2 col-md-2 col-lg-2">
											<label for="valor">Valor Unidade: </label>
											<input id="valor" type="text" class="form-control" name="valor" readonly placeholder="" required="" value="<?php echo isset($r['valor_produto'])?$r['valor_produto']:""?>"/>
										</div>
										<div class="col-sm-2 col-md-2 col-lg-2">
											<label for="quantidade"> Quantidade: </label>
											<input id="quantidade" type="number" class="form-control" name="quantidade" min="1" placeholder="" required="" autofocus="" value="<?php echo isset($r['quantidade'])?$r['quantidade']:""?>"/>
										</div>
										<div class="col-sm-2 col-md-2 col-lg-2">
											<label for="valor_total">Valor Total: </label>
											<input id="valor_total" type="text" class="form-control" name="valor_total" readonly value="<?php echo isset($valor_total)?number_format($valor_total, 2,'.',''):""?>"/>
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
		<script src="../../js/jquery-1.11.2.min.js"></script>
		<script src="../../js/jquery-2.1.3.min.js"></script>
		<script src="../../js/jquery-ui.min.js"></script>
	    <script src="../../funcoes/vendor/bootstrap/js/bootstrap.min.js"></script>
	    <script src="../../funcoes/vendor/metisMenu/metisMenu.min.js"></script>
	    <script src="../../js/sb-admin-2.js"></script>
	    <script src="../../js/jquery.mask.min.js"></script>
	</body>
	</body>
</html>
