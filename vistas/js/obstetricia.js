var cedulaObs=$("#cedulaObs").val();
var cedulaPaciObs=$("#cedulaPaciObs").val(); 

$(".tablaObstetricia").DataTable({ 

    "ajax":"ajax/tablaObstetricia.ajax.php?cedulaObs="+cedulaObs+"&cedulaPaciObs="+cedulaPaciObs,
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
$("#crearObstetricia").on("change","#codPaciente",function(){
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
	    		$("#crearObstetricia .nombre").val(respuesta["pac_nombres"]);
	    		$("#crearObstetricia .apellidos").val(respuesta["pac_apellidos"]);
	    	}
	    });
	}
	$("#crearObstetricia").val("");
}); 
$("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  })  


/*=============================================
    =============================================*/  
    
    $(document).on("click", ".eliminareobstetra", function(){
    
        var eobstetra = $(this).attr("eobstetra");
    
         console.log("eobstetra", eobstetra);
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
                datos.append("eobstetra", eobstetra);
    
                   $.ajax({
    
                  url:"ajax/obstentricia.ajax.php",
                  method: "POST",
                  data: datos,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success:function(respuesta){
    
    
            	console.log("respuesta", respuesta);
    
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
    
                              window.location = "examenObstetricia";
    
                            }
                        
                        })
    
                      }
    
                  }
    
                })  
    
            }
    
        })
    
    }) 

 /*=============================================
TRAER DATOS PARA EDITAR
=============================================*/   

$(document).on("click",".editarObstetra", function(){

    var obstetra = $(this).attr("obstetra"); 
    
    
    //console.log("obstetra", obstetra);
    
    var datos =new FormData();
    
    datos.append("obstetra",obstetra);
     
     $.ajax({
            url:"ajax/obstentricia.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){ 
    
    console.log("respuesta", respuesta);
         // console.log("respuesta", respuesta);

         
                $('input[name="Edi_obs_fecha"]').val(respuesta["obs_fecha"]);
                
                $('input[name="Edi_obs_codigo"]').val(respuesta["obs_codigo"]);

                $('input[name="Edi_obs_Ven"]').val(respuesta["obs_Ven"]);
                $('.editarobs_Ven').val(respuesta["obs_Ven"]);
                $('.editarobs_Ven').html(respuesta["obs_Ven"]);
                $('input[name="Edi_obs_Ven_comen"]').val(respuesta["obs_Ven_comen"]);

                $('input[name="Edi_obs_PlexosCo"]').val(respuesta["obs_PlexosCo"]);
                $('.editarobs_PlexosCo').val(respuesta["obs_PlexosCo"]);
                $('.editarobs_PlexosCo').html(respuesta["obs_PlexosCo"]);                
                $('input[name="Edi_obs_PlexosCo_comen"]').val(respuesta["obs_PlexosCo_comen"]);

                $('input[name="Edi_obs_Talamo"]').val(respuesta["obs_Talamo"]);
                $('.editarobs_Talamo').val(respuesta["obs_Talamo"]);
                $('.editarobs_Talamo').html(respuesta["obs_Talamo"]);
                $('input[name="Edi_obs_Talamo_comen"]').val(respuesta["obs_Talamo_comen"]);


                $('input[name="Edi_obs_Cere"]').val(respuesta["obs_Cere"]);
                $('.editarobs_Cere').val(respuesta["obs_Cere"]);
                $('.editarobs_Cere').html(respuesta["obs_Cere"]);
                $('input[name="Edi_obs_Cere_comen"]').val(respuesta["obs_Cere_comen"]);

                $('input[name="Edi_obs_FosaPost"]').val(respuesta["obs_FosaPost"]);
                $('.editarobs_FosaPost').val(respuesta["obs_FosaPost"]);
                $('.editarobs_FosaPost').html(respuesta["obs_FosaPost"]);                
                $('input[name="Edi_obs_FosaPost_comen"]').val(respuesta["obs_FosaPost_comen"]);


                $('input[name="Edi_obs_Cavum"]').val(respuesta["obs_Cavum"]);
                $('.editarobs_Cavum').val(respuesta["obs_Cavum"]);
                $('.editarobs_Cavum').html(respuesta["obs_Cavum"]); 
                $('input[name="Edi_obs_Cavum_comen"]').val(respuesta["obs_Cavum_comen"]);

                $('input[name="Edi_obs_Labios"]').val(respuesta["obs_Labios"]);
                $('.editarobs_Labios').val(respuesta["obs_Labios"]);
                $('.editarobs_Labios').html(respuesta["obs_Labios"]);
                $('input[name="Edi_obs_Labios_comen"]').val(respuesta["obs_Labios_comen"]);

                $('input[name="Edi_obs_Fosas_Orbi"]').val(respuesta["obs_Fosas_Orbi"]);
                $('.editarobs_Fosas_Orbi').val(respuesta["obs_Fosas_Orbi"]);
                $('.editarobs_Fosas_Orbi').html(respuesta["obs_Fosas_Orbi"]);
                $('input[name="Edi_obs_Fosas_Orbi_comen"]').val(respuesta["obs_Fosas_Orbi_comen"]);

                $('input[name="Edi_obs_Onasales"]').val(respuesta["obs_Onasales"]);
                $('.editarobs_Onasales').val(respuesta["obs_Onasales"]);
                $('.editarobs_Onasales').html(respuesta["obs_Onasales"]);
                $('input[name="Edi_obs_Onasales_comen"]').val(respuesta["obs_Onasales_comen"]);


                $('input[name="Edi_obs_p_Abdom"]').val(respuesta["obs_p_Abdom"]);
                $('.editarobs_p_Abdom').val(respuesta["obs_p_Abdom"]);
                $('.editarobs_p_Abdom').html(respuesta["obs_p_Abdom"]);
                $('input[name="Edi_obs_p_Abdom_comen"]').val(respuesta["obs_p_Abdom_comen"]);

                $('input[name="Edi_obs_Estomago"]').val(respuesta["obs_Estomago"]);
                $('.editarobs_Estomago').val(respuesta["obs_Estomago"]);
                $('.editarobs_Estomago').html(respuesta["obs_Estomago"]);
                $('input[name="Edi_obs_Estomago_comen"]').val(respuesta["obs_Estomago_comen"]);

                $('input[name="Edi_obs_VBilliar"]').val(respuesta["obs_VBilliar"]);
                $('.editarobs_VBilliar').val(respuesta["obs_VBilliar"]);
                $('.editarobs_VBilliar').html(respuesta["obs_VBilliar"]);
                $('input[name="Edi_obs_VBilliar_comen"]').val(respuesta["obs_VBilliar_comen"]);


                $('input[name="Edi_obs_Rinon_der"]').val(respuesta["obs_Rinon_der"]);
                $('.editarobs_Rinon_der').val(respuesta["obs_Rinon_der"]);
                $('.editarobs_Rinon_der').html(respuesta["obs_Rinon_der"]);
                $('input[name="Edi_obs_Rinon_der_comen"]').val(respuesta["obs_Rinon_der_comen"]);


                $('input[name="Edi_obs_Rinon_izq"]').val(respuesta["obs_Rinon_izq"]);
                $('.editarobs_Rinon_izq').val(respuesta["obs_Rinon_izq"]);
                $('.editarobs_Rinon_izq').html(respuesta["obs_Rinon_izq"]);
                $('input[name="Edi_obs_Rinon_izq_comen"]').val(respuesta["obs_Rinon_izq_comen"]);


                $('input[name="Edi_obs_Veji_Uri"]').val(respuesta["obs_Veji_Uri"]);
                $('.editarobs_Veji_Uri').val(respuesta["obs_Veji_Uri"]);
                $('.editarobs_Veji_Uri').html(respuesta["obs_Veji_Uri"]);
                $('input[name="Edi_obs_Veji_Uri_comen"]').val(respuesta["obs_Veji_Uri_comen"]);
 

                $('input[name="Edi_obs_Cuatro_cav"]').val(respuesta["obs_Cuatro_cav"]);
                $('.editarobs_Cuatro_cav').val(respuesta["obs_Cuatro_cav"]);
                $('.editarobs_Cuatro_cav').html(respuesta["obs_Cuatro_cav"]);
                $('input[name="Edi_obs_Cuatro_cav_comen"]').val(respuesta["obs_Cuatro_cav_comen"]);

                $('input[name="Edi_obs_Septum_Int"]').val(respuesta["obs_Septum_Int"]);
                $('.editarobs_Septum_Int').val(respuesta["obs_Septum_Int"]);
                $('.editarobs_Septum_Int').html(respuesta["obs_Septum_Int"]);
                $('input[name="Edi_obs_Septum_Int_comen"]').val(respuesta["obs_Septum_Int_comen"]);


                $('input[name="Edi_obs_Vasos_san"]').val(respuesta["obs_Vasos_san"]);
                $('.editarobs_Vasos_san').val(respuesta["obs_Vasos_san"]);
                $('.editarobs_Vasos_san').html(respuesta["obs_Vasos_san"]);
                $('input[name="Edi_obs_Vasos_san_comen"]').val(respuesta["obs_Vasos_san_comen"]);

                $('input[name="Edi_obs_Cayado_Ao"]').val(respuesta["obs_Cayado_Ao"]);
                $('.editarobs_Cayado_Ao').val(respuesta["obs_Cayado_Ao"]);
                $('.editarobs_Cayado_Ao').html(respuesta["obs_Cayado_Ao"]);
                $('input[name="Edi_obs_Cayado_Ao_comen"]').val(respuesta["obs_Cayado_Ao_comen"]);


                $('input[name="Edi_obs_Aorta"]').val(respuesta["obs_Aorta"]);
                $('.editarobs_Aorta').val(respuesta["obs_Aorta"]);
                $('.editarobs_Aorta').html(respuesta["obs_Aorta"]);
                $('input[name="Edi_obs_Aorta_comen"]').val(respuesta["obs_Aorta_comen"]);


                $('input[name="Edi_obs_pulmones"]').val(respuesta["obs_pulmones"]);
                $('.editarobs_pulmones').val(respuesta["obs_pulmones"]);
                $('.editarobs_pulmones').html(respuesta["obs_pulmones"]);
                $('input[name="Edi_obs_pulmones_comen"]').val(respuesta["obs_pulmones_comen"]);


                $('input[name="Edi_obs_Diafra"]').val(respuesta["obs_Diafra"]);
                $('.editarobs_Diafra').val(respuesta["obs_Diafra"]);
                $('.editarobs_Diafra').html(respuesta["obs_Diafra"]);
                $('input[name="Edi_obs_Diafra_comen"]').val(respuesta["obs_Diafra_comen"]);

                $('input[name="Edi_obs_co_vertebral"]').val(respuesta["obs_co_vertebral"]);
                $('.editarobs_co_vertebral').val(respuesta["obs_co_vertebral"]);
                $('.editarobs_co_vertebral').html(respuesta["obs_co_vertebral"]);
                $('input[name="Edi_obs_co_vertebral_comen"]').val(respuesta["obs_co_vertebral_comen"]);

                $('input[name="Edi_obs_Humero"]').val(respuesta["obs_Humero"]);
                $('.editarobs_Humero').val(respuesta["obs_Humero"]);
                $('.editarobs_Humero').html(respuesta["obs_Humero"]);
                $('input[name="Edi_obs_Humero_comen"]').val(respuesta["obs_Humero_comen"]);

                $('input[name="Edi_obs_cubito"]').val(respuesta["obs_cubito"]);
                $('.editarobs_cubito').val(respuesta["obs_cubito"]);
                $('.editarobs_cubito').html(respuesta["obs_cubito"]);
                $('input[name="Edi_obs_cubito_comen"]').val(respuesta["obs_cubito_comen"]);

                $('input[name="Edi_obs_radial"]').val(respuesta["obs_radial"]);
                $('.editarobs_radial').val(respuesta["obs_radial"]);
                $('.editarobs_radial').html(respuesta["obs_radial"]);
                $('input[name="Edi_obs_radial_comen"]').val(respuesta["obs_radial_comen"]); 

                $('input[name="Edi_obs_mano"]').val(respuesta["obs_mano"]);
                $('.editarobs_mano').val(respuesta["obs_mano"]);
                $('.editarobs_mano').html(respuesta["obs_mano"]);
                $('input[name="Edi_obs_mano_comen"]').val(respuesta["obs_mano_comen"]);


                $('input[name="Edi_obs_dedos"]').val(respuesta["obs_dedos"]);
                $('.editarobs_dedos').val(respuesta["obs_dedos"]);
                $('.editarobs_dedos').html(respuesta["obs_dedos"]);
                $('input[name="Edi_obs_dedos_comen"]').val(respuesta["obs_dedos_comen"]);


                $('input[name="Edi_obs_femur"]').val(respuesta["obs_femur"]);
                $('.editarobs_femur').val(respuesta["obs_femur"]);
                $('.editarobs_femur').html(respuesta["obs_femur"]);
                $('input[name="Edi_obs_femur_comen"]').val(respuesta["obs_femur_comen"]);


                $('input[name="Edi_obs_tibia"]').val(respuesta["obs_tibia"]);
                $('.editarobs_tibia').val(respuesta["obs_tibia"]);
                $('.editarobs_tibia').html(respuesta["obs_tibia"]);
                $('input[name="Edi_obs_tibia_comen"]').val(respuesta["obs_tibia_comen"]);


                $('input[name="Edi_obs_Perone"]').val(respuesta["obs_Perone"]);
                $('.editarobs_Perone').val(respuesta["obs_Perone"]);
                $('.editarobs_Perone').html(respuesta["obs_Perone"]);
                $('input[name="Edi_obs_Perone_comen"]').val(respuesta["obs_Perone_comen"]);


                $('input[name="Edi_obs_pies"]').val(respuesta["obs_pies"]);
                $('.editarobs_pies').val(respuesta["obs_pies"]);
                $('.editarobs_pies').html(respuesta["obs_pies"]);
                $('input[name="Edi_obs_pies_comen"]').val(respuesta["obs_pies_comen"]);


                $('input[name="Edi_obs_dedosp"]').val(respuesta["obs_dedosp"]);
                $('.editarobs_dedosp').val(respuesta["obs_dedosp"]);
                $('.editarobs_dedosp').html(respuesta["obs_dedosp"]);
                $('input[name="Edi_obs_dedosp_comen"]').val(respuesta["obs_dedosp_comen"]);

                $('input[name="Edi_obs_mRespi"]').val(respuesta["obs_mRespi"]);
                $('.editarobs_mRespi').val(respuesta["obs_mRespi"]);
                $('.editarobs_mRespi').html(respuesta["obs_mRespi"]);
                $('input[name="Edi_obs_mRespi_comen"]').val(respuesta["obs_mRespi_comen"]);


                $('input[name="Edi_obs_Mov_feto"]').val(respuesta["obs_Mov_feto"]);
                $('.editarobs_Mov_feto').val(respuesta["obs_Mov_feto"]);
                $('.editarobs_Mov_feto').html(respuesta["obs_Mov_feto"]);
                $('input[name="Edi_obs_Mov_feto_comen"]').val(respuesta["obs_Mov_feto_comen"]);

                $('input[name="Edi_obs_ACordon"]').val(respuesta["obs_ACordon"]);
                $('.editarobs_ACordon').val(respuesta["obs_ACordon"]);
                $('.editarobs_ACordon').html(respuesta["obs_ACordon"]);
                $('input[name="Edi_obs_ACordon_comen"]').val(respuesta["obs_ACordon_comen"]);

                

               
                
                
            }
    
         })
    
    })  


/*=============================================
=============================================*/ 
$(document).on("click", ".btnImprimirobstetra", function(){ 
	
	var idobstetra =$(this).attr("idobstetra");

	window.open("extensiones/tcpdf/pdf/actividad.php?idobstetra="+idobstetra, "_blank"); 



})

/*=============================================
=============================================*/ 
$(document).on("click", ".btnImprimirobstetrasf", function(){ 
    
    var idobstetra =$(this).attr("idobstetra");

    window.open("extensiones/tcpdf/pdf/actividadsf.php?idobstetra="+idobstetra, "_blank"); 
})