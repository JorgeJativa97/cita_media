<?php 

require_once "../modelos/cita.modelo.php"; 
require_once "../controladores/cita.controlador.php"; 
 
class AjaxResusltadoExamen{

	/*=============================================O
	=============================================*/
	public $texa_codigo;

	public function ajaxMostrarPaciente(){

		$respuesta=ModeloCita::mdlMostrarExamenTipo($this->texa_codigo);
		
		echo json_encode($respuesta); 
	} 

   

	/*=============================================
    GUARDAR DATOS DOCUMENTOS
    =============================================*/ 


    public function ajaxinsertarDatosT(){ 
        

        if(isset($_POST["codCita"])){ 

             if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["codCita"])&&
                preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["codExamen2"])&&
                preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["citafecha2"])){ 

          date_default_timezone_set('America/Guayaquil'); 
          $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');

          $fecha_ing=$_POST['citafecha2'];

          $hora_ing=$_POST['Rhora'];
           // echo '<pre>'; print_r($hora_ing); echo '</pre>';

           $dia = $dias[(date('N', strtotime($fecha_ing))) - 1];

           //echo '<pre>'; print_r($dia); echo '</pre>';
       
         if ($dia=='Domingo'){ 
             $respuesta=3;
             echo json_encode($respuesta); 
         }
         else if ($dia=='Sabado'&& $hora_ing >='12:30:00') {
        $respuesta=4;
        echo json_encode($respuesta); 

        } else{
                     $tabla1 = "cita1";
            $datos = array("cit_fecha" => ($_POST["citafecha2"]),
                "cit_hora" => ($_POST["Rhora"])     ); 
       
              $respuesta1 = ModeloCita::mdlValidarFechaHora($tabla1,$datos);

               // echo '<pre>'; print_r($respuesta1); echo '</pre>';
               //          var_dump ($respuesta1);  


                             if($respuesta1== null){                            

                                 $respuesta = ModeloCita::mldIngresarCita();
                                   
                                  echo json_encode($respuesta); 

                             }else {
                               $respuesta=2;
                               echo json_encode($respuesta); 

                             }


        }

            

                 
                                
            }
        }  


} 

    /*=============================================
    TRAER DATOS PARA EDITAR
    =============================================*/  

    public $editarid;

    public function ajaxMostrarCitas(){

        $item = "cit_codigo";

        $valor = $this->editarid;

        $respuesta = ControladorCita::ctrMostrarExamenDatosCitas($item, $valor);

        echo json_encode($respuesta);

    }  

       //  /*=============================================
    // Eliminar Cita
    // =============================================*/ 

    public $eliminarCi;

    public function ajaxEliminarCita(){

        $respuesta = ControladorCita::ctrEliminarCita($this->eliminarCi);

        echo $respuesta;

    } 

        //  /*=============================================
    // CAMBIAR ESTADO Cita
    // =============================================*/ 

    public $idcita;
    public $estado;

    public function ajaxEstadoCita(){ 


        $estado ="0";
        $respuesta = ModeloCita::mdlEstadoCita($this->idcita,$estado);

        echo $respuesta;


        
    }


    /*=============================================
EDITAR DATOS CITA
=============================================*/
    public $Edi_cit_codigo; 
    public $Edi_cit_fecha;
    public $Edi_texa_codigo;
    public $Edi_cit_hora;

    public function ajaxmodificarDocumentos(){
         

        if(isset($_POST["Edi_cit_fecha"])){ 

            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["Edi_cit_fecha"])){  

          date_default_timezone_set('America/Guayaquil'); 
          $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');

          $fecha_ing=$_POST['Edi_cit_fecha'];

          $hora_ing=$_POST['Edi_cit_hora'];
           // echo '<pre>'; print_r($hora_ing); echo '</pre>';

           $dia = $dias[(date('N', strtotime($fecha_ing))) - 1];

           //echo '<pre>'; print_r($dia); echo '</pre>';
       
         if ($dia=='Domingo'){ 
             $respuesta=3;
             echo json_encode($respuesta); 
         }
         else if ($dia=='Sabado'&& $hora_ing >='12:30:00') {
        $respuesta=4;
        echo json_encode($respuesta); 

        } else{


                        $tabla1 = "cita1";
                        $datos = array("cit_fecha" => ($_POST["Edi_cit_fecha"]),
                        "cit_hora" => ($_POST["Edi_cit_hora"])     ); 
                       
                        $respuesta1 = ModeloCita::mdlValidarFechaHora($tabla1,$datos);

                        if($respuesta1== null){                           

                              $tabla = "cita1";
                              $datos = array("cit_codigo" => ($_POST["Edi_cit_codigo"]),
                                "cit_fecha" => ($_POST["Edi_cit_fecha"]),
                                 "texa_codigo" => ($_POST["Edi_texa_codigo"]),
                                 "cit_hora" => ($_POST["Edi_cit_hora"])); 


                               $respuesta = ModeloCita::mdlEditarCita($tabla, $datos); 
                               
                              echo json_encode($respuesta); 

                         }else{
                           $respuesta=2;
                           echo json_encode($respuesta); 

                         }

                     }
             
            }
        } 
        
        
        
    }

} 

/*=============================================
INNER JOIN
=============================================*/
if(isset($_POST["texa_codigo"])){ 
	$mostrar= new AjaxResusltadoExamen();
	$mostrar-> texa_codigo= $_POST["texa_codigo"];
	$mostrar-> ajaxMostrarPaciente();
}  


/*=============================================
GUARDAR CITA
=============================================*/
if(isset($_POST["codCita"])){
    $ActivarUsuario = new AjaxResusltadoExamen();
    $ActivarUsuario -> ajaxinsertarDatosT();

} 
/*=============================================
Editar CITA
=============================================*/

if(isset($_POST["editarid"])){

    $editar = new AjaxResusltadoExamen();
    $editar -> editarid= $_POST["editarid"];
    $editar -> ajaxMostrarCitas();

} 
// /*=============================================
// Eliminar persona
// =============================================*/

if(isset($_POST["eliminarCi"])){

    $eliminar = new AjaxResusltadoExamen();
    $eliminar -> eliminarCi= $_POST["eliminarCi"];
    $eliminar -> ajaxEliminarCita();

} 

// /*=============================================
// Estado cita
// =============================================*/

if(isset($_POST["idcita"])){

    $estado = new AjaxResusltadoExamen();
    $estado -> idcita= $_POST["idcita"];
    $estado -> ajaxEstadoCita();

}


/*=============================================
EDITAR DOUMENTOS
=============================================*/

if(isset($_POST["Edi_cit_fecha"])){

    $ActivarUsuario1 = new AjaxResusltadoExamen();
    $ActivarUsuario1 -> Edi_cit_fecha= $_POST["Edi_cit_fecha"];
    $ActivarUsuario1 -> Edi_cit_codigo= $_POST["Edi_cit_codigo"];
    $ActivarUsuario1 -> Edi_texa_codigo= $_POST["Edi_texa_codigo"];
    $ActivarUsuario1 -> Edi_cit_hora= $_POST["Edi_cit_hora"];
    $ActivarUsuario1 -> ajaxmodificarDocumentos();

} 
