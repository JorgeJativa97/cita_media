<?php 

require_once "../controladores/roles.controlador.php"; 
require_once "../modelos/roles.modelo.php";  

class AjaxRoles{  

	/*=============================================
    ACTIVAR ROL
    =============================================*/  

    public $idrol;
    public $status;


    public function ajaxActivarRol(){
        $tabla = "rol";
        $item1 = "idrol"; 
        $valor1 = $this->idrol;
        $item2 = "status"; 
        $valor2 = $this->status; 
        $respuesta = ModeloRol:: mdlActualizarRol($tabla,$item1, $valor1,$item2, $valor2);
        
        echo json_encode($respuesta);

    } 

        /*=============================================
    MOSTRAR PARA EDITAR ROL
    =============================================*/ 
 
    public $idrol2; 

    public function ajaxMostrarRol(){ 

        $item = "idrol";
        $valor = $this->idrol2;
        $respuesta = ControladorRol::ctrMostrarRol3($item, $valor);
        echo json_encode($respuesta);

    } 

    
     /*=============================================
    Eliminar Paciente
    =============================================*/ 

    public $idrole;

    public function ajaxEliminarRol(){

        $respuesta = ControladorRol::ctrEliminarRol($this->idrole);

        echo $respuesta;

    }

} 


/*=============================================
ACTIVAR ROL
=============================================*/

if(isset($_POST["status"])){

    $ActivarUsuario = new AjaxRoles();
    $ActivarUsuario -> status= $_POST["status"];
    $ActivarUsuario -> idrol= $_POST["idrol"];
    $ActivarUsuario -> ajaxActivarRol();

}

/*=============================================
    MOSTRAR PARA EDITAR ROL
=============================================*/

if(isset($_POST["idrol2"])){

    $editar = new AjaxRoles();
    $editar -> idrol2= $_POST["idrol2"];
    $editar -> ajaxMostrarRol();

}  

/*=============================================
=============================================*/

if(isset($_POST["idrole"])){

    $eliminar = new AjaxRoles();
    $eliminar -> idrole= $_POST["idrole"];
    $eliminar -> ajaxEliminarRol();

}
