<div class="page-wrapper33" >
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

        
      <div class="container mt-n0">
        <div class="container-fluid py-0 pt-3 col-xs-12 col-sm-6 col-md-6" style="text-align: center;">          
          <div class="login-logo ">
            <img src="<?php echo base_url(); ?>imagenes/Logo_Profesiolandia_perspectiva.png" class="img-circle" alt="Profesiolandia" width='60%' >
            <div id="tit2" style="display:none;position: relative"><b></b></div>
          </div>
          <!-- Formulario - Inicio -->
          <div class="card">

            <div class="card-header bg-light">
              <div class="row"> 
                <div class="col-md-12"> 
                  <h6  class="m-b-0 text-black">Llene los datos para poder ingresar</h6>                                                                
                </div>  
              </div>                                
            </div>

            <div class="card-body">
              <h4 class="card-title"></h4>
              <h6 class="card-subtitle"></h6>
              <div id="cuadro" style="display:none;">       
                <form action="<?php echo base_url(); ?>CAcceso/validar" method="post">
                  <div class="form-group has-feedback">
                    <!--<input id="txtUsuario" name="txtUsuario" type="text" class="form-control" placeholder="Email" required value="<?php echo $tUsua ?>">-->
                    <div class="controls">                                
                      <input id="txtUsuario" name="txtUsuario" type="email" required data-validation-required-message="Esté campo es requerido" class="form-control" placeholder="Email" value="<?php echo $tUsua ?>">                
                    </div>  
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  
                  <div class="form-group has-feedback">
                    <input id="txtPassw" name="txtPassw" type="password" class="form-control" placeholder="Contraseña" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <div class="col-md-12" align="center">
                      <div class="checkbox icheck">
                        <label>
                          <input type="checkbox"> Recuerdame
                        </label>
                      </div>
                    </div>
                  </div> 
                    
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success" id="button_guardar"> <i class="fa fa-check"></i> Ingresar</button>   
                    </div>
                  </div>
                </form>

                <br>
                <div class="row">
                  <div class="col-md-12" align="center">
                    <a href="<?php echo base_url(); ?>CReset_Password" style="color: gray">  <u> Olvide mi contraseña </u></a><br>
                  </div>
                </div>
                <!-- Formulario - Fin -->
              </div>
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


<script src="<?php echo base_url(); ?>template/bower_components/jquery/dist/jquery.min.js"></script>  
<script src="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url(); ?>template/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () 
  {
    /*$('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional 
      });*/

      $("#tit1").fadeIn(700);
      $("#tit2").fadeIn(1500);

      $("#cuadro").fadeIn(2000).animate({top:'100px'});
      
  });
</script>




<!--
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">-->                

<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/plugins/iCheck/square/blue.css">
<link href="<?php echo base_url(); ?>assets/css/style_profesiolandia.css" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<?php
  if ($xMensaje!="")
  {
    echo '<script language="javascript">alert("'.$xMensaje.'");</script>'; 
  }
?>

<link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">