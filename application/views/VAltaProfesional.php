
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
              <h4 class="tituloV"> <strong> Bienvenido a la pagina de registro de datos de Profesiolandia <?php echo $username ?></strong></h4>
            </strong>

            <!--Tabs de informacion del profesional inicio  -->
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">                
                <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Información General</a>               
                <a class="nav-item nav-link" id="nav-exp-tab" data-toggle="tab" href="#nav-exp" role="tab" aria-controls="nav-exp" aria-selected="false">Experiencia & Titulos</a>                
                <a class="nav-item nav-link" id="nav-pub-tab" data-toggle="tab" href="#nav-pub" role="tab" aria-controls="nav-pub" aria-selected="false">Publicaciones</a>                
                <a class="nav-item nav-link" id="nav-dir-tab" data-toggle="tab" href="#nav-dir" role="tab" aria-controls="nav-dir" aria-selected="false">Datos de contacto</a>
                <a class="nav-item nav-link" id="nav-precio-tab" data-toggle="tab" href="#nav-precio" role="tab" aria-controls="nav-precio" aria-selected="false">Precios</a>
                <a class="nav-item nav-link" id="nav-promo-tab" data-toggle="tab" href="#nav-promo" role="tab" aria-controls="nav-promo" aria-selected="false">Calendario</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">    
                             
              <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                <div class="container-fluid">
                  <br>
                  <div class="row">
                    <div class="col"></div>
                    <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                      
                      <h4> Ingresa tus datos generales</h4>
                    </div>
                    <div class="col"></div>
                  </div>
                  <hr>

                  <form id="form_info_gral" tyle="text-align: center;">
                    <div class="form-row" style="text-align: left;">
                      <div class="form-group col-md-6">
                        <label for="titulo">Título</label>
                        <input type="hidden" name="id_cat_profesional" id="id_cat_profesional" value="<?php echo  (isset($this->session->id_cat_profesional))?  $this->session->id_cat_profesional :  $idUsuario; ?>" >  
                        <input type="hidden" name="id_cat_rol" id="id_cat_rol" value="<?php echo  $id_perfil ?>" >  
                        <input type="hidden" name="existe_direccion" id="existe_direccion" value="no" >  
                        <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_profesion" name="id_cat_profesion" data-placeholder="Selecciona Profesión" required>                                                         
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="celula">Cédula Profesional</label>
                        <input type="text" class="form-control" id="cedula_profesional" placeholder="Ingresa un Cédula Profesional">
                      </div>
                    </div>
                    <div class="form-row" style="text-align: left;">
                      <div class="form-group col-md-6">
                        <label for="especialidad">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" placeholder="Ingresa tu Especialidad">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="celula_pos">Cédula Profesional Posgrado</label>
                        <input type="text" class="form-control" id="cedula_profesional_postgrado" placeholder="Ingresa un Cédula Profesional Posgrado">
                      </div>
                    </div>                    
                    <div class="form-row"  style="text-align: left;">
                      <div class="col-md-12">
                        <label for="validationTextarea1">Resumen del servicio</label>
                        <textarea class="form-control" maxlength="170" rows="2" id="descripcion" placeholder="Ingresa el resumen del servicio" required></textarea>
                      </div> 
                    </div>
                    <br>
                    <div class="form-row"  style="text-align: left;">
                      <div class="col-md-12">
                        <label for="informacion_completa">Informacion completa del Servicio</label>
                        <textarea class="form-control" rows="15" id="informacion_completa" name="informacion_completa" placeholder=" Ingresa la información completa del servicio"></textarea>
                      </div> 
                    </div>
                    <br>
                    <button type="submit" class="btn my-0 border border-white" style="background: #0856c7;">Guardar</button>
                  </form>
                </div>
              </div>

              <div class="tab-pane fade" id="nav-exp" role="tabpanel" aria-labelledby="nav-exp-tab">
                <br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">
                    <h4> Experiencia y Titulos</h4>
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                <form id="form_experiencia_titulos" style="text-align: center;">
                  <div class="form-row"  style="text-align: left;">
                    <div class="col-md-12">
                      <label for="alta_experiencia1">Experiencia y servicios Ofrecidos</label>
                      <textarea class="form-control" maxlength="170" rows="5" id="experiencia_servicios_ofrecidos" placeholder="Ingresa todos los servicios ofrecidos separados por un asterisco (*) " ></textarea>
                    </div> 
                  </div>
                  <br>

                  <div class="form-row"  style="text-align: left;">
                    <div class="col-md-12">                                                              
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title"></h4>
                          
                            <div class="rec-repeater form-group" data-limit="5">

                              <div data-repeater-list="repeater-group">
                                <div data-repeater-item class="row m-b-15"> 
                                  
                                  <div class="col-md-6">                                                              
                                    <label class="control-label" id="label_rec_1">Nombre de tu primer reconocimiento</label>
                                    <input type="text" class="form-control" id="rec_1" placeholder="Ingresa el nombre de tu primer reconocimiento" required>
                                  </div>

                                  <div class="col-md-3">                                                                                                                                                                    
                                    <label class="text-right">Selecciona un archivo</label>                                                      
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="file_1" name="file_1" required>                                                        
                                      <label class="custom-file-label" id="label_file_1">Elige una imagen</label>                                                        
                                    </div>
                                  </div> 
                                  <div id ="div_imagen_1" class="col-md-1 div_imagen" style="display:none">                                                                                                                                                                                                                                          
                                    <input type="hidden" name="id_cat_reconocimiento_1" id="id_cat_reconocimiento_1" value="" >  
                                    <img src="" id="imagen_1" name="imagen_1" data-nombre="" height="80" width="80" class="img-fluid" alt="Responsive image"/>                                                           
                                  </div>        
                                  
                                  <div class="col-md-2">                                                        
                                      <br>                                        
                                      <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" id="button_delete_rec" type="button">  
                                        <i class="ti-close"></i>
                                      </button>                                                        
                                  </div>                                                      
                                  

                                </div>

                              </div>
                              <button type="button" data-repeater-create="" id="button_new_rec" class="btn btn-info waves-effect waves-light">Agregar</button>
                            </div>                                                        
                      
                        </div>
                      </div>
                    </div>
                  </div>




                  <div class="form-row"  style="text-align: left;">
                    <div class="col-md-12">
                      <label for="preguntas">Preguntas frecuentes </label>
                      <textarea class="form-control" rows="5" id="preguntas_frecuentes" placeholder=" Ingresa las preguntas y respuesta mas frecuentes separadas por un esterisco (*)" ></textarea>
                    </div> 
                  </div>
                  <br>
                  <button type="submit" class="btn my-0 border border-white" style="background: #0856c7;">Guardar</button>
                </form>   
              </div>  

              <div class="tab-pane fade" id="nav-pub" role="tabpanel" aria-labelledby="nav-pub-tab">
                <br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">
                    <h4> Publicaciones</h4>
                  </div>
                  <div class="col"></div>
                </div>
                <hr>     

                <div class="col-xs-4 col-sm-8 col-md-12" style="text-align: center;">                      
                  Quieres hacer una publicación de valor para tu audiencia y llegar a mas usuarios, da click en el sig link
                  <br>                  
                  <a href="#" onclick="savePublicacion();"  >                   
                    <span data-toggle="tooltip" data-placement="top" title="Crear Publicación">
                      Crear Publicación
                    </span>
                  </a> 
                </div>          

                <div id="tbody_publicaciones"></div>             
                <!--***********************************************************************************************************************************************-->
                <!-- MODAL ADD -->
                <form id="form_save_update_publicacion">
                <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crea una Publicación</h5>
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
                              <input type="text" class="form-control" id="titulo" placeholder="Ingresa el Titulo de la Publicacion(s)" required="">
                          </div>

                          <div class="col-md-12">
                            <label for="resumenLabel1">Resúmen de la Publicación:</label>
                            <textarea class="form-control" maxlength="600" rows="3" id="resumen" placeholder="Ingresa el resumen / detalle de la publicación (600 caracteres maximo)" required></textarea>
                          </div>

                          <div class="col-md-12">
                            <label for="PublicacionLabel2">Publicación:</label>
                            <textarea class="form-control" maxlength="10000" rows="5" id="publicacion" placeholder="Ingresa la informacion de la publicación (10,000 caracteres maximo)" required></textarea>
                          </div>
                        </div>
                        <br>                        
                      </form>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btn_save_edit_publicacion" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>
                <!--END MODAL ADD-->    
      
                <!--***********************************************************************************************************************************************-->           
              </div>                
              
              <div class="tab-pane fade" id="nav-dir" role="tabpanel" aria-labelledby="nav-dir-tab">
                <br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">
                    <h4> Domicilio Laboral</h4>
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                
                <form id="form_contacto" style="text-align: center;">
                
                    <div class="form-row" style="text-align: left;">
                      <div class="form-group col-md-6">                      
                        <label class="col-form-label">Estado</label>                                    
                        <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_estado" name="id_cat_estado" data-placeholder="Seleccione Estado" required>                                                         
                        </select>
                      </div>
                      
                      <div class="form-group col-md-6">
                        <label class="col-form-label">Municipio</label>
                        <input type="text" name="mpio" id="mpio" class="form-control" placeholder="Municipio" required>
                      </div>
                    </div>
                    
                    <div class="row">                                
                      <div class="form-group col-md-4">
                        <label class="col-form-label">Colonia</label>
                        <input type="text" name="colonia" id="colonia" class="form-control" placeholder="Colonia" required>
                      </div>

                      
                      <div class="form-group col-md-4">
                        <label class="col-form-label">Calle</label>
                        <input type="text" name="calle" id="calle" class="form-control" placeholder="Calle" required>
                      </div>


                      <div class="form-group col-md-2">
                        <label class="col-form-label">Num.</label>
                        <input type="text" name="num" id="num" class="form-control" placeholder="Num." required>
                      </div>

                      <div class="form-group col-md-2">
                        <label class="col-form-label">C.P.</label>                        
                        <input type='text' name="cp" id="cp" class="form-control" placeholder="C.P." required onkeypress='validate(event)' />
                      </div>
                  </div>
                  <div class="form-row" style="text-align: left;">                    
                    <div class="form-group col-md-6">
                      <label for="cel">Teléfono contacto</label>
                      <input type="text" class="form-control" id="telefono" placeholder="Ingresa tu telefono de contacto">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>                      
                      <input type="email" name="email" id="email" class="form-control" required data-validation-required-message="Esté campo es requerido"> 
                    </div>
                  </div>
                  
                  <br>
                  <div class="row">
                    <div class="col"></div>
                    <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                      
                      <h4> Horario de Atención</h4>                      
                    </div>
                    <div class="col"></div>
                  </div>
                  <hr>
                  
                  <div class="form-row" style="text-align: left;">      
                    <div class="form-group col-md-1">                                                                
                      <label >Dia</label><br> 
                      <label class="mt-2">Lunes</label>
                    </div>
                    <div class="form-group col-md-2">                                          
                      <label class="text-center">Apertura</label>
                      <input id="horario_apertura_1" name="horario_apertura_1" type="text" class="form-control time" placeholder="Apertura" onkeypress="return false"/>                                  
                    </div>
                    <div class="form-group col-md-2">                      
                      <label>Cierre</label>
                      <input id="horario_termino_1" name="horario_termino_1" type="text" class="form-control time" placeholder="Cierre" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-1">                      
                        <label>Vigente</label>
                        <input type="checkbox" class="form-control" id="dia_vigente_1">                      
                    </div>  

                    <div class="form-group col-md-1">                                                                
                      <label >Dia</label><br> 
                      <label class="mt-2">Viernes</label>
                    </div>
                    <div class="form-group col-md-2">                                          
                      <label class="text-center">Apertura</label>
                      <input id="horario_apertura_5" name="horario_apertura_5" type="text" class="form-control time" placeholder="Apertura" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-2">                      
                      <label>Cierre</label>
                      <input id="horario_termino_5" name="horario_termino_5" type="text" class="form-control time" placeholder="Cierre" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-1">                      
                        <label>Vigente</label>
                        <input type="checkbox" class="form-control" id="dia_vigente_5">                      
                    </div>  
                  </div>
                  
                  <div class="form-row" style="text-align: left;">      
                    <div class="form-group col-md-1">                                                                                   
                      <label class="mt-0">Martes</label>
                    </div>
                    <div class="form-group col-md-2">                     
                      <input id="horario_apertura_2" name="horario_apertura_2" type="text" class="form-control time" placeholder="Apertura" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-2">                                            
                      <input id="horario_termino_2" name="horario_termino_2" type="text" class="form-control time" placeholder="Cierre" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-1">                                            
                        <input type="checkbox" class="form-control" id="dia_vigente_2">                      
                    </div>  

                    <div class="form-group col-md-1">                                                                                   
                      <label class="mt-0">Sabado</label>
                    </div>
                    <div class="form-group col-md-2">                     
                      <input id="horario_apertura_6" name="horario_apertura_6" type="text" class="form-control time" placeholder="Apertura" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-2">                                            
                      <input id="horario_termino_6" name="horario_termino_6" type="text" class="form-control time" placeholder="Cierre" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-1">                                            
                        <input type="checkbox" class="form-control" id="dia_vigente_6">                      
                    </div>  
                  </div>
                  
                  <div class="form-row" style="text-align: left;">      
                    <div class="form-group col-md-1">                                                                                   
                      <label class="mt-0">Miercoles</label>
                    </div>
                    <div class="form-group col-md-2">                     
                      <input id="horario_apertura_3" name="horario_apertura_3" type="text" class="form-control time" placeholder="Apertura" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-2">                                            
                      <input id="horario_termino_3" name="horario_termino_3" type="text" class="form-control time" placeholder="Cierre" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-1">                                            
                        <input type="checkbox" class="form-control" id="dia_vigente_3">                      
                    </div>  

                    <div class="form-group col-md-1">                                                                                   
                      <label class="mt-0">Domingo</label>
                    </div>
                    <div class="form-group col-md-2">                     
                      <input id="horario_apertura_7" name="horario_apertura_7" type="text" class="form-control time" placeholder="Apertura" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-2">                                            
                      <input id="horario_termino_7" name="horario_termino_7" type="text" class="form-control time" placeholder="Cierre" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-1">                                            
                        <input type="checkbox" class="form-control" id="dia_vigente_7">                      
                    </div>  
                  </div>
                  
                  <div class="form-row" style="text-align: left;">      
                    <div class="form-group col-md-1">                                                                                   
                      <label class="mt-0">Jueves</label>
                    </div>
                    <div class="form-group col-md-2">                     
                      <input id="horario_apertura_4" name="horario_apertura_4" type="text" class="form-control time" placeholder="Apertura" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-2">                                            
                      <input id="horario_termino_4" name="horario_termino_4" type="text" class="form-control time" placeholder="Cierre" onkeypress="return false"/>            
                    </div>
                    <div class="form-group col-md-1">                                            
                        <input type="checkbox" class="form-control" id="dia_vigente_4">                      
                    </div>  
                  </div>
                  
                  <?php if ($id_perfil=="1") { ?>
                  <br>
                  <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">
                      
                      <h4 style="color: #e31818;"> Datos de contacto Visibles solo para Administrador</h4>
                      
                    </div>
                    <div class="col">
                    </div>
                  </div>
                  <hr>
                  <div class="form-row"  style="text-align: left;">                          
                    <div class="form-group" id="div_business_card"> 
                      <label class="col-form-label">Business Card</label>   
                      <div class="custom-file">
                        <input type="hidden" name="id_cat_red_social" id="id_cat_red_social" value="" >  
                        <input type="file" class="custom-file-input" id="file_business_card" name="file_business_card">
                        <label class="custom-file-label" for="file">Imagen QR del profesional</label> 
                      </div>
                    </div>
                    <div id ="div_imagen_business_card" class="col-md-1 business_card" style="display:none">                                                                                                                                                                                                                                                                  
                        <img src="" id="imagen_business_card" name="imagen_business_card" data-nombre="" height="80" width="80" class="img-fluid" alt="Responsive image"/>                                                           
                    </div>              


                    <div class="form-group col-md-6">
                      <label for="google_maps">Google Maps</label>
                      <input type="text" class="form-control" id="google_maps" placeholder="Ingresa la direccion de google maps del profesional">
                    </div>                
                  </div>
                  

                  <div class="form-row" style="text-align: left;">
                    <div class="form-group col-md-6">
                      <label for="whatsapp">Whatsapp</label>
                      <input type="text" class="form-control" id="whatsapp" placeholder="Ingresa el telefono de Whatsapp del profesional">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="facebook">Facebook</label>
                      <input type="text" class="form-control" id="facebook" placeholder="Ingresa el facebook del profesional">
                    </div>
                  </div>
                  <div class="form-row" style="text-align: left;">
                    <div class="form-group col-md-6">
                      <label for="instagram">Instagram</label>
                      <input type="text" class="form-control" id="instagram" placeholder="Ingresa el Instagram del profesional">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="twitter">Twitter</label>
                      <input type="text" class="form-control" id="twitter" placeholder="Ingresa el Twitter del profesional">
                    </div>
                  </div>
                  <div class="form-row" style="text-align: left;">
                    <div class="form-group col-md-6">
                      <label for="pagina_web">Pagina Web</label>
                      <input type="text" class="form-control" id="pagina_web" placeholder="Ingresa la pagina web del profesional">
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-check">
                        <label for="activar_redes">Activar estos datos del profesional</label>
                        <input type="checkbox" class="form-control" id="activar_redes">
                      </div>
                    </div>                    
                  </div>
                        
                  (Todas esta informacion es con costo) a partir del 3er mes Junto con Promociones en el perfil
                  <br>**** Envio de correo a los usuarios me gusta y de preferencias
                  <br>**** Y envio de mensajes o notificaciones en la plataforma a los usuarios que marcaron me gusta y de preferencias
                  <br>
                  <br>
                  <?php } ?>  
                  <button type="submit" class="btn my-0 border border-white" style="background: #0856c7;">Guardar</button>
                </form> 
              </div>
              
              <div class="tab-pane fade" id="nav-precio" role="tabpanel" aria-labelledby="nav-precio-tab">
                
                <form id="form_precios" tyle="text-align: center;">

                  <br>
                  <div class="row">
                    <div class="col"></div>
                    <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                      <h4> Sube una promocion en tu Perfil</h4>                    
                    </div>
                    <div class="col"></div>
                  </div>
                  <hr>

                  <div class="form-row"  style="text-align: left;">                          
                    <div class="form-group col-md-11"> 
                      <label class="label_rec5">Selecciona un archivo</label>   
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file_promo_1" name="file_promo_1" required>
                        <label class="custom-file-label" for="file_promo_1">Sube una imagen promocional de tu computadora o celular</label> 
                      </div>
                    </div>
                    <div id ="div_imagen_promo_1" class="col-md-1 div_imagen_promo" style="display:none">                                                                                                                                                                                                                                          
                      <input type="hidden" name="id_cat_promocion_1" id="id_cat_promocion_1" value="" >  
                      <img src="" id="imagen_promo_1" name="imagen_promo_1" data-nombre="" height="80" width="80" class="img-fluid" alt="Responsive image"/>                                                           
                    </div>        

                  </div>
                  <br>

                  <div class="row">
                    <div class="col"></div>
                    <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                      <h4> Ingresa los precios mas destacatos de tus servicios</h4>
                    </div>
                    <div class="col"></div>
                  </div>
                  <hr>

                  <div class="form-row"  style="text-align: left;">
                    <div class="col-md-12">                                                              
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title"></h4>
                          
                          <div class="precio-repeater form-group" data-limit="10">

                            <div data-repeater-list="repeater-group">
                              <div data-repeater-item class="row m-b-15"> 
                                
                                <div class="col-md-4"> 
                                  <input type="hidden" name="id_cat_precio_1" id="id_cat_precio_1" value="" >                                                               
                                  <label>Servicio</label>
                                  <input type="text" class="form-control servicio" id="servicio_1" placeholder="Ingresa el nombre de tu servicio" required>
                                </div>

                                <div class="col-md-4">                                                              
                                  <label>Precio</label>
                                  <input type="text" class="form-control precio" id="precio_1" placeholder="Ingresa el costo de tu servicio" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" required>
                                </div>

                                <div class="col-md-2">                                                                                                                                                                    
                                  <div class="form-check" align="left">
                                    <label>Vigente</label>
                                    <input type="checkbox" class="form-control" id="ch_1">
                                  </div>
                                </div>  
                                
                                <div class="col-md-2">                                                        
                                    <br>                                        
                                    <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" id="button_delete_precio" type="button">  
                                      <i class="ti-close"></i>
                                    </button>                                                        
                                </div>                                                      
                                

                              </div>

                            </div>
                            <button type="button" data-repeater-create="" id="button_new_precio" class="btn btn-info waves-effect waves-light">Agregar</button>
                          </div>                                                        
                      
                        </div>
                      </div>
                    </div>
                  </div>
              
                  
                  <br>
                  <div class="row">
                    <div class="col"></div>
                    <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                      
                      <h4> Ingresa los metodos de pago aceptados</h4>
                    </div>
                    <div class="col"></div>
                  </div>
                  <hr>
                  <div class="form-row" style="text-align: center;">
                    <div class="form-group col-md-12" style="text-align: left;">
                      <label for="mp1">Metodos de pago</label>
                      <input type="text" class="form-control" id="metodos_pago" placeholder="Ingresa los metodos de pago ( Ej. Efectivo | Tarjeta Bancaria | Transferencia Bancaria | CoDi )" required>
                    </div>                           
                  </div>

                  <br>
                  <button type="submit" class="btn my-0 border border-white" style="background: #0856c7;">Guardar</button>
                </form>
              </div>
              <div class="tab-pane fade" id="nav-promo" role="tabpanel" aria-labelledby="nav-promo-tab">Promociones del Profesional
                <br><br><br><br><br>
              </div>
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


<!-- ============================================================== -->	        
<!-- tinymce -->    
<!-- ============================================================== -->                
<script src="<?php echo base_url(); ?>assets/libs/tinymce/tinymce.min.js"></script>


