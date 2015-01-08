(function($){  
 $.fn.limita = function(options) {  
 
 	var defaults = {
		limit: 200,
		id_result: false,
		alertClass: false
	}
 
 	var options = $.extend(defaults, options);
 
    return this.each(function() {  
 
	var	caratteri = options.limit;
	
	if(options.id_result != false)
	{
		$("#"+options.id_result).append("Ti restano <strong>"+ caratteri+"</strong> caratteri");
	}
	
	$(this).keyup(function(){
		if($(this).html().length > caratteri){
		$(this).html($(this).html().substr(0, caratteri));
		}
		
		if(options.id_result != false)
		{
		
			var restanti = caratteri - $(this).html().length;
			$("#"+options.id_result).html("Ti restano <strong>"+ restanti+"</strong> caratteri");
		
			if(restanti <= 10)
			{
				$("#"+options.id_result).addClass(options.alertClass);
			}
			else
			{
				$("#"+options.id_result).removeClass(options.alertClass);
			}
		}
	});
 
});  
 };  
})(jQuery);