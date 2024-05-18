<?php 

require_once "../controladores/obstetricia.controlado.php"; 
require_once "../modelos/obstetricia.modelo.php"; 

 require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 


class tablaObstetricia{
    public function mostrarTabla(){
        $valor= $_GET["cedulaObs"]; 

        




         $item2 = "pac_identificacion";
        $valor2= $_GET["cedulaPaciObs"];


      /*  $item3 = "pac_identificacion";
        $valor3= $_GET["cedulaDoctor"];*/

        if($item2 != null && $valor2 != null){ 

        $respuesta= ControladorObstetra::ctrMostrarObstetraPaciente($item2,$valor2);

        }/*else if($item3 != null && $valor3 != null) {

             $respuesta= ControladorResultadoExamen::ctrMostrarExamenDoctor($item3,$valor3);
        } */else{

             $respuesta= ControladorObstetra::ctrMostrarObstetra(null,null);
        } 

        
 
        if(count($respuesta)==0){
 
            $datosJson='{ "data":[] }';
            echo $datosJson;
            return; 
        }
        $datosJson = '{
            "data":[';
     
            foreach ($respuesta as $key => $value) { 

                $documentoA= "<div style='text-align:left' > <B>Descargar:</B> <a ><img src='vistas/img/plantilla/documento.png' alt='' <button type='button' class='btnImprimirobstetra' idobstetra='".$value["obs_codigo"]."' style=' background-color: Transparent;background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;outline:none;' width='30px'></a></h6></button></div>";
            
                


        $permisosC = ControladorPersona::ctrMostrarPermisos3(8, $valor); 

        // echo '<pre>'; print_r($permisosC); echo '</pre>'; 

         if($permisosC["moduloid"] == 8 && $permisosC["u"] == 1 && $permisosC["d"] == 1 ){ 

         $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarObstetra' data-toggle='modal' data-target='#editarObstetra' obstetra='".$value["obs_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminareobstetra'eobstetra='".$value["obs_codigo"]."'><i class='fas fa-trash-alt'></i></button> ";
                
            }else if($permisosC["moduloid"] == 8 && $permisosC["d"] == 1 ){

             $acciones =" <div class='btn-group'><button class='btn btn-danger btn-sm eliminareobstetra'eobstetra='".$value["obs_codigo"]."'><i class='fas fa-trash-alt'></i></button> ";

            } else if ($permisosC["moduloid"] == 8 && $permisosC["u"] == 1){
               $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarObstetra' data-toggle='modal' data-target='#editarObstetra' obstetra='".$value["obs_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button>  ";
 
                
            }else if ($permisosC["moduloid"] == 8 && $permisosC["u"] == 0 && $permisosC["d"] == 0 ) {               

             $acciones =  "<div class='btn-group'></div>";
               
            }

                $documentoB= "<div style='text-align:left' > <B>Descargar:</B> <a ><img src='vistas/img/plantilla/documento.png' alt='' <button type='button' class='btnImprimirobstetrasf' idobstetra='".$value["obs_codigo"]."' style=' background-color: Transparent;background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;outline:none;' width='30px'></a></h6></button></div>";
                

         
        $datosJson .='[

                "'.$value["pac_identificacion"].'", 
                "'.$value["pac_nombres"].'",
                "'.$value["pac_apellidos"].'", 
                "'.$value["obs_fecha"].'",
                "'.$documentoA.'",  
                "'.$documentoB.'",          
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaObstetricia = new tablaObstetricia();
$tablaObstetricia -> mostrarTabla();