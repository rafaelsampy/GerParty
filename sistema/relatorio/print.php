<?php require('./controller/relatorio.php');?>
<html>
	<head>
		<title>GerParty</title>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="shortcut icon" href="../../img/favicon/favicon.ico" type="image/x-icon">
		<script src="../../js/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../../js/fusioncharts.js"></script>
	</head>
	<body>
		<div style="width:700px; min-height:670px; margin:0 auto;">
			<div style="width:700px; height:90px; background:#F2F2F2; border:1px solid #666; border-radius:10px 10px 0px 0px;">
				<h1 style="margin-top:10px; margin-left:30px; color:#104170;"><strong>Ger</strong><strong style="color:red;">Party</strong></h1>
			</div>
			<div style="width:700px; min-height:460px; background:#F7F7F7; border-left:1px solid #666; border-right:1px solid #666;">
				<br>
				<?php if($p['permissao_relatorio'] == 1){ ?>
					<h2 style="margin-left:25px; margin-top:10px; text-align:center;">Relatórios - <?php echo '<span>'.(isset($_SESSION['data_de'])?date_format(date_create($_SESSION['data_de']), 'd/m/Y'):"").(isset($_SESSION['data_ate'])?' até '.date_format(date_create($_SESSION['data_ate']), 'd/m/Y'):"").'</span>';?></h2>
					<div class="col-sm-12 col-md-12 col-lg-12">	
						<div class="col-sm-7 col-md-7 col-lg-7" id="chart-container1" style="margin-top:20px; overflow:hidden;"></div>
						<div class="col-sm-5 col-md-5 col-lg-5" id="chart-container2" style="margin-top:20px; overflow:hidden;"></div>
						<div class="col-sm-12 col-md-12 col-lg-12" id="chart-container3" style="margin-top:20px; overflow:hidden;"></div>
						<div class="col-sm-6 col-md-6 col-lg-6" id="chart-container4" style="margin-top:20px; overflow:hidden;"></div>
						<div class="col-sm-6 col-md-6 col-lg-6" id="chart-container5" style="margin-top:20px; overflow:hidden;"></div>
						<div class="col-sm-12 col-md-12 col-lg-12" id="chart-container6" style="margin-top:20px; overflow:hidden;"></div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12" style="height:20px;"></div>
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
		<script src="../../funcoes/vendor/jquery/jquery.min.js"></script>
	    <script src="../../funcoes/vendor/bootstrap/js/bootstrap.min.js"></script>
	    <script src="../../funcoes/vendor/metisMenu/metisMenu.min.js"></script>
	    <script src="../../js/sb-admin-2.js"></script>
		<script>
			FusionCharts.ready(function () {
				var analysisChart = new FusionCharts({
					type: 'msstackedcolumn2dlinedy',
					renderAt: 'chart-container1',                            /* ID Gráfico */
					height: '430',                                           /* Height Gráfico */
					width: '100%',                                            /* Width Gráfico */
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"showvalues": "0",                               /* Valor Coluna*/
							"caption": "Vendas",
							"subCaption": "Status de Pagamento",
							"numberprefix": "R$ ",                           /* Prefixo Eixo X */
							"showBorder": "1",                               /* Borda */
							"borderColor": "#dddddd",                        /* Car Borda */
							"usePlotGradientColor": "0",                     /* Coluna Gradient */
							"plotBorderAlpha": "20",                         /* Borda Coluna */
							"paletteColors": "#32CD32,#FF0000",              /* Cor Coluna */
							"bgColor": "#ffffff",                            /* Cor Fundos */
							"canvasBgColor": "#ffffff",                      /* Cor Fundos Gráfico */
							"divlineColor": "#fffff",                        /* Cor Linhas Gráfico */
							"captionFontSize": "14",                         /* Tamanho Titulo */
							"subcaptionFontSize": "14",                      /* Tamanho SubTitulo */
							"chartRightMargin": "20",                        /* Margin Direita */
							"subcaptionFontBold": "0",                       /* Negrito SubTitulo */
							"legendItemFontSize": '14',                      /* Tamanho Filtro */
							"exportEnabled": "1",                            /* Exportar Gráfico */
							"labelDisplay": "wrap",                          /* Quebra Linha Legenda Eixo X */
							"legendShadow": '0',                             /* Shadow Filtro*/
							"showAlternateVGridColor": "0",                  /* Fundo Alternado Gráfico */
							"showCanvasBorder": "0",                         /* Borda Gráfico */
							"valueFontBold": "1",                            /* Negrito Valor Coluna */ 
							"valueFontSize": "14",                           /* Tamanho Valor Coluna */
							"toolTipBgColor": "#000000",                     /* Cor Fundos ToolTip */
							"valueFontColor": "#000000",                     /* Cor Valor Coluna */
							"divLineIsDashed": "1",     					 /* Tracejado Valor Eixo y*/                     
							"divLineDashLen": "1",    					     /* Linha Valor Eixo y */
							"legendItemFontColor": '#666666',                /* Cor Itens Filtro */
							"legendBgColor": "#ffffff",                      /* Cor Fundos Filtro */
							"toolTipColor": "#ffffff",                       /* Cor Texto ToolTip */
							"toolTipBgAlpha": "90",                          /* Opacity ToolTip */
							"toolTipPadding": "6",                           /* Padding ToolTip */
							"legendBorderAlpha": '0',                        /* Borda Filtro */ 
							"toolTipBorderRadius": "2",                      /* Radius ToolTip */
							"placeValuesInside": "0",                        /* Valor Fora/Dentro Coluna */
							"labelFontSize": "14",                           /* Tamanho Label */ 
							"showLabels": "1"                                /* Label*/
						},
						"categories": [
							{
								"category": [
									<?php
										if(isset($mes)){
											if(count($mes) > 0){
												for($i = 0; $i < count($mes); $i++){
													echo '{';
													
													switch($mes[$i]['mes']){
														case '01': $x = 'Jan'; break;
														case '02': $x = 'Fev'; break;
														case '03': $x = 'Mar'; break;
														case '04': $x = 'Abr'; break;
														case '05': $x = 'Mai'; break;
														case '06': $x = 'Jun'; break;
														case '07': $x = 'Jul'; break;
														case '08': $x = 'Ago'; break;
														case '09': $x = 'Set'; break;
														case '10': $x = 'Out'; break;
														case '11': $x = 'Nov'; break;
														case '12': $x = 'Dez'; break; 
													}
													
													echo '"label":"'.$x.'-'.$mes[$i]['ano'].'"';
													echo '}';
													if($i < count($mes)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"label":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"label":""';
											echo '}';
										}
									?>
								]
							}
						],
						"dataset": [
							{
								"dataset": [
									{
										"seriesname": "Pagos",
										"data": [
											<?php
												if(isset($pagamentos_pagos)){
													if(count($pagamentos_pagos) > 0){
														for($i = 0; $i < count($pagamentos_pagos); $i++){
															echo '{';
															echo '"value":"'.$pagamentos_pagos[$i]['valor_total'].'"';
															echo '}';
															if($i < count($pagamentos_pagos)-1){
																echo ',';
															}
														}
													}else{
														echo '{';
														echo '"value":""';
														echo '}';
													}
												}else{
													echo '{';
													echo '"value":""';
													echo '}';
												}
											?>
										]
									},
									{
										"seriesname": "Pendentes",
										"data": [
											<?php
												if(isset($pagamentos_pendentes)){
													if(count($pagamentos_pendentes) > 0){
														for($i = 0; $i < count($pagamentos_pendentes); $i++){
															echo '{';
															echo '"value":"'.$pagamentos_pendentes[$i]['valor_total'].'"';
															echo '}';
															if($i < count($pagamentos_pendentes)-1){
																echo ',';
															}
														}
													}else{
														echo '{';
														echo '"value":""';
														echo '}';
													}
												}else{
													echo '{';
													echo '"value":""';
													echo '}';
												}
											?>
										]
									}
								]
							}
						],
						"trendlines": [{
							"line": [
								{
									"startvalue": "<?php echo isset($media)?number_format(($media),2,'.',''):'0.00'?>",
									"color": "#337ab7",
									"valueOnRight": "1",
									"displayvalue": "Média de Vendas",
									"thickness" : "2"
								}
							]
						}]
					}
				}).render();
			});

			FusionCharts.ready(function () {
				var revenueChart = new FusionCharts({
					type: 'doughnut2d',
					renderAt: 'chart-container2',
					width: '100%',
					height: '430',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Valor Total",
							"subCaption": "Forma de Pagamento",
							"numberPrefix": "R$ ",
							"paletteColors": "#007b87,#FFFF00,#f0ad4e,#cc0066,#FF0000",
							"bgColor": "#ffffff",
							"showBorder": "1",                               /* Borda */
							"borderColor": "#dddddd",                        /* Car Borda */
							"exportEnabled": "1",                            /* Exportar Gráfico */
							"use3DLighting": "0",
							"showShadow": "0",
							"enableSmartLabels": "1",
							"labelDisplay": "wrap",
							"startingAngle": "310",
							"showLabels": "0",
							"showPercentValues": "1",
							"showLegend": "1",
							"legendShadow": "0",
							"legendBorderAlpha": "0",
							"defaultCenterLabel": "Vendas <?php echo isset($v['valor_total'])?number_format($v['valor_total'],2,'.',''):'0.00'?>",
							"centerLabel": "$label $value",
							"centerLabelBold": "1",
							"showTooltip": "0",
							"decimals": "0",
							"captionFontSize": "14",
							"subcaptionFontSize": "14",
							"labelFontSize": "14",                           /* Tamanho Label */ 
							"subcaptionFontBold": "0"
						},
						"data": [
							{
								"label": "Dinheiro",
								"value": "<?php echo isset($d['valor_total'])?number_format($d['valor_total'],2,'.',''):''?>"
							}, 
							{
								"label": "Débito",
								"value": "<?php echo isset($cd['valor_total'])?number_format($cd['valor_total'],2,'.',''):''?>"
							}, 
							{
								"label": "Crédito",
								"value": "<?php echo isset($cc['valor_total'])?number_format($cc['valor_total'],2,'.',''):''?>"
							}, 
							{
								"label": "Outros",
								"value": "<?php echo isset($o['valor_total'])?number_format($o['valor_total'],2,'.',''):''?>"
							}, 
							{
								"label": "Pendente",
								"value": "<?php echo isset($pen['valor_total'])?number_format($pen['valor_total'],2,'.',''):''?>"
							}
						]
					}
				}).render();
			});
			
			FusionCharts.ready(function() {
				var salesChart = new FusionCharts({
					type: 'msline',
					renderAt: 'chart-container3',
					width: '100%',
					height: '350',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Linha do Tempo",
							"subcaption": "Status e Forma de Pagamento",
							"linethickness": "2",
							"numberPrefix": "R$ ",
							"showBorder": "1",                               /* Borda */
							"borderColor": "#dddddd",                        /* Car Borda */
							"paletteColors": "#a221ee,#32CD32,#FF0000,#007b87,#FFFF00,#f0ad4e,#cc0066",           /* Cor Coluna */
							"formatnumberscale": "1",
							"exportEnabled": "1",                            /* Exportar Gráfico */
							"slantlabels": "1",
							"divLineAlpha": "40",
							"anchoralpha": "0",
							"drawAnchors": "1",
							"animation": "1",
							"drawCrossLine": "1",
							"crosslinecolor": "cc3300",
							"crossLineAlpha": "20",
							"tooltipGrayOutColor": "#80bfff",
							"theme": "zune",
							"showvalues": "1",                               /* Valor Coluna   0*/
							"usePlotGradientColor": "0",                     /* Coluna Gradient */
							"plotBorderAlpha": "20",                         /* Borda Coluna */
							"bgColor": "#ffffff",                            /* Cor Fundos */
							"canvasBgColor": "#ffffff",                      /* Cor Fundos Gráfico */
							"divlineColor": "#fffff",                        /* Cor Linhas Gráfico */
							"captionFontSize": "14",                         /* Tamanho Titulo */
							"subcaptionFontSize": "14",                      /* Tamanho SubTitulo */
							"chartRightMargin": "20",                        /* Margin Direita */
							"subcaptionFontBold": "0",                       /* Negrito SubTitulo */
							"legendItemFontSize": '14',                      /* Tamanho Filtro */
							"labelDisplay": "wrap",                          /* Quebra Linha Legenda Eixo X */
							"legendShadow": '0',                             /* Shadow Filtro*/
							"showAlternateVGridColor": "0",                  /* Fundo Alternado Gráfico */
							"showCanvasBorder": "0",                         /* Borda Gráfico */
							"valueFontBold": "1",                            /* Negrito Valor Coluna */ 
							"valueFontSize": "14",                           /* Tamanho Valor Coluna */
							"toolTipBgColor": "#000000",                     /* Cor Fundos ToolTip */
							"valueFontColor": "#666666",                     /* Cor Valor Coluna */
							"divLineIsDashed": "1",     					 /* Tracejado Valor Eixo y*/                     
							"divLineDashLen": "1",    					     /* Linha Valor Eixo y */
							"legendItemFontColor":'#666666',                /* Cor Itens Filtro */
							"legendBgColor": "#ffffff",                      /* Cor Fundos Filtro */
							"toolTipColor": "#ffffff",                       /* Cor Texto ToolTip */
							"toolTipBgAlpha": "90",                          /* Opacity ToolTip */
							"toolTipPadding": "6",                           /* Padding ToolTip */
							"legendBorderAlpha": '0',                        /* Borda Filtro   20*/ 
							"toolTipBorderRadius": "2",                      /* Radius ToolTip */
							"placeValuesInside": "0",                        /* Valor Fora/Dentro Coluna */
							"labelFontSize": "14",                           /* Tamanho Label */ 
							"showLabels": "1"                                /* Label*/
						},
						"categories": [
							{
								"category": [
									<?php
										if(isset($mes)){
											if(count($mes) > 0){
													for($i = 0; $i < count($mes); $i++){
													echo '{';
													
													switch($mes[$i]['mes']){
														case '01': $x = 'Jan'; break;
														case '02': $x = 'Fev'; break;
														case '03': $x = 'Mar'; break;
														case '04': $x = 'Abr'; break;
														case '05': $x = 'Mai'; break;
														case '06': $x = 'Jun'; break;
														case '07': $x = 'Jul'; break;
														case '08': $x = 'Ago'; break;
														case '09': $x = 'Set'; break;
														case '10': $x = 'Out'; break;
														case '11': $x = 'Nov'; break;
														case '12': $x = 'Dez'; break; 
													}
													
													echo '"label":"'.$x.'-'.$mes[$i]['ano'].'"';
													echo '}';
													if($i < count($mes)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"label":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"label":""';
											echo '}';
										}
									?>
								]
							}
						],
						"dataset": [
							{
								"seriesname": "Vendas",
								"data": [
									<?php
										if(isset($mes)){
											if(count($mes) > 0){
												for($i = 0; $i < count($mes); $i++){
													echo '{';
													echo '"value":"'.$mes[$i]['valor_total'].'"';
													echo '}';
													if($i < count($mes)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"value":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									?>
								]
							}, 
							{
								"seriesname": "Pagamentos Pagos",
								"data": [
									<?php
										if(isset($pagamentos_pagos)){
											if(count($pagamentos_pagos) > 0){
												for($i = 0; $i < count($pagamentos_pagos); $i++){
													echo '{';
													echo '"value":"'.$pagamentos_pagos[$i]['valor_total'].'"';
													echo '}';
													if($i < count($pagamentos_pagos)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"value":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									?>
								]
							}, 
							{
								"seriesname": "Pagamentos Pendentes",
								"data": [
									<?php
										if(isset($pagamentos_pendentes)){
											if(count($pagamentos_pendentes) > 0){
												for($i = 0; $i < count($pagamentos_pendentes); $i++){
													echo '{';
													echo '"value":"'.$pagamentos_pendentes[$i]['valor_total'].'"';
													echo '}';
													if($i < count($pagamentos_pendentes)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"value":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									?>
								]
							}, 
							{
								"seriesname": "Dinheiro",
								"data": [
									<?php
										if(isset($pagamentos_dinheiro)){
											if(count($pagamentos_dinheiro) > 0){
												for($i = 0; $i < count($pagamentos_dinheiro); $i++){
													echo '{';
													echo '"value":"'.$pagamentos_dinheiro[$i]['valor_total'].'"';
													echo '}';
													if($i < count($pagamentos_dinheiro)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"value":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									?>
								]
							}, 
							{
								"seriesname": "Débito",
								"data": [
									<?php
										if(isset($pagamentos_debito)){
											if(count($pagamentos_debito) > 0){
												for($i = 0; $i < count($pagamentos_debito); $i++){
													echo '{';
													echo '"value":"'.$pagamentos_debito[$i]['valor_total'].'"';
													echo '}';
													if($i < count($pagamentos_debito)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"value":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									?>
								]
							}, 
							{
								"seriesname": "Crédito",
								"data": [
									<?php
										if(isset($pagamentos_credito)){
											if(count($pagamentos_credito) > 0){
												for($i = 0; $i < count($pagamentos_credito); $i++){
													echo '{';
													echo '"value":"'.$pagamentos_credito[$i]['valor_total'].'"';
													echo '}';
													if($i < count($pagamentos_credito)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"value":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									?>
								]
							}, 
							{
								"seriesname": "Outros",
								"data": [
									<?php
										if(isset($pagamentos_outros)){
											if(count($pagamentos_outros) > 0){
												for($i = 0; $i < count($pagamentos_outros); $i++){
													echo '{';
													echo '"value":"'.$pagamentos_outros[$i]['valor_total'].'"';
													echo '}';
													if($i < count($pagamentos_outros)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"value":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									?>
								]
							}
						],
						"trendlines": [
							{
								"line": [
										{
										"startvalue": "<?php echo isset($media)?number_format(($media),2,'.',''):'0.00'?>",
										"color": "#337ab7",
										"valueOnRight": "1",
										"displayvalue": "Média de Vendas",
										"thickness" : "2"
									}
								]
							}
						]
					}
				}).render();
			});

			FusionCharts.ready(function () {
				var topStores = new FusionCharts({
					type: 'stackedbar2d',
					renderAt: 'chart-container4',                            /* ID Gráfico */
					height: '430',                                           /* Height Gráfico */
					width: '100%',                                           /* Width Gráfico */
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"showvalues": "1",                               /* Valor Coluna*/
							"caption": "Os Produtos Mais Vendidos",       /* Titulo */
							"numberprefix": "R$ ",                           /* Prefixo Eixo X */
							"showBorder": "1",                               /* Borda */
							"borderColor": "#dddddd",                        /* Car Borda */
							"paletteColors": "#32CD32",                      /* Cor Coluna */
							"bgColor": "#ffffff",                            /* Cor Fundos */
							"canvasBgColor": "#ffffff",                      /* Cor Fundos Gráfico */
							"divlineColor": "#ffffff",                       /* Cor Linhas Gráfico */
							"captionFontSize": "14",                         /* Tamanho Titulo */
							"chartRightMargin": "40",                        /* Margin Direita */
							"legendItemFontSize": '14',                      /* Tamanho Filtro */
							"exportEnabled": "1",                            /* Exportar Gráfico */
							"labelDisplay": "wrap",                          /* Quebra Linha Legenda Eixo X */
							"yAxisNameFontSize": "14",                       /* Tamanho Legenda Eixo Y */
							"xAxisNameFontSize": "14",                       /* Tamanho Legenda Eixo X */
							"legendShadow": '0',                             /* Shadow Filtro*/
							"valueFontBold": "1",                            /* Negrito Valor Coluna */ 
							"valueFontSize": "12",                           /* Tamanho Valor Coluna */
							"toolTipBgColor": "#000000",                     /* Cor Fundos ToolTip */
							"valueFontColor": "#ffffff",                     /* Cor Valor Coluna */
							"divLineIsDashed": "0",     					 /* Tracejado Valor Eixo y*/                     
							"divLineDashLen": "0",    					     /* Linha Valor Eixo y */
							"legendItemFontColor": '#666666',                /* Cor Itens Filtro */
							"legendBgColor": "#ffffff",                      /* Cor Fundos Filtro */
							"toolTipColor": "#ffffff",                       /* Cor Texto ToolTip */
							"toolTipBgAlpha": "90",                          /* Opacity ToolTip */
							"toolTipPadding": "6",                           /* Padding ToolTip */
							"legendBorderAlpha": '0',                        /* Borda Filtro */ 
							"placeValuesInside": "1",                        /* Valor Fora/Dentro Coluna */
							"toolTipBorderRadius": "2",                      /* Radius ToolTip */
							"showCanvasBorder": "0",                         /* Borda Gráfico */
							"usePlotGradientColor": "0",                     /* Coluna Gradient */
							"plotBorderAlpha": "20",                         /* Borda Coluna */
							"showAxisLines": "1",                            /* Linha Eixo X e Y */
							"axisLineAlpha": "20",                           /* Borda Eixo X e Y */
							"showAlternateVGridColor": "0",                  /* Fundo Alternado Gráfico */
							"showLegend": '0',                               /* Filtro */ 
							"labelFontSize": "14",                           /* Tamanho Label */ 
							"showLabels": "1",                               /* Label*/
							"scrollheight": "10",
							"flatScrollBars": "1",
							"scrollShowButtons": "0",
							"scrollColor": "#cccccc",
							"showHoverEffect": "1"
						},
						"categories": [{
							"category": [
								<?php
									if(isset($mais_vendidos)){
										if(count($mais_vendidos) > 0){
											for($i = 0; $i < count($mais_vendidos); $i++){
												echo '{';
												echo '"label":"'.$mais_vendidos[$i]['nome'].'"';
												echo '}';
												if($i < count($mais_vendidos)-1){
													echo ',';
												}
											}
										}else{
											echo '{';
											echo '"label":""';
											echo '}';
										}
									}else{
										echo '{';
										echo '"label":""';
										echo '}';
									}
								?>
							]
						}],            
						"dataset": [{
							"seriesname": "Total de Vendas",
							"data": [
								<?php
									if(isset($mais_vendidos)){
										if(count($mais_vendidos) > 0){
											for($i = 0; $i < count($mais_vendidos); $i++){
												echo '{';
												echo '"value":"'.$mais_vendidos[$i]['valor_total'].'"';
												echo '}';
												if($i < count($mais_vendidos)-1){
													echo ',';
												}
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									}else{
										echo '{';
										echo '"value":""';
										echo '}';
									}
								?>
							]
						}]
					}
				}).render();
			});
			
			FusionCharts.ready(function () {
				var topStores = new FusionCharts({
					type: 'stackedbar2d',
					renderAt: 'chart-container5',                            /* ID Gráfico */
					height: '430',                                           /* Height Gráfico */
					width: '100%',                                            /* Width Gráfico */
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"showvalues": "1",                               /* Valor Coluna*/
							"caption": "Os Produtos Menos Vendidos",      /* Titulo */
							"numberprefix": "R$ ",                           /* Prefixo Eixo X */
							"showBorder": "1",                               /* Borda */
							"borderColor": "#dddddd",                        /* Car Borda */
							"paletteColors": "#FF0000",                      /* Cor Coluna */
							"bgColor": "#ffffff",                            /* Cor Fundos */
							"canvasBgColor": "#ffffff",                      /* Cor Fundos Gráfico */
							"divlineColor": "#ffffff",                       /* Cor Linhas Gráfico */
							"captionFontSize": "14",                         /* Tamanho Titulo */
							"chartRightMargin": "40",                        /* Margin Direita */
							"exportEnabled": "1",                            /* Exportar Gráfico */
							"labelDisplay": "wrap",                          /* Quebra Linha Legenda Eixo X */
							"valueFontBold": "1",                            /* Negrito Valor Coluna */ 
							"valueFontSize": "12",                           /* Tamanho Valor Coluna */
							"toolTipBgColor": "#000000",                     /* Cor Fundos ToolTip */
							"valueFontColor": "#ffffff",                     /* Cor Valor Coluna */
							"divLineIsDashed": "0",     					 /* Tracejado Valor Eixo y*/                     
							"divLineDashLen": "0",    					     /* Linha Valor Eixo y */
							"toolTipColor": "#ffffff",                       /* Cor Texto ToolTip */
							"toolTipBgAlpha": "90",                          /* Opacity ToolTip */
							"toolTipPadding": "6",                           /* Padding ToolTip */
							"placeValuesInside": "1",                        /* Valor Fora/Dentro Coluna */
							"toolTipBorderRadius": "2",                      /* Radius ToolTip */
							"showCanvasBorder": "0",                         /* Borda Gráfico */
							"usePlotGradientColor": "0",                     /* Coluna Gradient */
							"plotBorderAlpha": "20",                         /* Borda Coluna */
							"showAxisLines": "1",                            /* Linha Eixo X e Y */
							"axisLineAlpha": "20",                           /* Borda Eixo X e Y */
							"showAlternateVGridColor": "0",                  /* Fundo Alternado Gráfico */
							"labelFontSize": "14",                           /* Tamanho Label */ 
							"showLabels": "1",                               /* Label*/
							"showLegend": '0',                               /* Filtro */ 
							"scrollheight": "10",
							"flatScrollBars": "1",
							"scrollShowButtons": "0",
							"scrollColor": "#cccccc",
							"showHoverEffect": "1"
						},
						"categories": [{
							"category": [
								<?php
									if(isset($menos_vendidos)){
										if(count($menos_vendidos) > 0){
											for($i = 0; $i < count($menos_vendidos); $i++){
												echo '{';
												echo '"label":"'.$menos_vendidos[$i]['nome'].'"';
												echo '}';
												if($i < count($menos_vendidos)-1){
													echo ',';
												}
											}
										}else{
											echo '{';
											echo '"label":""';
											echo '}';
										}
									}else{
										echo '{';
										echo '"label":""';
										echo '}';
									}
								?>
							]
						}],            
						"dataset": [{
							"seriesname": "Total de Vendas",
							"data": [
								<?php
									if(isset($menos_vendidos)){
										if(count($menos_vendidos) > 0){
											for($i = 0; $i < count($menos_vendidos); $i++){
												echo '{';
												echo '"value":"'.$menos_vendidos[$i]['valor_total'].'"';
												echo '}';
												if($i < count($menos_vendidos)-1){
													echo ',';
												}
											}
										}else{
											echo '{';
											echo '"value":""';
											echo '}';
										}
									}else{
										echo '{';
										echo '"value":""';
										echo '}';
									}
								?>
							]
						}]
					}
				}).render();
			});
			
			FusionCharts.ready(function () {
				var analysisChart = new FusionCharts({
					type: 'msstackedcolumn2dlinedy',
					renderAt: 'chart-container6',                            /* ID Gráfico */
					height: '350',                                           /* Height Gráfico */
					width: '100%',                                            /* Width Gráfico */
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"showvalues": "1",                               /* Valor Coluna*/
							"caption": "Vendas",
							"subCaption": "Categorias",
							"numberprefix": "R$ ",                           /* Prefixo Eixo X */
							"showBorder": "1",                               /* Borda */
							"borderColor": "#dddddd",                        /* Car Borda */
							"usePlotGradientColor": "0",                     /* Coluna Gradient */
							"plotBorderAlpha": "20",                         /* Borda Coluna */
							"paletteColors": "#00c5b6",
							"bgColor": "#ffffff",                            /* Cor Fundos */
							"canvasBgColor": "#ffffff",                      /* Cor Fundos Gráfico */
							"divlineColor": "#fffff",                        /* Cor Linhas Gráfico */
							"captionFontSize": "14",                         /* Tamanho Titulo */
							"subcaptionFontSize": "14",                      /* Tamanho SubTitulo */
							"chartRightMargin": "20",                        /* Margin Direita */
							"subcaptionFontBold": "0",                       /* Negrito SubTitulo */
							"legendItemFontSize": '14',                      /* Tamanho Filtro */
							"exportEnabled": "1",                            /* Exportar Gráfico */
							"labelDisplay": "wrap",                          /* Quebra Linha Legenda Eixo X */
							"legendShadow": '0',                             /* Shadow Filtro*/
							"showAlternateVGridColor": "0",                  /* Fundo Alternado Gráfico */
							"showCanvasBorder": "0",                         /* Borda Gráfico */
							"valueFontBold": "1",                            /* Negrito Valor Coluna */ 
							"valueFontSize": "14",                           /* Tamanho Valor Coluna */
							"toolTipBgColor": "#000000",                     /* Cor Fundos ToolTip */
							"valueFontColor": "#ffffff",                     /* Cor Valor Coluna */
							"divLineIsDashed": "1",     					 /* Tracejado Valor Eixo y*/                     
							"divLineDashLen": "1",    					     /* Linha Valor Eixo y */
							"legendItemFontColor": '#666666',                /* Cor Itens Filtro */
							"legendBgColor": "#ffffff",                      /* Cor Fundos Filtro */
							"toolTipColor": "#ffffff",                       /* Cor Texto ToolTip */
							"toolTipBgAlpha": "90",                          /* Opacity ToolTip */
							"toolTipPadding": "6",                           /* Padding ToolTip */
							"legendBorderAlpha": '0',                        /* Borda Filtro */ 
							"toolTipBorderRadius": "2",                      /* Radius ToolTip */
							"placeValuesInside": "0",                        /* Valor Fora/Dentro Coluna */
							"labelFontSize": "14",                           /* Tamanho Label */ 
							"showLabels": "1"                                /* Label*/
						},
						"categories": [
							{
								"category": [
									<?php
										if(isset($vendas_categoria)){
											if(count($vendas_categoria) > 0){
												for($i = 0; $i < count($vendas_categoria); $i++){
													echo '{';
													echo '"label":"'.$vendas_categoria[$i]['nome'].'"';
													echo '}';
													if($i < count($vendas_categoria)-1){
														echo ',';
													}
												}
											}else{
												echo '{';
												echo '"label":""';
												echo '}';
											}
										}else{
											echo '{';
											echo '"label":""';
											echo '}';
										}
									?>
								]
							}
						],
						"dataset": [
							{
								"dataset": [
									{
										"seriesname": "Categorias",
										"data": [
											<?php
												if(isset($vendas_categoria)){
													if(count($vendas_categoria) > 0){
														for($i = 0; $i < count($vendas_categoria); $i++){
															echo '{';
															echo '"value":"'.$vendas_categoria[$i]['valor_total'].'"';
															echo '}';
															if($i < count($vendas_categoria)-1){
																echo ',';
															}
														}
													}else{
														echo '{';
														echo '"value":""';
														echo '}';
													}
												}else{
													echo '{';
													echo '"value":""';
													echo '}';
												}
											?>
										]
									}
								]
							}
						],
						"trendlines": [{
							"line": [
								{
									"startvalue": "<?php echo isset($media)?number_format(($media),2,'.',''):'0.00'?>",
									"color": "#337ab7",
									"valueOnRight": "1",
									"displayvalue": "Média de Vendas",
									"thickness" : "2"
								}
							]
						}]
					}
				}).render();
			});
			
			//window.print();
		</script>
	</body>
</html>
