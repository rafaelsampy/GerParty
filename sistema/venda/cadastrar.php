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
	    <link href="../../css/jquery-ui.css" rel="stylesheet">
	    <link href="../../css/jquery-confirm.css" rel="stylesheet">
	    <link href="../../funcoes/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/jquery-1.11.2.min.js"></script>
		<script src="../../js/jquery-2.1.3.min.js"></script>
		<script src="../../js/jquery-ui.min.js"></script>
		<script src="../../js/jquery.mask.min.js"></script>
		<script src="../../js/jquery.livejquery.js"></script>
		<script src="../../js/jquery-confirm.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script language="javascript">
			$(document).ready(function(){
				$("#numero_identificador").keyup(function(){
					function idade(ano_aniversario, mes_aniversario, dia_aniversario) {
						var d = new Date,
							ano_atual = d.getFullYear(),
							mes_atual = d.getMonth() + 1,
							dia_atual = d.getDate(),

							ano_aniversario = +ano_aniversario,
							mes_aniversario = +mes_aniversario,
							dia_aniversario = +dia_aniversario,

							quantos_anos = ano_atual - ano_aniversario;

						if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
							quantos_anos--;
						}

						return quantos_anos < 0 ? 0 : quantos_anos;
					}
					
					var numero_identificador = $("#numero_identificador");
					
					$.ajax({ 
						url: 'model/pesquisar.php?acao=numero_identificador', 
						type: 'POST', 
						data:{"numero_identificador" : numero_identificador.val()}, 
						success: function(data){
							data = $.parseJSON(data); 
							if(data.nome_completo != ""){
								$("#nome_completo").val(data.nome_completo);
								var aux = data.data_nascimento.split("-");
								$("#idade").val(idade(aux[0],aux[1],aux[2]));
								$("#rg").val(data.rg);
							}else{
								$("#idade").val("");
								$("#nome_completo").val("");
							}
						}
					});
				});
				
				$('#btn_plus').click(function(e){
					var aux = $(this).closest(".produtos_append");
					if(aux.find(".aux-append:last-child").find('input[name="nome_produto[]"]').val() == '' || aux.find(".aux-append:last-child").find('input[name="valor[]"]').val() == '' || aux.find(".aux-append:last-child").find('input[name="quantidade[]"]').val() == '' || aux.find(".aux-append:last-child").find('input[name="valor_total[]"]').val() == '') {
						$.alert({
							title: 'Alerta!',
							content: 'Todos os campos do produto devem ser preenchidos.',
						});
					}else{
						aux.find(".aux-append:last-child").each(function(){
							$(this).clone().appendTo(aux);
							aux.find(".aux-append:last-child").find("input[type=text]").val('');
							aux.find(".aux-append:last-child").find("input[type=number]").val('');
							aux.find(".aux-append:last-child").find(".btn_trash").css('display','block');
						});
					}
				});
				
				$("button[name='btn_excluir_append[]']").livequery("click",function(e){
					$(this).closest(".aux-append").remove();
				});
				
				$('input[name="quantidade[]"]').livequery('click', function(){
					var valor = $(this).closest(".aux-append").find('input[name="valor[]"]').val();
					var quantidade = $(this).closest(".aux-append").find('input[name="quantidade[]"]').val();
					$(this).closest(".aux-append").find('input[name="valor_total[]"]').val(parseFloat(quantidade*valor).toFixed(2));
				});
				
				$('input[name="quantidade[]"]').livequery('change', function(){
					var valor = $(this).closest(".aux-append").find('input[name="valor[]"]').val();
					var quantidade = $(this).closest(".aux-append").find('input[name="quantidade[]"]').val();
					$(this).closest(".aux-append").find('input[name="valor_total[]"]').val(parseFloat(quantidade*valor).toFixed(2));
				});
				
				$('input[name="nome_produto[]"]').livequery('keypress', function(){
					$(this).blur(function(){
						var nome_produto = $(this);
						$.ajax({ 
							url: 'model/pesquisar.php?acao=valor_produto', 
							type: 'POST', 
							data:{"nome_produto" : nome_produto.val()}, 
							success: function(data){
								data = $.parseJSON(data); 
								nome_produto.closest(".aux-append").find('input[name="valor[]"]').val(data.valor);
								nome_produto.closest(".aux-append").find('input[name="valor_total[]"]').val(data.valor);
								nome_produto.closest(".aux-append").find('input[name="quantidade[]"]').val("1");
							}
						});
						
						if(nome_produto.val() == ''){
							$(this).closest(".aux-append").find('input[name="valor[]"]').val("");
							$(this).closest(".aux-append").find('input[name="valor_total[]"]').val("");
							$(this).closest(".aux-append").find('input[name="quantidade[]"]').val("1");
						}
					});
				});
				
				$("#btn_listar").click(function(e){
					window.location = "listar.php";
				});
				
				$('.close').click(function(e){					
					$('.alert').hide();
				});

				setInterval(function(){
					$('.alert').hide();
				},4000);
				
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
				 
					$('input[name="nome_produto[]"]').livequery('keypress', function(){
						$(this).catcomplete({
							delay: 0,
							source: 'model/pesquisar_produtos.php?acao=produtos',
							select: function(event, ui){
								console.log(ui.item.valor);
							}
						});
					});
					
					/*$('input[name="nome_produto[]"]').livequery('keypress', function(){
						$(this).catcomplete({
							source: 'model/pesquisar_produtos.php?acao=produtos',
							select: function(event, ui){
								if(ui.item.id != undefined){
									$(this).closest(".aux-append").find('input[name="valor[]"]').val(ui.item.valor);
									$(this).closest(".aux-append").find('input[name="valor_total[]"]').val(ui.item.valor);
									$(this).closest(".aux-append").find('input[name="quantidade[]"]').val("1");
								}
							}
						});
					});*/
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
	                                    <a href="../venda/cadastrar.php" class="active">Cadastrar</a>
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
					<h2 class="page-header"><i class="fa fa-shopping-cart default-color"></i> Cadastrar Venda</h2>
				</div>
				<div class="row">
					<div class="panel panel-default" style="background-color: #f9f9f9;">
						<div class="panel-body">
							<?php if($p['permissao_venda'] == 1){ ?>
								<form class="form-signin" id="form-signin" action="./model/inserir.php?acao=cadastrar_venda" method="POST">	
									<div class="col-sm-12 col-md-12 col-lg-12">
										<div class="col-sm-12 col-md-12 col-lg-12">
											<div class="pull-right col-sm-12 col-md-4 col-lg-2">
												<button id="btn_listar" class="btn btn-primary btn-block btn_listar" type="button" style="overflow:hidden;">Listar</button>
											</div>
											<h3 class="col-sm-12 col-md-12 col-lg-12 text-left" style="">Dados do Cliente</h3>
											<div class="col-sm-3 col-md-3 col-lg-3">
												<label for="numero_identificador">N° Identificador: </label>
												<input id="numero_identificador" type="text" class="form-control" name="numero_identificador" placeholder="" required="" autofocus="" value=""/>
											</div>
											<div class="col-sm-7 col-md-7 col-lg-7">
												<label for="nome_completo">Nome: </label>
												<input id="nome_completo" type="text" class="form-control" name="nome_completo" placeholder="" required="" autofocus="" readonly value=""/>
											</div>
											<div class="col-sm-2 col-md-2 col-lg-2">
												<label for="idade">Idade: </label>
												<input id="idade" type="text" class="form-control" name="idade" placeholder="" required="" autofocus="" readonly value=""/>
											</div>
											<div class="col-sm-12 col-md-12 col-lg-12" style="display:none;">
												<label for="rg">RG: </label>
												<input id="rg" type="text" class="form-control" name="rg" placeholder="" required="" autofocus="" readonly value=""/>
											</div>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-12 produtos_append">
											<h3 class="col-sm-11 col-md-11 col-lg-11 text-left" style="margin-top:30px;">Produto</h3>
											<div class="col-sm-1 col-md-1 col-lg-1"  style="margin-top:30px;">
												<button id="btn_plus" class="btn btn-primary btn-block" type="button"><i class="fa fa-plus fa-fw"></i></button>
											</div>
											<div class="aux-append">
												<div class="col-sm-5 col-md-5 col-lg-5">
													<label for="nome_produto">Nome: </label>
													<input type="text" class="form-control" name="nome_produto[]" placeholder="" required="" autofocus="" value=""/>   
												</div>
												<div class="col-sm-2 col-md-2 col-lg-2">
													<label for="valor">Valor Unidade: </label>
													<input type="text" class="form-control" name="valor[]" placeholder="" readonly value=""/>
												</div>
												<div class="col-sm-2 col-md-2 col-lg-2">
													<label for="quantidade"> Quantidade: </label>
													<input type="number" class="form-control" name="quantidade[]" placeholder="" min="1" required="" autofocus="" value="1"/>
												</div>
												<div class="col-sm-2 col-md-2 col-lg-2">
													<label for="valor_total">Valor Total: </label>
													<input type="text" class="form-control" name="valor_total[]" placeholder="" readonly value=""/>
												</div> 
												<div class="pull-right col-sm-1 col-md-1 col-lg-1 btn_trash" style="margin-top:27px; display:none;">
													<button name="btn_excluir_append[]" class="btn btn-danger btn-block" type="button" style="overflow:hidden;"><i class="fa fa-trash-o fa-fw"></i></button>
												</div>
											</div>
										</div> 
										<div id="div_plus" class="col-sm-12 col-md-12 col-lg-12" style="margin-top:10px; z-index = 9999999;"></div>
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
		<script src="../../js/jquery-1.11.2.min.js"></script>
		<script src="../../js/jquery-2.1.3.min.js"></script>
		<script src="../../js/jquery-ui.min.js"></script>
	    <script src="../../funcoes/vendor/bootstrap/js/bootstrap.min.js"></script>
	    <script src="../../funcoes/vendor/metisMenu/metisMenu.min.js"></script>
	    <script src="../../js/sb-admin-2.js"></script>
	    <script src="../../js/jquery.mask.min.js"></script>
		<script src="../../js/jquery.livejquery.js"></script>
		<script src="../../js/jquery-confirm.js"></script>
	</body>
</html>
