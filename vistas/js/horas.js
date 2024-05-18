var cedulaHora=$("#cedulaHora").val();
$(".tablaHoras").DataTable({ 

	"ajax":"ajax/tablahoras.ajax.php?cedulaHora="+cedulaHora, 
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
Eliminar  PROGRAMA
=============================================*/  

$(document).on("click", ".eliminarHora", function(){

	var hora = $(this).attr("hora");

//  console.log("codigo", codigo);
	swal({
	    title: '¿Está seguro de eliminar esta Hora?',
	    text: "¡Si no lo está puede cancelar la acción!",
	    type: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    cancelButtonText: 'Cancelar',
	    confirmButtonText: 'Si, eliminar Hora!'
	  }).then(function(result){

	    if(result.value){

	    	var datos = new FormData();
       		datos.append("hora", hora);

       		$.ajax({

	          url:"ajax/horas.ajax.php",
	          method: "POST",
	          data: datos,
	          cache: false,
	          contentType: false,
	          processData: false,
	          success:function(respuesta){


		//	console.log("respuesta", respuesta);

	          	if(respuesta == "ok"){

	          		swal({
	                  type: "success",
	                  title: "¡CORRECTO!",
	                  text: "La asignatura ha sido borrado correctamente",
	                  showConfirmButton: true,
	                  confirmButtonText: "Cerrar",
	                  closeOnConfirm: false
	                 }).then(function(result){

	                    if(result.value){

	                      window.location = "horas";

	                    }
	                
	                })

	          	}

	          }

	        })  

	    }

	})

}) 

/*=============================================
Editar  paciente
=============================================*/ 

$(document).on("click", ".editarHora", function(){ 
	
    var editarhora = $(this).attr("editarhora"); 

	//  console.log("editarhora", editarhora);
	var datos = new FormData();
	// console.log("datos", datos);
	datos.append("editarhora", editarhora); 
	$.ajax({
		url:"ajax/horas.ajax.php",
		method: "POST",
		data: datos,
  		cache: false,
		contentType: false,
    	processData: false,
    	dataType: "json",
    	success:function(respuesta){  

		  console.log("respuesta", respuesta);

        $('input[id="editregHora"]').val(respuesta["h_hora"]);
        $('input[id="editaridcodigo"]').val(respuesta["cod_hora"]); 
        $('#editcodExamen2').val(respuesta["texa_codigo"]); 
		$('#editcodExamen2').trigger('change');  
    	}

    	})
})  
