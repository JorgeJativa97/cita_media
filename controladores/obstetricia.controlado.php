<?php 

class ControladorObstetra{


/*=============================================
=============================================*/   

	static function ctrMostrarObstetra($item, $valor){

		$tabla = "obstetricia"; 

		$respuesta = ModeloObstetra::mdlMostrarObstetra($tabla, $item, $valor); 

		return $respuesta;

	}  

/*=============================================
=============================================*/   

	static function ctrMostrarObstetraPaciente($item2,$valor2){

		$tabla = "obstetricia"; 

		$respuesta = ModeloObstetra::mdlMostrarExamenObs($tabla,$item2,$valor2); 

		return $respuesta;

	}  

/*=============================================
MOSTRAR EXAMEN OBESTENTRICIA PARA EDITAR
=============================================*/  

static function ctrMostrarExamenObstentricia($item, $valor){ 

	$tabla = "obstetricia"; 

	$respuesta = ModeloObstetra::mdlMostrarExamenObstentricia($tabla, $item, $valor);

	return $respuesta;
 
} 


	// /* REGistro usuario */
static public function ctrCrearExamenObstetra(){
    if(isset($_POST["personal"])){
    //     if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST['VentriculosLaterales']) 
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Ventriculos_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["PlexosCoroideos"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Plexos_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Talamo"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Talamo_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cerebelo"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cerebelo_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["FosaPosterior"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["FosaPosterior_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cavum_S_P"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cavum_S_P_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Labios"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Labios_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Fosas_Orbitrarias"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Fosas_Orbitrarias_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["O_nasales"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["O_nasales_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cuatro_cavidades"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cuatro_cavidades_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Septum_Interventricular"]) 
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Septum_Interventricular_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Vasos_sanguineos"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Vasos_sanguineos_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cayado_Aortico"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cayado_Aortico_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Aorta"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Aorta_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Pulmones"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Pulmones_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Diafragma"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Diafragma_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["PlexoSN"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Plexos"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Columna_vertebral"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Columna_vertebral_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Pared_Abdominal"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Pared_Abdominal_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Estomago"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Estomago_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["VesiculaBilliar"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["VesiculaBilliar_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Rinon_derecho"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Rinon_derecho_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Rinon_Izquierdo"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Rinon_Izquierdo_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Vejiga_Urinaria"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Vejiga_Urinaria_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Humero"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Humero_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cubito"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Cubito_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Radial"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Radial_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Mano"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Mano_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Dedos"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Dedos_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["TalamoSN"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Talamo"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Femur"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Femur_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Tibia"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Tibia_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Perone"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Perone_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Pies"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Pies_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Dedosp"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Dedosp_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Mov_Respiratorios"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Mov_Respiratorios_comentario"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Mov_Del_feto"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Mov_Del_feto_comentario"]) 
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Anexos_Cordon"])
	// 	&& preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $_POST["Anexos_Cordon_comentario"])
    //     && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["personal"]))
	
	// {
         
		// echo '<pre>'; print_r($_POST["VentriculosSN"]); echo '</pre>';
                       
        $respuesta = ModeloObstetra::mldIngresarObstetricia();

		
		
        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "Los datos han sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "examenObstetricia";
                            }
                    })
            </script>';
        }

        // } 
		
		else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡Los datos están vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "examenObstetricia";
                
            });
            </script>';
           
       		 }

    	 }
	}    

	//  /*=============================================
//     Eliminar persona
//     =============================================*/

	static public function ctrEliminarExamenObstentricia($eobstetra){

	$tabla = "obstetricia";

	$respuesta = ModeloObstetra::mldExamenObstentricia($tabla, $eobstetra);

	return $respuesta; 

	} 

	//  /*=============================================
//     =============================================*/

	static public function ctrEditarExamenObstentricia(){
		if(isset($_POST["Edi_obs_codigo"])){
			// if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_fecha"]) 
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Ven"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Ven_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_PlexosCo"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_PlexosCo_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Talamo"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Talamo_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Cere"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Cere_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_FosaPost"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_FosaPost_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Cavum"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Cavum_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Labios"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Labios_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Fosas_Orbi"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Fosas_Orbi_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Onasales"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Onasales_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_p_Abdom"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_p_Abdom_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Estomago"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Estomago_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_VBilliar"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_VBilliar_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Rinon_der"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Rinon_der_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Rinon_izq"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Rinon_izq_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Veji_Uri"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Veji_Uri_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Cuatro_cav"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Cuatro_cav_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Septum_Int"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Septum_Int_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Vasos_san"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Vasos_san_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Cayado_Ao"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Cayado_Ao_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Aorta"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Aorta_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_pulmones"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_pulmones_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Diafra"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Diafra_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_co_vertebral"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_co_vertebral_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Humero"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Humero_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_cubito"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_cubito_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_radial"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_radial_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_mano"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_mano_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_dedos"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_dedos_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_femur"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_femur_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_tibia"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_tibia_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Perone"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Perone_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_pies"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_pies_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_dedosp"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_dedosp_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_mRespi"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_mRespi_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Mov_feto"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_Mov_feto_comen"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_ACordon"])
			// && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_obs_ACordon_comen"])){
									  
			$respuesta = ModeloObstetra::mldEditarExamenObstentricia();
	
			if($respuesta == "ok"){
	
				echo'<script>
				swal({
					  type: "success",
					  title: "El examen se edito correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
								window.location = "examenObstetricia";
								}
						})
				</script>';
			}
	
			//} 
			else {
				echo ' <script>
				swal(
					{type: "error",
						title: "¡El examen no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
						  if (result.value) {
						  window.location = "examenObstetricia";
					
				});
				</script>';
			   
			}
	
		}
	}     
	

}