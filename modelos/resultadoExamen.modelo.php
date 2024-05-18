<?php

require_once "conexion.php"; 

class ModeloResultadoExamen{

    /*============================================= 
	Mostrar Usuarios 
	=============================================*/
	static public function mdlMostrarResultadoExamen($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from paciente_ecografia 
INNER JOIN paciente ON paciente_ecografia.pac_codigo = paciente.pac_identificacion
INNER JOIN tipo_ecografia ON tipo_ecografia.tec_codigo = paciente_ecografia.tec_codigo WHERE paciente_ecografia.eco_codigo=$valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute(); 

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from paciente_ecografia 
INNER JOIN paciente ON paciente_ecografia.pac_codigo = paciente.pac_identificacion
INNER JOIN tipo_ecografia ON tipo_ecografia.tec_codigo = paciente_ecografia.tec_codigo");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  

	    static public function mdlMostrarPacienteExamen($tabla,$item2,$valor2){       
           
            $stmt = Conexion::conectar()->prepare("SELECT * FROM paciente 
INNER JOIN paciente_ecografia on paciente.pac_identificacion=paciente_ecografia.pac_codigo
INNER JOIN tipo_ecografia on tipo_ecografia.tec_codigo=paciente_ecografia.tec_codigo  WHERE paciente.pac_identificacion=$valor2");
           
            $stmt -> execute();
            return $stmt -> fetchAll();
    
        
        $stmt -> close();
        $stmt = null;
    
    }
	    static public function mdlMostrarDoctorEx($tabla,$item3,$valor3){       
           
            $stmt = Conexion::conectar()->prepare("SELECT * FROM paciente 
INNER JOIN paciente_ecografia on paciente.pac_identificacion=paciente_ecografia.pac_codigo
INNER JOIN tipo_ecografia on tipo_ecografia.tec_codigo=paciente_ecografia.tec_codigo  
INNER JOIN tipo_examen on tipo_examen.texa_codigo=tipo_ecografia.texa_codigo
INNER JOIN personal on personal.per_codigo=tipo_examen.per_codigo
WHERE personal.per_identificacion=$valor3 and personal.car_codigo=2");
           
            $stmt -> execute();
            return $stmt -> fetchAll();
    
        
        $stmt -> close();
        $stmt = null;
    
    }
     /*============================================= 
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarResultadoExamen34($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM paciente 
INNER JOIN paciente_ecografia on paciente.pac_identificacion=paciente_ecografia.pac_codigo
INNER JOIN tipo_ecografia on tipo_ecografia.tec_codigo=paciente_ecografia.tec_codigo WHERE $item = :$valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM paciente 
INNER JOIN paciente_ecografia on paciente.pac_identificacion=paciente_ecografia.pac_codigo
INNER JOIN tipo_ecografia on tipo_ecografia.tec_codigo=paciente_ecografia.tec_codigo");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  
 
    static public function mldIngresarResultadoExamen(){

          $paciente = $_POST["codPaciente"];
          $codtitulo = $_POST["codExamen"];
		  $titu = $_POST["tituloExamen"];
		  $formato = $_POST["descripcionExaf"];

        $stmt = Conexion::conectar()->prepare("CALL agg_pac_eco ('$paciente','$codtitulo','$titu','$formato')");
        
        // $stmt -> bindParam(":pac_codigo",$datos["pac_codigo"], PDO::PARAM_STR);
        // $stmt -> bindParam(":tec_codigo",$datos["tec_codigo"], PDO::PARAM_STR);
		// $stmt -> bindParam(":tituloExamen",$datos["tituloExamen"], PDO::PARAM_STR);
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    }  

// //      /*=============================================
// //     Editar Persona perfil
// //     =============================================*/ 

// static public function mldEditarExamen(){ 

//     $nom_texa = $_POST["editaegexamen"];
//     $per_codigo = $_POST["nombrePersonaledit"];
//     $texa_codigo = $_POST["editarExa"];

//     $stmt = Conexion::conectar()->prepare("CALL actualiza_tipoexa('$nom_texa','$per_codigo','$texa_codigo')");

//     $stmt -> bindParam(":nom_texa",$datos["editaegexamen"], PDO::PARAM_STR);
//     $stmt -> bindParam(":per_codigo",$datos["nombrePersonaledit"], PDO::PARAM_INT);
//     $stmt -> bindParam(":texa_codigo",$datos["editarExa"], PDO::PARAM_INT);
     

//      if($stmt -> execute()){

//          return "ok";
     
//      }else{

//          return "error"; 

//      }

//      $stmt -> close();

//      $stmt = null;

//  }  


// //   /*=============================================
// //     Eliminar persona
// //     =============================================*/ 

    static public function mldResultadoExamnen(){ 

        $rexamen = $_POST["rexamen"];

        $stmt = Conexion::conectar()->prepare("CALL eliminar_paciente_ecografia('$rexamen')"); 

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
	=============================================*/
	static public function mdlMostrarEditarResultadoexamen($tabla,$valor){ 

		$sql="SELECT * FROM paciente 
INNER JOIN paciente_ecografia on paciente.pac_identificacion=paciente_ecografia.pac_codigo
INNER JOIN tipo_ecografia on tipo_ecografia.tec_codigo=paciente_ecografia.tec_codigo WHERE paciente_ecografia.eco_codigo=$valor";

		$stmt = Conexion::conectar()->prepare($sql);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt = null;
	} 

}