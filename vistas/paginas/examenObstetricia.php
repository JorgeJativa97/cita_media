<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Examen obstetricia</h1>
            <input type="hidden" id="cedulaObs" value="<?php echo $permisosU["identificacion"] ?>">

              <input type="hidden" id="cedulaPaciObs" value="<?php echo $cedulaPaciente["identificacion"] ?>">

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
 <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 8 && $value["w"] == 1  ): ?> 
        <button class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#crearObstetricia">Nuevo Registro</button>   
   
  <?php endif ?> 
      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaObstetricia" width="100%">
          
          <thead>
            
            <tr>
              
              <th>CEDULA</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>FECHA</th>
              <th>Archivo</th>
              <th>ARCHIVOS SIN FIRMA</th>
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
Crear
======================================-->

<div class="modal" id="crearObstetricia">

  <div class="modal-dialog modal-xl" >
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Crear Examen Obstericia</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 

        <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-user-tie"></span>

            </div>

            <select class="form-control" id="codPaciente" name="codPaciente" required style="width: 90%" required>

            <option value="">SELECCIONE EL PACIENTE</option> 

            <?php  

            $Paciente = ControladorPaciente::ctrMostrarPaciente(null, null); 

           // echo '<pre>'; print_r($Paciente); echo '</pre>';

            foreach ($Paciente as $key => $value) {
                
                echo '<option value="'.$value["pac_identificacion"].'">'.$value["pac_identificacion"].'</option>';

            }


            ?>

            </select>     

            </div> 
         
        <!-- seleccionar la asignatura prueba --> 

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

          
            <input type="hidden" class="form-control input-lg "  name="personal" value="<?php echo $admin["idpersona"] ?>" readonly>
            
<label style>Encefalo</label>
            <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Ventriculos Laterales</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="VentriculosLaterales"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Ventriculos" name="Ventriculos_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Plexos Coroideos</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="PlexosCoroideos"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Plexos" name="Plexos_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Talamo</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Talamo"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Talamo" name="Talamo_comentario"  style="width: 10%">
        

        </div>  
        
        
        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Cerebelo</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Cerebelo"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Cerebelo" name="Cerebelo_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Fosa Posterior</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="FosaPosterior"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Fosa" name="FosaPosterior_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Cavum S.P</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Cavum_S_P"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Cavum" name="Cavum_S_P_comentario"  style="width: 10%">
        

        </div>  
<label style>Cara</label> 

        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Labios</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Labios"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Labios" name="Labios_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Fosas Orbitrarias</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Fosas_Orbitrarias"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Fosas" name="Fosas_Orbitrarias_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >O.nasales</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="O_nasales"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="nasales" name="O_nasales_comentario"  style="width: 10%">
        

        </div>  
<label style>Torax</label>    
        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Cuatro cavidades</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Cuatro_cavidades"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="cavidades" name="Cuatro_cavidades_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Septum Interventricular</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected"name="Septum_Interventricular"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Interventricular" name="Septum_Interventricular_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Vasos sanguineos</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Vasos_sanguineos"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="sanguineos" name="Vasos_sanguineos_comentario"  style="width: 10%">
        

        </div>  

        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Cayado Aórtico</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Cayado_Aortico"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Aortico" name="Cayado_Aortico_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Aorta</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Aorta"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Aorta" name="Aorta_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Pulmones</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Pulmones"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Pulmones" name="Pulmones_comentario"  style="width: 10%">
        

        </div>  

        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Diafragma</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Diafragma"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Diafragma" name="Diafragma_comentario"  style="width: 10%">
             
             
<!--        <div class="input-group-append input-group-text" style="width: 14%">
            <span >Plexos Coroideos</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected"name="PlexoSN"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Plexos" name="Plexos"  style="width: 10%">  -->

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Columna vertebral</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Columna_vertebral"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="vertebral" name="Columna_vertebral_comentario"  style="width: 10%">
             <input type="text" class="form-control" readonly style="width: 30%"> 

        </div>  
<label style>Abdomen</label> 
        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Pared Abdominal</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Pared_Abdominal"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Abdominal" name="Pared_Abdominal_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Estomago</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Estomago"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Estomago" name="Estomago_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >VesiculaBilliar</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="VesiculaBilliar"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="VesiculaBilliar" name="VesiculaBilliar_comentario"  style="width: 10%">
        

        </div>  

        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Riñon derecho</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Rinon_derecho"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Rderecho" name="Rinon_derecho_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Riñon Izquierdo</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Rinon_Izquierdo"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="RIzquierdo" name="Rinon_Izquierdo_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Vejiga Urinaria</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Vejiga_Urinaria"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="VUrinaria" name="Vejiga_Urinaria_comentario"  style="width: 10%">
        

        </div>  

<label style>Extremidades Superiores</label>    
        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Humero</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Humero"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="humero" name="Humero_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Cubito</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Cubito"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="cubito" name="Cubito_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Radial</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Radial"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="radial" name="Radial_comentario"  style="width: 10%">
        

        </div>   


        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Mano</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Mano"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="mano" name="Mano_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Dedos</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Dedos"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="dedos" name="Dedos_comentario"  style="width: 10%"> 

                
            <input type="text" class="form-control" readonly style="width: 30%"> 

             <!--  <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected " name="TalamoSN" readonly></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Talamo" name="Talamo"  style="width: 10%"readonly> -->
        

        </div>  
<label style>Extremidades Inferiores</label>  
        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Femur</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Femur"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="femur" name="Femur_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Tibia</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Tibia"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="tibia" name="Tibia_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Peroné</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Perone"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="perone" name="Perone_comentario"  style="width: 10%">
        

        </div>  


        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text"style="width: 14%">
            <span >Pies</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Pies"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="pies" name="Pies_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Dedos</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Dedosp"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="dedos" name="Dedosp_comentario"  style="width: 10%"> 

              <div class="input-group-append input-group-text" style="width: 14%">
            <span >Mov.Respiratorios</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Mov_Respiratorios"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Mrespiratorios" name="Mov_Respiratorios_comentario"  style="width: 10%">
        

        </div>  


        <div class="input-group mb-3"> 
          <div class="input-group-append input-group-text" style="width: 14%">
            <span >Mov.Del feto</span>
         </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Mov_Del_feto"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Mfeto" name="Mov_Del_feto_comentario"  style="width: 10%">
             
             
       <div class="input-group-append input-group-text" style="width: 14%">
            <span >Anexos Cordon 3 Vasos</span>
          
          </div>   

              <select class="form-control select2bs4" style="width: 4%;">
              <option selected="selected" name="Anexos_Cordon"></option>
              <option>SI</option>
              <option>NO</option>
              </select>
              <input type="text" class="form-control" id="Anexos" name="Anexos_Cordon_comentario"  style="width: 10%"> 
        <input type="text" class="form-control" readonly style="width: 30%"> 

        </div> 

         <?php 

          $crearobs = new ControladorObstetra();
          $crearobs -> ctrCrearExamenObstetra();

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

<div class="modal" id="editarObstetra">

  <div class="modal-dialog modal-xl "  >
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Examen Obstetricia</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">  
         
<!-- Id Obstentricia--> 

<input type="hidden" class="form-control input-lg" name="Edi_obs_codigo"  readonly>
        <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-calendar"></span>

            </div>
                <input type="date" class="form-control input-lg" id="Edi_obs_fecha" name="Edi_obs_fecha" >     
          </div> 



<label style>Encefalo</label>
            <br>
    <!--FILA 1 -->

         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Ventriculos Laterales</span>
               </div>   

                  
                    <select class="form-control" name="Edi_obs_Ven"  style="width: 4%">

                      <option class="editarobs_Ven"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>  
                                
                    <input type="text" class="form-control" id="Edi_obs_Ven_comen" name="Edi_obs_Ven_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Plexos Coroideos</span>
               </div>   
                 
                    <select class="form-control" name="Edi_obs_PlexosCo"  style="width: 4%">

                      <option class="editarobs_PlexosCo"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_PlexosCo_comen" name="Edi_obs_PlexosCo_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Talamo</span>
               </div>   
                   
                    <select class="form-control" name="Edi_obs_Talamo"  style="width: 4%">

                      <option class="editarobs_Talamo"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>               
                    <input type="text" class="form-control" id="Edi_obs_Talamo_comen" name="Edi_obs_Talamo_comen"  style="width: 10%">    
                  

          </div>

<!--FILA 2 -->

         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Cerebelo</span>
               </div>   

                     
                    <select class="form-control" name="Edi_obs_Cere"  style="width: 4%">

                      <option class="editarobs_Cere"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>             
                    <input type="text" class="form-control" id="Edi_obs_Cere_comen" name="Edi_obs_Cere_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >FosaPosterior</span>
               </div>   
                   
                 <select class="form-control" name="Edi_obs_FosaPost"  style="width: 4%">

                      <option class="editarobs_FosaPost"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>               
                    <input type="text" class="form-control" id="Edi_obs_FosaPost_comen" name="Edi_obs_FosaPost_comen"  style="width: 10%">

              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Cavum S.P</span>
               </div>   
                   
                <select class="form-control" name="Edi_obs_Cavum"  style="width: 4%">

                      <option class="editarobs_Cavum"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_Cavum_comen" name="Edi_obs_Cavum_comen"  style="width: 10%">    
                  

          </div>


<label style>Cara</label>    
<!--FILA 3 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Labios</span>
               </div>   

                    
                <select class="form-control" name="Edi_obs_Labios"  style="width: 4%">

                      <option class="editarobs_Labios"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>               
                    <input type="text" class="form-control" id="Edi_obs_Labios_comen" name="Edi_obs_Labios_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Fosas Orbitrarias</span>
               </div>   
                    
                   <select class="form-control" name="Edi_obs_Fosas_Orbi"  style="width: 4%">

                      <option class="editarobs_Fosas_Orbi"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>               
                    <input type="text" class="form-control" id="Edi_obs_Fosas_Orbi_comen" name="Edi_obs_Fosas_Orbi_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >O.nasales</span>
               </div>   
                   
                     <select class="form-control" name="Edi_obs_Onasales"  style="width: 4%">

                      <option class="editarobs_Onasales"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>                
                    <input type="text" class="form-control" id="Edi_obs_Onasales_comen" name="Edi_obs_Onasales_comen"  style="width: 10%">    
                  

          </div>
<label style>Abdomen</label>    
<!--FILA 4 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Pared Abdominal</span>
               </div>   

                    
                    <select class="form-control" name="Edi_obs_p_Abdom"  style="width: 4%">

                      <option class="editarobs_p_Abdom"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>             
                    <input type="text" class="form-control" id="Edi_obs_p_Abdom_comen" name="Edi_obs_p_Abdom_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Estomago</span>
               </div>   
                  
                    <select class="form-control" name="Edi_obs_Estomago"  style="width: 4%">

                      <option class="editarobs_Estomago"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>             
                    <input type="text" class="form-control" id="Edi_obs_Estomago_comen" name="Edi_obs_Estomago_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >VesiculaBilliar</span>
               </div>   
                 

                   <select class="form-control" name="Edi_obs_VBilliar"  style="width: 4%">

                      <option class="editarobs_VBilliar"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>             
                    <input type="text" class="form-control" id="Edi_obs_VBilliar_comen" name="Edi_obs_VBilliar_comen"  style="width: 10%">    
                  

          </div>
  <!--FILA 4 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Riñon derecho</span>
               </div>   
                    
                     <select class="form-control" name="Edi_obs_Rinon_der"  style="width: 4%">

                      <option class="editarobs_Rinon_der"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>                
                    <input type="text" class="form-control" id="Edi_obs_Rinon_der_comen" name="Edi_obs_Rinon_der_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Riñon Izquierdo</span>
               </div>   
                  
                    <select class="form-control" name="Edi_obs_Rinon_izq"  style="width: 4%">

                      <option class="editarobs_Rinon_izq"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_Rinon_izq_comen" name="Edi_obs_Rinon_izq_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Vejiga Urinaria</span>
               </div>   
                 
                    <select class="form-control" name="Edi_obs_Veji_Uri"  style="width: 4%">

                      <option class="editarobs_Veji_Uri"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>               
                    <input type="text" class="form-control" id="Edi_obs_Veji_Uri_comen" name="Edi_obs_Veji_Uri_comen"  style="width: 10%">    
                  

          </div>        
<label style>Torax</label>    
<!--FILA 6 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Cuatro cavidades</span>
               </div>   

                      
                     <select class="form-control" name="Edi_obs_Cuatro_cav"  style="width: 4%">

                      <option class="editarobs_Cuatro_cav"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_Cuatro_cav_comen" name="Edi_obs_Cuatro_cav_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Sep. Interventricular</span>
               </div>   
                      

                    <select class="form-control" name="Edi_obs_Septum_Int"  style="width: 4%">

                      <option class="editarobs_Septum_Int"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_Septum_Int_comen" name="Edi_obs_Septum_Int_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Vasos sanguineos</span>
               </div>   
                  
                    <select class="form-control" name="Edi_obs_Vasos_san"  style="width: 4%">

                      <option class="editarobs_Vasos_san"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_Vasos_san_comen" name="Edi_obs_Vasos_san_comen"  style="width: 10%">    
                  

          </div>
<!--FILA 7 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Cayado Aórtico</span>
               </div>   

                    
                     <select class="form-control" name="Edi_obs_Cayado_Ao"  style="width: 4%">

                      <option class="editarobs_Cayado_Ao"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>                
                    <input type="text" class="form-control" id="Edi_obs_Cayado_Ao_comen" name="Edi_obs_Cayado_Ao_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Aorta</span>
               </div>   
                   

                    <select class="form-control" name="Edi_obs_Aorta"  style="width: 4%">

                      <option class="editarobs_Aorta"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select> 

                    <input type="text" class="form-control" id="Edi_obs_Aorta_comen" name="Edi_obs_Aorta_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Pulmones</span>
               </div>   
                     
                    <select class="form-control" name="Edi_obs_pulmones"  style="width: 4%">

                      <option class="editarobs_pulmones"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>                
                    <input type="text" class="form-control" id="Edi_obs_pulmones_comen" name="Edi_obs_pulmones_comen"  style="width: 10%">    
                  

          </div>
<!--FILA 8 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Diafragma</span>
               </div>   

                     
                      <select class="form-control" name="Edi_obs_Diafra"  style="width: 4%">

                      <option class="editarobs_Diafra"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_Diafra_comen" name="Edi_obs_Diafra_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Columna vertebral</span>
               </div>   
                      

                    <select class="form-control" name="Edi_obs_co_vertebral"  style="width: 4%">

                      <option class="editarobs_co_vertebral"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select> 

                    <input type="text" class="form-control" id="Edi_obs_co_vertebral_comen" name="Edi_obs_co_vertebral_comen"  style="width: 10%">
              
                                  
                <input type="text" class="form-control" readonly style="width: 30%">    
                  

          </div>
<label style>Extremidades Superiores</label>    
<!--FILA 9 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Humero</span>
               </div>   

                 
                     <select class="form-control" name="Edi_obs_Humero"  style="width: 4%">

                      <option class="editarobs_Humero"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>               
                    <input type="text" class="form-control" id="Edi_obs_Humero_comen" name="Edi_obs_Humero_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Cubito</span>
               </div>   
                  
                    <select class="form-control" name="Edi_obs_cubito"  style="width: 4%">

                      <option class="editarobs_cubito"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_cubito_comen" name="Edi_obs_cubito_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Radial</span>
               </div>   
                    
                    <select class="form-control" name="Edi_obs_radial"  style="width: 4%">

                      <option class="editarobs_radial"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_radial_comen" name="Edi_obs_radial_comen"  style="width: 10%">    
                  

          </div>
<!--FILA 10 -->
           <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Mano</span>
               </div>   

                 
                    <select class="form-control" name="Edi_obs_mano"  style="width: 4%">

                      <option class="editarobs_mano"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>                
                    <input type="text" class="form-control" id="Edi_obs_mano_comen" name="Edi_obs_mano_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Dedos</span>
               </div>   
                   
                    <select class="form-control" name="Edi_obs_dedos"  style="width: 4%">

                      <option class="editarobs_dedos"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_dedos_comen" name="Edi_obs_dedos_comen"  style="width: 10%">
              
                                  
                <input type="text" class="form-control" readonly style="width: 30%">    
                  

          </div>
<label style>Extremidades Inferiores</label>    
<!--FILA 11 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Femur</span>
               </div>   
             
                    <select class="form-control" name="Edi_obs_femur"  style="width: 4%">

                      <option class="editarobs_femur"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>                 
                    <input type="text" class="form-control" id="Edi_obs_femur_comen" name="Edi_obs_femur_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Tibia</span>
               </div>   
                    
                    <select class="form-control" name="Edi_obs_tibia"  style="width: 4%">

                      <option class="editarobs_tibia"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>               
                    <input type="text" class="form-control" id="Edi_obs_tibia_comen" name="Edi_obs_tibia_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Peroné</span>
               </div>   
                   

                    <select class="form-control" name="Edi_obs_Perone"  style="width: 4%">

                      <option class="editarobs_Perone"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select> 

                    <input type="text" class="form-control" id="Edi_obs_Perone_comen" name="Edi_obs_Perone_comen"  style="width: 10%">    
                  

          </div>
<!--FILA 12 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Pies</span>
               </div>   

                 <select class="form-control" name="Edi_obs_pies"  style="width: 4%">

                      <option class="editarobs_pies"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select> 
              
                    <input type="text" class="form-control" id="Edi_obs_pies_comen" name="Edi_obs_pies_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Dedos</span>
               </div>   
                     
                    <select class="form-control" name="Edi_obs_dedosp"  style="width: 4%">

                      <option class="editarobs_dedosp"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select> 
              

                    <input type="text" class="form-control" id="Edi_obs_dedosp_comen" name="Edi_obs_dedosp_comen"  style="width: 10%">
              <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Mov.Respiratorios</span>
               </div>    
                
                    <select class="form-control" name="Edi_obs_mRespi"  style="width: 4%">

                      <option class="editarobs_mRespi"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select> 
             
                    <input type="text" class="form-control" id="Edi_obs_mRespi_comen" name="Edi_obs_mRespi_comen"  style="width: 10%">    
                  

          </div>
    <!--FILA 13 -->
         <div class="input-group mb-3"> 
                <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Mov.Del feto</span>
               </div>   

                         
                    <select class="form-control" name="Edi_obs_Mov_feto"  style="width: 4%">

                      <option class="editarobs_Mov_feto"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>           
                    <input type="text" class="form-control" id="Edi_obs_Mov_feto_comen" name="Edi_obs_Mov_feto_comen"  style="width: 10%">

               <div class="input-group-append input-group-text" style="width: 14%">
                  <span >Anx.Cordon 3 Vasos</span>
               </div>   
                        
                    <select class="form-control" name="Edi_obs_ACordon"  style="width: 4%">

                      <option class="editarobs_ACordon"></option>

                       <option value="">Seleccione</option> 
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>

                    </select>              
                    <input type="text" class="form-control" id="Edi_obs_ACordon_comen" name="Edi_obs_ACordon_comen"  style="width: 10%">
              
                                  
                <input type="text" class="form-control" readonly style="width: 30%">    
                  

          </div>

</div>  

         <?php 

          $editarExamenObstentricia = new ControladorObstetra();
          $editarExamenObstentricia -> ctrEditarExamenObstentricia();

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
