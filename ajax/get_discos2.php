<?php
require_once '../modelos/con_bd.php'; //libreria de conexion a la base

$Edi_texa_codigo_id = filter_input(INPUT_POST, 'Edi_texa_codigo_id'); //obtenemos el parametro que viene de ajax

if($Edi_texa_codigo_id != ''){ //verificamos nuevamente que sea una opcion valida
  $con = conDb();
  if(!$con){
    die("<br/>Sin conexi&oacute;n.");
  }

  /*Obtenemos los discos de la banda seleccionada*/
  $sql = "select * from hora where texa_codigo = ".$Edi_texa_codigo_id;  
  $query = mysqli_query($con, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
  mysqli_close($con);
}


?>

<option value="">- SELECCIONE LA HORA -</option>
<?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
<option value="<?= $op['h_hora'] ?>"><?= $op['h_hora'] ?></option>
<?php endforeach; ?>


