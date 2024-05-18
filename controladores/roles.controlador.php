<?php 

class ControladorRol{ 

        /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS CON SU ROL
    =============================================*/ 
    static public function ctrMostrarRoles($item,$valor){
        $tabla ="rol";

        $respuesta = ModeloRol::mdlMostrarRoles($tabla,$item,$valor);
        return $respuesta;
    }

     /*=============================================
    /* REGistro persona 2
    =============================================*/  

    static public function ctrCrearRol(){
        if(isset($_POST["regRol"])){
            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regDescripcion"])){
               
           

            $tabla ="rol"; 
 
           
            $datos = array("descripcion" => $_POST["regDescripcion"],                            
                           "status" => 1,   
                           "nombrerol" => $_POST["regRol"]);
                        //   "foto" => $ruta
         
            $respuesta = ModeloRol::mldIngresarRol($tabla,$datos);

            if($respuesta == "ok"){

                echo'<script>
                swal({
                      type: "success",
                      title: "El usuario  ha sido guardado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {
                                window.location = "roles";
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
                                window.location = "roles";
                                }
                        })
                </script>';} 

            } else {
                echo ' <script>
                swal(
                    {type: "error",
                        title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                          if (result.value) {
                          window.location = "roles";
                    
                });
                </script>';
               
            }

        }
    } 


  /*=============================================
    MOSTRAR PARA EDITAR ROL
    =============================================*/  
        static public function ctrMostrarRol3($item,$valor){
        $tabla ="rol";
        $respuesta = ModeloRol::mdlMostrarRol3($tabla,$item,$valor);
        return $respuesta;
    }

  /*=============================================
    MOSTRAR PARA EDITAR PERSONA 
    =============================================*/  
        public function ctreditarRol(){
       
        if(isset($_POST["editardescripcion"])){
            
            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editardescripcion"]) 
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarnombreRol"])){
                
                $tabla ="rol"; 
               
                $datos = array("idrol" => $_POST["editaridrol"], 
                               "nombrerol" => $_POST["editarnombreRol"],
                               "descripcion" => $_POST["editardescripcion"]);
                               //"pass" => $encriptar,
                                //"estado" => $_POST["editarPerfil"]

                $respuesta = ModeloRol::mldEditarRol($tabla,$datos);

                if($respuesta == "ok"){

                    echo'<script>
                    swal({
                          type: "success",
                          title: "El rol ha sido guardada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {
                                    window.location = "roles";
                                    }
                            })
                    </script>';
                }
    
                } else {
                    echo ' <script>
                    swal(
                        {type: "error",
                            title: "¡El rol no puede ir vacío o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                              if (result.value) {
                              window.location = "roles";
                        
                    });
                    </script>';
                   
                }
    
            }
        
    
        } 


         /*=============================================
//      =============================================*/

    static public function ctrEliminarRol($idrole){

        $tabla = "rol";

        $respuesta = ModeloRol::mldEliminarRol($tabla, $idrole);

        return $respuesta; 

    } 

        /*=============================================
//      =============================================*/

    static public function ctrMostrarModulos($item,$valor){
        $tabla ="modulo";
        $respuesta = ModeloRol::mdlMostrarModulo($tabla,$item,$valor);
        return $respuesta;
    } 


    /*=============================================
    MOSTRAR PARA EDITAR PERSONA 
    =============================================*/  
    public function ctreIngresarModulo(){
       
        if(isset($_POST["rolid"])){
            
            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["modulos"])){
                
                $tabla ="permisos"; 
               
                $datos = array("rolid" => $_POST["rolid"], 
                               "moduloid" => $_POST["modulos"],
                               "r" => 0,
                               "w" => 0,
                               "u" => 0,
                               "d" => 0
                               );
                               //"pass" => $encriptar,
                                //"estado" => $_POST["editarPerfil"]

                $respuesta = ModeloRol::mldIngresarModulo($tabla,$datos);

                if($respuesta == "ok"){

                    echo'<script>
                    swal({
                          type: "success",
                          title: "El Modulo ha sido guardada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {
                                    window.location = "perimiso";
                                    }
                            })
                    </script>';
                }
    
                } else {
                    echo ' <script>
                    swal(
                        {type: "error",
                            title: "¡El Modulo no puede ir vacío o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                              if (result.value) {
                              window.location = "perimiso";
                        
                    });
                    </script>';
                   
                }
    
            }
        
    
        } 

}