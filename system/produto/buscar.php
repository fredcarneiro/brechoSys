<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>BUSCA DE PRODUTOS</title>

<script src='../js/foundation3/jquery.js'></script>
<link rel="stylesheet" href="../css/foundation4/normalize.css">
<!-- Foundation 3 for IE 8 and earlier -->
<!--[if lt IE 9]>
	<link rel="stylesheet" href="../css/foundation3/foundation.css">
<![endif]-->
<!-- Foundation 4 for IE 9 and earlier -->
<!--[if gt IE 8]><!-->
	<link rel="stylesheet" href="../css/foundation4/foundation.css">
<!--<![endif]-->
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="../css/doc.css">
<script src="../js/foundation4/vendor/custom.modernizr.js"></script>
<script>
function openInserir(ac, pid, u_id) {

var width = 800;
var height = 600;

var left = 99;
var top = 99;


window.open('cproduto.php?uid='+u_id+'&ac='+ac+'&pid='+pid,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}


//ENVIA FORMULARIO
function sendform(action){

	$("#result_busca").html('');
	
	$.post(
		'crud.php',
		$('#formBusca').serialize(),

		function(data){
			$("#result_busca").append(data);
		});
}

$(document).ready(function() {
	
	$('#buscar').click(function(){sendform('buscar');});
	
	$('#salvar').click(function(){sendform('add');});
	$('#btInserirProduto').click(function(){openInserir('add', 0);});	
	
	$(document.body).on('click', '.editProduto' , function() {
		var nrow = this.id.substring(11);
		var u_id = this.attributes["name"].value.substring(11);
		openInserir('edit', nrow, u_id);
	});		
	
	
	//$(".baixaProduto").on( "click", function() {
	$(document.body).on('click', '.baixaProduto' , function() {	
		var p_id = this.id.substring(5);
		var baixa = 0;
		
		if (this.checked){
			baixa = 1;
		}
		
		console.log(p_id);
		
		$.post(
			'crud.php',
			{p_id: p_id, ac: 'baixaProduto', baixa: baixa},
	
			function(data){

				data = data.split("/");
				
				if(data[0] != "SUCESSO"){
					
					alert('Desculpe o transtorno, mas parece que ocorreu um problema para completar o seu pedido.');
					return false;				
				}else{
					//alert('Atualizacao realizada com sucesso! \nEspere a atualizacao da tela para poder ver o resultado.');
					//location.reload();
					var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth()+1; //January is 0!
					var yyyy = today.getFullYear();
					
					if(dd<10) {
						dd='0'+dd
					} 
					
					if(mm<10) {
						mm='0'+mm
					} 
					
					today = dd+'/'+mm+'/'+yyyy;
					//document.write(today);					
					
					if(data[2] == 1){
						$("#dtbaixa"+data[1]).html(today);	
					}else{
						$("#dtbaixa"+data[1]).html('N/D');
					}
					
					
					
				}
		});
		
	});
	
	//$(".repasseProduto").on( "click", function() {
	$(document.body).on('click', '.repasseProduto' , function() {												 
		
		var p_id = this.id.substring(7);
		var repasse = 0;
		
		if (this.checked){
			repasse = 1;
		}
		
		$.post(
			'crud.php',
			{p_id: p_id, ac: 'repasseProduto', repasse: repasse},
	
			function(data){

				data = data.split("/");
				
				if(data[0] != "SUCESSO"){
					
					alert('Desculpe o transtorno, mas parece que ocorreu um problema para completar o seu pedido.');
					return false;				
				}else{
					//alert('Atualizacao realizada com sucesso! \nEspere a atualizacao da tela para poder ver o resultado.');
					//location.reload();
					
					var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth()+1; //January is 0!
					var yyyy = today.getFullYear();
					
					if(dd<10) {
						dd='0'+dd
					} 
					
					if(mm<10) {
						mm='0'+mm
					} 
					
					today = dd+'/'+mm+'/'+yyyy;
					//document.write(today);					
					
					if(data[2] == 1){
						$("#dtrepasse"+data[1]).html(today);	
					}else{
						$("#dtrepasse"+data[1]).html('N/D');
					}					

				}
		});
		
	});		
	
});
</script>

</head>

<body>

<form id="formBusca">
	<input type="hidden" id="ac" name="ac" value="buscar" /> 
    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            BUSCA DE PRODUTOS
        </div>
    </div>
 	
    <fieldset style="border:1px solid #000; width:1200px; margin:auto;">
    	<legend style="color:#666;">Digite a descri&ccedil;&atilde;o do produto</legend>    
    
        <div class="row" style="border:0px solid #000;">     
            <div class="twelve large-12 columns" style="border:0px solid #000; ">
                <label>
                    <input type="text" id="texto" name="texto" placeholder="Nome" />
                </label>
            </div>
        </div>

	</fieldset>
  
    <div class="row" style="width:1200px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
        	<a class="button" id="buscar">Buscar</a>
            <a class="button" href="../index.php">Voltar a Tela Principal</a>
        </div>
    </div> 
    
    
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">Resultado da Busca</legend>    
    
        <div class="row" style="border:0px solid #000;">     
            <div class="twelve large-12 columns" style="border:0px solid #000; " id="result_busca">

            </div>
        </div>

	</fieldset>    
        
</form>

<!-- Foundation 3 for IE 8 and earlier -->
<!--[if lt IE 9]>
    <script src="../js/foundation3/foundation.min.js"></script>
    <script src="../js/foundation3/app.js"></script>
<![endif]-->

<!-- Foundation 4 for IE 9 and later -->
<!--[if gt IE 8]><!-->
    <script src="../js/foundation4/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
<!--<![endif]-->

</body>
</html>