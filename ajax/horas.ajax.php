<?php 

require_once "../controladores/horas.controlador.php"; 
require_once "../modelos/horas.modelo.php";


class AjaxHoras{

    // /*=============================================
    // Editar persona
    // =============================================*/  

    public $editarhora;

    public function ajaxMostrarhora(){

        $item = "cod_hora";

        $valor = $this->editarhora;

        $respuesta = ControladorHoras::ctrMostrarHoras($item, $valor);

        echo json_encode($respuesta);

    }  



     /*=============================================
    Eliminar Paciente
    =============================================*/ 

    public $hora;

    public function ajaxEliminarHora(){

        $respuesta = ControladorHoras::ctrEliminarHora($this->hora);

        echo $respuesta;

    }


} 

// /*=============================================
// Editar Docente
// =============================================*/

if(isset($_POST["editarhora"])){

    $editar = new AjaxHoras();
    $editar -> editarhora= $_POST["editarhora"];
    $editar -> ajaxMostrarhora();

} 

/*=============================================
Eliminar persona
=============================================*/

if(isset($_POST["hora"])){

    $eliminar = new AjaxHoras();
    $eliminar -> hora= $_POST["hora"];
    $eliminar -> ajaxEliminarHora();

}