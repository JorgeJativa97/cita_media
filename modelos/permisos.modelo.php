<?php

require_once "conexion.php";

class ModeloPermiso{

    /*=============================================
    MOSTRAR DATOS DE LOS PREMISOS
    =============================================*/ 
    static public function mdlMostrarPermiso234($tabla,$item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM rol
INNER JOIN permisos on permisos.rolid=rol.idrol INNER JOIN modulo ON modulo.idmodulo=permisos.moduloid where permisos.rolid = $valor");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM rol
INNER JOIN permisos on permisos.rolid=rol.idrol INNER JOIN modulo ON modulo.idmodulo=permisos.moduloid" );
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null; 

    }
/*=============================================
    MOSTRAR ACTIVIDADES
    =============================================*/
    static public function mdlMostrarPermiso($tabla, $item, $valor){

        if($item != null && $valor != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM rol
INNER JOIN permisos on permisos.rolid=rol.idrol INNER JOIN modulo ON modulo.idmodulo=permisos.moduloid
WHERE rol.idrol=$valor");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM rol
INNER JOIN permisos on permisos.rolid=rol.idrol INNER JOIN modulo ON modulo.idmodulo=permisos.moduloid ");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt-> close();

        $stmt = null;

    } 
/*=============================================
    Actualizar Permisos
    =============================================*/
     

    static public function  mdlActualizarEstadoPermisos($tabla,$item1, $valor1, $item2, $valor2){

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


}