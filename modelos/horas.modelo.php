<?php

require_once "conexion.php";

class ModeloHora{

 
	/*=============================================
	MOSTRAR DATOS DE LAS CITAS
	=============================================*/ 
    static public function mdlMostrarHora($tabla,$item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tipo_examen INNER JOIN hora ON tipo_examen.texa_codigo = hora.texa_codigo where $item = $valor");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tipo_examen INNER JOIN hora ON tipo_examen.texa_codigo = hora.texa_codigo" );
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null; 

    }  

    static public function mldIngresarHora(){

        $per_codigo = $_POST["idpersona"];
        $texa_codigo = $_POST["codExamen2"];
        $h_hora = $_POST["regHora"];
  

      $stmt = Conexion::conectar()->prepare("CALL insertar_hora ('$per_codigo','$texa_codigo','$h_hora')");
      
    //   $stmt -> bindParam(":nom_texa",$datos["nom_texa"], PDO::PARAM_STR);
    //   $stmt -> bindParam(":per_codigo",$datos["per_codigo"], PDO::PARAM_STR);
      if($stmt -> execute() ){
          return "ok";
      } else{
          return "error";
      }
      $stmt -> close();
      $stmt = null;

  }  

  
  static public function mldEliminarHora(){ 
 
    $hora = $_POST["hora"];

    $stmt = Conexion::conectar()->prepare("CALL eliminar_hora('$hora')"); 

    // $stmt -> bindParam(":texa_codigo", $examen, PDO::PARAM_INT);

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
	MOSTRAR DATOS DE LAS CITAS
	=============================================*/ 
    static public function mdlMostrarch($tabla,$item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tipo_examen  where $item =:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tipo_examen" );
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null; 

    }  


       /*=============================================
    Editar Persona perfil
    =============================================*/ 

static public function mldEditarhoras(){ 

    $hora = $_POST["editregHora"];
    $codigo = $_POST["editaridcodigo"];


    $stmt = Conexion::conectar()->prepare("CALL actualizar_hora('$hora','$codigo')");


     if($stmt -> execute()){

         return "ok";
     
     }else{

         return "error"; 

     }

     $stmt -> close();

     $stmt = null;

 }  





}