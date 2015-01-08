function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

function removeProduto(nrow){

	$("#itemProduto"+nrow).remove();

}

$(function() {

    $("#topic_title").autocomplete({
        source: "ajax_autocomplete.php",
        minLength: 2,
        select: function(event, ui) {
            
			var id_produto = ui.item.id_produto;
			var descricao = ui.item.descricao;
			var preco_loja = ui.item.preco_loja;	
			var preco_repasse = ui.item.preco_repasse;	
			var idade = ui.item.idade;
			var sexo = ui.item.sexo;
			
			var valor = Number(preco_loja) + Number(preco_repasse);
			var total = Number($("#p_total").val());
			
			total = total + valor;
			$("#p_total").val(total);
			
			var th = "";
			var dadosForm = "";
			
			th = th + " <tr id='itemProduto"+ id_produto +"'> ";
			th = th + " <th> " + pad(id_produto, 6) + " </th>";
			th = th + " <th> " + descricao + " </th>";
			th = th + " <th> " + idade + " </th>";
			th = th + " <th> " + sexo + " </th>";
			th = th + " <th> R$ " + valor.toFixed(2).replace('.', ',') + " </th>";
			th = th + " <th style='cursor: pointer;' id='remProduto"+ id_produto +"' class='removeProduto'> REMOVER </th>";
			th = th + " </tr> ";
			
			dadosForm = dadosForm + " <input type='hidden' name='idProduto[]' id='idProduto' value='"+id_produto+"' />";
			dadosForm = dadosForm + " <input type='hidden' name='p_total2' id='p_total2' value='"+total+"' />";
			
			$("#insertProdutos").append(th);
			$("#dadosForm").append(dadosForm);			
		
        },
        html: true,
        // optional
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });
	
	$(document.body).on('click', '.removeProduto' , function() {
		var nrow = this.id.substring(10);
		removeProduto(nrow);
	});		
	
	$(document.body).on('change', '.descontoProduto' , function() {
		
		var total = Number($("#p_total").val());
		var desconto = Number($("#desconto").val());
		
		if(!desconto){
			desconto = 0;
		}
		
		var valor = total - ((total * desconto) / 100);
		
		$("#v_compra").val(valor.toFixed(2));
		
	});	
	
	

});











