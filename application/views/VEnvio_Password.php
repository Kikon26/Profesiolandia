
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
 
            <?php  
          
          
            if ($datosvista["enviado"])
            {
              // echo "\n\n\n\nEmail enviado correctamente";
            ?>

            <div class="container mt-n0" style="color: #008000; text-align: center;">
            
                
                  <strong>
                        <br><br>  
                           Hola <?php  echo $datosvista["nombre"] ?>
                  </strong>
                
            
            </div>
            <!--  Codigo de formulario de alta de usuarios | profesionales -->
            <div class="container">
                <div class="container-fluid  py-0 pt-3" style="text-align: center;">               
                </div>
                <div class="container-fluid  py-0 pt-3" style="text-align: center;">
                  <div class="row">                      
                    <div class="col-md-12" style="text-align: justify-all;">
                      Para poder continuar en el proceso de <strong> cambio de tu contraseña </strong>, te hemos enviado un correo con las instucciones a tú cuenta de correo electrónico registrada.
                      <br><br>
                      Si no lo encuentras en la bandeja de entrada buscalo en la carpeta de correos no deseados.
                    </div>
                  </div>
                </div>

                <div class="container-fluid  py-0 pt-3" style="text-align: center;">
                  <div class="row">
                    <div class="col-md-12" style="text-align: center;">                                                         <!-- style="height: 200px; width: 410px;" -->
                      <img src="<?php echo base_url(); ?>imagenes/Logo_Profesiolandia_perspectiva.png" class="img-responsive" style="height: 200px; width: 100%;"  alt="Profesiolandia Logo">
                    </div>
                  </div>
                </div>
            </div>


            <?php
            }
            else
            {
            ?>

             <div class="container mt-n0" style="color: #ff4545; text-align: center;">
             
                
                  <strong>
                          <br><br>
                          <?php  echo $datosvista["nombre"] ?> hubo un error en el registro de tu cuenta.
                  </strong>
                
           
             </div>
            <!--  Codigo de formulario de alta de usuarios | profesionales -->
            <div class="container">               
              <div class="container-fluid  py-0 pt-3" style="text-align: center;">
                <div class="row">                      
                  <div class="col-md-12" style="text-align: justify-all;">
                    <a href="javascript:history.back()">Regresa</a> a la pagina anterior para volver a enviar los datos
                  </div>                      
                </div>
              </div>
              <div class="container-fluid  py-0 pt-3" style="text-align: center;">
                <div class="row">
                  <div class="col-md-12" style="text-align: center;">
                    <img src="<?php echo base_url(); ?>imagenes/error.jpg" style="height: 300px; width: 410px;"  alt="error">
                  </div>
                </div>
              </div>
            </div>



            <?php
            }
            ?>
    
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