<?php 

class ControladorPersona{ 

	/*=============================================
	MOSTRAR DATOS DE LAS PERSONAS CON SU ROL
	=============================================*/ 
    static public function ctrMostrarPersona($item,$valor){
        $tabla ="persona";

        $respuesta = ModeloPersona::mdlMostrarPersonaRol($tabla,$item,$valor);
        return $respuesta;
    }
     
	/*=============================================
	MOSTRAR DATOS DE LAS PERSONAS CON LA VARIABLE SESSION 
	=============================================*/ 
    static public function ctrMostrarPersona0($item,$valor){
        $tabla ="persona";
        $tabla4="rol";
        $respuesta = ModeloPersona::mdlMostrarPersona0($tabla,$tabla4,$item,$valor);
        return $respuesta;
    }

        /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS CON LA VARIABLE SESSION 
    =============================================*/ 
    static public function ctrMostrarCedulaP($item,$valor){
        $tabla ="persona";
        $tabla4="rol";
        $respuesta = ModeloPersona::mdlMostrarCedulaP($tabla,$tabla4,$item,$valor);
        return $respuesta;
    }

            /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS CON LA VARIABLE SESSION 
    =============================================*/ 
    static public function ctrMostrarCedulaD($item,$valor){
        $tabla ="persona";
        $tabla4="rol";
        $respuesta = ModeloPersona::mdlMostrarCedulaD($tabla,$tabla4,$item,$valor);
        return $respuesta;
    }
    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS CON LA VARIABLE SESSION 
    =============================================*/ 
    static public function ctrMostrarPermisos($item,$valor){
        $tabla ="persona";
        $tabla4="rol";
        $respuesta = ModeloPersona::mdlMostrarPermisos($tabla,$tabla4,$item,$valor);
        return $respuesta;
    }
    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS CON LA VARIABLE SESSION 
    =============================================*/ 
    static public function ctrMostrarPermisosU($item,$valor){
        $tabla ="persona";
        $tabla4="rol";
        $respuesta = ModeloPersona::mdlMostrarPermisosU($tabla,$tabla4,$item,$valor);
        return $respuesta;
    }
    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS CON LA VARIABLE SESSION 
    =============================================*/ 
    static public function ctrMostrarPermisos2($item,$valor){
        $tabla ="persona";
        $tabla4="rol";
        $respuesta = ModeloPersona::mdlMostrarPermisos2($tabla,$tabla4,$item,$valor);
        return $respuesta;
    }
    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS CON LA VARIABLE SESSION 
    =============================================*/ 
    static public function ctrMostrarPermisos3($item,$valor){
        $tabla ="persona";
        $tabla4="rol";
        $respuesta = ModeloPersona::mdlMostrarPermisos3($tabla,$tabla4,$item,$valor);
        return $respuesta;
    }
	   /*=============================================
    REGISTRO CORTE
    =============================================*/  
public function ctrRegistroUsuario(){

        if(isset($_POST["regcedula"])){ 

            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regcedula"])){ 

            $tabla ="persona"; 

            $encriptar = crypt($_POST["regcedula"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $datos = array("nombres" => $_POST["regnombre"], 
                           "apellidos" => $_POST["regapellidop"],                           
                           "email_user" => $_POST["regcorreo"],
                           "password" => $encriptar,  
                           "telefono" => $_POST["regtelefono"],   
                           "identificacion" => $_POST["regcedula"],
                           "rolid" => $_POST["regEstado"],
                           "status" => 1);
         
            $respuesta = ModeloPersona::mldIngresarPersona3($tabla,$datos);

            $tabla2 ="personal";           



            $datos2 = array("car_codigo" => $_POST["regEstado"],
                           "per_identificacion" => $_POST["regcedula"],
                           "per_nombres" => $_POST["regnombre"],                            
                           "per_apellidos" => $_POST["regapellidop"],
                           "per_telefono" => $_POST["regtelefono"], 
                           "per_email" => $_POST["regcorreo"],                                     
                           "per_activo" => 1);
                                                
         
            $respuesta2 = ModeloPersona::mldIngresarPersonal($tabla2,$datos2);



 //echo '<pre>'; print_r($respuesta); echo '</pre>';
            if($respuesta == "ok"){

                echo'<script>
                swal({
                      type: "success",
                      title: "La persona ha sido guardada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {
                                window.location = "persona";
                                }
                        })
                </script>';
            }else {   echo'<script>
                swal({
                      type: "error",
                      title: "¡Ha Ocurrido un Error al Registrar! Vuelve a Intentarlo",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {
                                window.location = "persona";
                                }
                        })
                </script>';} 

               
            }else{

                echo'<script>
                    swal({
                          type: "error",
                          title: "¡La persona no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {
                            window.location = "persona";
                            }
                        })
                </script>';
            }
        }
    } 
    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS PRA VAIDAR CEDULA
    =============================================*/ 
    static public function ctrMostrarPersonaValidar($item,$valor){
        $tabla ="persona";

        $respuesta = ModeloPersona::mdlMostrarPersonaValidar($tabla,$item,$valor);
        return $respuesta;
    }
    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS PRA VAIDAR CORREO
    =============================================*/ 

     static public function ctrMostrarCorreo($item,$valor){
        $tabla ="persona";
        $respuesta = ModeloPersona::mdlMostrarCorreo($tabla,$item,$valor);
        return $respuesta;
    }
 
    /*=============================================
    MOSTRAR TODOS LOS ROLESPARA INGRESAR EL USUARIO
    =============================================*/  
    static function ctrMostrarRol($item, $valor){

        $tabla = "rol";  
        $respuesta = ModeloPersona::mdlMostrarRol($tabla, $item, $valor);

        return $respuesta;
    } 

    /*=============================================
    MOSTRAR PARA EDITAR PERSONA
    =============================================*/  
        static public function ctrMostrarPersonaRolE($item,$valor){
        $tabla ="persona";
        $respuesta = ModeloPersona::mdlMostrarPersonaRolE($tabla,$item,$valor);
        return $respuesta;
    }
    /*=============================================
    MOSTRAR PARA EDITAR PERSONA 
    =============================================*/  
        public function ctreditarPersona2(){
       
        if(isset($_POST["editarcedula"])){
            
            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarnombre"]) 
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarapellidos"])
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editartelefono"])
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarcorreo"])
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarRolid"])){
                
                $tabla ="persona"; 
               
                $datos = array("nombres" => $_POST["editarnombre"], 
                               "apellidos" => $_POST["editarapellidos"], 
                               "telefono" => $_POST["editartelefono"],
                               "email_user" => $_POST["editarcorreo"],
                               "rolid" => $_POST["editarRolid"],   
                               "identificacion" => $_POST["editarcedula"]);
                               //"pass" => $encriptar,
                                //"estado" => $_POST["editarPerfil"]

                $respuesta = ModeloPersona::mldEditarPersona($tabla,$datos);


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
                          title: "La persona ha sido guardada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {
                                    window.location = "persona";
                                    }
                            })
                    </script>';
                }
    
                } else {
                    echo ' <script>
                    swal(
                        {type: "error",
                            title: "¡La persona no puede ir vacío o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                              if (result.value) {
                              window.location = "persona";
                        
                    });
                    </script>';
                   
                }
    
            }
        
    
        } 


    /*=============================================
    ELIMINAR PERSONA
    =============================================*/

    static public function ctrEliminarPersonaRol($identificacion){

        $tabla = "persona";

        $respuesta = ModeloPersona::mldEliminarPersonaRol($tabla, $identificacion);

        return $respuesta; 

    }

        /*=============================================
    ELIMINAR PERSONA
    =============================================*/

    static public function ctrEliminarPersonal($per_identificacion){

        $tabla = "personal";

        $respuesta = ModeloPersona::mldEliminarPersonal($tabla, $per_identificacion);

        return $respuesta; 

    }


    /*=============================================
    Cambiar contraseña perfil
    =============================================*/

    public function ctrCambiarPassword(){
 
        if(isset($_POST["idUsuarioPassword"])){ 

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

                $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "persona";
                $id = $_POST["idUsuarioPassword"];
                $item = "password";
                $valor = $encriptar;

                $respuesta = ModeloPersona::mdlActualizarUsuario1($tabla, $id, $item, $valor);

                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            type:"success",
                            title: "¡CORRECTO!",
                            text: "¡La contraseña ha sido actualizada!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                          
                        }).then(function(result){

                                if(result.value){   
                                    history.back();
                                  } 
                        });

                    </script>';


                }

            }else{

                echo '<script>

                    swal({

                        type:"error",
                        title: "¡CORREGIR!",
                        text: "¡No se permiten caracteres especiales en la contraseña!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            history.back();

                        }

                    }); 

                </script>';

             }


        }

    }
 /*=============================================
    Editar Persona Perfil
    =============================================*/ 

     public function ctreditarPersonaPerfil(){
       
        if(isset($_POST["identificacion"])){
            
            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["nombre"]) 
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["apellidop"])
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["telefono"])
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["correo"])){
                
                
                $tabla ="persona"; 
               
                $datos = array( 
                                "nombres" => $_POST["nombre"], 
                               "apellidos" => $_POST["apellidop"], 
                               "telefono" => $_POST["telefono"],
                               "email_user" => $_POST["correo"],                                  
                               "identificacion" => $_POST["identificacion"]);

                $respuesta = ModeloPersona::mldEditarPersonaPerfil($tabla,$datos);

                if($respuesta == "ok"){

                    echo'<script>
                    swal({
                          type: "success",
                          title: "La persona ha sido guardada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {
                                    window.location = "perfil2";
                                    }
                            })
                    </script>';
                }
    
                } else {
                    echo ' <script>
                    swal(
                        {type: "error",
                            title: "¡La persona no puede ir vacío o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                              if (result.value) {
                              window.location = "perfil2";
                        
                    });
                    </script>';
                   
                }
    
            }
        
    
        } 
} 
