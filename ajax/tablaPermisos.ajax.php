<?php 

require_once "../controladores/permisos.controlador.php"; 
require_once "../modelos/permisos.modelo.php"; 
//require_once "../vistas/paginas/tablas/session_aprobacion5.php";
require_once "../vistas/paginas/tablas/session_aprobacion5.php";
class tablapermisos{
    public function mostrarTabla(){
        
        $item = "idrol"; 
        $valor = 2; 

//  echo '<pre>'; print_r($valor); echo '</pre>';
    $respuesta= ControladorPermiso::ctrMostrarPermiso("rolid", $_SESSION['rol']); 

       // echo '<pre>'; print_r($respuesta); echo '</pre>';
        if(count($respuesta)==0){
            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        } 
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) {
         

         if($value["r"] == 1 ){

                $R ="<button class='btn btn-success btn-sm btnActivarR'idpermiso=".$value["idpermiso"]." r=".$value["r"]." >ON</button>";
                
            }else if($value["r"] == 0){

                $R ="<button class='btn btn-secondary btn-sm btnActivarR'idpermiso=".$value["idpermiso"]." r=".$value["r"].">OF</button>";
            }




           if($value["w"] == 1 ){

                $W ="<button class='btn btn-success btn-sm btnActivarW'idpermiso2=".$value["idpermiso"]." w=".$value["w"]." >ON</button>";
                
            }else if($value["w"] == 0){

                $W ="<button class='btn btn-secondary btn-sm btnActivarW'idpermiso2=".$value["idpermiso"]." w=".$value["w"].">OF</button>";
            }     

            if($value["u"] == 1 ){

                $U ="<button class='btn btn-success btn-sm btnActivarU'idpermiso3=".$value["idpermiso"]." u=".$value["u"]." >ON</button>";
                
            }else if($value["u"] == 0){

                $U ="<button class='btn btn-secondary btn-sm btnActivarU'idpermiso3=".$value["idpermiso"]." u=".$value["u"].">OF</button>";
            }






            if($value["d"] == 1 ){

                $D ="<button class='btn btn-success btn-sm btnActivarD'idpermiso4=".$value["idpermiso"]." d=".$value["d"]." >ON</button>";
                
            }else if($value["d"] == 0){

                $D ="<button class='btn btn-secondary btn-sm btnActivarD'idpermiso4=".$value["idpermiso"]." d=".$value["d"].">OF</button>";
            }
 
         
        $datosJson .='[
                "'.$value["idpermiso"].'",       
                "'.$value["titulo"].'",             
                "'.$R.'",
                "'.$W.'",   
                "'.$U.'",   
                "'.$D.'" ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablapermisos = new tablapermisos();
$tablapermisos -> mostrarTabla();
