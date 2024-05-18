<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid"> 
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Horas</h1> 
           <input type="hidden" id="cedulaHora" value="<?php echo $permisosU["identificacion"] ?>">

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro de Hora</li>

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
 <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 10 && $value["w"] == 1  ): ?> 
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearPersona">Nuevo Registro</button>   

       <?php endif ?>           

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaHoras" width="100%">
          
          <thead>
               
            <tr>
              <th>Examen</th>              
              <th>Hora</th>
              <th>Acciones</th>              

            </tr>
             

          </thead> 

          <tbody>
                    <!--<tr>
              <td>1</td>
              <td>Activo</td>
              <td>1314019504</td>
              <td>Douglas Macias</td>
              <td>dmacias9504@utm.edu.ec</td>
              <td>Administrador</td>
              <td>0980518916</td>                          
              <td>
                
                <div class='btn-group'>

                <button class="btn btn-warning btn-sm">
                  <i class="fas fa-pencil-alt text-white"></i>
                </button> 

                 <button class="btn btn-danger btn-sm">
                  <i class="fas fa-trash-alt"></i>
                </button> 

                </div>

              </td>


            </tr> -->
            

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
Modal Crear persona
======================================-->

<div class="modal" id="crearPersona">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Hora</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div> 

        <div class="modal-body"> 

          <!-- seleccionar la asignatura prueba -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-calendar-plus"></span>


            </div>

            <select class="form-control" id="codExamen2" name="codExamen2" style="width: 90%" >

            <option value="">SELECCIONE EL EXAMEN</option> 

            <?php   

            $CitaEx = ControladorHoras::ctrMostrarch(null, null); 

            foreach ($CitaEx as $key => $value) {
                
                echo '<option value="'.$value["texa_codigo"].'">'.$value["nom_texa"].'</option>';

            }

 
            ?>

            </select>     
 
            </div> 

            <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-address-card"></span>
            </div>
                <input type="time" class="form-control input-lg" id="regHora" name="regHora" placeholder="Hora" required>
          </div> 

      
                <input type="hidden" class="form-control input-lg" id="idpersona" name="idpersona" placeholder="cedula" value="<?php echo $admin["idpersona"] ?>" required>
        
         
        </div>      
          
       <?php 

         $registroHora = new ControladorHoras();
         $registroHora -> ctrCrearHora();
         
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
Modal editar persona
======================================-->

<div class="modal" id="editarHora">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Persona</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
 
        </div>

        <div class="modal-body"> 

        <input type="hidden"  id="editaridcodigo" name="editaridcodigo" value  required>

        <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-address-card"></span>
            </div>
                <input type="time" class="form-control input-lg" id="editregHora" name="editregHora" value="" required>
          </div>
          
          <!-- <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-calendar-plus"></span>


            </div>

            <select class="form-control" id="editcodExamen2" name="editcodExamen2" style="width: 90%" >

            <option value="">SELECCIONE EL EXAMEN</option> 

            <?php   

            // $CitaEx = ControladorHoras::ctrMostrarch(null, null); 

            // foreach ($CitaEx as $key => $value) {
                
            //     echo '<option value="'.$value["texa_codigo"].'">'.$value["nom_texa"].'</option>';

            // }

 
            ?>

            </select>     
 
            </div> -->
            

          </div> 
          <?php 

          $editarHora = new ControladorHoras();
          $editarHora -> ctrEditarHora();

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
