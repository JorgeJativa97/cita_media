<?php

require_once "conexion.php"; 

class ModeloObstetra{

    /*=============================================
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarObstetra($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM obstetricia INNER JOIN paciente ON obstetricia.pac_codigo = paciente.pac_identificacion WHERE obstetricia.obs_codigo=$valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM obstetricia INNER JOIN paciente ON obstetricia.pac_codigo = paciente.pac_identificacion");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  

            static public function mdlMostrarExamenObs($tabla,$item2,$valor2){       
           
            $stmt = Conexion::conectar()->prepare("SELECT * FROM obstetricia INNER JOIN paciente ON obstetricia.pac_codigo = paciente.pac_identificacion WHERE paciente.pac_identificacion=$valor2");
           
            $stmt -> execute();
            return $stmt -> fetchAll();
    
        
        $stmt -> close();
        $stmt = null;
    
    }
/*=============================================
MOSTRAR EXAMEN OBESTENTRICIA PARA EDITAR
=============================================*/  
static public function mdlMostrarExamenObstentricia($tabla, $item, $valor){

    if($item != null && $valor != null){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM obstetricia WHERE obstetricia.obs_codigo = $valor");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

    }else{

        $stmt = Conexion::conectar()->prepare("SELECT * FROM obstetricia"); 

        $stmt -> execute();

        return $stmt -> fetchAll();

    }

    $stmt-> close();

    $stmt = null;

}  



    static public function mldIngresarObstetricia(){


        date_default_timezone_set('America/Bogota'); 
    $fechaActual = date('Y-m-d');
	$codigo=$_POST['codPaciente'];
    $per_codigo=$_POST['personal'];
	$VentriculosLaterales=$_POST['VentriculosLaterales'];
    $Ventriculos_comentario=$_POST['Ventriculos_comentario'];
    $PlexosCoroideos=$_POST['PlexosCoroideos'];
    $Plexos_comentario=$_POST['Plexos_comentario'];
    $Talamo=$_POST['Talamo'];
    $Talamo_comentario=$_POST['Talamo_comentario'];
    $Cerebelo=$_POST['Cerebelo'];
    $Cerebelo_comentario=$_POST['Cerebelo_comentario'];
    $FosaPosterior=$_POST['FosaPosterior'];
    $FosaPosterior_comentario=$_POST['FosaPosterior_comentario'];
    $Cavum_S_P=$_POST['Cavum_S_P'];
    $Cavum_S_P_comentario=$_POST['Cavum_S_P_comentario'];
    $Labios=$_POST['Labios'];
    $Labios_comentario=$_POST['Labios_comentario'];
    $Fosas_Orbitrarias=$_POST['Fosas_Orbitrarias'];
    $Fosas_Orbitrarias_comentario=$_POST['Fosas_Orbitrarias_comentario'];
    $O_nasales=$_POST['O_nasales'];
    $O_nasales_comentario=$_POST['O_nasales_comentario'];
    $Pared_Abdominal=$_POST['Pared_Abdominal'];
    $Pared_Abdominal_comentario=$_POST['Pared_Abdominal_comentario'];
    $Estomago=$_POST['Estomago'];
    $Estomago_comentario=$_POST['Estomago_comentario'];
    $VesiculaBilliar=$_POST['VesiculaBilliar'];
    $VesiculaBilliar_comentario=$_POST['VesiculaBilliar_comentario'];
    $Rinon_derecho=$_POST['Rinon_derecho'];
    $Rinon_derecho_comentario=$_POST['Rinon_derecho_comentario'];
    $Rinon_Izquierdo=$_POST['Rinon_Izquierdo'];
    $Rinon_Izquierdo_comentario=$_POST['Rinon_Izquierdo_comentario'];
    $Vejiga_Urinaria=$_POST['Vejiga_Urinaria'];
    $Vejiga_Urinaria_comentario=$_POST['Vejiga_Urinaria_comentario'];
    $Cuatro_cavidades=$_POST['Cuatro_cavidades'];
    $Cuatro_cavidades_comentario=$_POST['Cuatro_cavidades_comentario'];
    $Septum_Interventricular=$_POST['Septum_Interventricular'];
    $Septum_Interventricular_comentario=$_POST['Septum_Interventricular_comentario'];
    $Vasos_sanguineos=$_POST['Vasos_sanguineos'];
    $Vasos_sanguineos_comentario=$_POST['Vasos_sanguineos_comentario'];
    $Cayado_Aortico=$_POST['Cayado_Aortico'];
    $Cayado_Aortico_comentario=$_POST['Cayado_Aortico_comentario'];
    $Aorta=$_POST['Aorta'];
    $Aorta_comentario=$_POST['Aorta_comentario'];
    $Pulmones=$_POST['Pulmones'];
    $Pulmones_comentario=$_POST['Pulmones_comentario'];
    $Diafragma=$_POST['Diafragma'];
    $Diafragma_comentario=$_POST['Diafragma_comentario'];
    $Columna_vertebral=$_POST['Columna_vertebral'];
    $Columna_vertebral_comentario=$_POST['Columna_vertebral_comentario'];
    $Humero=$_POST['Humero'];
    $Humero_comentario=$_POST['Humero_comentario'];
    $Cubito=$_POST['Cubito'];
    $Cubito_comentario=$_POST['Cubito_comentario'];
    $Radial=$_POST['Radial'];
    $Radial_comentario=$_POST['Radial_comentario'];
    $Mano=$_POST['Mano'];
    $Mano_comentario=$_POST['Mano_comentario'];
    $Dedos=$_POST['Dedos'];
    $Dedos_comentario=$_POST['Dedos_comentario'];
    $Femur=$_POST['Femur'];
    $Femur_comentario=$_POST['Femur_comentario'];
    $Tibia=$_POST['Tibia'];
    $Tibia_comentario=$_POST['Tibia_comentario'];
    $Perone=$_POST['Perone'];
    $Perone_comentario=$_POST['Perone_comentario'];
    $Pies=$_POST['Pies'];
    $Pies_comentario=$_POST['Pies_comentario'];
    $Dedosp=$_POST['Dedosp'];
    $Dedosp_comentario=$_POST['Dedosp_comentario'];
    $Mov_Respiratorios=$_POST['Mov_Respiratorios'];
    $Mov_Respiratorios_comentario=$_POST['Mov_Respiratorios_comentario'];
    $Mov_Del_feto=$_POST['Mov_Del_feto'];
    $Mov_Del_feto_comentario=$_POST['Mov_Del_feto_comentario'];
    $Anexos_Cordon=$_POST['Anexos_Cordon'];
    $Anexos_Cordon_comentario=$_POST['Anexos_Cordon_comentario'];
    

        $stmt = Conexion::conectar()->prepare("CALL agg_pac_obstetricia('$per_codigo','$codigo','$fechaActual','$VentriculosLaterales','$Ventriculos_comentario',
		'$PlexosCoroideos','$Plexos_comentario','$Talamo','$Talamo_comentario','$Cerebelo',
		'$Cerebelo_comentario','$FosaPosterior','$FosaPosterior_comentario','$Cavum_S_P','$Cavum_S_P_comentario','$Labios','$Labios_comentario','$Fosas_Orbitrarias',
		'$Fosas_Orbitrarias_comentario','$O_nasales',
		'$O_nasales_comentario','$Pared_Abdominal','$Pared_Abdominal_comentario','$Estomago','$Estomago_comentario','$VesiculaBilliar','$VesiculaBilliar_comentario',
		'$Rinon_derecho','$Rinon_derecho_comentario','$Rinon_Izquierdo','$Rinon_Izquierdo_comentario',
		'$Vejiga_Urinaria','$Vejiga_Urinaria_comentario','$Cuatro_cavidades',
		'$Cuatro_cavidades_comentario','$Septum_Interventricular',
		'$Septum_Interventricular_comentario','$Vasos_sanguineos','$Vasos_sanguineos_comentario','$Cayado_Aortico',
		'$Cayado_Aortico_comentario',
		'$Aorta','$Aorta_comentario','$Pulmones','$Pulmones_comentario',
		'$Diafragma','$Diafragma_comentario','$Columna_vertebral','$Columna_vertebral_comentario','$Humero','$Humero_comentario',
		'$Cubito','$Cubito_comentario','$Radial','$Radial_comentario','$Mano','$Mano_comentario','$Dedos','$Dedos_comentario','$Femur','$Femur_comentario',
		'$Tibia','$Tibia_comentario','$Perone','$Perone_comentario','$Pies','$Pies_comentario',
		'$Dedosp','$Dedosp_comentario','$Mov_Respiratorios','$Mov_Respiratorios_comentario',
		'$Mov_Del_feto','$Mov_Del_feto_comentario','$Anexos_Cordon',
		'$Anexos_Cordon_comentario')"); 



		echo '<pre>'; print_r($stmt); echo '</pre>';

        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    }  

    // /*=============================================
//     Eliminar persona
//     =============================================*/ 

    static public function mldExamenObstentricia(){ 

    $eobstetra = $_POST["eobstetra"];

    $stmt = Conexion::conectar()->prepare("CALL eliminar_paciente_obstetricia('$eobstetra')"); 

    $stmt -> bindParam(":obs_codigo", $eobstetra, PDO::PARAM_INT);

    if($stmt -> execute()){

        return "ok";
    
    }else{

        echo "\nPDO::errorInfo():\n";
        print_r(Conexion::conectar()->errorInfo());

    }

    $stmt -> close();

    $stmt = null;

}  


    // /*=============================================
//     =============================================*/ 


static public function mldEditarExamenObstentricia(){ 

    $codigo=$_POST["Edi_obs_codigo"];
    $fecha=$_POST["Edi_obs_fecha"];
	$ventri=$_POST["Edi_obs_Ven"];
	$vencom= $_POST["Edi_obs_Ven_comen"];
	$plexo=$_POST['Edi_obs_PlexosCo'];
    $plexcomen=$_POST['Edi_obs_PlexosCo_comen'];
	$tala=$_POST['Edi_obs_Talamo'];
    $talamocom=$_POST['Edi_obs_Talamo_comen'];
    $cerebe=$_POST['Edi_obs_Cere'];
    $cerebecom=$_POST['Edi_obs_Cere_comen'];
	$fosa=$_POST['Edi_obs_FosaPost'];
    $fosacom=$_POST['Edi_obs_FosaPost_comen'];
    $cavu=$_POST['Edi_obs_Cavum'];
    $cavumcomen=$_POST['Edi_obs_Cavum_comen'];
	$labio=$_POST['Edi_obs_Labios'];
    $labiocomen=$_POST['Edi_obs_Labios_comen'];
    $fosaorbi=$_POST['Edi_obs_Fosas_Orbi'];
    $fosaorbicomen=$_POST['Edi_obs_Fosas_Orbi_comen'];
	$onasal=$_POST['Edi_obs_Onasales'];
    $onasalescomen=$_POST['Edi_obs_Onasales_comen'];
    $abdomen=$_POST['Edi_obs_p_Abdom'];
    $abdomencomen=$_POST['Edi_obs_p_Abdom_comen'];
    $estomago=$_POST['Edi_obs_Estomago'];
    $estomagocomen=$_POST['Edi_obs_Estomago_comen'];
    $vbilia=$_POST['Edi_obs_VBilliar'];
    $vbiliarcomen=$_POST['Edi_obs_VBilliar_comen'];
    $rdere=$_POST['Edi_obs_Rinon_der'];
    $rinondercomen=$_POST['Edi_obs_Rinon_der_comen']; 
    $rinoizq=$_POST['Edi_obs_Rinon_izq'];
    $rizquicomen=$_POST['Edi_obs_Rinon_izq_comen'];
    $vejiga=$_POST['Edi_obs_Veji_Uri'];
    $vejigacomen=$_POST['Edi_obs_Veji_Uri_comen']; 
    $cuatrocavi=$_POST['Edi_obs_Cuatro_cav'];
    $cuatrocavicomen=$_POST['Edi_obs_Cuatro_cav_comen'];
    $septum=$_POST['Edi_obs_Septum_Int'];
    $septumcomen=$_POST['Edi_obs_Septum_Int_comen'];
    $vasos=$_POST['Edi_obs_Vasos_san'];
    $vasoscomen=$_POST['Edi_obs_Vasos_san_comen'];
    $cayado=$_POST['Edi_obs_Cayado_Ao'];
    $cayadocomen=$_POST['Edi_obs_Cayado_Ao_comen']; 
    $aort=$_POST['Edi_obs_Aorta'];
    $aotacomen=$_POST['Edi_obs_Aorta_comen'];
    $pulmones=$_POST['Edi_obs_pulmones'];
    $pulmonescomen=$_POST['Edi_obs_pulmones_comen'];
    $diafracma=$_POST['Edi_obs_Diafra'];
    $diafracmacomen=$_POST['Edi_obs_Diafra_comen'];
    $cvertebral=$_POST['Edi_obs_co_vertebral'];
    $cvertebralcomen=$_POST['Edi_obs_co_vertebral_comen']; 
    $humer=$_POST['Edi_obs_Humero'];
    $humercomen=$_POST['Edi_obs_Humero_comen'];
    $cubito=$_POST['Edi_obs_cubito'];
    $cubitocomen=$_POST['Edi_obs_cubito_comen'];
    $radial=$_POST['Edi_obs_radial'];
    $radialcomen=$_POST['Edi_obs_radial_comen'];
    $mano=$_POST['Edi_obs_mano'];
    $manocomen=$_POST['Edi_obs_mano_comen']; 
    $dedos=$_POST['Edi_obs_dedos'];
    $dedoscomen=$_POST['Edi_obs_dedos_comen'];
    $femur=$_POST['Edi_obs_femur'];
    $femurcomen=$_POST['Edi_obs_femur_comen'];
    $tibia=$_POST['Edi_obs_tibia'];
    $tibiacomen=$_POST['Edi_obs_tibia_comen'];
    $perone=$_POST['Edi_obs_Perone'];
    $peronecomen=$_POST['Edi_obs_Perone_comen']; 
    $pies=$_POST['Edi_obs_pies'];
    $piescomen=$_POST['Edi_obs_pies_comen'];
    $dedospie=$_POST['Edi_obs_dedosp'];
    $dedospiecomen=$_POST['Edi_obs_dedosp_comen'];
    $mRespi=$_POST['Edi_obs_mRespi'];
    $mRespicomen=$_POST['Edi_obs_mRespi_comen']; 
    $Movfeto=$_POST['Edi_obs_Mov_feto'];
    $Movfetocomen=$_POST['Edi_obs_Mov_feto_comen'];
    $ACordon=$_POST['Edi_obs_ACordon'];
    $ACordoncomen=$_POST['Edi_obs_ACordon_comen'];


 $stmt = Conexion::conectar()->prepare("CALL actualizar_paciente_obstetricia('$codigo','$fecha','$ventri','$vencom','$plexo','$plexcomen','$tala','$talamocom','$cerebe','$cerebecom','$fosa','$fosacom','$cavu','$cavumcomen','$labio','$labiocomen','$fosaorbi','$fosaorbicomen','$onasal','$onasalescomen','$abdomen','$abdomencomen','$estomago','$estomagocomen','$vbilia','$vbiliarcomen','$rdere','$rinondercomen','$rinoizq','$rizquicomen','$vejiga','$vejigacomen','$cuatrocavi','$cuatrocavicomen','$septum','$septumcomen','$vasos','$vasoscomen','$cayado','$cayadocomen','$aort','$aotacomen','$pulmones','$pulmonescomen','$diafracma','$diafracmacomen','$cvertebral','$cvertebralcomen','$humer','$humercomen','$cubito','$cubitocomen','$radial','$radialcomen','$mano','$manocomen','$dedos','$dedoscomen','$femur','$femurcomen','$tibia','$tibiacomen','$perone','$peronecomen','$pies','$piescomen','$dedospie','$dedospiecomen','$mRespi','$mRespicomen','$Movfeto','$Movfetocomen','$ACordon','$ACordoncomen')");     

     if($stmt -> execute()){

         return "ok";
     
     }else{

         return "error"; 

     }

     $stmt -> close();

     $stmt = null;

 }  


}