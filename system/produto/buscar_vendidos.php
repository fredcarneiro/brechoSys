<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>BUSCA</title>

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

$(document).ready(function() {
	
	$('#buscar').click(function(){formBusca.submit();});
	
	
});
</script>

</head>

<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include '../lib/conn.php'; 

$dbh = conn();

$id_usuario = $_GET['uid'];

?>
<form id="formBusca" method="post" action="produtos_vendidos.php">
	<input type="hidden" id="uid" name="uid" value="<?php echo $id_usuario; ?>" /> 
    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            BUSCA DE PRODUTOS VENDIDOS POR USU&Aacute;RIO
        </div>
    </div>
 	
    <fieldset style="border:1px solid #000; width:1200px; margin:auto;">
    	<legend style="color:#666;">Par&acirc;metros</legend>    
    
        <div class="row" style="border:0px solid #000;">     
            <div class="4 large-4 columns" style="border:0px solid #000; ">
                <label>
                   
                    <select style="width:13em;" id="mes" name="mes" >
	                    <option value="0000"> M&Ecirc;S:</option>
                    	<?php
						$sql = "select distinct substring(dt_baixa,5,2) mes from produto where dt_baixa is not null and usuario_id_usuario = $id_usuario group by substring(dt_baixa,5,2)";
						
						foreach($dbh->query($sql) as $row) {
						
							$mes = trim($row['mes']);
							
							switch ($mes) {
								case 1:
									$mes_nome = "JANEIRO";
									break;
								case 2:
									$mes_nome = "FEVEREIRO";
									break;
								case 3:
									$mes_nome = "MAR&Ccedil;O";
									break;
								case 4:
									$mes_nome = "ABRIL";
									break;	
								case 5:
									$mes_nome = "MAIO";
									break;					
								case 6:
									$mes_nome = "JUNHO";
									break;
								case 7:
									$mes_nome = "JULHO";
									break;
								case 8:
									$mes_nome = "AGOSTO";
									break;
								case 9:
									$mes_nome = "SETEMBRO";
									break;	
								case 10:
									$mes_nome = "OUTUBRO";
									break;	
								case 11:
									$mes_nome = "NOVEMBRO";
									break;	
								case 12:
									$mes_nome = "DEZEMBRO";
									break;										
							}
							
							echo "<option value='$mes'>$mes_nome</option>";
							
						}						
						
						?>

                    </select>
                </label>
            </div>
            <div class="4 large-4 columns" style="border:0px solid #000; ">
                <label>
                    <select style="width:13em;" id="ano" name="ano">
                    	<option value="0000">ANO:</option>
                    	<?php
						$sql = "select distinct substring(dt_baixa,1,4) ano from produto where dt_baixa is not null and usuario_id_usuario = $id_usuario ";
						
						foreach($dbh->query($sql) as $row) {
						
							echo "<option value='".$row['ano']."'>".$row['ano']."</option>";
							
						}						
						
						?>
                    </select>
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