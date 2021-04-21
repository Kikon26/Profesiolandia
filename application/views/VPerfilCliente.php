
<div class="page-wrapper33">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <br> 
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
    <div class="container-fluid33" >
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- File export -->
        <div class="container mt-n0 col-9">
          <div class="container-fluid py-0 pt-3" style="text-align: center;">
            <strong>
              <h4 class="tituloV"> <strong> Bienvenido a tu cuenta "Nombre"</strong></h4>
            </strong>

            <!--Tabs de informacion del profesional inicio  -->
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-data-tab" data-toggle="tab" href="#nav-data" role="tab" aria-controls="nav-data" aria-selected="true">Mis Datos</a> 
                <a class="nav-item nav-link" id="nav-fav-tab" data-toggle="tab" href="#nav-fav" role="tab" aria-controls="nav-fav" aria-selected="false">Mis Favoritos</a>
                <a class="nav-item nav-link" id="nav-int-tab" data-toggle="tab" href="#nav-int" role="tab" aria-controls="nav-int" aria-selected="false" >Contenido de interés</a>
                <a class="nav-item nav-link" id="nav-quest-tab" data-toggle="tab" href="#nav-quest" role="tab" aria-controls="nav-quest" aria-selected="false">Preguntas</a>
                <a class="nav-item nav-link" id="nav-pref-tab" data-toggle="tab" href="#nav-pref" role="tab" aria-controls="nav-pref" aria-selected="false">Preferencias</a>
                <a class="nav-item nav-link" id="nav-apo-tab" data-toggle="tab" href="#nav-apo" role="tab" aria-controls="nav-apo" aria-selected="false">Calendario de Citas</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">              
              <!--  Detalle tab  - Mis Datos - Inicio   -->
              <div class="tab-pane fade show active" id="nav-data" role="tabpanel" aria-labelledby="nav-data-tab">                  
                
                  <div class="container-fluid  py-0 pt-3">

                    <form id="form_update" method="post">                             
                      <div class="row d-flex justify-content-center" >        
                        <div class="col-12">   
                          <div class="card">

                              <div class="card-header bg-light">
                                  <div class="row"> 
                                      <div class="col-lg-3"> 
                                        <h6  class="m-b-0 text-black">Datos Personales</h6>                                                                
                                      </div>  
                                      <div class="col-lg-9 text-right">                                                                 
                                      </div>  
                                  </div>                                
                              </div>

                            
                              <div class="form-body">
                                <div class="card-body">

                                  <div class="form-group row">
                                      
                                    <div class="col-md-4">
                                        <label class="col-form-label">Nombre</label>
                                        <input type="hidden" name="id_cat_usuario" id="id_cat_usuario" value="<?php echo  $idUsuario; ?>" >  
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                                      </div>
                                      
                                      <div class="col-md-4">
                                        <label class="col-form-label">Paterno</label>
                                        <input type="text" name="paterno" id="paterno" class="form-control" placeholder="Paterno" required>
                                      </div>
                                  
                                      
                                      <div class="col-md-4">
                                        <label class="col-form-label">Materno</label>
                                        <input type="text" name="materno" id="materno" class="form-control" placeholder="Materno" required>
                                      </div>

                                  </div>    
                                              

                                  <div class="row"> 
                                      <div class="col-md-4">
                                        <label class="col-form-label">Usuario</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" onkeypress="return AvoidSpace(event)" required>
                                      </div>  

                                      <div class="form-group col-md-4">
                                          <label class="col-form-label">Password</label>                                      
                                          <div class="controls">
                                              <input type="password" name="password" id="password" class="form-control">                                         
                                          </div>                                 
                                      </div>   

                                      <div class="form-group col-md-4">
                                          <label class="col-form-label">Confirma tu Password</label>                                      
                                          <div class="controls">
                                              <input type="password" name="password2" id="password2" data-validation-match-match="password" class="form-control">
                                          </div>  
                                      </div>                                                    
                                  </div>  

                                  <div class="form-group row">
                                      <div class="form-group col-md-4">
                                        <label class="col-form-label">Email</label>                                      
                                        <div class="controls">
                                          <input type="email" name="email" id="email" class="form-control" required data-validation-required-message="Esté campo es requerido"> 
                                        </div>  
                                      </div>
                                      
                                      <div class="col-md-4">
                                        <label class="col-form-label">Telefono</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
                                      </div>                                  


                                      <div class="col-md-3">
                                        <label class="col-form-label">Foto</label>                                                      
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="file" name="file">                                                        
                                          <label class="custom-file-label" for="file" id="label_file">Elige una Foto</label>                                                        
                                        </div>
                                      </div>

                                      <div id ="div_imagen_perfil" class="col-md-1 div_imagen_perfil" style="display:none">                                                                                                                                                                                                                                                                                  
                                        <br>
                                        <img src="" id="imagen_perfil" name="imagen_perfil" data-nombre="" height="80" width="80" class="img-fluid" alt="Responsive image"/>                                                           
                                      </div>        
                                      
                                  </div>                           
                          

                                </div>
                                                
                                

                              </div>
                            

                          </div>  
                        </div>
                      </div>

                      <div class="row d-flex justify-content-center" >        
                        <div class="col-12">
                          <div class="card">
                              <div class="card-header bg-light">
                                <h6 class="m-b-0 text-black">Dirección</h6>    
                              </div>  
                              <div class="card-body">
                                  <h4 class="card-title"></h4>
                                  <h6 class="card-subtitle"></h6>
                                  <div class="row">                                
                                    <div class="col-md-6">
                                      <label class="col-form-label">Estado</label>                                    
                                      <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_estado" name="id_cat_estado" data-placeholder="Seleccione Estado" required>                                                         
                                      </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <label class="col-form-label">Municipio</label>
                                      <input type="text" name="mpio" id="mpio" class="form-control" placeholder="Municipio" required>
                                    </div>
                                  </div>
                                  <div class="row">                                
                                    <div class="col-md-4">
                                      <label class="col-form-label">Colonia</label>
                                      <input type="text" name="colonia" id="colonia" class="form-control" placeholder="Colonia" required>
                                    </div>

                                    
                                    <div class="col-md-4">
                                      <label class="col-form-label">Calle</label>
                                      <input type="text" name="calle" id="calle" class="form-control" placeholder="Calle" required>
                                    </div>


                                    <div class="col-md-2">
                                      <label class="col-form-label">Num.</label>
                                      <input type="text" name="num" id="num" class="form-control" placeholder="Num." required>
                                    </div>

                                    <div class="col-md-2">
                                      <label class="col-form-label">C.P.</label>
                                      <input type="text" name="cp" id="cp" class="form-control" placeholder="C.P." required>
                                    </div>

                                  </div>
                              
                              </div>
                          </div>
                        </div>
                      </div> 

                      <div class="container mt-n0">
                        <div class="container-fluid py-0 p-1" style="color: #008000; text-align: center;">              
                          <button type="submit" class="btn btn-success" id="button_guardar"> <i class="fa fa-check"></i> Guardar</button>                          
                        </div>
                      </div>        

                    </form>
                  </div>
                
              </div>
              <!--  Detalle tab  - Mis Datos - Fin  -->

              <!--  Detalle tab  - Mis Favoritos- Inicio  -->
              <div class="tab-pane fade" id="nav-fav" role="tabpanel" aria-labelledby="nav-fav-tab">
                <br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Mis Favoritos</h4>                    
                  </div>
                  <div class="col"></div>
                </div>

                <hr>
                <div id="tbody_profesionistas_favoritos"></div>
              </div>
              <!--  Detalle tab  - Mis Favoritos- Fin  -->

              <!--  Detalle tab  - Contenido de Interes- Inicio  -->
              <div class="tab-pane fade" id="nav-int" role="tabpanel" aria-labelledby="nav-int-tab"><br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Contenido de interés</h4>                    
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                <!-- Todas las publicaciones del Profesional - Inicio  -->
                <!-- Modales de Publicaciones - Inicio  -->
                <div class="card-body">
                  <a href="#" data-toggle="modal" data-target="#2020.10.31"  style="color: #2e9ff4;"> 
                    <div class="row" style="text-align: left;">
                      <div class="col-md-2">
                        <h5 class="tituloV"><strong> Area de interes:</strong> </h5>
                        Salud
                        <!-- Esta area de interes se extrae de la tabla de areas de interes donde esta catalogado el profesional -->
                      </div>
                      <div class="col-md-10">
                        <h5 class="tituloV"><strong> Título:</strong> </h5>
                        Titulo de la Publicacion
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" style="text-align: justify;">
                        <h5 class="tituloV"><strong>Resumen de la Publicacion:</strong></h5>
                        En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                        <br>
                      </div> 
                      <br>
                    </div>
                  </a>
                  <!-- Modal -->
                  <div class="modal fade" id="2020.10.31" tabindex="-1" role="dialog" aria-labelledby="2020.10.31" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: 70%;">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title" id="BcardLabel"> Salud - Titulo de la Publicacion</h5>
                          <!-- Esta area de interes se extrae de la tabla de areas de interes donde esta catalogado el profesional -->
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body" style="text-align: center;">
                          <!-- Texto-->
                          <div class="col-md-12" style="text-align: justify; color: gray;">            
                            En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                            <br>
                            En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                            <br>
                            En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                            <br>
                            <br>
                            <div class="row">
                              Creado por: &nbsp;&nbsp; <strong> Nombre del Profesional</strong>
                              <!-- Poner el nombre del Profesional en el articulo y poner link a su pagina de perfil -->
                            </div>
                          </div> 
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn my-0 border border-white" style="background: #0856c7;" data-dismiss="modal" >Cerrar</button>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <a href="#" data-toggle="modal" data-target="#2020.11.01"  style="color: #2e9ff4;"> 
                    <div class="row" style="text-align: left;">
                      <div class="col-md-2">
                        <h5 class="tituloV"><strong> Area de Interes:</strong> </h5>
                          Finanzas
                          <!-- Esta area de interes se extrae de la tabla de areas de interes donde esta catalogado el profesional -->
                      </div>
                    
                      <div class="col-md-10">
                        <h5 class="tituloV"><strong> Título:</strong> </h5>
                        Titulo de la Publicacion
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" style="text-align: justify;">
                        <h5 class="tituloV"><strong>Resumen de la Publicacion:</strong></h5>
                        En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                        <br>
                      </div> 
                      <br>
                    </div>
                  </a>

                  <!-- Modal -->
                  <div class="modal fade" id="2020.11.01" tabindex="-1" role="dialog" aria-labelledby="2020.11.01" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: 70%;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="BcardLabel"> Finanzas - Titulo de la Publicacion</h5>
                          <!-- Esta area de interes se extrae de la tabla de areas de interes donde esta catalogado el profesional -->
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="text-align: center;">
                          <!-- Texto-->
                          <div class="col-md-12" style="text-align: justify; color: gray;">                
                            En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                            <br>
                            En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                            <br>
                            En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                            <br>
                            En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                            <br>
                            En la actualidad el rol del contador público en las organizaciones se ha potencializado y este profesional se ha convertido en parte fundamental de cualquier entidad. Explicamos en qué áreas podría especializarse si es usted un contador público y qué cargos podría desempeñar en cada una. 
                            <br>
                            <br>
                            <div class="row">
                              Creado por: &nbsp;&nbsp; <strong> Nombre del Profesional</strong>
                              <!-- Poner el nombre del Profesional en el articulo y poner link a su pagina de perfil -->
                            </div>
                          </div> 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn my-0 border border-white" style="background: #0856c7;" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modales de Publicaciones - Fin  -->
                <!-- Todas las publicaciones del Profesional - Fin  -->
              </div>
              <!--  Detalle tab  - Contenido de Interes - Fin  -->
             

              <!--  Detalle tab  - Preguntas - Inicio  -->
              <div class="tab-pane fade" id="nav-quest" role="tabpanel" aria-labelledby="nav-quest-tab">
                <br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Preguntas </h4>                    
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center; text-align: justify-all;">
                    <a href="pregunta.php?direccion=usuario" target="_self"> 
                      <span data-toggle="tooltip" data-placement="top" title="Pregunta a un Profesional">
                        Pregunta a un Profesional
                      </span>
                    </a>  
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                <!--  Preguntas Collapse -->  
                <div class="row" style="text-align: left;">
                  <div class="col-md-8" style="border-radius: 25px; border-color: black; background-color: #f1efef;">
                    <br>
                    <a data-toggle="collapse" href="#collapsePregunta1" role="button" aria-expanded="false" aria-controls="collapsePregunta1">
                      Cuantos años debo de tener para poder realizar tramites legales?
                      <br>
                      <br>
                    </a>
                  </div>
                  <div class="col-md-4"></div>
                </div>

                <div class="collapse" id="collapsePregunta1">
                  <br>
                  <!-- Respuestas  -->
                  <div class="row">                    
                    <div class="col-md-4">
                      <a href="profesional.php=id=1111" target="_self">        
                        <img src="" style="max-height: 40px; max-height: 40px; position: absolute; bottom: 5px; right: 5px; border-radius: 40%;" data-toggle="tooltip" data-placement="top" title="Marcela Vazquez">
                      </a>                        
                    </div>
                    <div class="col-md-8" style="border-radius: 25px; background: #dddddd;">
                      <br>
                      Los años que debes de tener son minimo la mayoria de edad que so 18 años aqui en Mexico para poder realizar cualquier tipo de tramite
                      <br>
                      <br>
                    </div>
                  </div>

                  <br>
                  <!-- Respuestas  -->
                  <div class="row">                    
                    <div class="col-md-4">
                      <a href="profesional.php=id=1111" target="_self">        
                          <img src="" style="max-height: 40px; max-height: 40px; position: absolute; bottom: 5px; right: 5px; border-radius: 40%;" data-toggle="tooltip" data-placement="top" title="Rodrigo Mancera">
                      </a>                        
                    </div>
                    <div class="col-md-8" style="border-radius: 25px; background: #dddddd;">
                      <br>
                      Debes de tener 18 años
                      <br>
                      <br>
                    </div>
                  </div>
                </div>
                <br>
                 <!--  Preguntas Collapse -->  
                <div class="row" style="text-align: left;">
                  <div class="col-md-8" style="border-radius: 25px; border-color: black; background-color: #f1efef;">
                    <br>
                    <a data-toggle="collapse" href="#collapsePregunta2" role="button" aria-expanded="false" aria-controls="collapsePregunta2">
                      Cuantos tratamientos odontologicos puedo tener en 6 meses si tengo 18 años?
                      <br>
                      <br>
                    </a>
                  </div>
                  <div class="col-md-4"></div>
                </div>

                <div class="collapse" id="collapsePregunta2">
                  <br>
                  <!-- Respuestas  -->
                  <div class="row">                    
                    <div class="col-md-4">
                      <a href="profesional.php=id=1111" target="_self">        
                        <img src="" style="max-height: 40px; max-height: 40px; position: absolute; bottom: 5px; right: 5px; border-radius: 40%;" data-toggle="tooltip" data-placement="top" title="Marcela Vazquez">
                      </a>                        
                    </div>
                    <div class="col-md-8" style="border-radius: 25px; background: #dddddd;">
                      <br>
                      Debes de dejar pasar al menos 3 meses entre tratamientos
                      <br>
                      <br>
                    </div>
                  </div>
                  <br>
                  <!-- Respuestas  -->
                  <div class="row">                    
                    <div class="col-md-4">
                    <a href="profesional.php=id=1111" target="_self">        
                      <img src="" style="max-height: 40px; max-height: 40px; position: absolute; bottom: 5px; right: 5px; border-radius: 40%;" data-toggle="tooltip" data-placement="top" title="Rodrigo Mancera">
                    </a>                        
                    </div>
                    <div class="col-md-8" style="border-radius: 25px; background: #dddddd;">
                      <br>
                      Le mayoria de las veces las indicaciones te las da el Dentista con el cual estas siendo atendido.
                      Este depende mucho del tipo de tratamiento. Estemos para apoyarte
                      <br>
                      <br>
                    </div>
                  </div>                   
                </div>
              </div>
              <!--  Detalle tab  - Preguntas - Fin  -->

              <!--  Detalle tab  - Preferencias - Inicio  -->
              <div class="tab-pane fade" id="nav-pref" role="tabpanel" aria-labelledby="nav-pref-tab">
                <br>
                  <div class="row">
                    <div class="col"></div>
                    <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                      <h4> Preferencias </h4>
                    </div>
                    <div class="col"></div>
                  </div>
                  <hr>
                  <div class="container" style="text-align: center;">
                    <br><br><br>
                    <strong>
                            <h4 class="tituloV"> <strong> Próximamente habilitaremos esta sección</strong>
                            </h4>
                    </strong>  
                    <br><br><br>
                  </div>

              </div>
              <!--  Detalle tab  - Preferencias- Fin  -->


              <!--  Detalle tab  - Calendario de  Citas - Inicio  -->
              <div class="tab-pane fade" id="nav-apo" role="tabpanel" aria-labelledby="nav-apo-tab"><br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Calendario de Citas </h4>                    
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                <div class="container" style="text-align: center;">
                  <br><br><br>
                  <strong>
                    <h4 class="tituloV"> <strong> Próximamente habilitaremos esta sección</strong></h4>
                  </strong>  
                  <br><br><br>
                </div>
              </div>
              <!--  Detalle tab  - Calendario de Citas - Fin  -->                   
            </div>
            <!--Tabs de informacion del profesional Fin  -->



    
    </div>
</div>
      

    </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->				
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->		
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">                
<link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style_profesiolandia.css" rel="stylesheet">    

<!-- ============================================================== -->	        
<!-- tinymce -->    
<!-- ============================================================== -->                
<script src="<?php echo base_url(); ?>assets/libs/tinymce/tinymce.min.js"></script>


