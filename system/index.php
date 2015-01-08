<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>CARISMA</title>

<script src='js/foundation3/jquery.js'></script>
<link rel="stylesheet" href="css/foundation4/normalize.css">
<!-- Foundation 3 for IE 8 and earlier -->
<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/foundation3/foundation.css">
<![endif]-->
<!-- Foundation 4 for IE 9 and earlier -->
<!--[if gt IE 8]><!-->
	<link rel="stylesheet" href="css/foundation4/foundation.css">
<!--<![endif]-->
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="css/doc.css">
<script src="js/foundation4/vendor/custom.modernizr.js"></script>

</head>

<body>

<form>
    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            CARISMA BY ZAIRA
        </div>
    </div>
 	
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">USU&Aacute;RIO</legend>    
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="six large-6 columns" style="border:0px solid #000; text-align:right; ">
        	<a href="usuario/cadastro.php" class="button">CADASTRAR USU&Aacute;RIO</a>
        </div>
    	<div class="six large-6 columns" style="border:0px solid #000; ">
        	<a href="usuario/buscar.php" class="button" >CONSULTAR USU&Aacute;RIO</a>
        </div>        
    </div> 
        
	</fieldset>
    
    <BR /><br />
    
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">PRODUTO</legend>    
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
        	<a href="produto/buscar.php" class="button" >CONSULTAR PRODUTOS</a>
        </div>        
    </div> 
        
	</fieldset>    
    
    
    <BR /><br />
    
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">VENDA</legend>    
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="six large-6 columns" style="border:0px solid #000; text-align:right; ">
        	<a href="venda/venda.php" class="button">NOVA VENDA</a>
        </div>
    	<div class="six large-6 columns" style="border:0px solid #000; ">
        	<a href="venda/buscar.php" class="button" >CONSULTAR VENDAS</a>
        </div>        
    </div> 
        
	</fieldset>  
        
        
    <BR /><br />
    
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">RELAT&Oacute;RIOS</legend>    
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="six large-6 columns" style="border:0px solid #000; text-align:right; ">
        	<a href="relatorios/produtos_cadastrados.php" class="button" target="_self">PRODUTOS CADASTRADOS</a>
        </div>
    	<div class="six large-6 columns" style="border:0px solid #000; ">
        	<a href="relatorios/buscar_vendidos.php" class="button" target="_self">PRODUTOS VENDIDOS</a>
        </div>   
    </div>
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">           
    	<div class="twelve large-12 columns" style="border:0px solid #000; padding-left:140px; ">
        	<a href="relatorios/buscar_venda.php" class="button" target="_self" >GANHOS</a>
        </div>            
    </div> 
        
	</fieldset>        
        
</form>

<!-- Foundation 3 for IE 8 and earlier -->
<!--[if lt IE 9]>
    <script src="js/foundation3/foundation.min.js"></script>
    <script src="js/foundation3/app.js"></script>
<![endif]-->

<!-- Foundation 4 for IE 9 and later -->
<!--[if gt IE 8]><!-->
    <script src="js/foundation4/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
<!--<![endif]-->

</body>
</html>