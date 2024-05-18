<?php 

class ControladorHoras{ 

	/*=============================================
	MOSTRAR DATOS DE LAS PCITAS
	=============================================*/ 
    static public function ctrMostrarHoras($item,$valor){

        $tabla ="horas";

        $respuesta = ModeloHora::mdlMostrarHora($tabla,$item,$valor);

        return $respuesta;
    } 

    /*=============================================
	MOSTRAR DATOS DE LAS PCITAS
	=============================================*/ 
    static public function ctrMostrarch($item,$valor){

        $tabla ="tipo_examen";

        $respuesta = ModeloHora::mdlMostrarch($tabla,$item,$valor);

        return $respuesta;
    } 
    
    /* REGistro usuario */
static public function ctrCrearHora(){
    if(isset($_POST["idpersona"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regHora"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["codExamen2"])){
           
                       
        $respuesta = ModeloHora::mldIngresarHora();


        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "La Hora ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "horas";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡La hora puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "horas";
                
            });
            </script>';
           
            }

        }
    }  

    static public function ctrEditarHora(){
        if(isset($_POST["editaridcodigo"])){
            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editregHora"]) 
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editaridcodigo"])){
               
                           
            $respuesta = ModeloHora::mldEditarhoras();
    
    
            if($respuesta == "ok"){
    
                echo'<script>
                swal({
                      type: "success",
                      title: "La Hora ha sido guardada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {
                                window.location = "horas";
                                }
                        })
                </script>';
            }
    
            } else {
                echo ' <script>
                swal(
                    {type: "error",
                        title: "¡La hora puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                          if (result.value) {
                          window.location = "horas";
                    
                });
                </script>';
               
                }
    
            }
        } 
    
    static public function ctrEliminarHora($hora){

        $tabla = "horas";

        $respuesta = ModeloHora::mldEliminarHora($tabla, $hora);

        return $respuesta; 

    }


}