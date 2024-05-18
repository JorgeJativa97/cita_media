<?php 

require_once "../controladores/permisos.controlador.php"; 
require_once "../modelos/permisos.modelo.php"; 

require_once "../controladores/roles.controlador.php"; 
require_once "../modelos/roles.modelo.php"; 

class AjaxPermiso{  

	/*=============================================
    ACTIVAR PERMISOS VER
    =============================================*/  

    public $idpermiso;
    public $r;


    public function ajaxActivarPermiso(){
        $tabla = "permisos";
        $item1 = "idpermiso"; 
        $valor1 = $this->idpermiso;
        $item2 = "r"; 
        $valor2 = $this->r; 
        $respuesta = ModeloPermiso:: mdlActualizarEstadoPermisos($tabla,$item1, $valor1,$item2, $valor2);
        
        echo json_encode($respuesta);

    } 
        /*=============================================
    ACTIVAR PERMISOS CREAR
    =============================================*/  

    public $idpermiso2;
    public $w;


    public function ajaxActivarPermisoC(){
        $tabla = "permisos";
        $item1 = "idpermiso"; 
        $valor1 = $this->idpermiso2;
        $item2 = "w"; 
        $valor2 = $this->w; 
        $respuesta = ModeloPermiso:: mdlActualizarEstadoPermisos($tabla,$item1, $valor1,$item2, $valor2);
        
        echo json_encode($respuesta);

    } 


        /*=============================================
    ACTIVAR PERMISOS UPDATE
    =============================================*/  

    public $idpermiso3;
    public $u;


    public function ajaxActivarPermiso3(){
        $tabla = "permisos";
        $item1 = "idpermiso"; 
        $valor1 = $this->idpermiso3;
        $item2 = "u"; 
        $valor2 = $this->u; 
        $respuesta = ModeloPermiso:: mdlActualizarEstadoPermisos($tabla,$item1, $valor1,$item2, $valor2);
        
        echo json_encode($respuesta);

    } 

            /*=============================================
    ACTIVAR PERMISOS ELIMINAR
    =============================================*/  

    public $idpermiso4;
    public $d;


    public function ajaxActivarPermiso4(){
        $tabla = "permisos";
        $item1 = "idpermiso"; 
        $valor1 = $this->idpermiso4;
        $item2 = "d"; 
        $valor2 = $this->d; 
        $respuesta = ModeloPermiso:: mdlActualizarEstadoPermisos($tabla,$item1, $valor1,$item2, $valor2);
        
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


} 


/*=============================================
ACTIVAR USUARIO
=============================================*/

if(isset($_POST["r"])){

    $ActivarUsuario = new AjaxPermiso();
    $ActivarUsuario -> r= $_POST["r"];
    $ActivarUsuario -> idpermiso= $_POST["idpermiso"];
    $ActivarUsuario -> ajaxActivarPermiso();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/

if(isset($_POST["w"])){

    $ActivarUsuario = new AjaxPermiso();
    $ActivarUsuario -> w= $_POST["w"];
    $ActivarUsuario -> idpermiso2= $_POST["idpermiso2"];
    $ActivarUsuario -> ajaxActivarPermisoC();

}


/*=============================================
ACTIVAR USUARIO
=============================================*/

if(isset($_POST["u"])){

    $ActivarUsuario = new AjaxPermiso();
    $ActivarUsuario -> u= $_POST["u"];
    $ActivarUsuario -> idpermiso3= $_POST["idpermiso3"];
    $ActivarUsuario -> ajaxActivarPermiso3();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/

if(isset($_POST["d"])){

    $ActivarUsuario = new AjaxPermiso();
    $ActivarUsuario -> d= $_POST["d"];
    $ActivarUsuario -> idpermiso4= $_POST["idpermiso4"];
    $ActivarUsuario -> ajaxActivarPermiso4();

}

/*=============================================
    MOSTRAR PARA EDITAR ROL
=============================================*/

if(isset($_POST["idrol2"])){

    $editar = new AjaxPermiso();
    $editar -> idrol2= $_POST["idrol2"];
    $editar -> ajaxMostrarRol();

} 
