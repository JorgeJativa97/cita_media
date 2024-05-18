var cedulaCita=$("#cedulaCita").val(); 


var cedulaPersona=$("#cedulaPersona").val(); 

var cedulaDoctor2=$("#cedulaDoctor2").val(); 

var tablaCitaA =$(".tablacita").DataTable({ 

	"ajax":"ajax/tablacita.ajax.php?cedulaCita="+cedulaCita+"&cedulaPersona="+cedulaPersona+"&cedulaDoctor2="+cedulaDoctor2,
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
=============================================*/  
$(document).ready(function(){
    $("#codExamen2").select2();
    $("#codExamen2").select2({
            placeholder: 'SELECCIONE EL EXAMEN',
            allowClear: true
        });    
}); 

$(document).ready(function(){
    $("#codCita").select2();
    $("#codCita").select2({
            placeholder: 'SELECCIONE EL PACIENTE',
            allowClear: true
        });    
}); 




/*=============================================
=============================================*/  
$("#crearCita").on("change","#codCita",function(){
	var pac_identificacion=$(this).val();
    // console.log(pac_identificacion);
	if(pac_identificacion!=""){
		// Petición AJAX
		var datos = new FormData();
		datos.append("pac_identificacion", pac_identificacion); 
		$.ajax({
			url:"ajax/resultadoExamen.ajax.php",
			method: "POST",
			data: datos,
	  		cache: false,
			contentType: false,
	    	processData: false,
	    	dataType: "json",
	    	success:function(respuesta){

			// console.log("respuesta", respuesta);
	    		$("#crearCita .nombre").val(respuesta["pac_nombres"]);
	    		$("#crearCita .apellidos").val(respuesta["pac_apellidos"]);
	    	}
	    });
	}
	$("#crearCita").val("");
});  


/*=============================================
=============================================*/  
$("#crearCita").on("change","#codExamen2",function(){
	var texa_codigo=$(this).val();
    // console.log(texa_codigo);
	if(texa_codigo!=""){
		// Petición AJAX
		var datos = new FormData();
		datos.append("texa_codigo", texa_codigo); 
		$.ajax({ 
			url:"ajax/cita.ajax.php",
			method: "POST",
			data: datos,
	  		cache: false,
			contentType: false,
		    	processData: false,
		    	dataType: "json",
		    	success:function(respuesta){

			//console.log("respuesta", respuesta);
	    		$("#crearCita .Rhora").val(respuesta["h_hora"]);

	    		
	    		
	    	}
	    });
	}
	$("#crearCita").val("");
});  



/*=============================================
BOTON REGISTRAR DOCUMENTO
=============================================*/ 
 
 $(document).ready(function(){
 
  	$(document).on("click",".RegistrarCita", function(){ 
		/*=============================================
		TRAER DATOS DEL MODAL DE DOCUMENTOS 
		=============================================*/
	 	var datos = $('#traerCita').serialize();
	       console.log("datos", datos);
     	  $.ajax({
		url:'ajax/cita.ajax.php',
		method: "POST",
		data: datos,
		success:function(respuesta){   

		console.log("respuesta", respuesta);	

			if(respuesta == 1){
				
		/*=============================================
		Vuelva a cargar los datos de la tabla 
		=============================================*/
			tablaCitaA.ajax.reload( function ( json ) {
			    $('#myInput').val( json.lastInput );
			 
			} );
 
			/*=============================================
			Cerrar el modal
			=============================================*/
                      $('#crearCita').modal('toggle');
			/*=============================================
			Modal que ha sido 
			=============================================*/
		    swal({
						  type: "success",
						  title: "La cita ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

		    	$('#codCita').val(""); 
			$('#codCita').trigger('change'); 
			
			$('#citafecha2').val(""); 
			$('#citafecha2').trigger('change'); 

			$('#nombre').val(""); 
			$('#nombre').trigger('change'); 
                        
                        $('#apellidos').val(""); 
			$('#apellidos').trigger('change'); 
			
			$('#codExamen2').val(""); 
			$('#codExamen2').trigger('change'); 


			$('#nombre').val(""); 
			$('#nombre').trigger('change'); 
                        
                        $('#Rhora').val(""); 
			$('#Rhora').trigger('change'); 
			
			$('#reobservacion').val(""); 
			$('#reobservacion').trigger('change'); 


				 
			}else if(respuesta==2){
				swal({
					type: "error",
					title: "¡Registro Ocupado ya tiene Fecha y Hora!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					})
			}
			else if(respuesta==3){
				swal({
					type: "error",
					title: "¡No se Atiende los Domingos!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					})
			}
			else if(respuesta==4){
				swal({
					type: "error",
					title: "¡Los Sabados se Atiende hasta las 12:30!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					})
			}
			else if(respuesta==0){
				swal({
					type: "error",
					title: "¡Revise los datos ingresados no puede ir vacío o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					})
			}				
		
		}
		

	  });


	 }); 
	  
});
 

 /*=============================================
TRAER DATOS DE LOS Cita S 4
=============================================*/   

$(document).on("click", ".editarCita", function(){

	var editarid = $(this).attr("editarid");  
	
	var datos = new FormData();
	datos.append("editarid", editarid); 
 
	$.ajax({
		url:"ajax/cita.ajax.php",
		method: "POST",
		data: datos,
  		cache: false,
		contentType: false,
	    	processData: false,
	    	dataType: "json",
	    	success:function(respuesta){ 
		console.log("respuesta", respuesta);
    		$('input[name="Edi_cit_codigo"]').val(respuesta["cit_codigo"]); 
    		//$('input[name="Edi_texa_codigo"]').val(respuesta["texa_codigo"]);   
    		$('input[name="Edi_cit_fecha"]').val(respuesta["cit_fecha"]);   
    		$('input[name="Edi_cit_hora2"]').val(respuesta["cit_hora"]);  


    		$('#Edi_texa_codigo').val(respuesta["texa_codigo"]); 
		$('#Edi_texa_codigo').trigger('change');       		

    	}
	})
}) 

$(document).ready(function(){
   
    $("#Edi_texa_codigo").select2({
            placeholder: 'SELECCIONE EL EXAMEN',
            allowClear: true
        });    
    });


/*=============================================
ELIMINAR CITA
=============================================*/  

$(document).on("click", ".eliminarCita", function(){

	var eliminarCi = $(this).attr("eliminarCi");
	

//console.log("ciMaestros", ciMaestros);
	swal({
	    title: '¿Está seguro de eliminar esta Cita ?',
	    text: "¡Si no lo está puede cancelar la acción!",
	    type: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    cancelButtonText: 'Cancelar',
	    confirmButtonText: 'Si, eliminar Cita !'
	  }).then(function(result){

	    if(result.value){

	    	var datos = new FormData();
	    
       		datos.append("eliminarCi", eliminarCi);
       		$.ajax({

	          url:"ajax/cita.ajax.php",
	          method: "POST",
	          data: datos,
	          cache: false,
	          contentType: false,
	          processData: false,
	          success:function(respuesta){


			console.log("respuesta", respuesta);

	          	if(respuesta == "ok"){
	         /*=============================================
			CARGAR TABLA
			=============================================*/
            
			tablaCitaA.ajax.reload( function ( json ) {
			    $('#myInput').val( json.lastInput );
			    
			} );

	          		swal({
	                  type: "success",
	                  title: "¡CORRECTO!",
	                  text: "El Cita  ha sido borrado correctamente",
	                  showConfirmButton: true,
	                  confirmButtonText: "Cerrar",
	                  closeOnConfirm: false
	                 })
	          	}

	          }

	        })  

	    }

	})

}) 


/*=============================================
MODIFICAR DATOS
=============================================*/
function modificadatosCita(Edi_cit_codigo,Edi_cit_fecha,Edi_texa_codigo,Edi_cit_hora){
datos= "Edi_cit_codigo="+Edi_cit_codigo+
	   "&Edi_cit_fecha="+ Edi_cit_fecha+
	   "&Edi_texa_codigo="+ Edi_texa_codigo+
	   "&Edi_cit_hora="+ Edi_cit_hora;
	   console.log("datos", datos);	
        
        $.ajax({
		url:'ajax/cita.ajax.php',
		method: "POST",
		data: datos, 
		success:function(respuesta){   
			console.log("respuesta", respuesta);	
			if(respuesta == 1){
				
		
			/*=============================================
			Vuelva a cargar los datos de la tabla cada 30 segundos (se conserva la paginación):
			=============================================*/
			tablaCitaA.ajax.reload( function ( json ) {
			    $('#myInput').val( json.lastInput );
			} );

			/*=============================================
			Cerrar el modal
			=============================================*/
            $('#editarCita').modal('toggle');
		    swal({
						  type: "success",
						  title: "La cita ha sido modificado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })	


				 
			} else if(respuesta==2){
				swal({
					type: "error",
					title: "¡Registro Ocupado ya tiene Fecha y Hora!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					})
			}else if(respuesta==3){
				swal({
					type: "error",
					title: "¡No se Atiende los Domingos!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					})
			}
			else if(respuesta==4){
				swal({
					type: "error",
					title: "¡Los Sabados se Atiende hasta las 12:30!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					})
			}
			else if(respuesta==0){
				swal({
					type: "error",
					title: "¡Revise los datos ingresados no puede ir vacío o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					})
			}			
		}
		

	  });
	  
}

/*=============================================
BOTON EDITAR CITA
=============================================*/
	$(document).ready(function(){
	$(".EditarCita").click(function(){ 

		Edi_cit_codigo=$('#Edi_cit_codigo').val();
		Edi_cit_fecha=$('#Edi_cit_fecha').val();
		Edi_texa_codigo=$('#Edi_texa_codigo').val();
        Edi_cit_hora=$('#Edi_cit_hora').val();

		
        modificadatosCita(Edi_cit_codigo,Edi_cit_fecha,Edi_texa_codigo,Edi_cit_hora);
		console.log("Edi_cit_codigo ",Edi_cit_codigo);
		

	});

	});


 $(document).ready(function(){
        var Rhora = $('#Rhora');
        
        //Ejecutar accion al cambiar de opcion en el select de las codExamen2
        $('#codExamen2').change(function(){
          var codExamen2_id = $(this).val(); //obtener el id seleccionado

          if(codExamen2_id !== ''){ //verificar haber seleccionado una opcion valida

            /*Inicio de llamada ajax*/
            $.ajax({
              data: {codExamen2_id:codExamen2_id}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
              dataType: 'html', //tipo de datos que esperamos de regreso
              type: 'POST', //mandar variables como post o get
              url:'ajax/get_discos.php'//url que recibe las variables
            }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             

              Rhora.html(data); //establecemos el contenido html de Rhora con la informacion que regresa ajax             
              Rhora.prop('disabled', false); //habilitar el select
            });
            /*fin de llamada ajax*/

          }else{ //en caso de seleccionar una opcion no valida
            Rhora.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
            Rhora.prop('disabled', true); //deshabilitar el select
          }    
        });


     

      });




 $(function(){
    $('.datetimepicker2').datepicker({
        startDate: '-0m'
        ,format: 'yyyy-mm-dd',
        //endDate: '+2d'
    }).on('changeDate', function(ev){
        $('#citafecha2').text($('.datetimepicker2').data('date'));
        $('.datetimepicker2').datepicker('hide');
    });

})
 
 


 $(document).ready(function(){
        var Edi_cit_hora = $('#Edi_cit_hora');
        
        //Ejecutar accion al cambiar de opcion en el select de las Edi_texa_codigo
        $('#Edi_texa_codigo').change(function(){
          var Edi_texa_codigo_id = $(this).val(); //obtener el id seleccionado

          if(Edi_texa_codigo_id !== ''){ //verificar haber seleccionado una opcion valida

            /*Inicio de llamada ajax*/
            $.ajax({
              data: {Edi_texa_codigo_id:Edi_texa_codigo_id}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
              dataType: 'html', //tipo de datos que esperamos de regreso
              type: 'POST', //mandar variables como post o get
              url:'ajax/get_discos2.php'//url que recibe las variables
            }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             

              Edi_cit_hora.html(data); //establecemos el contenido html de Edi_cit_hora con la informacion que regresa ajax             
              Edi_cit_hora.prop('disabled', false); //habilitar el select
            });
            /*fin de llamada ajax*/

          }else{ //en caso de seleccionar una opcion no valida
            Edi_cit_hora.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
            Edi_cit_hora.prop('disabled', true); //deshabilitar el select
          }    
        });


     

      }); 

/*=============================================
CAMBIAR ESTADO CITA
=============================================*/  

$(document).on("click", ".btnActivarcita", function(){

	var idcita = $(this).attr("idcita");
	

// console.log("idcita", idcita);
	swal({
	    title: 'Cita Atendida',
	    text: "¡Si no lo está puede cancelar la acción!",
	    type: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    cancelButtonText: 'Cancelar',
	    confirmButtonText: 'Cita Atendida!'
	  }).then(function(result){

	    if(result.value){

	    	var datos = new FormData();
	    
       		datos.append("idcita", idcita);
       		$.ajax({

	          url:"ajax/cita.ajax.php",
	          method: "POST",
	          data: datos,
	          cache: false,
	          contentType: false,
	          processData: false,
	          success:function(respuesta){


			// console.log("respuesta", respuesta);

	          	if(respuesta == 1){
	         /*=============================================
			CARGAR TABLA
			=============================================*/
            
			tablaCitaA.ajax.reload( function ( json ) {
			    $('#myInput').val( json.lastInput );
			    
			} );

	          		swal({
	                  type: "success",
	                  title: "¡CORRECTO!",
	                  text: "El Cita  ha sido atendida correctamente",
	                  showConfirmButton: true,
	                  confirmButtonText: "Cerrar",
	                  closeOnConfirm: false
	                 })
	          	}

	          }

	        })  

	    }

	})

}) 
