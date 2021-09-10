<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon.png">
	<title>Sistema Web Profesiolandia v 1.0</title>
	
	<?php
		$this->load->view('mp/seccion',$data);
	?>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/style.min.css" rel="stylesheet">




</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
	</div>       

		<script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>app_js/funciones.js"></script>
        
		<script type="text/javascript">
			// Mientras se carga la informacion inicial
			$(".preloader").fadeIn();
				//onLoadComplete: hidePreLoader
			
			
		</script> 
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->


        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <a  class="navbar-brand " href="<?php echo base_url(); ?>CInicio">
                <img src="<?php echo base_url(); ?>imagenes/Logo_Profesionalia_perspectiva_mini2.png" class="img-fluid">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <?php
        
                    //Aqui meto el armado del menu
                    //Verigficar que traiga elementos;
                    $padre=0;$hijos=0; $url=base_url();
                    foreach ($menu as $key => $value) 
                    {	
                        if ($menu[$key]->padre=="0"){ //Es padre
                            if ($menu[$key]->hijos>0){ //con hijos
                                $hijos=$menu[$key]->hijos; //Guardo el numero de hijos para decrementarlo

                                echo "<li class='nav-item dropdown'>
                                        
                                            <a class='nav-link dropdown-toggle text-primary' href='#' id='navbar_id_cat_menu_".$menu[$key]->id_cat_menu."' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"                                                
                                                .$menu[$key]->nombrePadre.                                                        
                                           "</a>
                                            <div class='dropdown-menu' aria-labelledby='navbar_id_cat_menu_".$menu[$key]->id_cat_menu."'>
                                           ";

                                            //Aqui meto los hijos que diga
                                            for ($i = 1; $i <= $hijos; $i++) 
                                            {
                                                echo "<a class='dropdown-item text-primary' href='".$url.$menu[$key+$i]->accion."'>".$menu[$key+$i]->descripcion."</a>";
                                            }
                                echo "    </div>
                                        
                                      </li>";										
                            }
                            else{		//Es padre sin hijos                              
                                      
                                echo "<li class='nav-item'>                                        
                                        <a class='nav-link text-primary' href='".$url.$menu[$key]->accion."'>"; 
                                            if ($menu[$key]->id_cat_menu==1) echo "Inicio";
                                            else                               echo $menu[$key]->nombrePadre; 
                                echo    "</a>
                                      </li>";
                            }
                        }
                        else{ // Es hijo y me lo brinco sin hacer nada, esto se quitará al final
                        }
                        // echo $menu[$key]->idMenu;
                    }
                     ?>
                </ul>    
            </div>    
         </nav>   

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
		
