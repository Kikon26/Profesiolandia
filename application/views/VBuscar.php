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
        <div class="row d-flex justify-content-center" >            
            <div class="col-9">   <!--bg-success-->
                <div class="card rounded" style="background-color: #1E90FF">
                      <div class="card-body">
                          <h4 class="card-title"><!--Solicitudes--></h4>                          
                          <h5 class="card-subtitle text-white font-weight-bold"> Busca a un profesional</h5>
                          <input type="hidden" name="id_cat_profesion_temp" id="id_cat_profesion_temp" class="form-control" value="<?php echo $_POST["id_cat_profesion"] ?>">
                          <input type="hidden" name="id_cat_estado_temp" id="id_cat_estado_temp" class="form-control" value="<?php echo $_POST["id_cat_estado"] ?>">                          

                          <div class="row"> 
                            <div class="col-md-2">                                                                                                
                              <div class="form-group">															
                                <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_profesion" name="id_cat_profesion" data-placeholder="" tabindex="1" required>                                                                                                                                                                                                        
                                </select>                                              
                              </div>
                            </div>

                            <div class="col-md-2">                                                                                                
                              <div class="form-group">															
                                <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_estado" name="id_cat_estado" data-placeholder="" tabindex="1" required>                                                                                                                                                                                                        
                                </select>                                              
                              </div>
                            </div>

                            
                            <div class="col-md-8">                                                                                                
                              <div class="form-group">															
                                <input id="filtrar" name="filtrar" type="text" class="form-control" placeholder="Ingresa la Palabra a Buscar..." value="<?php echo $_POST["filtrar"] ?>">                                  
                              </div>
                            </div> 
                          </div>  

                      </div>  

                </div>
            </div>
        </div>

        <!-- 
        <div class="row d-flex justify-content-center">
          <div class="col-9">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle"></h6>
                                
                <div class="table-responsive">
                  <div class="table-wrapper col-sm-12">   
                    <div  id="tbody_profesionistas"></div>    
                    <div class="clearfix" id="pagination" ></div>        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        -->

        <div id="tbody_profesionistas"></div>          

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
    background-color: #4382BA;
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



