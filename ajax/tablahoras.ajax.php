<?php 

require_once "../controladores/horas.controlador.php"; 
require_once "../modelos/horas.modelo.php"; 

 require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 

class tablaHora{
    public function mostrarTabla(){

         $valor= $_GET["cedulaHora"];

        $respuesta= ControladorHoras::ctrMostrarHoras(null,null);

        if(count($respuesta)==0){
 
            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 
            
             


                   $permisosC = ControladorPersona::ctrMostrarPermisos3(10, $valor); 

        // echo '<pre>'; print_r($permisosC); echo '</pre>'; 

         if($permisosC["moduloid"] == 10 && $permisosC["u"] == 1 && $permisosC["d"] == 1 ){ 

            $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarHora' data-toggle='modal' data-target='#editarHora' editarhora='".$value["cod_hora"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarHora'hora='".$value["cod_hora"]."'><i class='fas fa-trash-alt'></i></button>";
                
            }else if($permisosC["moduloid"] == 10 && $permisosC["d"] == 1 ){

               $acciones =" <div class='btn-group'><button class='btn btn-danger btn-sm eliminarHora'hora='".$value["cod_hora"]."'><i class='fas fa-trash-alt'></i></button>";

            } else if ($permisosC["moduloid"] == 10 && $permisosC["u"] == 1){
                 $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarHora' data-toggle='modal' data-target='#editarHora' editarhora='".$value["cod_hora"]."'><i class='fas fa-pencil-alt text-white'></i></button>";
 
                
            }else if ($permisosC["moduloid"] == 10 && $permisosC["u"] == 0 && $permisosC["d"] == 0 ) {               

             $acciones =  "<div class='btn-group'></div>";
               
            }
                


         
        $datosJson .='[

                "'.$value["nom_texa"].'", 
                "'.$value["h_hora"].'",               
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaHora = new tablaHora();
$tablaHora -> mostrarTabla();