$(function(){
	$("#carouselInner").css("width",620*$("#carouselInner ul.column").size()+"px");
	$("#carouselInner ul.column:last").prependTo("#carouselInner");
	$("#carouselInner").css("margin-left","-620px");


	$("#carouselPrev").click(function(){
		$("#carouselNext,#carouselPrev").hide();
		$("#carouselInner").animate({
			marginLeft : parseInt($("#carouselInner").css("margin-left"))+620+"px"
		},"slow","swing" ,
		function(){
			$("#carouselInner").css("margin-left","-620px")
			$("#carouselInner ul.column:last").prependTo("#carouselInner");
			$("#carouselNext,#carouselPrev").show();
		});
	});

	$("#carouselNext").click(function(){
		$("#carouselNext,#carouselPrev").hide();
		$("#carouselInner").animate({
			marginLeft : parseInt($("#carouselInner").css("margin-left"))-620+"px"
		},"slow","swing" ,
		function(){
			$("#carouselInner").css("margin-left","-620px")
			$("#carouselInner ul.column:first").appendTo("#carouselInner");
			$("#carouselNext,#carouselPrev").show();
		});
	});
});
