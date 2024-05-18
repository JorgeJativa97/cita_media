<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2"> 

        <div class="col-sm-6"> 

          <h1>Registrar Examen Elastografia</h1>
          
 <input type="hidden" id="cedulaElas" value="<?php echo $permisosU["identificacion"] ?>">

  <input type="hidden" id="cedulaPaExL" value="<?php echo $cedulaPaciente["identificacion"] ?>">

        </div>

        <div class="col-sm-6"> 
 
          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro de Examen</li>

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
         <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 7 && $value["w"] == 1  ): ?> 

        <button class="btn btn-primary btn-sm" data-toggle="modal"  data-target=".bd-example-modal-lg">Nuevo Registro</button>   


               <?php endif ?> 

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaElastografia" width="100%">
          
          <thead>
            
            <tr>
              
              <th>CEDULA</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>ARCHIVOS</th>
              <th>ARCHIVOS SIN FIRMA</th>
              <th>FECHA</th>
              <th>ACCIONES</th>

            </tr>


          </thead> 

          <tbody>
            
          <!--  <tr>
              
              <td>1312213711</td>
              <td>Jorge Andres</td>
              <td>Meza Jativa</td>
              <td>la fuente</td>
              <td>0969951849</td>
              <td>Tiempo completo</td>
              <td>6</td>
              <td></td>
              <td>Utm</td>
              <td>Magister</td>
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
Modal Crear paciente
======================================-->

<div class="modal fade bd-example-modal-lg" id="crearElastografia"> 

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Examen</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
          <!-- seleccionar la asignatura prueba -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-user-tie"></span>

            </div>

            <select class="form-control" id="codPaciente" name="codPaciente"  style="width: 90%" >

            <option value="">SELECCIONE EL PACIENTE</option> 

            <?php  

            $Paciente = ControladorPaciente::ctrMostrarPaciente(null, null); 

            foreach ($Paciente as $key => $value) {
                
                echo '<option value="'.$value["pac_identificacion"].'">'.$value["pac_identificacion"].'</option>';

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

        <!--  -->
        <label>Numero de muestra</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control input-lg" id="nmuestra" name="nmuestra" >     
          </div>        
       
           <label>Distancia de la piel cm</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control input-lg" id="dpiel" name="dpiel" >     
          </div>  



<!--             <div class="input-group mb-3">   

         <div class="input-group-append input-group-text">
            <span >Numero de muestra</span>
         </div>  
             
                <input type="text" class="form-control input-lg" id="nmuestra" name="nmuestra"  style="width: 5%"> 
         <div class="input-group-append input-group-text">
            <span >Distancia de la piel cm</span>
            </div>      

                 <input type="text" class="form-control input-lg" id="dpiel" name="dpiel"  style="width: 5%">  

          </div> -->
    


          <label style>Resultados</label>
          <br>
          <!--  -->
          <label>1.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra1" name="muestra1" >     
          </div>  
          
          <label>2.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra5" name="muestra2" >     
          </div> 

          <label>3.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra3" name="muestra3" >     
          </div> 

          <label>4.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra4" name="muestra4" >     
          </div> 

          <label>5.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra5" name="muestra5" >     
          </div>

          <label>6.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra6" name="muestra6" >     
          </div> 

          <label>7.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra7" name="muestra7" >     
          </div> 

          <label>8.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra8" name="muestra8" >     
          </div>

          <label>9.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra9" name="muestra9" >     
          </div>

          <label>10.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra10" name="muestra10" >     
          </div> 

          <label>11.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra11" name="muestra11" >     
          </div>

          <label>12.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra12" name="muestra12" >     
          </div> 

          <label>13.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra13" name="muestra13" >     
          </div> 

          <label>14.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra14" name="muestra14" >     
          </div> 

          <label>15.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra15" name="muestra15" >     
          </div> 

          <label>16.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra16" name="muestra16" >     
          </div> 

          <label>Rigidez este de.......</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezS" name="rigidezS" >     
          </div> 

          <label>Rigidez media de.......</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezM" name="rigidezM" >     
          </div> 

          <label>Rigidez promedia de.......</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezP" name="rigidezP" >     
          </div> 

          <label>Diagnostigo</label>
        <div class="input-group mb-3">
                <textarea type="text" class="form-control" id="diagnostico" name="diagnostico" ></textarea>     
          </div>


        </div> 

          <?php 

          $registroExamenElastografia = new ControladorExamenElastografia();
          $registroExamenElastografia -> ctrCrearExamenElastografia();

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
Modal Editar paciente
======================================-->

<div class="modal" id="editarElasto">

  <div class="modal-dialog modal-lg" >
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Examen Elastografia</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
        <!-- seleccionar la asignatura prueba --> 

        <input type="hidden" class="form-control input-lg" name="ela" required readonly>

  
        <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="date" class="form-control input-lg" id="fecha" name="efecha" required>     
          </div> 






      <div class="input-group mb-3">   

         <div class="input-group-append input-group-text">
            <span >Numero de muestra</span>
         </div>  
             
                <input type="text" class="form-control input-lg" id="enmuestra" name="enmuestra" required style="width: 25%"> 
         <div class="input-group-append input-group-text">
            <span >Distancia de la piel cm</span>
            </div>      

                 <input type="text" class="form-control input-lg" id="edpiel" name="edpiel" required style="width: 25%">  

          </div>
    

            <label style>Resultados</label>
            <br>
    <!--FILA 2 -->

         <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text">
            <span >1.- KPA</span>
         </div>   

              <input type="text" class="form-control" id="emuestra1" name="emuestra1" required style="width: 15%">

         <div class="input-group-append input-group-text">
            <span >2.- KPA</span>
         </div>  
              <input type="text" class="form-control" id="emuestra2" name="emuestra2" required style="width: 15%">

         <div class="input-group-append input-group-text">
            <span >3.- KPA</span>
         </div>   
              <input type="text" class="form-control" id="muestra3" name="emuestra3" required style="width: 15%">
         <div class="input-group-append input-group-text">
            <span >4.- KPA</span>
         </div>      
               <input type="text" class="form-control" id="muestra4" name="emuestra4" required style="width: 15%">          
                  

          </div>

    <!--FILA 3 -->

         <div class="input-group mb-3">  
             <div class="input-group-append input-group-text">
            <span >5.- KPA</span>
         </div>

              <input type="text" class="form-control" id="muestra5" name="emuestra5"  required style="width: 15%">
         <div class="input-group-append input-group-text">
            <span >6.- KPA</span>
         </div> 
              <input type="text" class="form-control" id="muestra6" name="emuestra6"  required style="width: 15%">
         <div class="input-group-append input-group-text">
            <span >7.- KPA</span>
         </div>  
              <input type="text" class="form-control" id="muestra7" name="emuestra7" required style="width: 15%">
         <div class="input-group-append input-group-text">
            <span >8.- KPA</span>
         </div>     
               <input type="text" class="form-control" id="muestra8" name="emuestra8" required style="width: 15%">          
                  

          </div>
    <!--FILA 4 -->
         <div class="input-group mb-3">  
         <div class="input-group-append input-group-text">
            <span >9.- KPA</span>
         </div>  

              <input type="text" class="form-control" id="muestra9" name="emuestra9"  required style="width: 14%">
        <div class="input-group-append input-group-text">
            <span >10.- KPA</span>
         </div>   
              <input type="text" class="form-control" id="muestra10" name="emuestra10"  required style="width: 15%">  

        <div class="input-group-append input-group-text">
            <span >11.- KPA</span>
         </div>  
              <input type="text" class="form-control" id="muestra11" name="emuestra11" required style="width: 15%"> 
        <div class="input-group-append input-group-text">
            <span >12.- KPA</span>
         </div>      
               <input type="text" class="form-control" id="muestra12" name="emuestra12" required style="width: 14%">          
                  

          </div>


    <!--FILA 5 -->
         <div class="input-group mb-3">  
         <div class="input-group-append input-group-text">
            <span >13.- KPA</span>
         </div>  

              <input type="text" class="form-control" id="muestra13" name="emuestra13"  required style="width: 14%">
        <div class="input-group-append input-group-text">
            <span >14.- KPA</span>
         </div>   
              <input type="text" class="form-control" id="muestra14" name="emuestra14"  required style="width: 15%">  

        <div class="input-group-append input-group-text">
            <span >15.- KPA</span>
         </div>  
              <input type="text" class="form-control" id="muestra15" name="emuestra15" required style="width: 15%"> 
        <div class="input-group-append input-group-text">
            <span >16.- KPA</span>
         </div>      
               <input type="text" class="form-control" id="muestra16" name="emuestra16" required style="width: 14%">          
                  

          </div>

    <!--FILA 5 -->
         <div class="input-group mb-3">  
         <div class="input-group-append input-group-text">
            <span >Rigidez este de...</span>
         </div>  

              <input type="text" class="form-control" id="rigidezS" name="erigidezS"  required style="width: 10%">
        <div class="input-group-append input-group-text">
            <span >Rigidez media de...</span>
         </div>   
              <input type="text" class="form-control" id="rigidezM" name="erigidezM"  required style="width: 10%">  
        <div class="input-group-append input-group-text">
            <span >Rigidez promedia de...</span>
         </div>   
              <input type="text" class="form-control" id="rigidezP" name="erigidezP"  required style="width: 10%">
            
                  

          </div>

     

            <label>Diagnóstigo</label>
            <div class="input-group mb-3">
                <textarea type="text" class="form-control" id="diagnostico" name="ediagnostico" required></textarea>     
            </div>

        </div>  

         <?php 

          $editarExamenElastografia = new ControladorExamenElastografia();
          $editarExamenElastografia -> ctrEditarExamenElastografia();

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
