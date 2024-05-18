var cedulaRol=$("#cedulaRol").val();

$(".tablaroles").DataTable({ 

	"ajax":"ajax/tablaRoles.ajax.php?cedulaRol="+cedulaRol,
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
ACTIVAR DESACTIVAR ROL
=============================================*/


$(".tablaroles tbody").on("click", ".btnActivarRol", function(){

	var idrol = $(this).attr("idrol");
	var status = $(this).attr("status");

	var datos = new FormData();

 	datos.append("idrol", idrol);
  	datos.append("status", status);

  	$.ajax({ 
 
  		 url:"ajax/roles.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	} 	 
  	});
  	if(status == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-warning');
  		$(this).html('Desactivado');
  		$(this).attr('status',1);
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-warning');
  		$(this).html('Activado');
  		$(this).attr('status',0);

  	}
 
})

 
/*=============================================
TRAER DATOS PARA EDITAR
=============================================*/  

$(document).on("click",".editarRol2", function(){

var idrol2 = $(this).attr("idrol2"); 


//console.log("idrol2", idrol2);

var datos =new FormData();

datos.append("idrol2",idrol2);

 $.ajax({
		url:"ajax/roles.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){ 

		console.log("respuesta", respuesta);
		     $('input[name="editaridrol"]').val(respuesta["idrol"]);			
			$('input[name="editarnombreRol"]').val(respuesta["nombrerol"]);
			$('input[name="editardescripcion"]').val(respuesta["descripcion"]);
			
				
			
		}

 	})

}) 


/* eliminar persona */
$(document).on("click", ".eliminarol", function(){

    var idrole =$(this).attr("idrole");
    console.log("idrole", idrole);
    
        if(idrole ==1){
            swal({
                title: 'Error',
                text: "El Administrador Principal no puede ser Borrado",
                type: 'error',
                confirmButtonText: 'Cerrar!'
            });
            return;
        }
        swal({
            title: '¿Está seguro de eliminar este rol?',
            text: "¡Si no lo está puede cancelar la acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar Rol!'
        }).then(function(result){
    
            if(result.value){
                var datos = new FormData();
                   datos.append("idrole", idrole);
                   
    
                   $.ajax({
    
                    url:"ajax/roles.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        if(respuesta == "ok"){
    
                            swal({
                            type: "success",
                            title: "¡CORRECTO!",
                            text: "El rol ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                           }).then(function(result){
      
                              if(result.value){
      
                                window.location = "roles";
      
                              }
                          
                          })
    
                        }
    
                    }
      
                  })  
                }
            })
            
    })

