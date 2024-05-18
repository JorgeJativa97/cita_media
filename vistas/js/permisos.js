  var rol=$("#rol").val(); 

  var tablePermisos =$(".tablapermisos").DataTable({ 
  	"ajax":"ajax/tablaPermisos.ajax.php?rol="+rol,
	
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros", 
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": { 
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	}
}); 
/*=============================================
ACTIVAR DESACTIVAR PERMISO VER
=============================================*/


$(".tablapermisos tbody").on("click", ".btnActivarR", function(){

	var idpermiso = $(this).attr("idpermiso");
	var r = $(this).attr("r");

	var datos = new FormData();

 	datos.append("idpermiso", idpermiso);
  	datos.append("r", r);

  	$.ajax({
  
  		 url:"ajax/permiso.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	} 	 
  	});
  	if(r == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-secondary');
  		$(this).html('OF');
  		$(this).attr('r',1);
  					
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-secondary');
  		$(this).html('ON');
  		$(this).attr('r',0);
  					

  	}

})
/*=============================================
ACTIVAR DESACTIVAR PERMISO CREAR
=============================================*/
$(".tablapermisos tbody").on("click", ".btnActivarW", function(){

	var idpermiso2 = $(this).attr("idpermiso2");
	var w = $(this).attr("w");

	var datos = new FormData();

 	datos.append("idpermiso2", idpermiso2);
  	datos.append("w", w);

  	$.ajax({
  
  		 url:"ajax/permiso.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	} 	 
  	});
  	if(w == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-secondary');
  		$(this).html('OF');
  		$(this).attr('w',1);
  					
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-secondary');
  		$(this).html('ON');
  		$(this).attr('w',0);
  					

  	}

})


/*=============================================
ACTIVAR DESACTIVAR PERMISO UPDATE
=============================================*/


$(".tablapermisos tbody").on("click", ".btnActivarU", function(){

	var idpermiso3 = $(this).attr("idpermiso3");
	var u = $(this).attr("u");

	var datos = new FormData();

 	datos.append("idpermiso3", idpermiso3);
  	datos.append("u", u);

  	$.ajax({
  
  		 url:"ajax/permiso.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	} 	 
  	});
  	if(u == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-secondary');
  		$(this).html('OF');
  		$(this).attr('u',1);
  					
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-secondary');
  		$(this).html('ON');
  		$(this).attr('u',0);
  					

  	}

})


/*=============================================
ACTIVAR DESACTIVAR PERMISO ELIMINAR
=============================================*/


$(".tablapermisos tbody").on("click", ".btnActivarD", function(){

	var idpermiso4 = $(this).attr("idpermiso4");
	var d = $(this).attr("d");

	var datos = new FormData();

 	datos.append("idpermiso4", idpermiso4);
  	datos.append("d", d);

  	$.ajax({
  
  		 url:"ajax/permiso.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	} 	 
  	});
  	if(d == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-secondary');
  		$(this).html('OF');
  		$(this).attr('d',1);
  			
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-secondary');
  		$(this).html('ON');
  		$(this).attr('d',0);
  					

  	}

})

/*=============================================
TRAER DATOS PARA EDITAR PERMISOS
=============================================*/  
 
$(document).on("click",".editarPermisos", function(){

var idrol2 = $(this).attr("idrolP");  


//console.log("idrol2", idrol2);

var datos =new FormData();

datos.append("idrol2",idrol2);
  
 $.ajax({
		url:"ajax/permiso.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){ 

		console.log("respuesta", respuesta);
		     $('input[name="rol"]').val(respuesta["idrol"]);			
			$('input[name="editarnombreRol"]').val(respuesta["nombrerol"]);
			$('input[name="editardescripcion"]').val(respuesta["descripcion"]);
	
			
		}

 	})

})


$(document).on("click",".editarPermisos23", function(){ 							
				 $.ajax({
				url:'vistas/paginas/tablas/session_aprobacion5.php',
				method: "POST",
				data: 'rol=' + $(this).attr("idrolP"),
				success:function(respuesta){ 
				console.log("respuesta", respuesta);
						//$('input[name="conteo"]').val(respuesta["conteo"]);
				$("#ver_actividad").load('vistas/paginas/tablas/tablaDocumentos.php');
							}
			
						 })
			
				}) 
$( document ).ready(function() {
	$("#tablapermisosR").load('vistas/paginas/tablas/tablaDocumentos.php');
			
});  

$(document).on("click",".editarPermisos", function(){ 							
	$.ajax({
	url:'vistas/paginas/tablas/session_aprobacion5.php',
	method: "POST",
	data: 'rol=' + $(this).attr("idrolP"),
	success:function(respuesta){ 
	console.log("respuesta", respuesta);
			//$('input[name="conteo"]').val(respuesta["conteo"]);
			/*=============================================
Vuelva a cargar los datos de la tabla 
=============================================*/
tablePermisos.ajax.reload( function ( json ) {
	$('#myInput').val( json.lastInput );
} );


				}

			})

	}) 

/*============================================= 
=============================================*/  
$(document).ready(function(){
    $(".seleccionarModulo").select2();
    $(".seleccionarModulo").select2({
            placeholder: 'SELECCIONE EL Modulo',
            allowClear: true
        });    
    });