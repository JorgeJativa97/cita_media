<?php 

class ControladorPermiso{ 

        /*=============================================
    MOSTRAR DATOS DE LOS ROLES
    =============================================*/ 
    static public function ctrMostrarPermiso($item,$valor){
        $tabla ="modulo";

        $respuesta = ModeloPermiso::mdlMostrarPermiso($tabla,$item,$valor);
        return $respuesta;
    } 

  
}