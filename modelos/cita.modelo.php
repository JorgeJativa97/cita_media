<?php
 
require_once "conexion.php";

class ModeloCita{

 
	/*=============================================
	MOSTRAR DATOS DE LAS CITAS
	=============================================*/ 
    static public function mdlMostrarCita($tabla,$item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cita1
INNER JOIN paciente on paciente.pac_identificacion=cita1.pac_codigo
INNER JOIN tipo_examen on tipo_examen.texa_codigo=cita1.texa_codigo 
INNER JOIN persona ON persona.identificacion = paciente.pac_identificacion where $item =:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch(); 

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cita1
INNER JOIN paciente on paciente.pac_identificacion=cita1.pac_codigo
INNER JOIN tipo_examen on tipo_examen.texa_codigo=cita1.texa_codigo 
INNER JOIN persona ON persona.identificacion = paciente.pac_identificacion" );
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null; 

    }






    /* tabla docente */
    static public function mdlMostrarPacienteU($tabla,$item2,$valor2){       
           
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cita1
INNER JOIN paciente on paciente.pac_identificacion=cita1.pac_codigo
INNER JOIN tipo_examen on tipo_examen.texa_codigo=cita1.texa_codigo 
INNER JOIN persona ON persona.identificacion = paciente.pac_identificacion WHERE paciente.pac_identificacion=$valor2 and cit_activo=0");
           
            $stmt -> execute();
            return $stmt -> fetchAll();
    
        
        $stmt -> close();
        $stmt = null;
    
    }


    /* tabla docente */
    static public function mdlMostrarDoctorC($tabla,$item3,$valor3){       
           
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cita1
INNER JOIN paciente on paciente.pac_identificacion=cita1.pac_codigo
INNER JOIN tipo_examen on tipo_examen.texa_codigo=cita1.texa_codigo
INNER JOIN personal on personal.per_codigo= tipo_examen.per_codigo 
INNER JOIN persona ON persona.identificacion = paciente.pac_identificacion WHERE personal.per_identificacion=$valor3 and cit_activo=1");
           
            $stmt -> execute();
            return $stmt -> fetchAll();
    
        
        $stmt -> close();
        $stmt = null;
    
    }

        /*=============================================
    Mostrar Usuarios
    =============================================*/
    static public function mdlMostrarExamenT($tabla, $item, $valor){

        if($item != null && $valor != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM hora
                                        INNER JOIN tipo_examen ON tipo_examen.texa_codigo=hora.texa_codigo
                                        GROUP BY hora.texa_codigo WHERE $item = :$valor");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM hora INNER JOIN tipo_examen ON tipo_examen.texa_codigo=hora.texa_codigo GROUP BY hora.texa_codigo");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt-> close();

        $stmt = null;

    }  

        /*=============================================
    =============================================*/
    static public function mdlMostrarExamenTipo($valor){ 

        $sql="SELECT * from hora WHERE texa_codigo=$valor";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt = null;
    } 
/*=============================================
    Mostrar Usuarios
    =============================================*/
    static public function mdlMostrarHora($tabla, $item, $valor){

        if($item != null && $valor != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$valor");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt-> close();

        $stmt = null;

    }  


 
    static public function mldIngresarCita(){

          $pac_codigo = $_POST["codCita"];
          $texa_codigo = $_POST["codExamen2"];
          $cit_fecha = $_POST["citafecha2"];
          $cit_hora = $_POST["Rhora"];
          $cit_observacion = $_POST["reobservacion"];
        
          
    

        $stmt = Conexion::conectar()->prepare("CALL agregar_cita ('$pac_codigo','$texa_codigo','$cit_fecha','$cit_hora','$cit_observacion')");
        
    
        if($stmt -> execute() ){
            return 1;
        } else{
            return 0;
        }
        $stmt -> close();
        $stmt = null;

    }  



   //  static public function mdlValidarFechaHora(){

   //  //$cit_fecha2 = $_POST["citafecha2"];
   // // cit_fecha='2022-04-10' and 
   //  $cit_hora2 = $_POST["Rhora"];

   //  $stmt = Conexion::conectar()->prepare("SELECT * FROM cita1 WHERE cit_hora= '09:00:00'");



   //          $stmt -> execute();
   //          return $stmt -> fetchAll();     

   //      $stmt-> close();
   //      $stmt = null;
   //  } 

/*=============================================
SUERTE
=============================================*/

    static public function mdlValidarFechaHora($tabla1,$datos){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM cita1 WHERE cit_fecha= :cit_fecha and cit_hora=:cit_hora");

        $stmt->bindParam(":cit_fecha", $datos["cit_fecha"], PDO::PARAM_STR);      
         $stmt->bindParam(":cit_hora", $datos["cit_hora"], PDO::PARAM_STR);  
       

            $stmt -> execute();
            return $stmt -> fetchAll();     

        $stmt-> close();
        $stmt = null;
    } 

/*=============================================
MOSTRAR EXAMEN OBESTENTRICIA PARA EDITAR
=============================================*/  
    static public function mdlMostrarDatosCitas($tabla, $item, $valor){

        if($item != null && $valor != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM cita1  WHERE cita1.cit_codigo = $valor");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM cita1");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt-> close();

        $stmt = null;

    }  



//   /*=============================================
//     Eliminar cita
//     =============================================*/ 

    static public function mldExamenCita(){ 

        $cit_codigo = $_POST["eliminarCi"];

        $stmt = Conexion::conectar()->prepare("CALL eliminar_cita('$cit_codigo')");

        if($stmt -> execute()){

            return "ok";
        
        }else{

            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt -> close();

        $stmt = null;

    } 

    /*=============================================
EDITAR CITA
=============================================*/

    static public function mdlEditarCita($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE cita1 SET cit_fecha=:cit_fecha, texa_codigo=:texa_codigo, cit_hora=:cit_hora WHERE cit_codigo=:cit_codigo"); 
        
        $stmt->bindParam(":cit_hora", $datos["cit_hora"], PDO::PARAM_STR);      
        $stmt->bindParam(":texa_codigo", $datos["texa_codigo"], PDO::PARAM_STR);  
        $stmt->bindParam(":cit_fecha", $datos["cit_fecha"], PDO::PARAM_STR);    
        $stmt->bindParam(":cit_codigo", $datos["cit_codigo"], PDO::PARAM_INT);


        if($stmt->execute()){

            return 1;


        }else{

            return 0;
        
        }

        $stmt->close();
        $stmt = null;

    }


 /*=============================================
    Mostrar Usuarios
    =============================================*/
    static public function mdlMostrarExamenDoc($tabla, $item, $valor){

        if($item != null && $valor != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM hora
INNER JOIN tipo_examen ON tipo_examen.texa_codigo=hora.texa_codigo
INNER JOIN personal on personal.per_codigo=tipo_examen.per_codigo
WHERE personal.per_identificacion=$valor
GROUP BY hora.texa_codigo ");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM hora
INNER JOIN tipo_examen ON tipo_examen.texa_codigo=hora.texa_codigo
INNER JOIN personal on personal.per_codigo=tipo_examen.per_codigo
WHERE personal.per_identificacion=$valor
GROUP BY hora.texa_codigo;");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt-> close();

        $stmt = null;

    }  

/*=============================================
ESTADO CITA
=============================================*/

static public function mdlEstadoCita($idcita,$estado){

    $stmt = Conexion::conectar()->prepare("UPDATE cita1 SET cit_activo=$estado WHERE cit_codigo=$idcita"); 
    
    // $stmt->bindParam(":cit_hora", $datos["cit_hora"], PDO::PARAM_STR);      
    // $stmt->bindParam(":texa_codigo", $datos["texa_codigo"], PDO::PARAM_STR);  
    // $stmt->bindParam(":cit_fecha", $datos["cit_fecha"], PDO::PARAM_STR);    
    // $stmt->bindParam(":cit_codigo", $datos["cit_codigo"], PDO::PARAM_INT);


    if($stmt->execute()){

        return 1;


    }else{

        return 0;
    
    }

    $stmt->close();
    $stmt = null;

}


}