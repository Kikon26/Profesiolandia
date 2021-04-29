
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
              <h4 class="tituloV"> <strong> Registrate Gratis </strong></h4>
            </strong>

           <!--  Codigo de Registro| profesionales -->
            <div class="container">
                <div class="container-fluid  py-0 pt-3">
                  
                  <form id="form_registro" action="<?php echo base_url(); ?>CBienvenida" method="post">   
                       
                    <div class="card">

                          <div class="card-header bg-light">
                              <div class="row"> 
                                  <div class="col-md-6"> 
                                    <h6  class="m-b-0 text-black">Ingresa tus datos</h6>                                                                
                                  </div>  
                                  <div class="col-md-6 text-right">                                                                 
                                  </div>  
                              </div>                                
                          </div>

                          <div class="card-body">
                              <h4 class="card-title"></h4>
                              <h6 class="card-subtitle"></h6>
                              <div class="row" align="right">                                
                                
                                <div class="col-md-12">
                                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresa tu Nombre" required>
                                </div>
                                
                              </div>
                              <br>
                              <div class="row">         
                                <div class="col-md-12">                                
                                  <input type="text" name="email" id="email" class="form-control" placeholder="Ingresa tu email" required>
                                </div>
                              </div>
                              <br>
                              <div class="row">             
                                <div class="col-md-12">
                                  <input type="text" name="celular" id="celular" class="form-control" placeholder="Ingresa tu numero celular (opcional)">
                                </div>
                              </div>
                              <br>
                              <div class="row">             
                                <div class="col-md-12">
                                  <select id="Registro" class="form-control">
                                    <option value="usuario" selected>Quiero ser Usuario de Profesiolandia</option>
                                    <option value="profesional">Quiero darme de alta como Profesional</option>
                                  </select>
                                </div>
                              </div>
                                <br>
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-12" style="text-align: center;">
                                      Al registrarse, confirma que ha leído y aceptado nuestras
                                        <br>
                                        <a href="condiciones_servicio.php">Condiciones del servicio</a>, <a href="proteccion_datos.php"> Proteccion de datos </a> y
                                        <a href="politica_privacidad.php"> Politica de Privacidad </a>
                                      
                                    </div>
                                
                                  </div>
                                <br>
                             <div class="container mt-n0">
                                <div class="container-fluid py-0 p-1" style="color: #008000; text-align: center;">              
                                  <button type="submit" class="btn btn-success" id="button_guardar"> <i class="fa fa-check"></i> Enviar</button>                          
                                </div>
                            </div> 

                          </div>
                      </div>
                    </form>
                </div>
              </div>




    
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


