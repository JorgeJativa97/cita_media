var cedulaResultado=$("#cedulaResultado").val();
 

var cedulaPaEx=$("#cedulaPaEx").val();  

var cedulaDoctor=$("#cedulaDoctor").val(); 
 
$(".tablaResultadoExamen").DataTable({  

    "ajax":"ajax/tablaresultadoExamen.ajax.php?cedulaResultado="+cedulaResultado+"&cedulaPaEx="+cedulaPaEx+"&cedulaDoctor="+cedulaDoctor,
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
    $("#codExamen").select2();
    $("#codExamen").select2({
            placeholder: 'SELECCIONE EL EXAMEN',
            allowClear: true
        });    
}); 

$(document).ready(function(){
    $("#codPaciente").select2();
    $("#codPaciente").select2({
            placeholder: 'SELECCIONE EL PACIENTE',
            allowClear: true
        });    
}); 


/*=============================================
SELECT DINAMICO UNIVERIDAD
=============================================*/  
$(document).ready(function(){
   
    $("#EditarcodExamen").select2({
        placeholder: 'SELECCIONE EXAMEN',
        allowClear: true
    });

});   

/*=============================================
=============================================*/  
$("#crearExamen").on("change","#codPaciente",function(){
	var pac_identificacion=$(this).val();
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
	    		$("#crearExamen .nombre").val(respuesta["pac_nombres"]);
	    		$("#crearExamen .apellidos").val(respuesta["pac_apellidos"]);
	    	}
	    });
	}
	$("#crearExamen").val("");
}); 

/*=============================================
=============================================*/  
$("#crearExamen").on("change","#codExamen",function(){
    $("#verFormato").html(` 
      
    <textarea class="form-control input-lg descripcionExa" id="descripcionExa" name="descripcionExaf" value="" style="width: 100%"></textarea>
    
    `)
    
    var tec_codigo=$(this).val();
	if(tec_codigo!=""){
		// Petición AJAX
		var datos = new FormData();
		datos.append("tec_codigo", tec_codigo); 
		$.ajax({
			url:"ajax/resultadoExamen.ajax.php",
			method: "POST",
			data: datos,
	  		cache: false,
			contentType: false,
	    	processData: false,
	    	dataType: "json",
	    	success:function(respuesta){

			console.log("respuesta", respuesta);
	    		$("#crearExamen .descripcionExa").val(respuesta["tec_formato"]);
                ClassicEditor.create(document.querySelector('#descripcionExa'), {

                    toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
          
                  }).then(function (editor) {
                    
                    $(".ck-content").css({"height":"200px"})
          
                  }).catch(function (error) {
          
                     // console.log("error", error);
                  
                  })
	    	}
	    });
	}
	$("#crearExamen").val("");
}); 

/*=============================================
Plugin ckEditor
=============================================*/

ClassicEditor.create(document.querySelector('#descripcionExa'), {

    toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
 
 }).then(function (editor) {
   
     $(".ck-content").css({"height":"200px"})
 
 }).catch(function (error) {
 
     // console.log("error", error);
 
 }) 

  /*=============================================
    Editar  paciente
    =============================================*/ 
    
    $(document).on("click", ".editarResultadoExamen", function(){ 

        $("#descripcionExaf").html(`
      
        <textarea id="editar" name="editar" value="" style="width: 100%"></textarea>
        
        `)
        
        var editarReExa = $(this).attr("editarReExa");  
     
         //console.log("editarReExa", editarReExa);
        var datos = new FormData();
        datos.append("editarReExa", editarReExa); 
        $.ajax({ 
            url:"ajax/resultadoExamen.ajax.php",
            method: "POST",
            data: datos, 
            cache: false,
            contentType: false, 
            processData: false,
            dataType: "json",
            success:function(respuesta){  
    
              console.log("respuesta", respuesta);

            $('input[name="editarId"]').val(respuesta["eco_codigo"]);     
            $('#EditarcodExamen').val(respuesta["tec_codigo"]); 
            $('#EditarcodExamen').trigger('change'); 
            $('input[name="editartituloExamen"]').val(respuesta["eco_titu"]); 
            $('#editar').val(respuesta["eco_formato"]);

             ClassicEditor.create(document.querySelector('#editar'), {

                toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
      
              }).then(function (editor) {
                
                $(".ck-content").css({"height":"200px"})
      
              }).catch(function (error) {
      
                 // console.log("error", error);
              
              }) 
        
            }
    
        })
    })  

/*=============================================
    Eliminar  PROGRAMA
    =============================================*/  
    
    $(document).on("click", ".eliminarResuExamen", function(){
    
        var rexamen = $(this).attr("rexamen");
    
    //  console.log("pexamen", pexamen);
        swal({
            title: '¿Está seguro de eliminar el resultado del examen?',
            text: "¡Si no lo está puede cancelar la acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
          }).then(function(result){
    
            if(result.value){
    
                var datos = new FormData();
                datos.append("rexamen", rexamen);
    
                   $.ajax({
    
                  url:"ajax/resultadoExamen.ajax.php",
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
                          text: "El resultado del examen ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                         }).then(function(result){
    
                            if(result.value){
    
                              window.location = "resultadoExamen";
    
                            }
                        
                        })
    
                      }
    
                  }
    
                })  
    
            }
    
        })
    
    })
/*=============================================
=============================================*/ 
$(document).on("click", ".btnExamensf", function(){
    
    var idoecocodigo =$(this).attr("idoecocodigo");

    window.open("extensiones/tcpdf/pdf/examensf.php?idoecocodigo="+idoecocodigo, "_blank"); 
})