<?php 

require_once "controladores/plantilla.controlador.php"; 
 

require_once "controladores/usuarios.controlador.php"; 
require_once "modelos/usuarios.modelo.php"; 

require_once "controladores/paciente.controlador.php"; 
require_once "modelos/paciente.modelo.php";  

require_once "controladores/examen.controlador.php"; 
require_once "modelos/examen.modelo.php"; 

require_once "controladores/ruta.controlador.php"; 

require_once "controladores/persona.controlador.php";
require_once "modelos/person.modelo.php"; 

require_once "controladores/plantillaExamen.controlador.php";
require_once "modelos/plantillaExamen.modelo.php"; 

require_once "controladores/resultadoExamen.controlador.php";
require_once "modelos/resultadoExamen.modelo.php"; 

require_once "controladores/examenElastografia.controlador.php";
require_once "modelos/examenElastografia.modelo.php"; 

require_once "controladores/obstetricia.controlado.php";
require_once "modelos/obstetricia.modelo.php";  

require_once "controladores/cita.controlador.php";
require_once "modelos/cita.modelo.php"; 

require_once "controladores/horas.controlador.php";
require_once "modelos/horas.modelo.php"; 

require_once "controladores/roles.controlador.php";
require_once "modelos/roles.modelo.php"; 

require_once "controladores/permisos.controlador.php";
require_once "modelos/permisos.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();