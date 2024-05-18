<?php 

require_once "../controladores/obstetricia.controlado.php"; 
require_once "../modelos/obstetricia.modelo.php";

class AjaxExamenObstentricia{ 

    /*=============================================
    =============================================*/  

    public $obstetra;

    public function ajaxMostrarExamenObstentricia(){

        $item = "obs_codigo";

        $valor = $this->obstetra;

        $respuesta = ControladorObstetra::ctrMostrarExamenObstentricia($item, $valor);

        echo json_encode($respuesta);

    }  


    //  /*=============================================
    // =============================================*/ 

    public $eobstetra;

    public function ajaxEliminarExamenObstentricia(){

        $respuesta = ControladorObstetra::ctrEliminarExamenObstentricia($this->eobstetra);

        echo $respuesta;

    }

 
} 

/*=============================================
Editar Docente
=============================================*/

if(isset($_POST["obstetra"])){

    $editar = new AjaxExamenObstentricia();
    $editar -> obstetra= $_POST["obstetra"];
    $editar -> ajaxMostrarExamenObstentricia();

} 

// /*=============================================
// =============================================*/

if(isset($_POST["eobstetra"])){

    $eliminar = new AjaxExamenObstentricia();
    $eliminar -> eobstetra= $_POST["eobstetra"];
    $eliminar -> ajaxEliminarExamenObstentricia();

}
