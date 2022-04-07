
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
        <div class="container mt-n0">
          <div class="container-fluid py-0 pt-3 col-xs-12 col-sm-6 col-md-6" style="text-align: center;">
            <strong>
              <h4 class="tituloV"> <strong id="tipo_mensaje">  </strong></h4>
            </strong>
          </div>
        </div>

        <!--  Codigo de Registro| profesionales -->
        
        <div class="container mt-n0">
          <div class="container-fluid  py-0 pt-3" style="text-align: center;">                        
            <form id="form_save" action="<?php echo base_url(); ?>CBienvenida" method="post">  
              <div class="row d-flex justify-content-center" >        
                <div class="col-10">   
                  <div class="card">

                    <div class="card-header bg-light">
                        <div class="row"> 
                          <div class="col-md-12" style="text-align: center;"> 
                            <h6  class="m-b-0 text-black">Ingresa tus datos</h6>                                                                
                          </div>  
                          <div class="col-md-6 text-right"></div>  
                        </div>                                
                    </div>

                    <div class="form-body">
                      <div class="card-body">        
                        <div class="row"> 
                          <div class="form-group col-md-12">  
                            <input type="hidden" name="id_usuario_profesional" id="id_usuario_profesional" value="<?php echo  ($idUsuario<>"")?$idUsuario:-1 ?>" >  
                            <input type="hidden" name="id_cat_rol" id="id_cat_rol" value="<?php echo  isset($id_perfil)?$id_perfil:4 ?>" >                                             
                            <input type="hidden" id="id_cat_tipo_formulario_temp" value="<?php echo $datosvista["id_cat_tipo_formulario"] ?>" >                                                             
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Tu Nombre" required>
                          </div>
                        </div>

                        
                        <div class="row"> 
                          <div class="form-group col-md-12">        
                            <div class="controls">                                
                              <input type="email" name="email" id="email" class="form-control" required data-validation-required-message="Esté campo es requerido" placeholder="Tu Email">                           
                            </div>
                          </div>
                        </div>

                        <div class="row"> 
                          <div class="form-group col-md-12">                              
                            <input type="text" name="asunto" id="asunto" class="form-control" placeholder="Asunto" required>
                          </div>
                        </div>
                        
                        <div class="row"> 
                          <div class="form-group col-md-12">                              
                            <textarea class="form-control" maxlength="600" rows="3" id="mensaje" placeholder="Mensaje" ></textarea>
                          </div>
                        </div>                        
                        <!--
                        <div class="form-group row">                                    
                            <div class="col-md-12">                               
                              <select class="form-control custom-select" style="width: 100%;" id="id_cat_tipo_formulario" name="id_cat_tipo_formulario" data-placeholder="Selecciona Tipo" required>                                                         
                              </select>
                            </div>
                        </div>                     
                        -->

                        <div class="form-row">                      
                          <div class="form-group col-md-12" style="text-align: center;">
                            Al registrar, confirma que ha leído y aceptado nuestras
                            
                            <a href="<?php echo base_url(); ?>CCondiciones_Servicio">Condiciones del servicio</a>, <a href="<?php echo base_url(); ?>CProteccion_Datos"> Proteccion de datos </a> y
                            <a href="<?php echo base_url(); ?>CPolitica_Privacidad"> Politica de Privacidad </a>                        
                          </div>
                          
                        </div>


                        <div class="container mt-n0">
                          <div class="container-fluid py-0 p-1" style="color: #008000; text-align: center;">              
                            <button type="submit" class="btn btn-success" id="button_guardar"> <i class="fa fa-check"></i> Enviar</button>                          
                          </div>
                        </div> 

                      </div>
                    </div>

                  </div>

                </div>
              </div>

            </form>         
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


