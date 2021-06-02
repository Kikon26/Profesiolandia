
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
            /*
                 ini_set('SMTP', "localhost");
                 ini_set('smtp_port', 25);
                 ini_set('sendmail_from', "postmaster@localhost.com");
                 ini_set('display_errors', "On");    // Mostrar los errores (usar sólo durante las pruebas)
            */

            // valida variable GET email
                   if (isset( $_GET["email"]))     
                   {
                     $email=$_GET["email"];
                     $nombre=$_GET["nombre"];  // Nombre del nuevo usuario/profesional (Obtenido de la BaseDatos)
                   }
                   else
                   {
                    $email="ecalderon@profesiolandia.com";
                     $nombre="Sr(a)";
                   }
                   // echo '¡La direccion es: ' . $dir;

            $to = "enrique.rocko@gmail.com";
            $subject = "Instucciones Profesiolandia - Cambio de contrasena";
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

            //dirección del remitente 
            $headers .= "From: Profesiolandia <soporte@profesiolandia.com>\r\n"; 

            //dirección de respuesta, si queremos que sea distinta que la del remitente 
            $headers .= "Reply-To: Profesiolandia <suporte@profesiolandia.com>\r\n"; 



            $message = "

            <html lang='en'>
              <head>
                
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                <link href='css/style_profesiolandia.css' rel='stylesheet' type='text/css'>
                <link href='css/bootstrap.min.css' rel='stylesheet'>
                <link href='css/mdb.min.css' rel='stylesheet'>
              </head>
              <body>


            <div class='container mt-n0'>
                <div class='container-fluid  py-3 px-3'>
                  <div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
                    
                    <div class='row' style='text-align: center;'>
                      <img src='http://obraspublicas.morelia.gob.mx/Profesiolandia/imagenes/Logo_Profesionalia_perspectiva.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
                    </div>

                    <strong>
                             <h4 style='color: #007b5e'> <strong> Hola ". $nombre . "</strong> </h4>
                    </strong>  
                    <div class='row' style='text-align: center;'>
                      Te enviamos este correo de <strong> Profesiolandia </strong> por que detectamos que olvidaste tu contraseña.<br>
                    
                      Para continuar con el proceso de cambio de la contraseña es necesario que puedas dar click en la sig liga.
                    </div>
                    
                       <p style='text-align: center;'>

                       <a href='www.profesiolandia.com/cambio_password.php?nombre=". $nombre ."&email=". $email ."' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' target='_blank'> <strong> Cambia tu contraseña </strong> </a>
                         
                        </p>

                    <div class='row'>
                    <div class='col' style='text-align: center;'  >
                      Estamos seguros de que estas disfrutando la experiencia en Profesionalia, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
                    </div>
                    <br>
                    
                    <div class='row' style='text-align: center; font-size: 14px; color: gray;'>
                       <a href='www.profesiolandia.com/cancelacion.php?nombre=". $nombre ."&id=". $email ."' target='_blank'>Anular la suscripción </a> | Enviado por Profesiolandia 

                    </div>


                  </div>



                </div>
            </div>

             </body>
            </html>


            ";
             
          $enviado = mail($to, $subject, $message, $headers);
            if ($enviado)
            {
              // echo "\n\n\n\nEmail enviado correctamente";
            ?>

            <div class="container mt-n0" style="color: #008000; text-align: center;">
            
                
                  <strong>
                        <br><br>  
                           Hola <?php  echo $nombre ?>
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
                  <div class="col-md-12" style="text-align: center;">
                  <img src="<?php echo base_url(); ?>imagenes/Logo_Profesiolandia_perspectiva.png" style="height: 200px; width: 410px;"  alt="Profesiolandia Logo">
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
                     <?php  echo $nombre ?> hubo un error en el registro de tu cuenta.
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


