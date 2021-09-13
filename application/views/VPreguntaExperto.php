
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

      <div class="container mt-n0">
        <div class="container-fluid py-0 pt-3" style="color: #008000; text-align: center;">
          <h5 class="tituloV">
            <strong>
              <br>
               
            </strong> 
          </h5>
          <hr>
        </div>
      </div>

      <!--  Informacion - Inicio -->
      <div class="container">
        <div class="container-fluid  py-0 pt-3">   
            <form id="form_save_update_pregunta">
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
                            <input type="hidden" name="id_cat_usuario" id="id_cat_usuario" value="<?php echo  $idUsuario; ?>" >                              
                            <input type='hidden' name='id_cat_pregunta' id='id_cat_pregunta' value="-1">
                            <input type="text" class="form-control" id="pregunta" placeholder="Escribe tu pregunta...">
                            <button type="submit" id="btn_save_edit_pregunta" class="btn btn-primary">Preguntar</button>
                          </div>                          
                        <br>
                      </div>                      
                      <br>  

            </form>
          
        </div>
      </div>  
      <!--  OInformacion - Fin  -->
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


