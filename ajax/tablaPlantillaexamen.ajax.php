<?php 

require_once "../controladores/plantillaExamen.controlador.php"; 
require_once "../modelos/plantillaExamen.modelo.php"; 

require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 


class tablaPlantillaExamen{
   
    public function mostrarTabla(){

        $valor= $_GET["cedulaPlantillaExamen"];

        $respuesta= ControladorPlantillaExamen::ctrMostrarPlantillaExamen(null,null);

        if(count($respuesta)==0){ 

            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
     
            foreach ($respuesta as $key => $value) {  
            
                
                
                $formato ="<div class='btn-group'><button class='btn btn-warning btn-sm formatover' data-toggle='modal' data-target='#formatover' editarPlaExa='".$value["tec_codigo"]."'><i class='fas fa-solid fa-eye'></i></button></div>";

            $permisosC = ControladorPersona::ctrMostrarPermisos3(5, $valor); 

        // echo '<pre>'; print_r($permisosC); echo '</pre>'; 

         if($permisosC["moduloid"] == 5 && $permisosC["u"] == 1 && $permisosC["d"] == 1 ){ 

          $acciones ="<div class='btn-group'><button class='btn btn-warning btn-sm editarPlantillaExamen' data-toggle='modal' data-target='#editarPlantillaExamen' editarPlaExa='".$value["tec_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarPlantillaExamen'pexamen='".$value["tec_codigo"]."'><i class='fas fa-trash-alt'></i></button></div>";
                
            }else if($permisosC["moduloid"] == 5 && $permisosC["d"] == 1 ){

               $acciones ="<div class='btn-group'><button class='btn btn-danger btn-sm eliminarPlantillaExamen'pexamen='".$value["tec_codigo"]."'><i class='fas fa-trash-alt'></i></button></div>";

            } else if ($permisosC["moduloid"] == 5 && $permisosC["u"] == 1){
               $acciones ="<div class='btn-group'><button class='btn btn-warning btn-sm editarPlantillaExamen' data-toggle='modal' data-target='#editarPlantillaExamen' editarPlaExa='".$value["tec_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button></div>";
 
                
            }else if ($permisosC["moduloid"] == 5 && $permisosC["u"] == 0 && $permisosC["d"] == 0 ) {               

             $acciones =  "<div class='btn-group'></div>";
               
            }

         
        $datosJson .='[

                "'.$value["nom_texa"].'", 
                "'.$value["tec_titulo"].'",  
                "'.$formato.'",         
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaPlantillaExamen = new tablaPlantillaExamen();
$tablaPlantillaExamen -> mostrarTabla();