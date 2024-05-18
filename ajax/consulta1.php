<?php
require_once "../modelos/conexion.php";
$codExamen2 = filter_input(INPUT_POST, 'codExamen2'); 
$conexion=conectar();
$consulta= "SELECT texa_codigo,h_hora FROM hora WHERE texa_codigo ='$codExamen2'";
   $datos=mysqli_query($conexion,$consulta);
   while($fila=mysqli_fetch_array($datos)){  
    ?>
    
    <?php  
}
?> 

<option value="<?php echo $fila['h_hora']; ?>"><?php echo $fila['h_hora'];?></option>
