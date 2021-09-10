
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
						<h4 class="page-title">Clientes.</h4>
                        <div class="d-flex align-items-center">
                        </div>
					</div>
					
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="./CAcceso/principal">Principal</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
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
                <!-- File export -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><!--Solicitudes--></h4>
                                <h6 class="card-subtitle">
									<!--Exporting data from a table can often be a key part of a complex application. The Buttons extension for DataTables provides three plug-ins that provide overlapping functionality for data export.  You can refer full documentation from here <a href="https://datatables.net/">Datatables</a>-->
								</h6>
                                <div class="col-lg-12 text-right"> 
                                  <div class="float-right">
                                      <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add" id="btn_add"><span class="fa fa-plus"></span> Añadir Nuevo</a>
                                  </div>
                                      
                                </div>                                  
                                <div class="table-responsive">
                                    <table id="grid_clientes" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Id</th>                                                
                                                <th>Nombre</th>
												<th>Apellidos</th>                                                												
                                                <th>Cel</th>                                                												
                                                <th>Correo</th>                                                												                                                
                                                <th>Accción</th>                                                                                            												
                                            </tr>
                                        </thead>                                        
                                        <tbody id="show_data">                     
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>                                                
                                                <th>Nombre</th>
												<th>Apellidos</th>                                                												
                                                <th>Cel</th>                                                												
                                                <th>Correo</th>                                                												                                                
                                                <th>Accción</th>                                                                                            												
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!--***********************************************************************************************************************************************-->
                <!-- MODAL ADD -->
                <form id="form_save">
                <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                            
                            <div class="form-group row">
                                
                                <div class="col-md-6">
                                  <label class="col-form-label">Nombre</label>
                                  <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" placeholder="Nombre" required>
                                </div>

                                <div class="col-md-6">
                                  <label class="col-form-label">Apellidos</label>
                                  <input type="text" name="cliente_apellidos" id="cliente_apellidos" class="form-control" placeholder="Apellidos" required>
                                </div>            
                                
                            </div>                            
                            <div class="form-group row">   
                                
                                <div class="col-md-6">
                                  <label class="col-form-label">Cel</label>
                                  <input type="text" name="cliente_cel" id="cliente_cel" class="form-control" placeholder="Cel" required>
                                </div>

                                <div class="form-group col-md-6">
                                  <label class="col-form-label">Correo</label>                                      
                                  <div class="controls">
                                    <input type="email" name="cliente_correo" id="cliente_correo" class="form-control" required data-validation-required-message="Esté campo es requerido"> 
                                  </div>  
                                </div>
                            </div>                                                        
                            
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btn_save" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>
            <!--END MODAL ADD-->
    
            <!-- MODAL EDIT -->
            <form id="form_update">
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="form-group row">
                                                               
                            
                                
                                <div class="col-md-6">
                                  <label class="col-form-label">Nombre</label>
                                  <input type="hidden" name="cliente_id_cat_cliente_edit" id="cliente_id_cat_cliente_edit" value="0" >                                               
                                  <input type="text" name="cliente_nombre_edit" id="cliente_nombre_edit" class="form-control" placeholder="Nombre" required>
                                </div>

                                <div class="col-md-6">
                                  <label class="col-form-label">Apellidos</label>
                                  <input type="text" name="cliente_apellidos_edit" id="cliente_apellidos_edit" class="form-control" placeholder="Apellidos" required>
                                </div>

                            </div>                            
                            <div class="form-group row">                                                               
                                <div class="col-md-6">
                                  <label class="col-form-label">Cel</label>
                                  <input type="text" name="cliente_cel_edit" id="cliente_cel_edit" class="form-control" placeholder="Tel" required>
                                </div>
                                <div class="form-group col-md-6">
                                  <label class="col-form-label">Correo</label>                                      
                                  <div class="controls">
                                    <input type="email" name="cliente_correo_edit" id="cliente_correo_edit" class="form-control" required data-validation-required-message="Esté campo es requerido"> 
                                  </div>  
                                </div>
                            </div>                            
                            
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btn_update" class="btn btn-primary">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>
            </form>            
            <!--END MODAL EDIT-->
    
            <!--MODAL DELETE-->
            <form>
                <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>¿Estas seguro que deseas eliminar este registro?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="cliente_id_cat_cliente_delete" id="cliente_id_cat_cliente_delete" class="form-control">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Si</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>
            <!--END MODAL DELETE-->	
                <!--***********************************************************************************************************************************************-->
			</div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->				
		</div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
		<!-- ============================================================== -->		


 


 
	
    
 



  

