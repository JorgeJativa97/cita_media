
<div class="content-wrapper" style="min-height: 1058.31px;background-color: white">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

        <h3><i class="fas fa-laptop-medical" style="color: green;"></i>  PERMISOS DE USUARIO </h3>
          

        </div>

        <div class="col-sm-6">
 
          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <!-- <li class="breadcrumb-item active">Registro de Modalidades</li> -->

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->
    <hr style="height: 1px;background-color: #E6E6E6;">
  </section>
 

 
  <!-- Main content -->
  <section class="content">
    <div>
  <ul class="nav nav-tabs">
    
    <li class="nav-item">
  

    <a class="nav-link active" href="#"><h5 style="font: bold 90% monospace;"><i class="fas fa-plus"></i> ASIGNAR PERMISO</h5></a>
    </li>
    </ul> 
    
    </div>
  
      <div class="card-body">
 
      <div class="card-header"> 


<a href="roles" class="btn btn-danger btn-sm" data-dismiss="modal" style="color: white"><h5 style="font: bold 100% monospace;"><i class="fas fa-share-square" style="color: white"></i> SALIR</h5></a>    

<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#asignarmodalidades">Nuevo Registro</button> 
     

</div>

<table class="table table-bordered table-striped dt-responsive tablapermisos" width="100%">
           
           <thead>
                
             <tr>
               <th style=" width:0.5px" >#</th>              
               <th>Modulo</th>
               <th style=" width:0.5px" >Ver</th>
               <th style=" width:0.5px" >Crear</th>            
               <th style=" width:0.5px" >Actualizar</th>   
               <th style=" width:0.5px" >Eliminar</th>            
 
             </tr>
              
 
           </thead> 
 
           <tbody>
             
 
           </tbody>
 
 
         </table>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">

      </div>
        <!-- /.card-footer-->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div>

<div class="modal" id="asignarmodalidades">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">ASIGNAR MODULOS</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">  

        <input class="form-control" type="hidden" name="rolid" id="rolid" value="<?php echo $_SESSION['rol'] ?>" readonly>
           
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              
              <span class="fas fa-user-tie"></span>
            
            </div>
 
            <select class="form-control seleccionarModulo" id="modulos"  name="modulos" required style="width: 90%">

              <option value="">Seleccione el Modulo</option> 

              <?php  

              $item = "idrol";
              $valor = $_SESSION['rol'];

              $Rol = ControladorRol::ctrMostrarModulos($item, $valor); 

              foreach ($Rol as $key => $value) {
                
                echo '<option value="'.$value["idmodulo"].'">'.$value["titulo"].'</option>';

              }


              ?>

            </select>     

          </div>  

         
        </div>      
          
          <?php  

          $registrModulo = new ControladorRol();
          $registrModulo -> ctreIngresarModulo();
          

        ?>
        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
             <button type="submit" class="btn btn-primary">Guardar</button>
          </div> 

        </div>

        </div> 

      </form>

    </div>

  </div>

</div> 