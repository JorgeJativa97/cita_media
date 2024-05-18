<?php 

class ControladorExamen{


/*============================================= 
MOSTRAR examen
=============================================*/   

	static function ctrMostrarExamen($item, $valor){

		$tabla = "tipo_examen"; 

		$respuesta = ModeloExamen::mdlMostrarExamen($tabla, $item, $valor); 

		return $respuesta;

	}


/*=============================================
MOSTRAR personal
=============================================*/  

static function ctrMostrarPersonal($item, $valor){ 

    $tabla = "personal"; 

    $respuesta = ModeloExamen::mdlMostrarPersonal($tabla, $item, $valor);

    return $respuesta;

}

/* REGistro usuario */
static public function ctrCrearExamen(){
    if(isset($_POST["regexamen"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regexamen"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["nombrePersonal"])){
           
                       
        $respuesta = ModeloExamen::mldIngresarExamen();


        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "La persona ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "examen";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "examen";
                
            });
            </script>';
           
        }

    }
}    

// /* REGistro usuario */
static public function ctrEditarExamen(){
    if(isset($_POST["editarExa"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["nombrePersonaledit"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editaegexamen"])){
           
                       
        $respuesta = ModeloExamen::mldEditarExamen();

        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "El examen se edito correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "examen";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡El examen no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "examen";
                
            });
            </script>';
           
        }

    }
}     

// /* REGistro usuario */
static public function ctrEditarExamenResultado(){
    if(isset($_POST["editarExa"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["nombrePersonaledit"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editaegexamen"])){
           
                       
        $respuesta = ModeloExamen::mldEditarExamen();

        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "El examen se edito correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "examen";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡El examen no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "examen";
                
            });
            </script>';
           
        }

    }
}     


//     /*=============================================
//     Eliminar persona
//     =============================================*/

    static public function ctrEliminarExamen($examen){

        $tabla = "tipo_examen";

        $respuesta = ModeloExamen::mldExamnen($tabla, $examen);

        return $respuesta; 

    } 
     /*=============================================
    MOSTRAR PARA EDITAR PERSONA 
    =============================================*/  
        public function ctrEditarExamenResultadoR(){
       
        if(isset($_POST["editarId"])){ 
            
            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["EditarcodExamen"]) 
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editartituloExamen"])){
                
                $tabla ="paciente_ecografia"; 
               
                $datos = array("tec_codigo" => $_POST["EditarcodExamen"], 
                               "eco_titu" => $_POST["editartituloExamen"], 
                               "eco_formato" => $_POST["editar"],                                
                               "eco_codigo" => $_POST["editarId"]);
                               

                $respuesta = ModeloExamen::mldEditarResultadoExamen($tabla,$datos);

                if($respuesta == "ok"){

                    echo'<script>
                    swal({
                          type: "success",
                          title: "El examen ha sido guardada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {
                                    window.location = "resultadoExamen";
                                    }
                            })
                    </script>';
                }
    
                } else {
                    echo ' <script>
                    swal(
                        {type: "error",
                            title: "¡El examen no puede ir vacío o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                              if (result.value) {
                              window.location = "resultadoExamen";
                        
                    });
                    </script>';
                   
                }
    
            }
        
    
        } 


} 
