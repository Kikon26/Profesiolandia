<div class="page-wrapper33">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <br> 
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
		
    <div class="container-fluid33" >
      <!-- ============================================================== -->
      <!-- Start Page Content -->
      <!-- ============================================================== -->
      <!-- File export -->

      <div class="container mt-n0 col-9">
        <div class="container-fluid  py-3 px-0">      
            <!--Carta de informacion del profesional inicio  -->
            <div class="row">    

                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="card-deck">     
                    <div class="card px-1 py-1 mx-1 my-1" style="min-height: 350px;">           
                      <div class="row py-0 px-0">
                        <div class="col px-0" style="text-align: center; color: #757474">                        
                          <input type="hidden" id="id_cat_usuario" value="<?php echo $idUsuario ?>" >                          
                          <input type="hidden" id="id_cat_profesional" value="<?php echo $datosvista["id_cat_profesional"] ?>" >                          
                          <input type="hidden" name="id_cat_rol" id="id_cat_rol" value="<?php echo  $id_perfil ?>" >  
                          <img id="imagen" src="imagenes/Con1.png" class="imagenes" alt="...">
                          <?php if ($id_perfil==3) {?>
                            <a id="ancla_favorito">
                              <img id="imagen_favorito" src="imagenes/Con1.png" class="float-right mr-2" alt="..." width="30px" height="30px">
                            </a>
                          <?php } ?>
                          <h4 class="tituloV"> 
                            <strong id="profesionista"> 
                              Alan Melchor 
                            </strong>
                          </h4>
                          <strong id="profesion"> Contador</strong>
                          <br> 
                          <div id="especialidad">Pymes</div>
                          <br>
                          Cedula Profesional  - 123123123123
                          <p style="color: #007b5e;"> ☆☆☆☆☆ 4/5 / 250 valoraciones </p> 
                        </div>
                      </div>
                    </div>    
                  </div>  
                </div>
       
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="card-deck">     
                  <div class="card px-1 py-1 mx-1 my-1" style="min-height: 350px;">
                    <div class="row py-3 px-3" style="text-align: center; color: #757474; text-align: justify-all;">
                      <div class="col">
                        <strong>Resumen: </strong> 
                          <div id="descripcion">
                            Soy especialista en asesoria para pequeñas y medianas empresas, egresada de la Universidad de Guadalajara. Mi especialidad es trabajar con niños de todas las edades 
                          </div>
                        <hr>
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                              <strong>Telefono:</strong>
                            </div>
                            <div id="tel" class="col-xs-12 col-sm-12 col-md-6">
                              33 22 33 55 44
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                              <strong>Dirección:</strong>
                            </div>
                            <div id="direccion" class="col-xs-12 col-sm-12 col-md-6">
                              Rogelio Bacon de la Barrera 1428A
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                              <strong>Tipo de Pago:</strong>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                              Efectivo y Tarjeta bancarias
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                              <strong>Cita virtual:</strong>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                              Zoom
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>    
                </div>
              </div>
            
              <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center">
                <hr>
                <ul class="list-inline" id="ul_redes_sociales"></ul>
              </div>
            </div>
            <!--Carta de informacion del profesional fin  -->
            <!--Tabs de informacion del profesional inicio  -->
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Información General</a>               
                <a class="nav-item nav-link" id="nav-exp-tab" data-toggle="tab" href="#nav-exp" role="tab" aria-controls="nav-exp" aria-selected="false">Experiencia, Titulos & Publicaciones</a>
                <a class="nav-item nav-link" id="nav-val-tab" data-toggle="tab" href="#nav-val" role="tab" aria-controls="nav-val" aria-selected="false" >Valoraciones</a>
                <a class="nav-item nav-link" id="nav-dir-tab" data-toggle="tab" href="#nav-dir" role="tab" aria-controls="nav-dir" aria-selected="false">Datos de contacto</a>
                <a class="nav-item nav-link" id="nav-precio-tab" data-toggle="tab" href="#nav-precio" role="tab" aria-controls="nav-precio" aria-selected="false">Precios</a>
                <a class="nav-item nav-link" id="nav-cale-tab" data-toggle="tab" href="#nav-cale" role="tab" aria-controls="nav-cale" aria-selected="false">Calendario</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                <div class="container-fluid">
                  <br>
                  <div class="row">
                    <div class="col"></div>
                    <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                        
                      <ul class="list-inline">                          
                        <li class="list-inline-item">
                          <a  href="#" data-toggle="popover" data-placement="top" title="Profesionista Destacado" data-content="Profesionista Destacado">
                            <img src="<?php echo base_url(); ?>imagenes/destacado_logo_mini.png" style="height: 50px; width: 40px;"  alt="Profesionista Destacado">
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a  href="" target="_blank">
                            <img src="<?php echo base_url(); ?>imagenes/Verificado.png" style="height: 45px; width: 50px;" title="Profesionista Verificado"  alt="Profesionista Verificado">
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col"></div>
                  </div>
                  <hr>

                  <div class="row" style="text-align: left;">                     
                    <div class=" col-md-6">
                      <h5 class="tituloV">
                        <strong> Título:</strong> 
                      </h5>
                      <div id="profesion2">
                        Contador Público
                      </div>  
                    </div>
                    <div class="col-md-6">
                      <h5 class="tituloV"><strong>Cédula Profesional:</strong> </h5>
                      <div id="cedula_profesional">123123123123</div>
                    </div>
                  </div>
                  <br>
                  <div class="row" style="text-align: left;">
                    <div class=" col-md-6">
                      <h5 class="tituloV"><strong>Especialidad: </strong></h5>
                       <div id="especialidad2">Finanzas Estratégicas</div>
                      <br>
                    </div>
                    <div class=" col-md-6"> 
                      <h5 class="tituloV"><strong>Cédula Profesional Posgrado</strong></h5>
                      <div id="cedula_profesional_postgrado">123123123123</div>
                    </div>
                  </div>
                  <br>
                        
                  <div class="row" style="text-align: left;">                       
                    <div class="col-md-12">
                      <h5 class="tituloV"><strong>Resumen del servicio:</strong></h5>
<<<<<<< HEAD
                      <div id="descripcion1"></div> 
=======
<<<<<<< HEAD
                      <div id="descripcion">
                        <textarea id="txta_descripcion" readonly rows="4" style="min-width: 100%; border:none; color: #3e5569; font-weight: lighter; font-family: serif Arial;"></textarea>
                      </div>  
=======
                      Soy especialista en asesoria para pequeñas y medianas empresas, egresada de la Universidad de Guadalajara. Mi especialidad es trabajar con niños de todas las edades 
>>>>>>> ac08ebb8f27160be318a5a6b78bbcc6c54473e4e
>>>>>>> 05e16327d818604f29ecf2cb5c3810a7fdcb5dfa
                    </div> 
                  </div>
                  <br>
                  <div class="row" style="text-align: left;">
                    <div class="col-md-12">
                      <h5 class="tituloV"><strong>Informacion completa del Servicio:</strong></h5>
                      
<<<<<<< HEAD
                      <div id="informacion_completa">
                        <textarea id="txta_informacion_completa" readonly rows="8" style="min-width: 100%; border:none; color: #3e5569; font-weight: lighter; font-family: serif Arial;"></textarea>
                      </div> 
=======
                      <div id="informacion_completa"></div> 
>>>>>>> ac08ebb8f27160be318a5a6b78bbcc6c54473e4e
                        
                    </div> 
                    <br>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-exp" role="tabpanel" aria-labelledby="nav-exp-tab">
                <br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Experiencia Titulos y Publicaciones</h4>                   
                  </div>
                  <div class="col"></div>
                </div>
                <hr>

                <div class="accordion" id="collapse_experiencia">

                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h6 class="tituloV"><strong>Experiencia en los sig servicios</strong> </h6>                          
                        </button>
                      </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#collapse_experiencia">
<<<<<<< HEAD
                      <div class="card-body" id="experiencia_servicios_ofrecidos">
                        <textarea id="txta_experiencia_servicios_ofrecidos" readonly rows="8" style="min-width: 100%; border:none; color: #3e5569; font-weight: lighter; font-family: serif Arial;"></textarea>
                      </div>
=======
                      <div class="card-body" id="experiencia_servicios_ofrecidos"></div>
>>>>>>> ac08ebb8f27160be318a5a6b78bbcc6c54473e4e
                    </div>
                  </div>
                  
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h6 class="tituloV"><strong>Reconocimientos y Titulos</strong> </h6>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#collapse_experiencia"></div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h6 class="tituloV"><strong>Publicaciones</strong> </h6>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#collapse_experiencia">                      
                    </div>
                    <!--***********************************************************************************************************************************************-->
                    <!-- MODAL ADD -->                    
                    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalle Publicación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                                                                                      
                          
                            <div class="row"  style="text-align: left;">
                              <div class="col-md-12">
                                  <label for="publicacionLabel1">Título de la Publicación:</label>
                                  <input type='hidden' name='id_cat_publicacion' id='id_cat_publicacion' value="-1">
                                  <input type="text" class="form-control" id="titulo" placeholder="Ingresa el Titulo de la Publicacion(s)"  readonly>
                              </div>

                              <div class="col-md-12">
                                <label for="resumenLabel1">Resúmen de la Publicación:</label>
                                <textarea class="form-control" maxlength="600" rows="3" id="resumen" placeholder="Ingresa el resumen / detalle de la publicación (600 caracteres maximo)" readonly ></textarea>
                              </div>

                              <div class="col-md-12">
                                <label for="PublicacionLabel2">Publicación:</label>
                                <textarea class="form-control" maxlength="10000" rows="5" id="publicacion" placeholder="Ingresa la informacion de la publicación (10,000 caracteres maximo)" readonly></textarea>
                              </div>
                            </div>
                            <br>                        
                          
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="btn_save_edit_publicacion" class="btn btn-primary">Guardar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <!--END MODAL ADD-->    
          
                    <!--***********************************************************************************************************************************************-->                                       


                  </div>

                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h6 class="tituloV"><strong>Preguntas Frecuentes</strong> </h6>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#collapse_experiencia">
                      <div class="card-body"id="preguntas_frecuentes">
<<<<<<< HEAD
                        <textarea id="txta_preguntas_frecuentes" readonly rows="8" style="min-width: 100%; border:none; color: #3e5569; font-weight: lighter; font-family: serif Arial;"></textarea>
=======
>>>>>>> ac08ebb8f27160be318a5a6b78bbcc6c54473e4e
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="tab-pane fade" id="nav-val" role="tabpanel" aria-labelledby="nav-val-tab">
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">
                    <h4> Valoraciones destacatas</h4>
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                <div class="row" style="text-align: center;">
                  <div class="col"></div>
                  <div class="col-xs-8 col-sm-3 col-md-3">
                    <h1> <span class="badge" style="background: #158151;" id='valoracion_general'> 0 </span></h1>
                    <h5 class="tituloV"><strong> Valoracion General:</strong> </h5>
                    <h6 id='valoracion_general_texto' style="color: #007b5e;">  ☆☆☆☆☆ 0/5 / 0 valoraciones </h6> 
                  </div>
                  <div class="col-xs-4 col-sm-3 col-md-3" style="text-align: left;">
                    <div class="row">
                      <div class="col-8" style="text-align: right;">
                        <h5 class="tituloV"><strong>&nbsp;&nbsp; Atencion:</strong></h5>
                      </div>
                      <div class="col" style="text-align: left;">
                        <h5><span class="badge" style="background: #158151;" id="atencion"> 0 </span> </h5>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-8" style="text-align: right;">
                        <h5 class="tituloV"><strong>&nbsp;&nbsp; Calidad:</strong></h5>
                      </div>
                      <div class="col" style="text-align: left;">
                        <h5><span class="badge" style="background: #158151;"  id="calidad"> 0 </span> </h5>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-8" style="text-align: right;">
                        <h5 class="tituloV"><strong>&nbsp;&nbsp; Puntualidad:</strong></h5>
                      </div>
                      <div class="col" style="text-align: left;">
                        <h5><span class="badge" style="background: #158151;"  id="puntualidad"> 0 </span> </h5>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-8" style="text-align: right;">
                        <h5 class="tituloV"><strong>&nbsp;&nbsp; Instalaciones:</strong></h5>
                      </div>
                      <div class="col" style="text-align: left;">
                        <h5><span class="badge" style="background: #158151;"  id="instalaciones"> 0 </span> </h5>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-8" style="text-align: right;">
                        <h5 class="tituloV"><strong>&nbsp;&nbsp;Recomendacion:</strong></h5>
                      </div>
                      <div class="col" style="text-align: left;">
                        <h5><span class="badge" style="background: #158151;"  id="recomendacion"> 0 </span> </h5>
                      </div>
                    </div>  

                  </div>
                  
                  <div class="col"></div>
                </div>

                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Opiniones</h4>                    
                  </div>
                  <div class="col"></div>
                </div>
                <hr>

                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center; text-align: justify-all;">                    
                    Opina de los servicios que recibiste, tu valoración es de gran ayuda para toda la comunidad y para el profesional es importante.
                    <br>                    
                    <a href="#"  id="ancla_valoracion">
                      <span data-toggle="tooltip" data-placement="top" title="Valoración del Profesional">
                        Escribir una opinión
                      </span>
                    </a>  
                        
                    <form id="form_valoracion">
                    <div class="modal fade" id="valoracion1" tabindex="-1" role="dialog" aria-labelledby="ValoracionLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ValoracionLabel">Valoración</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body mx-3">                                    
                            <form style="text-align: center;" target="_self">
                              <div class="form-row"  style="text-align: left;">
                                <div class="col-md-12">
                                  <label for="valoracionTextarea1">Cual es tu opinion:</label>
                                  <input type='hidden' name='id_cat_valoracion' id='id_cat_valoracion' value="-1">
                                  <textarea class="form-control" maxlength="250" rows="2" id="opinion" placeholder="Ingresa tu opinión del profesional (250 caracteres maximo)" required></textarea>
                                </div> 
                              </div>
                              <br>
                              <div class="form-row" style="text-align: left;">
                                <div class="form-group col-md-6">
                                  <div class="row">
                                    <div class="col-6">Atención: </div>
                                    <div class="6">
                                      <div class="rating">
                                        <input type="radio" id="Astar5" name="Arating" value="5"/><label for="Astar5" title="Excelente">5 stars</label>
                                        <input type="radio" id="Astar4" name="Arating" value="4" /><label for="Astar4" title="Bueno">4 stars</label>
                                        <input type="radio" id="Astar3" name="Arating" value="3" /><label for="Astar3" title="Mas o menos">3 stars</label>
                                        <input type="radio" id="Astar2" name="Arating" value="2" /><label for="Astar2" title="Malo">2 stars</label>
                                        <input type="radio" id="Astar1" name="Arating" value="1" /><label for="Astar1" title="Muy Malo">1 star</label>
                                      </div>
                                    </div> 
                                  </div>
                                </div>
                                <div class="form-group col-md-6">
                                  <div class="row">
                                    <div class="col-6">Calidad: </div>
                                    <div class="6">
                                      <div class="rating">
                                        <input type="radio" id="Cstar5" name="Crating" value="5" /><label for="Cstar5" title="Excelente">5 stars</label>
                                        <input type="radio" id="Cstar4" name="Crating" value="4" /><label for="Cstar4" title="Bueno">4 stars</label>
                                        <input type="radio" id="Cstar3" name="Crating" value="3" /><label for="Cstar3" title="Mas o menos">3 stars</label>
                                        <input type="radio" id="Cstar2" name="Crating" value="2" /><label for="Cstar2" title="Malo">2 stars</label>
                                        <input type="radio" id="Cstar1" name="Crating" value="1" /><label for="Cstar1" title="Muy Malo">1 star</label>
                                      </div>
                                    </div> 
                                  </div>
                                </div>                                
                              </div>

                              <div class="form-row" style="text-align: left;">
                                <div class="form-group col-md-6">
                                  <div class="row">
                                    <div class="col-6">Puntualidad: </div>
                                    <div class="6">
                                      <div class="rating">
                                        <input type="radio" id="Pstar5" name="Prating" value="5" /><label for="Pstar5" title="Excelente">5 stars</label>
                                        <input type="radio" id="Pstar4" name="Prating" value="4" /><label for="Pstar4" title="Bueno">4 stars</label>
                                        <input type="radio" id="Pstar3" name="Prating" value="3" /><label for="Pstar3" title="Mas o menos">3 stars</label>
                                        <input type="radio" id="Pstar2" name="Prating" value="2" /><label for="Pstar2" title="Malo">2 stars</label>
                                        <input type="radio" id="Pstar1" name="Prating" value="1" /><label for="Pstar1" title="Muy Malo">1 star</label>
                                      </div>
                                    </div> 
                                  </div>
                                </div>
                                <div class="form-group col-md-6">
                                  <div class="row">
                                    <div class="col-6">Instalaciones: </div>
                                    <div class="6">
                                      <div class="rating">
                                        <input type="radio" id="Istar5" name="Irating" value="5" /><label for="Istar5" title="Excelente">5 stars</label>
                                        <input type="radio" id="Istar4" name="Irating" value="4" /><label for="Istar4" title="Bueno">4 stars</label>
                                        <input type="radio" id="Istar3" name="Irating" value="3" /><label for="Istar3" title="Mas o menos">3 stars</label>
                                        <input type="radio" id="Istar2" name="Irating" value="2" /><label for="Istar2" title="Malo">2 stars</label>
                                        <input type="radio" id="Istar1" name="Irating" value="1" /><label for="Istar1" title="Muy Malo">1 star</label>
                                      </div>
                                    </div> 
                                  </div>
                                </div>
                              </div>

                              <div class="form-row" style="text-align: left;">
                                <div class="form-group col-md-6">
                                  <div class="row">
                                    <div class="col-6">Recomendaciones: </div>
                                    <div class="6">
                                      <div class="rating">
                                        <input type="radio" id="Rstar5" name="Rrating" value="5" /><label for="Rstar5" title="Excelente">5 stars</label>
                                        <input type="radio" id="Rstar4" name="Rrating" value="4" /><label for="Rstar4" title="Bueno">4 stars</label>
                                        <input type="radio" id="Rstar3" name="Rrating" value="3" /><label for="Rstar3" title="Mas o menos">3 stars</label>
                                        <input type="radio" id="Rstar2" name="Rrating" value="2" /><label for="Rstar2" title="Malo">2 stars</label>
                                        <input type="radio" id="Rstar1" name="Rrating" value="1" /><label for="Rstar1" title="Muy Malo">1 star</label>
                                      </div>
                                    </div> 
                                  </div>
                                </div>
                              </div>
                              <!-- rating
                              <div class="row">
                                <div class="rating" style="text-align: center;">
                                  <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Excelente">5 stars</label>
                                  <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Bueno">4 stars</label>
                                  <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Mas o menos">3 stars</label>
                                  <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Malo">2 stars</label>
                                  <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Muy Malo">1 star</label>
                                </div>
                              </div>
                              -->
                              <br>
                              <button type="submit" class="btn my-0 border border-white" style="background: #0856c7;" id="button_valoracion">Guardar</button>
                              <button type="button" class="btn my-0 border border-white" data-dismiss="modal" style="background: #aaabaa;" >Cerrar</button>
                            </form>
                          </div>                          
                        </div>
                      </div>
                    </div>
                    </form>


                  </div>
                  <div class="col"></div>
                </div>
                    
                <br>
                <div class="row">
                  <div class="col">                          
                    <div class="accordion" id="collapse_valoracion">                                         
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne_val_pos" aria-expanded="true" aria-controls="collapseOne_val_pos">
                              <h6 style="color: #658ded;"><strong>Positivas</strong> </h6>                              
                            </button>
                          </h2>
                        </div>

                        <div id="collapseOne_val_pos" class="collapse" aria-labelledby="headingOne" data-parent="#collapse_valoracion">
                          <div id="tbody_opiniones_positivas" class="card-body"></div>                          
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo_val_neg" aria-expanded="false" aria-controls="collapseTwo_val_neg">
                                <h6 style="color: #658ded;"><strong>Negativas</strong> </h6>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseTwo_val_neg" class="collapse" aria-labelledby="headingTwo" data-parent="#collapse_valoracion">
                          <div id="tbody_opiniones_negativas" class="card-body"></div>                        
                        </div>                     
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingThree">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree_val_neu" aria-expanded="false" aria-controls="collapseThree_val_neu">
                               <h6 style="color: #658ded;"><strong>Neutras</strong> </h6>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseThree_val_neu" class="collapse" aria-labelledby="headingThree" data-parent="#collapse_valoracion">
                          <div id="tbody_opiniones_neutras" class="card-body"></div>                        
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-header" id="headingFour">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour_val_all" aria-expanded="false" aria-controls="collapseFour_val_all">
                              <h6 style="color: #658ded;"><strong>Todas</strong> </h6>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseFour_val_all" class="collapse" aria-labelledby="headingFour" data-parent="#collapse_valoracion">
                          <div id="tbody_opiniones_todas" class="card-body"></div>                        
                        </div>
                      </div>
  
                    </div>
                  </div>
                </div>                
              </div>

              <div class="tab-pane fade" id="nav-dir" role="tabpanel" aria-labelledby="nav-dir-tab">                
                <br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Datos de contacto</h4>
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                <div class="row" style="text-align: left;">                  
                  <div class=" col-md-6">
                    <h5 class="tituloV"><strong> Dirección:</strong> </h5>                    
                    <div id="direccion_contacto"></div>
                  </div>
                  <div class="col-md-6">
                    <h5 class="tituloV"><strong>Telefono</strong> </h5>
                    <div id="tel_contacto"></div>
                  </div>
                </div>
                <br>
                <div class="row" style="text-align: left;">
                  <div class="col-md-6">
                    <h5 class="tituloV"><strong>Horario atención</strong> </h5>                    
                    <div id="horario_atencion"></div>
                  </div>
                  <div class=" col-md-6">
                    <h5 class="tituloV"><strong> Email:</strong> </h5>
                    <div id="email_contacto"></div>
                  </div>                      
                </div>
                <br>
              </div>

              <div class="tab-pane fade" id="nav-precio" role="tabpanel" aria-labelledby="nav-precio-tab">
                <br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Precios y promociones destacados</h4>                    
                  </div>
                  <div class="col"></div>
                </div>
                <hr>
                <div class="accordion" id="collapse_precios">
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree_precios" aria-expanded="false" aria-controls="collapseThree_precios">
                            <h6 class="tituloV"><strong>Promociones</strong> </h6>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree_precios" class="collapse show" aria-labelledby="headingThree" data-parent="#collapse_precios">
                      <div class="card-body">
                        <!--Solo imagenes de promociones de resolucion 600X300 y menos de 2 megas -->
                        <div class="container-fluid" style="text-align: center;">
                          <br>
                          <img src="<?php echo base_url(); ?>imagenes/promo_1.png" class="img-responsive" style="max-width: 100%;" alt="Promocion" title="Promocion Profesional" id="promocion">
                        </div>
                      </div>
                    </div>
                  </div>
                          
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne_precios" aria-expanded="true" aria-controls="collapseOne_precios">
                          <h6 class="tituloV"><strong>Precios</strong> </h6>                          
                        </button>
                      </h2>
                    </div>

                    <div id="collapseOne_precios" class="collapse" aria-labelledby="headingOne" data-parent="#collapse_precios">
                      <div class="card-body" id="precios"></div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo_precios" aria-expanded="false" aria-controls="collapseTwo_precios">
                            <h6 class="tituloV"><strong>Metodos de Pago</strong> </h6>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo_precios" class="collapse" aria-labelledby="headingTwo" data-parent="#collapse_precios">
                      <div class="card-body" style="text-align: center;" id="metodos_pago"></div>
                    </div>                  
                  </div> 
                </div>                
              </div>
              <div class="tab-pane fade" id="nav-cale" role="tabpanel" aria-labelledby="nav-cale-tab"><br>
                <div class="row">
                  <div class="col"></div>
                  <div class="col-xs-4 col-sm-8 col-md-8" style="text-align: center;">                    
                    <h4> Calendario</h4>                    
                  </div>
                  <div class="col"></div>
                </div>
                <hr>

                <div class="row  d-flex justify-content-center">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="">
                              <div class="row">
                                
                                  <!-- <div class="col-lg-3 border-right p-r-0">
                                      <div class="card-body border-bottom">
                                          <h4 class="card-title m-t-10">Drag & Drop Event</h4>
                                      </div>
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div id="calendar-events" class="">
                                                      <div class="calendar-events m-b-20" data-class="bg-info"><i class="fa fa-circle text-info m-r-10"></i>Event One</div>
                                                      <div class="calendar-events m-b-20" data-class="bg-success"><i class="fa fa-circle text-success m-r-10"></i> Event Two</div>
                                                      <div class="calendar-events m-b-20" data-class="bg-danger"><i class="fa fa-circle text-danger m-r-10"></i>Event Three</div>
                                                      <div class="calendar-events m-b-20" data-class="bg-warning"><i class="fa fa-circle text-warning m-r-10"></i>Event Four</div>
                                                  </div>
                                                  
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="drop-remove">
                                                      <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                                  </div>
                                                  <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                                          <i class="ti-plus"></i> Add New Event
                                                      </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div> -->

                                  <div class="col-lg-12">
                                      <div class="card-body b-l calender-sidebar">
                                          <div id="calendar_profesional"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>    

                <!--***********************************************************************************************************************************************-->
                <!-- BEGIN MODAL -->
                <form id="form_reservar">                    
                    <div class="modal fade" id="Modal_Reservacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">        
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong id="label_action">Reservar Cita</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-md-12">                                                                                                
                                        <div class="form-group">	
                                        <input type="hidden" name="id_cat_cita" id="id_cat_cita" value="-1" >                                               														
                                        <input type="hidden" name="id_cat_dia" id="id_cat_dia" value="-1" >                                               														
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">                                                                                                
                                        <div class="form-group">		
                                            <label class="control-label">Dia    </label>													
                                            <input type="date" id="FecInicio" name="FecInicio" class="form-control"  required>
                                        </div>
                                    </div>                                
                                    <div class="col-md-6">                                                                                                
                                        <div class="form-group">															
                                            <label class="control-label">Hora    </label>													
                                            <input id="starttime" name="starttime" type="text" class="form-control time" placeholder="Hora Inicio" required/>            
                                        </div>
                                    </div>                                
                                </div>


                                <div class="row">
                                    <div class="col-md-6">                                                                                                
                                        <div class="form-group">		
                                            <label class="control-label">Dia Termino   </label>													
                                            <input type="date" id="FecTermino" name="FecTermino" class="form-control"  readonly>
                                        </div>
                                    </div>                                
                                    <div class="col-md-6">                                                                                                
                                        <div class="form-group">															
                                            <label class="control-label">Hora Termino   </label>													
                                            <input id="endtime" name="endtime" type="text" class="form-control time" placeholder="Hora Termino" readonly/>            
                                        </div>
                                    </div>                                
                                </div>
                            
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Asunto    </label>
                                            <input class="form-control" placeholder="Asunto" type="text" name="asunto" id="asunto">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Color</label>
                                            <select class="form-control" name="color" id="color">
                                                <option value="">Selecciona Color</option>
                                                <option value="bg-danger">Danger</option>
                                                <option value="bg-success">Success</option>
                                                <option value="bg-primary">Primary</option>
                                                <option value="bg-info">Info</option>
                                                <option value="bg-warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn_close" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>                      
                                <button type="submit" id="btn_save" class="btn btn-success save-event waves-effect waves-light">Guardar</button>
                                <button type="button" id="btn_delete" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>  
                <!--***********************************************************************************************************************************************-->
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Agregar</strong> Nueva Categoría</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Nombre</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Seleccione color de Categoría</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                                <option value="inverse">Inverse</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->     
                <!--***********************************************************************************************************************************************-->                            
                
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


<style> 
.bg-objetivo {
    background-color: #25A325;
}
.bg-buscar {
    background-color: #1E90FF;
}
.text-title
{
    color: #008000;
}


.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
  background-color: #4382BA !important;
}

.checked {
  color: green;
}

strong{
 font-weight:bold;
}

.swal2-popup {
  font-size: 1rem !important;
  font-family: Georgia, serif;
}
</style>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">                
<link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style_profesiolandia.css" rel="stylesheet">    


<!-- ============================================================== -->	        
<!-- tinymce -->    
<!-- ============================================================== -->                
<script src="<?php echo base_url(); ?>assets/libs/tinymce/tinymce.min.js"></script>



