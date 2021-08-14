
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
        <div class="container mt-n0 col-9">
          <div class="container-fluid py-0 pt-3" style="text-align: center;">
            <strong>
              <h4 class="tituloV"> <strong> Administra Tu Cuenta</strong></h4>
            </strong>

            <div class="container-fluid  py-0 pt-3">

              <form id="form_update" method="post">                             
                <div class="row d-flex justify-content-center" >        
                  <div class="col-12">   
                    <div class="card">

                        <div class="card-header bg-light">
                            <div class="row"> 
                                <div class="col-lg-12"> 
                                  <h6  class="m-b-0 text-black">Datos Personales</h6>                                                                
                                </div>  
                                <div class="col-lg-9 text-right">                                                                 
                                </div>  
                            </div>                                
                        </div>

                      
                        <div class="form-body">
                          <div class="card-body">

                            <div class="form-group row">
                                
                              <div class="col-md-4">
                                  <label class="col-form-label">Nombre</label>
                                  <input type="hidden" name="id_cat_profesional" id="id_cat_profesional" value="<?php echo  $idUsuario; ?>" >  
                                  <input type="hidden" name="existe_direccion" id="existe_direccion" value="no" >  
                                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                                </div>
                                
                                <div class="col-md-4">
                                  <label class="col-form-label">Paterno</label>
                                  <input type="text" name="paterno" id="paterno" class="form-control" placeholder="Paterno" required>
                                </div>
                            
                                
                                <div class="col-md-4">
                                  <label class="col-form-label">Materno</label>
                                  <input type="text" name="materno" id="materno" class="form-control" placeholder="Materno" required>
                                </div>

                            </div>    
                            

                            <div class="form-group row">
                                <div class="form-group col-md-2">
                                  <label class="col-form-label">Usuario</label>
                                  <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" onkeypress="return AvoidSpace(event)" required>
                                </div>  

                                <div class="form-group col-md-3">
                                  <label class="col-form-label">Email</label>                                      
                                  <div class="controls">
                                    <input type="email" name="email" id="email" class="form-control" required data-validation-required-message="Esté campo es requerido"> 
                                  </div>  
                                </div>
                                
                                <div class="col-md-3">
                                  <label class="col-form-label">Telefono</label>
                                  <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
                                </div>                                  


                                <div class="col-md-3">
                                  <label class="col-form-label">Foto</label>                                                      
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">                                                        
                                    <label class="custom-file-label" for="file" id="label_file">Elige una Foto</label>                                                        
                                  </div>
                                </div>

                                <div id ="div_imagen_perfil" class="col-md-1 div_imagen_perfil" style="display:none">                                                                                                                                                                                                                                                                                  
                                  <br>
                                  <img src="" id="imagen_perfil" name="imagen_perfil" data-nombre="" height="80" width="80" class="img-fluid" alt="Responsive image"/>                                                           
                                </div>        
                                
                            </div>                           
                    

                          </div>
                                          
                          

                        </div>
                      

                    </div>  
                  </div>
                </div>

                <div class="row d-flex justify-content-center" >        
                  <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-light">
                          <h6 class="m-b-0 text-black">Domicilio Personal</h6>    
                        </div>  
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <h6 class="card-subtitle"></h6>
                            <div class="row">                                
                              <div class="col-md-6">
                                <label class="col-form-label">Estado</label>                                    
                                <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_estado" name="id_cat_estado" data-placeholder="Seleccione Estado" required>                                                         
                                </select>
                              </div>
                              
                              <div class="col-md-6">
                                <label class="col-form-label">Municipio</label>
                                <input type="text" name="mpio" id="mpio" class="form-control" placeholder="Municipio" required>
                              </div>
                            </div>
                            <div class="row">                                
                              <div class="col-md-4">
                                <label class="col-form-label">Colonia</label>
                                <input type="text" name="colonia" id="colonia" class="form-control" placeholder="Colonia" required>
                              </div>

                              
                              <div class="col-md-4">
                                <label class="col-form-label">Calle</label>
                                <input type="text" name="calle" id="calle" class="form-control" placeholder="Calle" required>
                              </div>


                              <div class="col-md-2">
                                <label class="col-form-label">Num.</label>
                                <input type="text" name="num" id="num" class="form-control" placeholder="Num." required>
                              </div>

                              <div class="col-md-2">
                                <label class="col-form-label">C.P.</label>
                                <input type="text" name="cp" id="cp" class="form-control" placeholder="C.P." required>
                              </div>

                            </div>
                        
                        </div>
                    </div>
                  </div>
                </div> 

                <div class="container mt-n0">
                  <div class="container-fluid py-0 p-1" style="color: #008000; text-align: center;">              
                    <button type="submit" class="btn btn-success" id="button_guardar"> <i class="fa fa-check"></i> Guardar</button>                          
                  </div>
                </div>        

              </form>
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


<!-- ============================================================== -->	        
<!-- tinymce -->    
<!-- ============================================================== -->                
<script src="<?php echo base_url(); ?>assets/libs/tinymce/tinymce.min.js"></script>


