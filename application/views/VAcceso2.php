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

        
        <div class="login-box mt-0">
          <div class="login-logo ">
            <img src="<?php echo base_url(); ?>imagenes/logo-profesiolandia.png" class="img-circle" alt="Mpio. de Morelia" width='40%' >
            <div id="tit1" style="display:none;"> <b>Profesiolandia</b> </div>
            <div id="tit2" style="display:none;position: relative"><b></b></div>
          </div>
      
          <div id="cuadro" style="display:none;" class="login-box-body border text-secondary">
            <p class="login-box-msg">Teclee los datos para validar el acceso</p>

            <form action="<?php echo base_url(); ?>CAcceso/validar" method="post">
              <div class="form-group has-feedback">
                <div class="controls">                                
                  <input id="txtUsuario" name="txtUsuario" type="email" required data-validation-required-message="Esté campo es requerido" class="form-control" placeholder="Usuario" value="<?php echo $tUsua ?>">                
                </div>  
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              
              <div class="form-group has-feedback">
                <input id="txtPassw" name="txtPassw" type="password" class="form-control" placeholder="Contraseña">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox"> Recuerdame
                    </label>
                  </div>
                </div>
                
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat float-right">Accesar</button>
                </div>
                
              </div>
            </form>
            <a href="#">Olvide mi contraseña</a><br>
          </div>
          
        </div>
        
        <div id="tit3" style="display:none;"> <b>Consultas Ejecutivas</b> </div>  
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



      </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->				
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->		

<!--
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">-->                

<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/plugins/iCheck/square/blue.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<?php
  if ($xMensaje!="")
  {
    echo '<script language="javascript">alert("'.$xMensaje.'");</script>'; 
  }
?>

<link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">