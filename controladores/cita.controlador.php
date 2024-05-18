<?php 
 
class ControladorCita{ 

	/*=============================================
	MOSTRAR DATOS DE LAS PCITAS
	=============================================*/ 
    static public function ctrMostrarCita($item,$valor){
        $tabla ="persona";
 
        $respuesta = ModeloCita::mdlMostrarCita($tabla,$item,$valor);
        return $respuesta;
    }


        static public function ctrMostrarPacienteUnico($item2,$valor2){

        $tabla ="persona";

        $respuesta = ModeloCita::mdlMostrarPacienteU($tabla,$item2,$valor2);
        return $respuesta;
        

    }
        static public function ctrMostrarDoctorEx($item3,$valor3){

        $tabla ="persona";

        $respuesta = ModeloCita::mdlMostrarDoctorC($tabla,$item3,$valor3);
        return $respuesta;
        

    }

        static function ctrMostrarPlantillaExamenDoctor($item, $valor){

        $tabla = " tipo_ecografia"; 

        $respuesta = ModeloPlantillaExamen::mdlMostrarPlantillaExamenDoctor($tabla, $item, $valor);

        return $respuesta;

    }


    /*=============================================
MOSTRAR Paciente
=============================================*/  

    static function ctrMostrarExamenT($item, $valor){

        $tabla = "hora"; 

        $respuesta = ModeloCita::mdlMostrarExamenT($tabla, $item, $valor);

        return $respuesta;

    }

        /*=============================================
MOSTRAR cita
=============================================*/  

    static function ctrMostrarHora($item, $valor){

        $tabla = "hora"; 

        $respuesta = ModeloCita::mdlMostrarHora($tabla, $item, $valor);

        return $respuesta;

    }

//     /* REGistro Cira */
// static public function ctrCrearCita(){
//     if(isset($_POST["codCita"])){
//         if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["codCita"]) 
//         && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["codExamen2"])){
           
                       
//         $respuesta = ModeloCita::mldIngresarCita();


//         if($respuesta == "ok"){
                                           
//             echo'<script>
//             swal({
//                   type: "success",
//                   title: "La cita ha sido guardada correctamente",
//                   showConfirmButton: true,
//                   confirmButtonText: "Cerrar"
//                   }).then(function(result){
//                             if (result.value) {
//                             window.location = "cita";
//                             }
//                     })
//             </script>';
//         }

//         } else {
//             echo ' <script>
//             swal(
//                 {type: "error",
//                     title: "¡La cita no puede ir vacío o llevar caracteres especiales!",
//                     showConfirmButton: true,
//                     confirmButtonText: "Cerrar"
//                     }).then(function(result){
//                       if (result.value) {
//                       window.location = "cita";
                
//             });
//             </script>';
           
//         }

//     }
// }   

//     /* REGistro Cira */
// static public function ctrCrearCita(){
//     if(isset($_POST["codCita"])){
//         if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["codCita"]) 
//         && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["codExamen2"])){
                                    

//                            $respuesta1 = ModeloCita::mdlValidarFechaHora();   
//                              echo '<pre>'; print_r($respuesta1); echo '</pre>';
//                              var_dump ($respuesta1);
       
//                             if($respuesta1 == null){
//                               $respuesta = ModeloCita::mldIngresarCita();
//                                 echo'<script>
//                                 swal({
//                                       type: "success",
//                                       title: "La cita ha sido guardada correctamente",
//                                       showConfirmButton: true,
//                                       confirmButtonText: "Cerrar"
//                                       }).then(function(result){
//                                                 if (result.value) {
//                                                 window.location = "cita";
//                                                 }
//                                         })
//                                 </script>';
//                             }else {
//                                 echo ' <script>
//                                 swal(
//                                     {type: "error",
//                                         title: "¡Paciente ya asignado a esa Fecha y Hora!",
//                                         showConfirmButton: true,
//                                         confirmButtonText: "Cerrar"
//                                         }).then(function(result){
//                                           if (result.value) {
//                                           window.location = "cita";
                                    
//                                 });
//                                 </script>';
                               
//                                   }


//         }  else {
//             echo ' <script>
//             swal(
//                 {type: "error",
//                     title: "¡La cita no puede ir vacío o llevar caracteres especiales!",
//                     showConfirmButton: true,
//                     confirmButtonText: "Cerrar"
//                     }).then(function(result){
//                       if (result.value) {
//                       window.location = "cita";
                
//             });
//             </script>';
           
//         }

//     }
// }   



    public function ctrCrearCita(){

        if(isset($_POST["codCita"])){ 

            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["codCita"])&&
                preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["codExamen2"])&&
                preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["citafecha2"])){ 

             // $respuesta1 = ModeloCita::mdlValidarFechaHora();   
             //              echo '<pre>'; print_r($respuesta1); echo '</pre>';
             //                  var_dump ($respuesta1);  


            $tabla1 = "cita1";
            $datos = array("cit_hora" => ($_POST["Rhora"])); 
       
              $respuesta1 = ModeloCita::mdlValidarFechaHora($tabla1,$datos);
                

                if($respuesta1 == null){

                    $respuesta = ModeloCita::mldIngresarCita();

                    echo'<script>
                    swal({
                          type: "success",
                          title: "La cita de datos ha sido guardada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {
                                    window.location = "cita";
                                    }
                            })
                    </script>';
                }else {   
                echo'<script>
                swal({
                      type: "error",
                      title: "¡Ha Ocurrido un Error al Registrar! Esta cita de datos ya registrada",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {
                                window.location = "cita";
                                }
                        })
                </script>';} 
            }else{

                echo'<script>
                    swal({
                          type: "error",
                          title: "¡La cita de datos no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {
                            window.location = "cita";
                            }
                        })
                </script>';
            }
        }
    } 


    /*=============================================
MOSTRAR EXAMEN OBESTENTRICIA PARA EDITAR
=============================================*/  

    static function ctrMostrarExamenDatosCitas($item, $valor){

        $tabla = "cita1"; 

        $respuesta = ModeloCita::mdlMostrarDatosCitas($tabla, $item, $valor);

        return $respuesta;

    }

    //     /*=============================================
//     Eliminar cita
//     =============================================*/

    static public function ctrEliminarCita($cit_codigo){

        $tabla = "cita1";

        $respuesta = ModeloCita::mldExamenCita($tabla, $cit_codigo);

        return $respuesta; 

    } 

        /*=============================================
MOSTRAR Paciente
=============================================*/  

    static function ctrMostrarExaD($item, $valor){

        $tabla = "hora"; 

        $respuesta = ModeloCita::mdlMostrarExamenDoc($tabla, $item, $valor);

        return $respuesta;

    }
	
}  

//  public function ctrCrearCita(){

//         if(isset($_POST["codCita"])){ 

//             if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["codCita"])&&
//                 preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["codExamen2"])&&
//                 preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ\\-\\_ ]+$/', $_POST["citafecha2"])){ 

//              // $respuesta1 = ModeloCita::mdlValidarFechaHora();   
//              //              echo '<pre>'; print_r($respuesta1); echo '</pre>';
//              //                  var_dump ($respuesta1);  


//             $tabla1 = "cita1";
//             $datos = array("cit_hora" => ($_POST["Rhora"])); 
       
//               $respuesta1 = ModeloCita::mdlValidarFechaHora($tabla1,$datos);
                

//                 if($respuesta1 == null){

//                     $respuesta = ModeloCita::mldIngresarCita();

//                     echo'<script>
//                     swal({
//                           type: "success",
//                           title: "La cita de datos ha sido guardada correctamente",
//                           showConfirmButton: true,
//                           confirmButtonText: "Cerrar"
//                           }).then(function(result){
//                                     if (result.value) {
//                                     window.location = "cita";
//                                     }
//                             })
//                     </script>';
//                 }else {   
//                 echo'<script>
//                 swal({
//                       type: "error",
//                       title: "¡Ha Ocurrido un Error al Registrar! Esta cita de datos ya registrada",
//                       showConfirmButton: true,
//                       confirmButtonText: "Cerrar"
//                       }).then(function(result){
//                                 if (result.value) {
//                                 window.location = "cita";
//                                 }
//                         })
//                 </script>';} 
//             }else{

//                 echo'<script>
//                     swal({
//                           type: "error",
//                           title: "¡La cita de datos no puede ir vacío o llevar caracteres especiales!",
//                           showConfirmButton: true,
//                           confirmButtonText: "Cerrar"
//                           }).then(function(result){
//                             if (result.value) {
//                             window.location = "cita";
//                             }
//                         })
//                 </script>';
//             }
//         }


    // } 

