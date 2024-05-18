<?php

require_once "conexion.php";

class ModeloRol{

    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS CON SU ROL
    =============================================*/ 
    static public function mdlMostrarRoles($tabla,$item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM rol where $item =:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM rol" );
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null; 

    }
    /* registro */
    static public function mldIngresarRol($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion,status,nombrerol) values(:descripcion,:status,:nombrerol)");
        $stmt -> bindParam(":descripcion",$datos["descripcion"], PDO::PARAM_STR);
        $stmt -> bindParam(":status",$datos["status"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombrerol",$datos["nombrerol"], PDO::PARAM_STR);        
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    } 
    /*=============================================
    Actualizar usuario para ESTADO USUARIO
    =============================================*/
     

    static public function  mdlActualizarRol($tabla,$item1, $valor1, $item2, $valor2){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error"; 

        }

        $stmt -> close();
        $stmt = null;

    }

    /*=============================================
    MOSTRAR PARA EDITAR ROL
    =============================================*/  

    static public function mdlMostrarRol3($tabla, $item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * From $tabla where $item =:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null;

    }

     /*=============================================
    Editar Persona perfil
=============================================*/ 

     static public function mldEditarRol($tabla, $datos){

       $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombrerol = :nombrerol, descripcion = :descripcion WHERE idrol = :idrol");

        $stmt -> bindParam(":nombrerol", $datos["nombrerol"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idrol", $datos["idrol"], PDO::PARAM_STR);
      

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error"; 

        }

        $stmt -> close();

        $stmt = null;

    }  

    /*=============================================
    ELIMINAR PERSONA
    =============================================*/ 

    static public function mldEliminarRol($tabla, $idrole){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idrol = :idrole");

        $stmt -> bindParam(":idrole", $idrole, PDO::PARAM_INT); 

        if($stmt -> execute()){

            return "ok";
        
        }else{

            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt -> close();

        $stmt = null;

    } 

    static public function mdlMostrarModulo($tabla, $item, $valor){


        $sql = "SELECT * FROM modulo where modulo.idmodulo not in(SELECT moduloid from permisos where permisos.rolid=$valor)";    

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt = null;

    } 
    
     /* MODULOS */
     static public function mldIngresarModulo($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(rolid,moduloid,r,w,u,d) values(:rolid,:moduloid,:r,:w,:u,:d)");
        $stmt -> bindParam(":rolid",$datos["rolid"], PDO::PARAM_STR);
        $stmt -> bindParam(":moduloid",$datos["moduloid"], PDO::PARAM_STR);
        $stmt -> bindParam(":r",$datos["r"], PDO::PARAM_STR);   
        $stmt -> bindParam(":w",$datos["w"], PDO::PARAM_STR); 
        $stmt -> bindParam(":u",$datos["u"], PDO::PARAM_STR); 
        $stmt -> bindParam(":d",$datos["d"], PDO::PARAM_STR);      
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    } 
}