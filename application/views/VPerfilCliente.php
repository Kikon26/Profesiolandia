
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
              <h4 class="tituloV"> <strong> Bienvenido a tu cuenta <?php echo $username ?></strong></h4>
            </strong>

            <!--Tabs de informacion del profesional inicio  -->
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link <?=$datosvista["tab"] === '1' ? 'show active' : '' ?>" id="nav-data-tab" data-toggle="tab" href="#nav-data" role="tab" aria-controls="nav-data" aria-selected="true">Mis Datos</a> 
                <a class="nav-item nav-link <?=$datosvista["tab"] === '2' ? 'show active' : '' ?>" id="nav-fav-tab" data-toggle="tab" href="#nav-fav" role="tab" aria-controls="nav-fav" aria-selected="false">Mis Favoritos</a>
                <a class="nav-item nav-link <?=$datosvista["tab"] === '3' ? 'show active' : '' ?>" id="nav-int-tab" data-toggle="tab" href="#nav-int" role="tab" aria-controls="nav-int" aria-selected="false" >Contenido de interés</a>
                <a class="nav-item nav-link <?=$datosvista["tab"] === '4' ? 'show active' : '' ?>" id="nav-quest-tab" data-toggle="tab" href="#nav-quest" role="tab" aria-controls="nav-quest" aria-selected="false">Preguntas</a>
                <a class="nav-item nav-link <?=$datosvista["tab"] === '5' ? 'show active' : '' ?>" id="nav-pref-tab" data-toggle="tab" href="#nav-pref" role="tab" aria-controls="nav-pref" aria-selected="false">Preferencias</a>
                <a class="nav-item nav-link <?=$datosvista["tab"] === '6' ? 'show active' : '' ?>" id="nav-apo-tab" data-toggle="tab" href="#nav-apo" role="tab" aria-controls="nav-apo" aria-selected="false">Calendario de Citas</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">              
              <!--  Detalle tab  - Mis Datos - Inicio   -->
              <div class="tab-pane fade <?=$datosvista["tab"] === '1' ? 'show active' : '' ?>" id="nav-data" role="tabpanel" aria-labelledby="nav-data-tab">                  
                
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
                                        <input type="hidden" name="existe_direccion" id="existe_direccion" value="no" >  
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
                                          
                                  <div class="form-group row">
                                      <div class="col-md-2">
                                        <label class="col-form-label">Usuario</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" onkeypress="return AvoidSpace(event)" required>
                                      </div>  
                                      <div class="form-group col-md-3">
                                        <label class="col-form-label">Email</label>                                      
                                        <div class="controls">
                                          <input type="email" name="email" id="email" class="form-control" required data-validation-required-message="Esté campo es requerido"> 
                                        </div>  
                                      </div>
                                      
                                      <div class="col-md-3">
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
              <div class="tab-pane fade <?=$datosvista["tab"] === '2' ? 'show active' : '' ?>" id="nav-fav" role="tabpanel" aria-labelledby="nav-fav-tab">
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
              <div class="tab-pane fade <?=$datosvista["tab"] === '3' ? 'show active' : '' ?>" id="nav-int" role="tabpanel" aria-labelledby="nav-int-tab"><br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Contenido de interés</h4>                    
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
             
                <div id="tbody_publicaciones"></div>             
                <!--***********************************************************************************************************************************************-->
                <!-- MODAL ADD -->
                <form id="form_save_update_publicacion">
                <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalle de la Publicación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                                                                                      
                      <form id="form_save" style="text-align: center;" target="_self">
                        <div class="form-row"  style="text-align: left;">
                          <div class="col-md-12">
                              <label for="publicacionLabel1">Título de la Publicación:</label>
                              <input type='hidden' name='id_cat_publicacion' id='id_cat_publicacion' value="-1">
                              <input type="text" class="form-control" id="titulo" placeholder="Ingresa el Titulo de la Publicacion(s)" readonly>
                          </div>

                          <div class="col-md-12">
                            <label for="resumenLabel1">Resúmen de la Publicación:</label>
                            <textarea class="form-control" maxlength="600" rows="3" id="resumen" placeholder="Ingresa el resumen / detalle de la publicación (600 caracteres maximo)" readonly></textarea>
                          </div>

                          <div class="col-md-12">
                            <label for="PublicacionLabel2">Publicación:</label>
                            <textarea class="form-control" maxlength="10000" rows="5" id="publicacion" placeholder="Ingresa la informacion de la publicación (10,000 caracteres maximo)" readonly></textarea>
                          </div>
                        </div>
                        <br>                        
                      </form>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                        
                    </div>
                    </div>
                </div>
                </div>
                </form>
                <!--END MODAL ADD-->                 
              </div>
              <!--  Detalle tab  - Contenido de Interes - Fin  -->
             

              <!--  Detalle tab  - Preguntas - Inicio  -->
              <div class="tab-pane fade <?=$datosvista["tab"] === '4' ? 'show active' : '' ?>" id="nav-quest" role="tabpanel" aria-labelledby="nav-quest-tab">
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
                    <a href="#" onclick="savePregunta();"  >                   
                      <span data-toggle="tooltip" data-placement="top" title="Pregunta a un Profesional">
                        Pregunta a un Profesional
                      </span>
                    </a>  
                  </div>
                  <div class="col"></div>
                </div>
                <hr>

                <div id="tbody_preguntas"></div>    
                <!--***********************************************************************************************************************************************-->
                <!-- MODAL ADD -->
                <form id="form_save_update_pregunta">
                <div class="modal fade" id="Modal_Add_Pregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crea una Pregunta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                                                                                      
                      <div class="row">

                        <div class="col-md-7">
                          <br>
                          <h5 class="tituloV"><strong>Pregunta a un Profesional</strong> </h5>
                          <p class="text-justify">
                            Tu respuesta sera canalizada con los profesionales <br>
                            Los profesionales tardan aproximadamente 48 horas en responder tu pregunta<br>
                            Recibiras una notificacion cuando tu respuesta sea contestada
                          </p>
                        </div>

                        <div class="col-md-5" style="text-align: center;">
                          <img src="<?php echo base_url(); ?>imagenes/questions.png" style="height: 200px; width: 200px;" alt="Pregunta">
                        </div>

                      </div>

                      <div class="container" style="border-radius: 25px; background: #ded7d7;">
                        <br>                         
                          <div class="container" style="text-align: left;">
                            <label for="pregunta1" class="form-label"><strong style="color: #333030;">&nbsp;Cual es tu pregunta?</strong></label>
                            <input type='hidden' name='id_cat_pregunta' id='id_cat_pregunta' value="-1">
                            <input type="text" class="form-control" id="pregunta" placeholder="Escribe tu pregunta...">
                          </div>                          
                        <br>
                      </div>                      
                      <br>                              
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btn_save_edit_pregunta" class="btn btn-primary">Enviar</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>
                <!--END MODAL ADD-->    
      
                <!--***********************************************************************************************************************************************-->  

                 <!-- Preguntas Collapse  
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
                   Respuestas  
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
                   Respuestas  
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
                <br>                -->



              </div>
              <!--  Detalle tab  - Preguntas - Fin  -->

              <!--  Detalle tab  - Preferencias - Inicio  -->
              <div class="tab-pane fade <?=$datosvista["tab"] === '5' ? 'show active' : '' ?>" id="nav-pref" role="tabpanel" aria-labelledby="nav-pref-tab">
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
              <div class="tab-pane fade <?=$datosvista["tab"] === '6' ? 'show active' : '' ?>" id="nav-apo" role="tabpanel" aria-labelledby="nav-apo-tab"><br>
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



    
<<<<<<< HEAD
          </div>

                <!--***********************************************************************************************************************************************-->
                <!-- MODAL ADD -->
                <form id="form_save_update_pregunta">
                <div class="modal fade" id="Modal_Add_Pregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crea una Pregunta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                                                                                      
                      <div class="row">
            
                        <div class="col-md-7">
                          <br>
                          <h5 class="tituloV"><strong>Pregunta a un Profesional</strong> </h5>
                          <p class="text-justify">
                            Tu respuesta sera canalizada con los profesionales <br>
                            Los profesionales tardan aproximadamente 48 horas en responder tu pregunta<br>
                            Recibiras una notificacion cuando tu respuesta sea contestada
                          </p>
                        </div>

                        <div class="col-md-5" style="text-align: center;">
                          <img src="<?php echo base_url(); ?>imagenes/questions.png" style="height: 200px; width: 200px;" alt="Pregunta">
                        </div>
                      </div>

                      <div class="container" style="border-radius: 25px; background: #ded7d7;">
                        <br>                         
                          <div class="container" style="text-align: left;">
                            <label for="id_cat_profesion" class="form-label"><strong style="color: #333030;">&nbsp;Tipo de Profesional</strong></label>
                            <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_profesion" name="id_cat_profesion" data-placeholder="Selecciona Profesión" required>                                                         
                            </select>                           
                          </div>                          
                        <br>                         
                          <div class="container" style="text-align: left;">
                            <label for="pregunta1" class="form-label"><strong style="color: #333030;">&nbsp;Cual es tu pregunta?</strong></label>
                            <input type='hidden' name='id_cat_pregunta' id='id_cat_pregunta' value="-1">
                            <input type="text" class="form-control" id="pregunta" placeholder="Escribe tu pregunta...">
                          </div>                          
                        <br>
                      </div>                      
                      <br>                              
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btn_save_edit_pregunta" class="btn btn-primary">Preguntar</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>
                <!--END MODAL ADD-->    
                <!--***********************************************************************************************************************************************-->

        </div>
=======
    </div>
</div>
>>>>>>> 05e16327d818604f29ecf2cb5c3810a7fdcb5dfa
      

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


