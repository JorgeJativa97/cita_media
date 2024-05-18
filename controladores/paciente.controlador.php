<?php 

class ControladorPaciente{


/*=============================================
MOSTRAR Paciente
=============================================*/  

	static function ctrMostrarPaciente($item, $valor){

		$tabla = "paciente"; 

		$respuesta = ModeloPaciente::mdlMostrarPaciente($tabla, $item, $valor);

		return $respuesta;

	}
/*=============================================
MOSTRAR Paciente
=============================================*/  

    static function ctrMostrarPaciente34($item, $valor){

        $tabla = "paciente"; 

        $respuesta = ModeloPaciente::mdlMostrarPaciente34($tabla, $item, $valor);

        return $respuesta;

    }
/* REGistro usuario */
static public function ctrCrearPaciente(){
    if(isset($_POST["regcedula"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regnombre"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regcedula"])
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regapellidos"])){
           
                       
        $respuesta = ModeloPaciente::mldIngresarPaciente();



        $tabla ="persona"; 

        $encriptar = crypt($_POST["regcedula"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $datos = array("nombres" => $_POST["regnombre"], 
                           "apellidos" => $_POST["regapellidos"],                           
                           "email_user" => $_POST["regcorreo"],
                           "password" => $encriptar,  
                           "telefono" => $_POST["telefono"],   
                           "identificacion" => $_POST["regcedula"],
                           "rolid" => 4,
                           "status" => 1);
                        
         
        $respuesta2 = ModeloPaciente::mldIngresarPersonaPaciente($tabla,$datos);



        if($respuesta == "ok" && $respuesta2 =="ok" ){

            echo'<script>
            swal({
                  type: "success",
                  title: "Paciente se guardo correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "paciente";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡El paciente no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "paciente";
                
            });
            </script>';
           
        }

    }
}    

/* REGistro usuario */
static public function ctrEditarPaciente(){
    if(isset($_POST["editarPac"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarnombre"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarcedula"])
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarapellidos"])){
           
                  
                             
        $respuesta = ModeloPaciente::mldEditarPaciente();


        $tabla ="persona";



                if($_POST["editarPassword"] != ""){

                    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    }else{

                        echo'<script>

                                swal({
                                      type: "error",
                                      title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                      showConfirmButton: true,
                                      confirmButtonText: "Cerrar"
                                      }).then(function(result) {
                                        if (result.value) {

                                        window.location = "usuarios";

                                        }
                                    })

                            </script>';

                            return;

                    }

                }else{

                    $encriptar = $_POST["passwordActual"];

                }



                $id = $_POST["editarcedula"];
                $item = "password";
                $valor = $encriptar;

                $respuesta2 = ModeloPersona::mdlActualizarUsuario1($tabla, $id, $item, $valor);




        if($respuesta == "ok" && $respuesta2 == "ok" ){

            echo'<script>
            swal({
                  type: "success",
                  title: "El paciente se edito correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "paciente";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡El paciente no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "paciente";
                
            });
            </script>';
           
        }

    }
}     


    /*=============================================
    Eliminar persona
    =============================================*/

    static public function ctrEliminarPaciente234($codigo){

        $tabla = "paciente";

        $respuesta = ModeloPaciente::mldPaciente($tabla, $codigo);

        return $respuesta; 

    } 

        /*=============================================
    Eliminar persona
    =============================================*/

    static public function ctrEliminarPaciente34($pac_identificacion){

        $tabla = "paciente";

        $respuesta = ModeloPaciente::mldEliminarPaciente34($tabla, $pac_identificacion);

        return $respuesta; 

    } 


        /*=============================================
    Eliminar persona
    =============================================*/

    static public function ctrEliminarPersona34($pac_identificacion){

        $tabla = "persona";

        $respuesta = ModeloPaciente::mldEliminarPaciente35($tabla, $pac_identificacion);

        return $respuesta; 

    } 




        /*=============================================
    MOSTRAR TODOS LOS ROLESPARA INGRESAR EL USUARIO
    =============================================*/  
    static function ctrMostrarRolPaciente($item, $valor){

        $tabla = "rol";  
        $respuesta = ModeloPaciente::mdlMostrarRolPaciente($tabla, $item, $valor);

        return $respuesta;
    } 


} 
