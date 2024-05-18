<?php 

require_once "../controladores/roles.controlador.php"; 
require_once "../modelos/roles.modelo.php"; 

require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 

class tablaroles{ 
    public function mostrarTabla(){


         $valor= $_GET["cedulaRol"];
        $respuesta= ControladorRol::ctrMostrarRoles(null,null);

       // echo '<pre>'; print_r($respuesta); echo '</pre>'; 
        if(count($respuesta)==0){
            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        } 
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) {     
        

         if($value["status"] == 1 ){

                $estado ="<button class='btn btn-success btn-sm btnActivarRol'idrol=".$value["idrol"]." status=".$value["status"]." >Activado</button>";
                
            }else if($value["status"] == 0){

                $estado ="<button class='btn btn-warning btn-sm btnActivarRol'idrol=".$value["idrol"]." status=".$value["status"].">Desactivado</button>";
            }

  
       

          $permisosC = ControladorPersona::ctrMostrarPermisos3(2, $valor); 

        // echo '<pre>'; print_r($permisosC); echo '</pre>'; 

         if($permisosC["moduloid"] == 2 && $permisosC["u"] == 1 && $permisosC["d"] == 1 ){ 

            $acciones = "<div class='btn-group'><button class='btn btn-secondary btn-sm editarPermisos'data-toggle='modal' data-target='#editarPermisos' idrolP='".$value["idrol"]."' ><i class='fas fa-key'></i></button><button class='btn btn-warning btn-sm editarRol2' data-toggle='modal' data-target='#editarRol' idrol2='".$value["idrol"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarol'idrole='".$value["idrol"]."'><i class='fas fa-trash-alt'></i></button></div>";
                
            }else if($permisosC["moduloid"] == 2 && $permisosC["d"] == 1 ){

                $acciones = "<div class='btn-group'><button class='btn btn-secondary btn-sm editarPermisos'data-toggle='modal' data-target='#editarPermisos' idrolP='".$value["idrol"]."' ><i class='fas fa-key'></i></button><button class='btn btn-danger btn-sm eliminarol'idrole='".$value["idrol"]."'><i class='fas fa-trash-alt'></i></button></div>";

            } else if ($permisosC["moduloid"] == 2 && $permisosC["u"] == 1){
                $acciones = "<div class='btn-group'><button class='btn btn-secondary btn-sm editarPermisos'data-toggle='modal' data-target='#editarPermisos' idrolP='".$value["idrol"]."' ><i class='fas fa-key'></i></button><button class='btn btn-warning btn-sm editarRol2' data-toggle='modal' data-target='#editarRol' idrol2='".$value["idrol"]."'><i class='fas fa-pencil-alt text-white'></i></button></div>";
 
                
            }else if ($permisosC["moduloid"] == 2 && $permisosC["u"] == 0 && $permisosC["d"] == 0 ) {               

             $acciones =  "<div class='btn-group'><button class='btn btn-secondary btn-sm editarPermisos'data-toggle='modal' data-target='#editarPermisos' idrolP='".$value["idrol"]."' ><i class='fas fa-key'></i></button></div>";
               
            }


         
        $datosJson .='[
                "'.$value["idrol"].'",       
                "'.$value["nombrerol"].'",             
                "'.$value["descripcion"].'",                        
                "'.$acciones.'" ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaroles = new tablaroles();
$tablaroles -> mostrarTabla();
