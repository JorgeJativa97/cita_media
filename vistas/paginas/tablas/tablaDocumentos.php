<div>
<table id="tablaTribunalComite" style="width:100%">

          <thead>
            
            <tr> 
              
              <th>Modulo</th>
              <th style=" width:0.5px" >Ver</th>
              <th style=" width:0.5px" >Crear</th>            
              <th style=" width:0.5px" >Actualizar</th>   
              <th style=" width:0.5px" >Eliminar</th>  

            </tr>


          </thead> 

          <tbody >

  

          <?php

          require_once "../../../controladores/permisos.controlador.php"; 
          require_once "../../../modelos/permisos.modelo.php";
          require_once "session_aprobacion5.php";
      
          //echo $_SESSION['datosD'];
            $respuesta= ControladorPermiso::ctrMostrarPermiso("rolid", $_SESSION['rol']);
     
 
          foreach ($respuesta as $key => $value){ 


 if($value["r"] == 1 ){

                $R ="<button class='btn btn-success btn-sm btnActivarR'id='btnActivarR' idpermiso=".$value["idpermiso"]." r=".$value["r"]." >ON</button>";
                
            }else if($value["r"] == 0){

                $R ="<button class='btn btn-secondary btn-sm btnActivarR'id='btnActivarR' idpermiso=".$value["idpermiso"]." r=".$value["r"].">OF</button>";
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

            echo ' <tr>
            <td>'.$value["titulo"].'</td>
            <td>'.$R.'</td>
            <td>'.$W.'</td>           
            <td>'.$U.'</td>
            <td>'.$D.'</td>'; 

                 
         }
        ?> 
        </tbody>
        </table>
        </div>
<script type="text/javascript">
$("#tablaTribunalComite").DataTable({ 
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": { 
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }
});


</script>