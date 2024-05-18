<?php 

require_once "../controladores/paciente.controlador.php"; 
require_once "../modelos/paciente.modelo.php";


class AjaxPaciente{

    /*============================================= 
    Editar persona
    =============================================*/  

    public $editarPac;

    public function ajaxMostrarPaciente(){

        $item = "pac_codigo";

        $valor = $this->editarPac;

        $respuesta = ControladorPaciente::ctrMostrarPaciente34($item, $valor);

        echo json_encode($respuesta);

    }  



     /*=============================================
    Eliminar Paciente
    =============================================*/ 

    public $codigo;
    public $pac_identificacion;

    public function ajaxEliminarPaciente(){


     $respuesta2 = ControladorPaciente::ctrEliminarPaciente34($this->pac_identificacion);
        if ($respuesta2=="ok") {        
        
        $respuesta = ControladorPaciente::ctrEliminarPersona34($this->pac_identificacion);
        }
        $respuesta ="ok";

        

        echo $respuesta; 


    }


} 

/*=============================================
Editar Docente
=============================================*/

if(isset($_POST["editarPac"])){

    $editar = new AjaxPaciente();
    $editar -> editarPac= $_POST["editarPac"];
    $editar -> ajaxMostrarPaciente();

} 

/*=============================================
Eliminar persona
=============================================*/

if(isset($_POST["codigo"])){

    $eliminar = new AjaxPaciente();
   // $eliminar -> codigo= $_POST["codigo"];
    $eliminar -> pac_identificacion= $_POST["pac_identificacion"];
    $eliminar -> ajaxEliminarPaciente();

}