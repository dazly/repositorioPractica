
var FUN = {

	onReady : function() {

		/* Boton Favorito*/
		$('div.switch-button').click(FUN.selectFavorito);

		/* Focus Sidebar*/
		$('.sidebar-elements a').click(FUN.focusSidebar);

		/* Acordeon Sidebar */
		/*$('.sidebar-elements a').click(FUN.acordeonMenuSidebar);*/

		/* Acordeon Formulario Sidebar crear contactos */
		$('a.nuevoGrupo').click(FUN.acordeonFormSidebar);

		/* Cargar grupos en la vista EDITAR contacto*/
		$('#listaGrupos').change(FUN.listaGrupos);
	},

	selectFavorito : function() {
		
	},

	focusSidebar : function() {
		
		/*$(this).parent().siblings().removeClass('active');
		$(this).parent().addClass('active');*/
	},

	acordeonMenuSidebar : function() {
		var acordeon = $(this).siblings('.submenu'),
			 closeAcordeons = $('ul.submenu');

		if (acordeon.css('display') == 'none') {
			closeAcordeons.hide('fast');
			acordeon.show('fast');
		} else {
			acordeon.hide('fast');
		}	
	},

	acordeonFormSidebar : function() {
		var form = $('.submenu form');
		form.css('display') == 'none' ? form.show('fast') : form.hide('fast');
	},

	listaGrupos : function() {
		var form_data = { tipo: $('#tipoProductos').val() };
		if($('#tipoProductos').val()!=''){
			$.ajax({
		    	url: "index.php?url=listaProductos",
		        data: form_data,
		        method: 'get',
		        dataType: 'json'
		    }).done(function(res){
		    	if(res.status=='ok'){
		    		$('#listaProductos').html('');
		    		$.each(res.msg, function(i, v){
		    			$('#listaProductos').append($('<option/>', {value: v.nomNombre, text: v.nomNombre}));
		    		});
		    	}
		    	else{
		    		alert(res.msg);
		    	}
		    	
		    }).fail(function(err){
		    	console.log(err);
		    });
		}
	},
};

$(document).ready(FUN.onReady);

















