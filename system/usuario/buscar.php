<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>BUSCA DE USUARIOS</title>

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
//ENVIA FORMULARIO
function sendform(action){

	$("#result_busca").html('');
	$("#Loading").fadeIn('fast');
	
	$.post(
		'crud.php',
		$('#formBusca').serialize(),

		function(data){
			$("#Loading").fadeOut('fast');
			$("#result_busca").append(data);
		});
}

$(document).ready(function() {
	$("#Loading").fadeOut('fast');						   
	$('#buscar').click(function(){sendform('buscar');});
});
</script>

</head>

<body>

<form id="formBusca">
	<input type="hidden" id="ac" name="ac" value="buscar" /> 
    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            BUSCA DE USU&Aacute;RIOS
        </div>
    </div>
 	
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">Digite o nome do usu&aacute;rio</legend>    
    
        <div class="row" style="border:0px solid #000;">     
            <div class="twelve large-12 columns" style="border:0px solid #000; ">
                <label>
                    <input type="text" id="texto" name="texto" placeholder="Nome" />
                </label>
            </div>
        </div>

	</fieldset>
  
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
        	<a class="button" id="buscar">Buscar</a>
            <a class="button" href="../index.php">Voltar a Tela Principal</a>
        </div>
    </div> 
    
    
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">Resultado da Busca</legend>    
    
       
        
        <div class="row" style="border:0px solid #000;">     
            <div class="twelve large-12 columns" style="border:0px solid #000; ">
				 <center><div id="Loading"><img src="../images/load.gif" width="20%"/></div></center>
            </div>
        </div>        
        
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