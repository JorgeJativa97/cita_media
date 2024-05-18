<?php

require_once "conexion.php"; 

class ModeloPaciente{

    /*=============================================
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarPaciente($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM paciente
            INNER JOIN persona on persona.identificacion=paciente.pac_identificacion WHERE paciente.pac_identificacion = $valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM paciente
INNER JOIN persona on persona.identificacion=paciente.pac_identificacion");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  
    /*=============================================
MOSTRAR EXAMEN OBESTENTRICIA PARA EDITAR
=============================================*/  
    static public function mdlMostrarPaciente34($tabla, $item, $valor){

        if($item != null && $valor != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM paciente 
INNER JOIN persona on persona.identificacion=paciente.pac_identificacion WHERE pac_codigo = $valor");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM paciente 
INNER JOIN persona on persona.identificacion=paciente.pac_identificacion");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt-> close();

        $stmt = null;

    }  



    /* registro   '$regnombre','$regapellidos','$fechanacimiento','$edad','$direccion','$telefono','$regcedula'*/
 

    static public function mldIngresarPaciente(){

          $regnombre = $_POST["regnombre"];
          $regapellidos = $_POST["regapellidos"];
          $fechanacimiento = $_POST["fechanacimiento"];
          $edad =  $_POST["edad"];
          $direccion =  $_POST["direccion"];
          $telefono = $_POST["telefono"];
          $regcedula = $_POST["regcedula"];
         

        $stmt = Conexion::conectar()->prepare("CALL Agregar_paciente ('$regnombre','$regapellidos','$fechanacimiento','$edad','$direccion','$telefono','$regcedula')");
        $stmt -> bindParam(":pac_nombres",$datos["pac_nombres"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_apellidos",$datos["pac_apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_fechanac",$datos["pac_fechanac"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_identificacion",$datos["pac_identificacion"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_edad",$datos["pac_edad"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_direccion",$datos["pac_direccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_telefono",$datos["pac_telefono"], PDO::PARAM_STR);
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    }  

     /*=============================================
    Editar Persona perfil
    =============================================*/ 

static public function mldEditarPaciente(){ 

    $regnombre = $_POST["editarnombre"];
    $regapellidos = $_POST["editarapellidos"];
    $fechanacimiento = $_POST["editarfechanacimiento"];
    $edad =$_POST["editaredad"];
    $direccion =  $_POST["editardireccion"];
    $telefono = $_POST["editartelefono"];
    $regcedula = $_POST["editarcedula"];
    $codigo = $_POST["editarPac"]; 

    $stmt = Conexion::conectar()->prepare("CALL actualizar_paciente('$regnombre','$regapellidos','$regcedula','$fechanacimiento','$direccion','$edad','$telefono','$codigo')");

    $stmt -> bindParam(":pac_nombres",$datos["pac_nombres"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_apellidos",$datos["pac_apellidos"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_fechanac",$datos["pac_fechanac"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_identificacion",$datos["pac_identificacion"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_edad",$datos["pac_edad"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_direccion",$datos["pac_direccion"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_telefono",$datos["pac_telefono"], PDO::PARAM_STR); 

     

     if($stmt -> execute()){

         return "ok";
     
     }else{

         return "error"; 

     }

     $stmt -> close();

     $stmt = null;

 }  


  /*=============================================
    Eliminar persona
    =============================================*/ 

    static public function mldPaciente(){ 

        $codigo = $_POST["codigo"];

        $stmt = Conexion::conectar()->prepare("CALL eliminar_paciente('$codigo')");

        $stmt -> bindParam(":pac_codigo", $codigo, PDO::PARAM_INT);

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
    Eliminar secretaria
    =============================================*/ 

    static public function mldEliminarPaciente34($tabla, $pac_identificacion){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pac_identificacion = :pac_identificacion");

        $stmt -> bindParam(":pac_identificacion", $pac_identificacion, PDO::PARAM_INT);

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
    Eliminar secretaria
    =============================================*/ 

    static public function mldEliminarPaciente35($tabla, $pac_identificacion){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE identificacion = :pac_identificacion");

        $stmt -> bindParam(":pac_identificacion", $pac_identificacion, PDO::PARAM_INT);

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
	static public function mdlMostrarPacientecod($valor){

		$sql="SELECT * from paciente WHERE pac_identificacion=$valor";

		$stmt = Conexion::conectar()->prepare($sql);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt = null;
	} 

        /*=============================================
    INGRESAR USUARIO
    =============================================*/
    static public function mldIngresarPersonaPaciente($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres,apellidos,email_user,password,telefono,identificacion,rolid, status) values(:nombres,:apellidos,:email_user,:password,:telefono,:identificacion,:rolid,:status)");
        $stmt -> bindParam(":nombres",$datos["nombres"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos",$datos["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":email_user",$datos["email_user"], PDO::PARAM_STR);
        $stmt -> bindParam(":password",$datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono",$datos["telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":identificacion",$datos["identificacion"], PDO::PARAM_STR);
        $stmt -> bindParam(":rolid",$datos["rolid"], PDO::PARAM_STR);
        $stmt -> bindParam(":status",$datos["status"], PDO::PARAM_STR);
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    } 

        /*=============================================
    MOSTRAR TODOS LOS ROLESPARA INGRESAR EL USUARIO
    =============================================*/  
static public function mdlMostrarRolPaciente($tabla, $item, $valor){

        if($item != null && $valor != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item ");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idrol=4");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt-> close();

        $stmt = null;

    } 
}