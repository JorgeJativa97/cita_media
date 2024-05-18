  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <span class="brand-text font-weight-light"><font color="#2ECC71" face="arial,verdana">Sistema Salud</font></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2"> 

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 

        <li class="nav-item"> 

            <a href="perfil2" class="nav nav-link">
            <i class="nav-icon  fas fa-user"></i>
            <p>Perfil</p>
             </a> 
        </li>



         <?php if($admin["rolid"] != 4): ?>

          <li class="nav-item has-treeview">
            <a href="inicio" class="nav-link">
              <i class="fas fa-folder-plus"></i>
              <p>
                USUARIOS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 

          <?php endif ?>

            
            

            <ul class="nav nav-treeview">



        <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 1 && $value["r"] == 1  ): ?>  
           
            <li class="nav-item">
                <a href="persona" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>Registrar Personal</p>
                </a>
              </li>



      <?php endif ?> 

      <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 2 && $value["r"] == 1  ): ?> 
              <li class="nav-item">
                <a href="roles" class="nav-link">
                  <i class="   fas fa-user-tag"></i>
                  <p>Roles</p>
                </a>
              </li>
        <?php endif ?> 
  
      <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 3 && $value["r"] == 1  ): ?>         
            <li class="nav-item">
                <a href="paciente" class="nav-link">
                  <i class="fas fa-chalkboard-teacher"></i>
                  <p>Registrar Pacientes</p>
                </a>
              </li>
        <?php endif ?> 

          
                        
            </ul>
          </li>
          


         <?php if($admin["rolid"] != 4): ?>

          <li class="nav-item has-treeview">
            <a href="inicio" class="nav-link">
              <i class="fas fa-folder-plus"></i>
              <p>
                EXAMENES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 

          <?php endif ?>

            
            

            <ul class="nav nav-treeview">





          <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 4 && $value["r"] == 1  ): ?>          
              <li class="nav-item">
                <a href="examen" class="nav-link">
                  <i class="fas fa-chalkboard-teacher"></i>
                  <p>Examen</p>
                </a>
              </li> 
          <?php endif ?> 

          <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 5 && $value["r"] == 1  ): ?> 
              <li class="nav-item">
                <a href="plantillaExamen" class="nav-link">
                  <i class="fas fa-chalkboard-teacher"></i>
                  <p>Plantilla Examen</p>
                </a>
              </li> 
          <?php endif ?> 
                        
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="inicio" class="nav-link">
              <i class="fas fa-folder-plus"></i>
              <p>
                RESULTADO EXAMENES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

             
            <ul class="nav nav-treeview">
            <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 6 && $value["r"] == 1  ): ?> 
            <li class="nav-item">
                <a href="resultadoExamen" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>Resultados Examenes</p>
                </a>
              </li> 
            <?php endif ?> 
            <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 7 && $value["r"] == 1  ): ?> 
              <li class="nav-item">
                <a href="examenElastografia" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>Examen Elastografia</p>
                </a>
              </li> 
            <?php endif ?> 
            <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 8 && $value["r"] == 1  ): ?> 
              <li class="nav-item">
                <a href="examenObstetricia" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>Examen Obstetricia</p>
                </a>
              </li> 
            <?php endif ?> 

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="inicio" class="nav-link">
              <i class="fas fa-folder-plus"></i>
              <p>
                AGENDAR CITAS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview">

           <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 9 && $value["r"] == 1  ): ?> 
            <li class="nav-item">
                <a href="cita" class="nav-link">
                  <i class="fas fa-address-card"></i>
                  <p>Citas</p>
                </a>
              </li> 
                 <?php endif ?> 
          <?php foreach ($permisos as $key => $value) if($value["moduloid"] == 10 && $value["r"] == 1  ): ?> 
              <li class="nav-item">
                <a href="horas" class="nav-link">
                  <i class="fas fa-address-card"></i>
                  <p>Horas</p>
                </a>
              </li> 
           <?php endif ?> 
            </ul>
          </li>
        </ul>
     
<!-- /.sidebar-menu -->
  </div>
<!-- /.sidebar -->
</aside>


