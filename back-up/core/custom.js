var core = {
	init:function(){

		var navheader = $('.navbar-header'),
			body = $('html, body'),
			logo = $('figure').children('img'),
			menuA = $('nav').children('ul').children('li'),
			windowA = $(window).width(),
			departamentos = $('.departamentos'), 
			selectlocalizador = $('.localizador'),
			acordion = $('.acordion'),
			acordionLi = acordion.children('li').children('a'),
			subir = $('.subir');

	    menuA.hover(function() {
	    	$(this).stop().find('ul').slideDown();
	    },function(){
	    	$(this).stop().find('ul').slideUp();
	    })

		$('#galeria a').fancybox({
            padding:0
        });
	}
}

$(document).ready(core.init);

function myFunctionMercado(url) {
    window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=30, left=100, width=780, height=600");
}
