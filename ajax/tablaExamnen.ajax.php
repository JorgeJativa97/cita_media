<?php 

require_once "../controladores/examen.controlador.php"; 
require_once "../modelos/examen.modelo.php"; 

require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 

class tablaExamen{
    public function mostrarTabla(){ 

         $valor= $_GET["cedulaExamen"];

        $respuesta= ControladorExamen::ctrMostrarExamen(null,null);

        if(count($respuesta)==0){

            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 


         $permisosC = ControladorPersona::ctrMostrarPermisos3(4, $valor); 

        // echo '<pre>'; print_r($permisosC); echo '</pre>'; 

         if($permisosC["moduloid"] == 4 && $permisosC["u"] == 1 && $permisosC["d"] == 1 ){ 

           $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarExamen' data-toggle='modal' data-target='#editarExamen' editarExa='".$value["texa_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarExamen'examen='".$value["texa_codigo"]."'><i class='fas fa-trash-alt'></i></button> ";
                
            }else if($permisosC["moduloid"] == 4 && $permisosC["d"] == 1 ){

               $acciones =" <div class='btn-group'><button class='btn btn-danger btn-sm eliminarExamen'examen='".$value["texa_codigo"]."'><i class='fas fa-trash-alt'></i></button> ";

            } else if ($permisosC["moduloid"] == 4 && $permisosC["u"] == 1){
               $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarExamen' data-toggle='modal' data-target='#editarExamen' editarExa='".$value["texa_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> ";
 
                
            }else if ($permisosC["moduloid"] == 4 && $permisosC["u"] == 0 && $permisosC["d"] == 0 ) {               

             $acciones =  "<div class='btn-group'></div>";
               
            }

            
                
                


         
        $datosJson .='[

                "'.$value["nom_texa"].'", 
                "'.$value["per_nombres"].'",               
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaExamen = new tablaExamen();
$tablaExamen -> mostrarTabla();