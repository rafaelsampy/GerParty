// JavaScript Document

function gridJwidget(tabela,url,colunas,acoes,idDiv,tema,virtual,paginacao,ordenacao,filtro){

	if(virtual != true) virtual = false;

	if(paginacao != true) paginacao = false;

	if(ordenacao != true) ordenacao = false;

	

	datafields = [];

	for(i = 0; i < colunas.length; i++){

		datafields[i] = {name: colunas[i].datafield};

	}

	

	var source = {

		datatype: "json",

		datafields: datafields,

		url: url,

		root: 'rows',

		cache: false,

		filter: function(){

			$("#"+idDiv).jqxGrid('updatebounddata', 'filter');

		},

		sort: function(){

			 if(ordenacao){

			 	$("#"+idDiv).jqxGrid('updatebounddata', 'sort');

			 }

		},

		beforeprocessing: function(data){		

			if(virtual){

				if (data != null){

					source.totalrecords = data.totalRows;			

				}

			}

		}

	}

	

	var dataadapter = new $.jqx.dataAdapter(source, {loadError: function(xhr, status, error){

			jAlert("A grid não carregou corretamente! Faça o login novamente e se o erro persistir,nos informe.","Alerta!");

		}

	});

	

	var actionsrender = function (row, columnfield, value, defaulthtml, columnproperties, grid) {

		grid = idDiv;

		botoes='';

		btnAlterar = '<input type="button" class="botao branco center icon-alterar grid" id="'+value+'-btnAlterar-'+grid+'" name="btnAlterar-'+grid+'" title="Alterar">';

		btnBaixar = '<input type="button" class="botao branco center icon-baixar grid" id="'+value+'-btnBaixar-'+grid+'" name="btnBaixar-'+grid+'" title="Baixar">';

		btnBloquear = '<input type="button" class="botao branco center icon-bloquear grid" id="'+value+'-btnBloquear-'+grid+'" name="btnBloquear-'+grid+'" title="Bloquear">';

		btnDesativar = '<input type="button" class="botao branco center icon-bloquear grid" id="'+value+'-btnDesativar-'+grid+'" name="btnDesativar-'+grid+'" title="Desativar">';

		btnBloqueado = '<input type="button" class="botao branco center icon-bloqueado grid" id="'+value+'-btnBloqueado-'+grid+'" name="btnBloqueado-'+grid+'" title="Ação bloqueada">';

		btnCancelar = '<input type="button" class="botao branco center icon-cancelar grid" id="'+value+'-btnCancelar-'+grid+'" name="btnCancelar-'+grid+'" title="Cancelar">';

		btnDesbloquear = '<input type="button" class="botao branco center icon-desbloquear grid" id="'+value+'-btnDesbloquear-'+grid+'" name="btnDesbloquear-'+grid+'" title="Desbloquear">';
		
		btnEfetivar = '<input type="button" class="botao branco center icon-pagar grid" id="'+value+'-btnEfetivar-'+grid+'" name="btnEfetivar-'+grid+'" title="Efetivar">';

		btnEmail = '<input type="button" class="botao branco center icon-email grid" id="'+value+'-btnEmail-'+grid+'" name="btnEmail-'+grid+'" title="Enviar email">';

		btnExcel = '<input type="button" class="botao branco center icon-excel grid" id="'+value+'-btnExcel-'+grid+'" name="btnExcel-'+grid+'" title="Gerar EXCEL">';

		btnExcluir = '<input type="button" class="botao branco center icon-excluir grid" id="'+value+'-btnExcluir-'+grid+'" name="btnExcluir-'+grid+'" title="Excluir">';

		btnFilaImpressao = '<input type="button" class="botao branco center icon-fila-impressao grid" id="'+value+'-btnFilaImpressao-'+grid+'" name="btnFilaImpressao-'+grid+'" title="Adicionar a fila de impressão">';

		btnImprimir = '<input type="button" class="botao branco center icon-imprimir grid" id="'+value+'-btnImprimir-'+grid+'" name="btnImprimir-'+grid+'" title="Imprimir">';

		btnAtivar = '<input type="button" class="botao branco center icon-liberar grid" id="'+value+'-btnAtivar-'+grid+'" name="btnAtivar-'+grid+'" title="Ativar">';

		btnNfe = '<input type="button" class="botao branco center icon-nfe grid" id="'+value+'-btnNfe-'+grid+'" name="btnNfe-'+grid+'" title="Gerar NFe">';

		btnObservacao = '<input type="button" class="botao branco center icon-observacao grid" id="'+value+'-btnObservacao-'+grid+'" name="btnObservacao-'+grid+'" title="Observação">';

		btnPagar = '<input type="button" class="botao branco center icon-pagar grid" id="'+value+'-btnPagar-'+grid+'" name="btnPagar-'+grid+'" title="Pagar">';

		btnPdf = '<input type="button" class="botao branco center icon-pdf grid" id="'+value+'-btnPdf-'+grid+'" name="btnPdf-'+grid+'" title="Gerar PDF">';

		btnReceber = '<input type="button" class="botao branco center icon-receber grid" id="'+value+'-btnReceber-'+grid+'" name="btnReceber-'+grid+'" title="Receber">';

		btnRetirar = '<input type="button" class="botao branco center icon-retirar grid" id="'+value+'-btnRetirar-'+grid+'" name="btnRetirar-'+grid+'" title="Retirar">';

		btnTrocarConsignatario = '<input type="button" class="botao branco center icon-trocar grid" id="'+value+'-btnTrocarConsignatario-'+grid+'" name="btnTrocarConsignatario-'+grid+'" title="Trocar consignatário">';

		btnAgendar = '<input type="button" class="botao branco center icon-calendario grid" id="'+value+'-btnAgendar-'+grid+'" name="btnAgendar-'+grid+'" title="Agendar">';

		btnTrocarProduto = '<input type="button" class="botao branco center icon-trocar-produto grid" id="'+value+'-btnTrocarProduto-'+grid+'" name="btnTrocarProduto-'+grid+'" title="Trocar produto">';

		btnUnificarPedido = '<input type="button" class="botao branco center icon-unificar grid" id="'+value+'-btnUnificarPedido-'+grid+'" name="btnUnificarPedido-'+grid+'" title="Unificar pedidos">';

		btnVisualizar = '<input type="button" class="botao branco center icon-visualizar grid" id="'+value+'-btnVisualizar-'+grid+'" name="btnVisualizar-'+grid+'" title="Visualizar">';

		btnVoltar = '<input type="button" class="botao branco center icon-voltar grid" id="'+value+'-btnVoltar-'+grid+'" name="btnVoltar-'+grid+'" title="Voltar">';

		btnVerPermissao = '<input type="button" class="botao branco center icon-chave grid" id="'+value+'-btnVerPermissao-'+grid+'" name="btnVerPermissao-'+grid+'" title="Ver Permissao">';
		
		for(var i=0;i<acoes.length;i++){

			switch(acoes[i].nome){

				case "alterar":botoes+=btnAlterar;break;

				case "baixar":botoes+=btnBaixar;break;

				case "bloquear":botoes+=btnBloquear;break;

				case "desativar":botoes+=btnDesativar;break;

				case "bloqueado":botoes+=btnBloqueado;break;

				case "cancelar":botoes+=btnCancelar;break;

				case "desbloquear":botoes+=btnDesbloquear;break;
				
				case "efetivar":botoes+=btnEfetivar;break;

				case "email":botoes+=btnEmail;break;

				case "excel":botoes+=btnExcel;break;

				case "excluir":botoes+=btnExcluir;break;

				case "fila-impressao":botoes+=btnFilaImpressao;break;

				case "imprimir":botoes+=btnImprimir;break;

				case "ativar":botoes+=btnAtivar;break;

				case "nfe":botoes+=btnNfe;break;

				case "observacao":botoes+=btnObservacao;break;

				case "pagar":botoes+=btnPagar;break;

				case "pdf":botoes+=btnPdf;break;

				case "receber":botoes+=btnReceber;break;

				case "retirar":botoes+=btnRetirar;break;

				case "trocar-consignatario":botoes+=btnTrocarConsignatario;break;

				case "agendar":botoes+=btnAgendar;break;

				case "trocar-produto":botoes+=btnTrocarProduto;break;

				case "unificar-pedido":botoes+=btnUnificarPedido;break;

				case "visualizar":botoes+=btnVisualizar;break;

				case "voltar":botoes+=btnVoltar;break;
				
				case "ver-permissao":botoes+=btnVerPermissao;break;

			}

		}

		return botoes;

	};

	

	var imagerenderer = function (row, datafield, value) {

		var img ='<img class="fotoGrid no-colorbox" src="../img/fotos/foto-padrao-produto.jpg">';

				

		if(value != ""){

			img = '<img class="fotoGrid" id="foto-'+value+'" src="../funcoes/visualizar-foto.php?campo=foto&tabela='+tabela+'&where=id='+value+'">';

		}

		

		return img;

	}

	

	for(var i = 0; i< colunas.length; i++){

		if(colunas[i].text == "Ações"){

			colunas[i].cellsrenderer = actionsrender;

		}else if(colunas[i].text == "Foto"){

			colunas[i].cellsrenderer = imagerenderer;

		}

		

		if(colunas[i].editable == undefined || colunas[i].editable == false){

			colunas[i].editable = false;

		}

	}

	

	$("#"+idDiv).jqxGrid({

		width: '100%',

		theme: tema,

		pageSize: 5,

		columnsheight: 30,

		rowsheight: 30,

		source: dataadapter,

		sortable: ordenacao,

		autoheight: true,

		pageable: paginacao,

		editable: true,

		virtualmode: virtual,

		columnsresize: false,

		columnsreorder: false,

		showfilterrow: filtro,

        filterable: filtro,

		localization: getLocalization(),

		rendergridrows: function(obj){return obj.data;},

		columns: colunas

	});

}