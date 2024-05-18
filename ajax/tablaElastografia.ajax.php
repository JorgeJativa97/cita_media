<?php 

require_once "../controladores/examenElastografia.controlador.php"; 
require_once "../modelos/examenElastografia.modelo.php"; 

 require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 

 
class tablaExamenElastografia{
    public function mostrarTabla(){
 
        $valor= $_GET["cedulaElas"];

       

 $item2 = "pac_identificacion";
        $valor2= $_GET["cedulaPaExL"];


      /*  $item3 = "pac_identificacion";
        $valor3= $_GET["cedulaDoctor"];*/

        if($item2 != null && $valor2 != null){ 

        $respuesta= ControladorExamenElastografia::ctrMostrarExamenElastografiaP($item2,$valor2);

        }/*else if($item3 != null && $valor3 != null) {

             $respuesta= ControladorResultadoExamen::ctrMostrarExamenDoctor($item3,$valor3);
        } */else{

              $respuesta= ControladorExamenElastografia::ctrMostrarExamenElastografia(null,null);
        } 

        

        if(count($respuesta)==0){

            $datosJson='{ "data":[] }';
            echo $datosJson; 
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 
            
                
        

        $permisosC = ControladorPersona::ctrMostrarPermisos3(7, $valor); 

        // echo '<pre>'; print_r($permisosC); echo '</pre>'; 

         if($permisosC["moduloid"] == 7 && $permisosC["u"] == 1 && $permisosC["d"] == 1 ){ 

         $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarExamenElastro' data-toggle='modal' data-target='#editarElasto' editarElasto='".$value["ela_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarElastografia'elastografia='".$value["ela_codigo"]."'><i class='fas fa-trash-alt'></i></button> ";
                
            }else if($permisosC["moduloid"] == 7 && $permisosC["d"] == 1 ){

             $acciones =" <div class='btn-group'><button class='btn btn-danger btn-sm eliminarElastografia'elastografia='".$value["ela_codigo"]."'><i class='fas fa-trash-alt'></i></button> ";

            } else if ($permisosC["moduloid"] == 7 && $permisosC["u"] == 1){
               $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarExamenElastro' data-toggle='modal' data-target='#editarElasto' editarElasto='".$value["ela_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button>  ";
 
                
            }else if ($permisosC["moduloid"] == 7 && $permisosC["u"] == 0 && $permisosC["d"] == 0 ) {               

             $acciones =  "<div class='btn-group'></div>";
               
            }

            $documentoA= "<div style='text-align:left' > <B>Descargar:</B> <a ><img src='vistas/img/plantilla/documento.png' alt='' <button type='button' class='btnImprimirelastografia' idelastografia='".$value["ela_codigo"]."' style=' background-color: Transparent;background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;outline:none;' width='30px'></a></h6></button></div>";
            $documentoB= "<div style='text-align:left' > <B>Descargar:</B> <a ><img src='vistas/img/plantilla/documento.png' alt='' <button type='button' class='btnImprimirelastografiasf' idelastografia='".$value["ela_codigo"]."' style=' background-color: Transparent;background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;outline:none;' width='30px'></a></h6></button></div>";

          
        $datosJson .='[
                "'.$value["pac_nombres"].'",
                "'.$value["pac_apellidos"].'", 
                "'.$value["pac_identificacion"].'", 
                "'.$documentoA.'",
                "'.$documentoB.'",
                "'.$value["pac_fechanac"].'",                
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaPaciente = new tablaExamenElastografia();
$tablaPaciente -> mostrarTabla();