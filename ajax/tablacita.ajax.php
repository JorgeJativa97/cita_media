<?php 

require_once "../controladores/cita.controlador.php"; 
require_once "../modelos/cita.modelo.php"; 

 require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 

class tablapersona{
    public function mostrarTabla(){

         $valor= $_GET["cedulaCita"];
 
        $item2 = "pac_identificacion";
        $valor2= $_GET["cedulaPersona"];

        $item3 = "pac_identificacion";
        $valor3= $_GET["cedulaDoctor2"];

        if($item2 != null && $valor2 != null){ 

        $respuesta= ControladorCita::ctrMostrarPacienteUnico($item2,$valor2);

        }else if($item3 != null && $valor3 != null) {

             $respuesta= ControladorCita::ctrMostrarDoctorEx($item3,$valor3);
        } else{

            $respuesta= ControladorCita::ctrMostrarCita(null,null);
        } 

          


        if(count($respuesta)==0){
            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        } 




        $datosJson = '{
            "data":['; 
    
            foreach ($respuesta as $key => $value) {     


                $permisosC = ControladorPersona::ctrMostrarPermisos3(9, $valor); 

        // echo '<pre>'; print_r($permisosC); echo '</pre>'; 

         if($permisosC["moduloid"] == 9 && $permisosC["u"] == 1 && $permisosC["d"] == 1 ){ 

         $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarCita' data-toggle='modal' data-target='#editarCita' editarid='".$value["cit_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarCita'eliminarCi='".$value["cit_codigo"]."'><i class='fas fa-trash-alt'></i></button> ";
                
            }else if($permisosC["moduloid"] == 9 && $permisosC["d"] == 1 ){

              $acciones =" <div class='btn-group'><button class='btn btn-danger btn-sm eliminarCita'eliminarCi='".$value["cit_codigo"]."'><i class='fas fa-trash-alt'></i></button> ";

            } else if ($permisosC["moduloid"] == 9 && $permisosC["u"] == 1){
                $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarCita' data-toggle='modal' data-target='#editarCita' editarid='".$value["cit_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> ";
 
                
            }else if ($permisosC["moduloid"] == 9 && $permisosC["u"] == 0 && $permisosC["d"] == 0 ) {               

             $acciones =  "<div class='btn-group'></div>";
               
            }


             if($value["rolid"] == 4 && $value["cit_activo"] == 1){

                if($value["cit_activo"] == 1){

                    $estado ="<button class='btn btn-danger btn-sm btnActivarcita'idcita=".$value["cit_codigo"]." status=".$value["cit_activo"].">Pendiente</button>";
                    
                }else if($value["cit_activo"] == 0){
    
                    $estado ="<button class='btn btn-success btn-sm btnActivarcita'idcita=".$value["cit_codigo"]." status=".$value["cit_activo"].">Atendido</button>";
                }
            }else{

                 $estado ="<button class='btn btn-success'status=".$value["cit_activo"]." disabled>Atendido</button>";
            }
         
        $datosJson .='[
                "'.$value["cit_codigo"].'",              
                "'.$value["cit_fecha"].'",
                "'.$value["cit_hora"].'", 
                 "'.$value["nom_texa"].'",
                "'.$value["pac_nombres"].'",
                "'.$value["pac_apellidos"].'",
                "'.$value["pac_identificacion"].'",          
                "'.$estado.'",          
                "'.$acciones.'" ],';
        }



        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablapersona = new tablapersona();
$tablapersona -> mostrarTabla();
