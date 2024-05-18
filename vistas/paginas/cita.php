
<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid"> 
      <div class="row mb-2">
 
        <div class="col-sm-6"> 

          <h1>Registrar Cita</h1>
   <input type="hidden" id="cedulaCita" value="<?php echo $permisosU["identificacion"] ?>">
   <input type="hidden" id="cedulaPersona" value="<?php echo $cedulaPaciente["identificacion"] ?>"> 

     <input type="hidden" id="cedulaDoctor2" value="<?php echo $cedulaDoctor["identificacion"] ?>">


        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro de Cita</li>

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
 <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 9 && $value["w"] == 1  ): ?> 
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearCita">Nuevo Registro</button>   
    <?php endif ?> 
       </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablacita" width="100%">
          
          <thead>
               
            <tr>
              <th>#</th>              
              <th>Fecha</th>
              <th>Hora</th>
              <th>Examen</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Cédula</th>
              <th>Estado</th>
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

<div class="modal" id="crearCita">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post"  id="traerCita" enctype="multipart/form-data"> 
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Cita</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 

      <!-- seleccionar la asignatura prueba -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-user-tie"></span>

            </div>
 
            <select class="form-control" id="codCita" name="codCita"  style="width: 90%" >

            <option value="">SELECCIONE EL PACIENTE</option> 

           <?php  

            $valor= $admin["identificacion"];
            // echo '<pre>'; print_r($valor); echo '</pre>';
            $item= "pac_identificacion";

            if($admin["rolid"] == 4){

            $Paciente = ControladorPaciente::ctrMostrarPaciente($item, $valor); 

            foreach ($Paciente as $key => $value) {
                
                echo '<option value="'.$value["pac_identificacion"].'">'.$value["pac_identificacion"].'</option>';

            }
            }else {

            $Paciente = ControladorPaciente::ctrMostrarPaciente(null, null); 

            foreach ($Paciente as $key => $value) {
                
               echo '<option value="'.$value["pac_identificacion"].'">'.$value["pac_identificacion"].'</option>';

            }

            }
 
            ?>

            </select>   

            </div> 

      <!-- input nombre -->
            <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
            <input type="text" class="form-control input-lg nombre" id="nombre" name="nombre" readonly>
            </div>

      <!-- input apellidos-->
            <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
            <input type="text" class="form-control input-lg apellidos" id="apellidos" name="apellidos" readonly>
            </div> 


      <!-- input editar fecha-->
          
          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fas fa-calendar-week"></span>

            </div>

            <input type="text" class="form-control datetimepicker2 " name="citafecha2" id="citafecha2"  value >   
 
          </div> 

     <!-- seleccionar la asignatura prueba -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-calendar-plus"></span>


            </div>

            <select class="form-control" id="codExamen2" name="codExamen2" style="width: 90%" >

            <option value="">SELECCIONE EL EXAMEN</option> 

            <?php   

           




            $valor= $cedulaDoctor["identificacion"];
            // echo '<pre>'; print_r($valor); echo '</pre>';
            $item= "per_identificacion";

              if($item != null && $valor != null){
                   

                $CitaEx = ControladorCita::ctrMostrarExaD($item,$valor); 

                foreach ($CitaEx as $key => $value) {
                
                echo '<option value="'.$value["texa_codigo"].'">'.$value["nom_texa"].'</option>';

                }

              }
              else{

               $CitaEx = ControladorCita::ctrMostrarExamenT(null, null); 

                  foreach ($CitaEx as $key => $value) {
                      
                      echo '<option value="'.$value["texa_codigo"].'">'.$value["nom_texa"].'</option>';

                  }

              }

 
            ?>

            </select>     
 
            </div> 

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-compass"></span>


            </div>

            <select class="form-control Rhora" id="Rhora" name="Rhora" disabled="" required style="width: 90%" required>

            <option value="">SELECCIONE LA HORA</option> 

           
            </select>     

            </div> 
              
 

            <!-- input apellidos-->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-comment-alt"></span>
            </div>
                <input type="text" class="form-control input-lg" id="reobservacion" name="reobservacion" placeholder="Observación" >     
          </div>
         
        </div>      

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="button" class="btn btn-primary RegistrarCita" >Guardar</button>
          </div> 

        </div>

        </div> 

      </form>

    </div>

  </div>

</div> 

<!--=====================================
Modal editar Cita
======================================-->

<div class="modal" id="editarCita">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" >  
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Cita</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 


 <input type="hidden" name="Edi_cit_codigo" id="Edi_cit_codigo"  value >   
 
      <!-- input editar fecha-->
          
          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fas fa-calendar-week"></span>

            </div>

            <input type="date" class="form-control datepicker" name="Edi_cit_fecha" id="Edi_cit_fecha"  value >   

          </div> 

      <!-- seleccionar la asignatura prueba -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-calendar-plus"></span>


            </div>

            <select class="form-control" id="Edi_texa_codigo" name="Edi_texa_codigo" style="width: 90%" >

            <option value="">SELECCIONE EL EXAMEN</option> 

            <?php  

            $CitaEx = ControladorCita::ctrMostrarExamenT(null, null);  

            foreach ($CitaEx as $key => $value) {
                
                echo '<option value="'.$value["texa_codigo"].'">'.$value["nom_texa"].'</option>';

            }

 
            ?>

            </select>     

            </div> 





           <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-compass"></span>


            </div>

            <select class="form-control Edi_cit_hora" id="Edi_cit_hora" name="Edi_cit_hora" disabled="" required style="width: 90%" required>

            <option value="">SELECCIONE LA HORA</option> 

           
            </select>     

            </div> 

         
        </div>      
          
      <!-- 

          $registroCita = new ControladorCita();
          $registroCita -> ctrCrearCita();
         
      --> 
        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="button" class="btn btn-primary EditarCita" >Guardar</button>
          </div> 

        </div>

        </div> 

      </form>

    </div>

  </div>

</div> 