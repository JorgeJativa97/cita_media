

<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid"> 
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Roles Usuario</h1>
            <input type="hidden" id="cedulaRol" value="<?php echo $permisosU["identificacion"] ?>">

        </div>
 
        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Roles Usuario</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      
      <div class="card-header"> 
  <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 2 && $value["w"] == 1  ): ?>  
          
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearRol">Nuevo Registro</button>   

    <?php endif ?>           

      </div> 

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaroles" width="100%">
           
          <thead>
               
            <tr>
              <th>#</th>              
              <th>Nombres</th>
              <th>Descripción</th>
              <!-- <th>Estado</th>             -->
              <th>Acciones</th>              

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

<!--=====================================
Modal Crear Rol
======================================-->

<div class="modal" id="crearRol">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Rol</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         

          
           <!--input rol  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regRol" name="regRol" placeholder="Ingresar Rol" required>
              
            
          </div>
           <!-- input descripcion -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-file-alt"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regDescripcion" name="regDescripcion" placeholder="Ingresar descripción" required>
              
          
          </div>


                    


         
        </div>      
          
          <?php  

          $registrorol = new ControladorRol();
          $registrorol -> ctrCrearRol();
          

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


<!--=====================================
Modal editar rol 
======================================-->

<div class="modal" id="editarRol">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Rol</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
 
        </div>
        <input type="hidden" class="form-control input-lg" id="editaridrol" name="editaridrol" value required>

        <div class="modal-body"> 
 
     
        <!-- input nombre -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarnombreRol" name="editarnombreRol" value required>
              
            
          </div>
          
        <!-- input descripcion-->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-file-alt"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editardescripcion" name="editardescripcion" value required>
              
            
          </div>
           
             <?php 

          $editarRol = new ControladorRol();
          $editarRol -> ctreditarRol();

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

<?php  

// $valorh = $_POST['rol'];
// $_SESSION['rol']=$valorh;

?> 
<!--=====================================
Modal editar rol 
======================================-->

<div class="modal" id="editarPermisos"> 

  <div class="modal-dialog modal-lg ">
    
        <div class="modal-content">

      <form action="perimiso" method="post">
       
        <div class="modal-header btn-secondary">
          
          <h4 class="modal-title">Permisos Roles</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
 
        </div>
        
        <div class="modal-body">  
         
         
          <input class="form-control" type="hidden" name="rol" id="rol" readonly> 

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

    
           

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
             <button type="submit" class="btn btn-warning"> Editar</button>
          </div> 

        </div>
          


        </div>

        </div> 

      </form>

    </div>

  </div>

</div> 

<!--=====================================
Modal Ver Documentos
======================================-->
<div class="modal" id="editarPermisos23">


    <div class="modal-dialog modal-lg ">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-warning">
          
          <h4 class="modal-title"> <b> <i class="fas fa-file-alt"></i> Ver Documentos </b></h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button> 

        </div>
 
 
        <div class="modal-body"> 

          <!-- input nombre --> 
        <input type="text" name="rol" id="rol">

        <div class="modal-body">
        <table id="ver_actividad" class="table table-bordered table-striped"  style="width:100%"> 
        </table>
      
          </div>

          <div class="modal-footer d-flex justify-content-between">
          
       
        </div>

        </div> 

      </form>

    </div>

  </div>

</div>