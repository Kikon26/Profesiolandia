
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-5 align-self-center">
          <h4 class="page-title">Calendario.</h4>
          <div class="d-flex align-items-center"></div>
				</div>
					
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="./CAcceso/principal">Principal</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Calendario</li>
                    </ol>
                </nav>
            </div>
        </div>
      </div>
		</div>
    <br>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="container-fluid">	                  		                       
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
  
        <!--***********************************************************************************************************************************************-->
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="">
                      <div class="row">
                          <div class="col-lg-3 border-right p-r-0">
                              <div class="card-body border-bottom">
                                  <h4 class="card-title m-t-10">Drag & Drop Event</h4>
                              </div>
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div id="calendar-events" class="">
                                              <div class="calendar-events m-b-20" data-class="bg-info"><i class="fa fa-circle text-info m-r-10"></i>Event One</div>
                                              <div class="calendar-events m-b-20" data-class="bg-success"><i class="fa fa-circle text-success m-r-10"></i> Event Two</div>
                                              <div class="calendar-events m-b-20" data-class="bg-danger"><i class="fa fa-circle text-danger m-r-10"></i>Event Three</div>
                                              <div class="calendar-events m-b-20" data-class="bg-warning"><i class="fa fa-circle text-warning m-r-10"></i>Event Four</div>
                                          </div>
                                          <!-- checkbox -->
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="drop-remove">
                                              <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                          </div>
                                          <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                                  <i class="ti-plus"></i> Add New Event
                                              </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-9">
                              <div class="card-body b-l calender-sidebar">
                                  <div id="calendar_profesional"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>        
        <!--***********************************************************************************************************************************************-->
        <!-- BEGIN MODAL -->
        <form id="form_reservar">
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">        
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title"><strong id="label_action">Reservar Cita</strong></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-12">                                                                                                
                            <div class="form-group">	
                            <input type="hidden" name="id_cat_cita" id="id_cat_cita" value="-1" >                                               														
                            <input type="hidden" name="id_cat_profesional" id="id_cat_profesional" value="<?php echo $idUsuario ?>" >                                               														
                            <select class="select2 form-control custom-select" style="width: 100%;" id="id_cat_cliente" name="id_cat_cliente" data-placeholder="" tabindex="1" required>                                                                                                                                                                                                        
                            </select>                                              
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">                                                                                                
                            <div class="form-group">		
                                <label class="control-label">Dia Inicio   </label>													
                                <input type="date" id="FecInicio" name="FecInicio" class="form-control"  required>
                            </div>
                        </div>                                
                        <div class="col-md-6">                                                                                                
                            <div class="form-group">															
                                <label class="control-label">Hora Inicio   </label>													
                                <input id="starttime" name="starttime" type="text" class="form-control time" placeholder="Hora Inicio" required/>            
                            </div>
                        </div>                                
                    </div>


                    <div class="row">
                        <div class="col-md-6">                                                                                                
                            <div class="form-group">		
                                <label class="control-label">Dia Termino   </label>													
                                <input type="date" id="FecTermino" name="FecTermino" class="form-control"  required>
                            </div>
                        </div>                                
                        <div class="col-md-6">                                                                                                
                            <div class="form-group">															
                                <label class="control-label">Hora Termino   </label>													
                                <input id="endtime" name="endtime" type="text" class="form-control time" placeholder="Hora Termino" required/>            
                            </div>
                        </div>                                
                    </div>
                
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Asunto    </label>
                                <input class="form-control" placeholder="Asunto" type="text" name="asunto" id="asunto">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Color</label>
                                <select class="form-control" name="color" id="color">
                                    <option value="">Selecciona Color</option>
                                    <option value="bg-danger">Danger</option>
                                    <option value="bg-success">Success</option>
                                    <option value="bg-primary">Primary</option>
                                    <option value="bg-info">Info</option>
                                    <option value="bg-warning">Warning</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                  </div>
                  <div class="modal-footer">
                      <button type="button" id="btn_close" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>                      
                      <button type="submit" id="btn_save" class="btn btn-success save-event waves-effect waves-light">Guardar</button>
                      <button type="button" id="btn_delete" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                  </div>
              </div>
          </div>
        </div>
        </form>  
        <!--***********************************************************************************************************************************************-->
        <!-- Modal Add Category -->
        <div class="modal fade none-border" id="add-new-event">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Agregar</strong> Nueva Categoría</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Nombre</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Seleccione color de Categoría</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                        <option value="inverse">Inverse</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->        
    </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->				
</div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
		<!-- ============================================================== -->		


 


 
	
    
 



  
        
