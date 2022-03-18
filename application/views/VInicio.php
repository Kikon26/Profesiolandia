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
       
        <div class="container mt-n0">
          <div class="container-fluid py-0 p-3" style="color: #008000; text-align: center;">              
            <h5>El único lugar donde encontraras a los expertos profesionales de todas las áreas</h5>              
          </div>
        </div>

               
        <form id="form_search" action="<?php echo base_url(); ?>CBuscar" method="post">
          <div class="row d-flex justify-content-center" >      
              <div class="col-9">   <!--bg-success-->
                    <div class="card rounded" style="background-color: #1E90FF">
                        <div class="card-body">
                            <h4 class="card-title"><!--Solicitudes--></h4>
                            <h5 class="card-subtitle text-white font-weight-bold"> Busca a un profesional</h5>

                            <div class="row"> 
                              <div class="col-md-2">                                                                                                
                                <div class="form-group">															
                                  <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_profesion" name="id_cat_profesion" data-placeholder="" tabindex="1" >                                                                                                                                                                                                        
                                  </select>   
                                  <input type="hidden" name="id_cat_rol" id="id_cat_rol" value="<?php echo  isset($id_perfil)?$id_perfil:4 ?>" >                                             
                                </div>
                              </div>

                              <div class="col-md-2">                                                                                                
                                <div class="form-group">															
                                  <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_estado" name="id_cat_estado" data-placeholder="" tabindex="1" >                                                                                                                                                                                                        
                                  </select>                                              
                                </div>
                              </div>

                              
                              <div class="col-md-6">                                                                                                
                                <div class="form-group">															
                                  <input id="filtrar" name="filtrar" type="text" class="form-control" placeholder="Ingresa la Palabra a Buscar...">                                  
                                </div>
                              </div>   

                              <div class="col-md-2">                                                                                                
                                <div class="form-group">															                                  
                                  <button type="submit" class="btn btn-primary my-0 border border-white" id="btn_filtrar"><span class="fa fa-filter"></span> Buscar</button>
                                </div>
                              </div>   

                            </div>  
                        </div>
                    </div>
              </div>
          </div> 
        </form>        
        
        <div class="row d-flex justify-content-center pb-3">
          <div class="col-9">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?php echo base_url(); ?>imagenes/carrusel1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                  <img src="<?php echo base_url(); ?>imagenes/carrusel2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="<?php echo base_url(); ?>imagenes/carrusel3.png" class="d-block w-100" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>       
          </div>
        </div>      
        
        <div class="row d-flex justify-content-center pb-3">
          <div class="col-9">

            <div class="row">
              <div class="col-sm-4"  style="padding: auto;">
                <div class="card text-center">
                  <div class="card-body px-2">
                    <img src="<?php echo base_url(); ?>imagenes/search_icon.png" style="width: 50px; height: 50px;" class="card-img-top" alt="...">
                    <h5 class="card-title small">
                      <a href="#" style="padding: 10px;">Encuentra un Profesional</a>
                    </h5>
                    <p class="card-text">Busca a un profesional en nuestro directorio y obtén información de sus servicios y experiencia profesional</p>                  
                  </div>
                </div>
              </div>

              <div class="col-sm-4"  style="padding: auto;">
                <div class="card text-center">
                  <div class="card-body px-2">
                    <img src="<?php echo base_url(); ?>imagenes/calendar_icon.png" style="width: 50px; height: 50px;" class="card-img-top" alt="...">
                    <h5 class="card-title small">
                      <a href="#" style="padding: 10px;"> Agenda una cita</a>
                    </h5>
                    <p class="card-text">Disponible 24/7. Agenda una cita con un profesional en la materia fuera del horario de oficina normal.</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4" style="padding: auto;">
                <div class="card text-center">
                  <div class="card-body px-2">
                    <img src="<?php echo base_url(); ?>imagenes/ask_icon.png" style="width: 50px; height: 50px;" class="card-img-top" alt="...">
                    <h5 class="card-title small">
                      <a href="#" id="ancla_pregunta_experto" style="padding: 10px;">Pregunta a un experto</a>
                    </h5>
                    <p class="card-text">Los profesionales en la materia te pueden dar un consejo de algún tema en particular. Pregunta a un experto tus dudas</p>              
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>

     
        
        <!--*****************************************************************************************************************************-->
        <!--*****************************************************************************************************************************-->        
          <div class="row d-flex justify-content-center pb-3" style="color: #008000;">          
            <div class="col-9">
              <h4>Profesionistas Destacados</h4>          
            </div>  
          </div>        
    
          
          <div id="tbody_profesionistas"></div>
        <!--*****************************************************************************************************************************-->
        <!--*****************************************************************************************************************************-->
 
        

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
</style>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">                
<link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style_profesiolandia.css" rel="stylesheet">    


