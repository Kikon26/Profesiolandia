
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
						<h4 class="page-title">Profesionales.</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Profesionales</li>
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
                                    <table id="grid_profesionales" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Id</th>                                                                                                
                                                <th>Profesión</th>
												                        <th>Nombre</th>                                                												
                                                <th>Paterno</th>                                                												
                                                <th>Materno</th>                                                												
                                                <th>Email</th>   
                                                <th>Usuario</th>                               												                                                                                                
                                                <th>imagen</th>      
                                                <th>Accción</th>                                                                                            												
                                            </tr>
                                        </thead>                                        
                                        <tbody id="show_data">                     
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>                                                                                                
                                                <th>Profesión</th>
												                        <th>Nombre</th>                                                												
                                                <th>Paterno</th>                                                												
                                                <th>Materno</th>                                                												
                                                <th>Email</th>   
                                                <th>Usuario</th>                               												                                                                                                
                                                <th>imagen</th>      
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
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Profesional</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                            
                            <div class="form-group row">
                                
                                <div class="col-md-6">
                                  <label class="col-form-label">Profesión</label>
                                  <select class="select2 form-control custom-select" style="width: 100%;" id="profesional_id_cat_profesion" name="profesional_id_cat_profesion" data-placeholder="Selecciona Profesión" required>                                                         
                                  </select>
                                </div>
                            
                                
                                <div class="col-md-6">
                                  <label class="col-form-label">Especialidad</label>
                                  <input type="text" name="profesional_especialidad" id="profesional_especialidad" class="form-control" placeholder="Especialidad" required>
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <div class="col-md-12">
                                  <label class="col-form-label">Descripción</label>
                                  <input type="text" name="profesional_descripcion" id="profesional_descripcion" class="form-control" placeholder="Descripción" required>
                                </div>
                            </div>                              
                            <div class="form-group row">
                                
                              <div class="col-md-4">
                                  <label class="col-form-label">Nombre</label>
                                  <input type="text" name="profesional_nombre" id="profesional_nombre" class="form-control" placeholder="Nombre" required>
                                </div>
                            
                                <div class="col-md-4">
                                  <label class="col-form-label">Paterno</label>
                                  <input type="text" name="profesional_paterno" id="profesional_paterno" class="form-control" placeholder="Paterno" required>
                                </div>
                            
                                
                                <div class="col-md-4">
                                  <label class="col-form-label">Materno</label>
                                  <input type="text" name="profesional_materno" id="profesional_materno" class="form-control" placeholder="Materno" required>
                                </div>
                            </div>                                          
                    
                            <div class="row">                                

                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Password</label>                                      
                                    <div class="controls">
                                        <input type="password" name="profesional_password" id="profesional_password" class="form-control" required data-validation-required-message="This field is required">                                         
                                    </div>                                 
                                </div>   

                                <div class="col-md-6">
                                  <label class="col-md-2 col-form-label">Usuario</label>
                                  <input type="text" name="profesional_usuario" id="profesional_usuario" class="form-control" placeholder="Usuario" onkeypress="return AvoidSpace(event)" required>
                                </div>                                

                            </div>    
                            <div class="row">                                

                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Repetir Password</label>                                      
                                    <div class="controls">
                                        <input type="password" name="profesional_password2" id="profesional_password2" data-validation-match-match="profesional_password" class="form-control" required>
                                    </div>  
                                </div>      

                                <div class="form-group col-md-6">
                                  <label class="col-form-label">Email</label>                                      
                                  <div class="controls">
                                    <input type="email" name="profesional_email" id="profesional_email" class="form-control" required data-validation-required-message="Esté campo es requerido"> 
                                  </div>  
                                </div>
                            </div>  
                            <div class="row">                                                                          
                              <div class="col-md-6">
                                <label class="col-form-label">Costo de Consulta</label>
                                <input type="text" name="profesional_costo_consulta" id="profesional_costo_consulta" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="$0.00">
                              </div>
                            
                              <div class="form-group col-md-6">
                                <label class="text-right">Foto</label>                                                      
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="file" name="file" required>                                                        
                                  <label class="custom-file-label" for="file" id="label_file">Elige una Foto</label>                                                        
                                </div>
                              </div>
                            </div>   
                            <div class="row">                                
                              <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-light">
                                      <h6 class="m-b-0 text-black">Dirección</h6>    
                                    </div>  
                                    <div class="card-body">
                                        <h4 class="card-title"></h4>
                                        <h6 class="card-subtitle"></h6>
                                        <div class="row">                                
                                          <div class="col-md-6">
                                            <label class="col-form-label">Estado</label>                                    
                                            <select class="select2 form-control custom-select" style="width: 100%;" id="profesional_id_cat_estado" name="profesional_id_cat_estado" data-placeholder="Seleccione Estado" required>                                                         
                                            </select>
                                          </div>
                                          
                                          <div class="col-md-6">
                                            <label class="col-form-label">Municipio</label>
                                            <input type="text" name="profesional_mpio" id="profesional_mpio" class="form-control" placeholder="Municipio" required>
                                          </div>
                                        </div>
                                        <div class="row">                                
                                          <div class="col-md-6">
                                            <label class="col-form-label">Colonia</label>
                                            <input type="text" name="profesional_colonia" id="profesional_colonia" class="form-control" placeholder="Colonia" required>
                                          </div>

                                          
                                          <div class="col-md-6">
                                            <label class="col-form-label">Calle</label>
                                            <input type="text" name="profesional_calle" id="profesional_calle" class="form-control" placeholder="Calle" required>
                                          </div>
                                        </div>
                                        <div class="row">                                
                                          <div class="col-md-3">
                                            <label class="col-form-label">C.P.</label>
                                            <input type="text" name="profesional_cp" id="profesional_cp" class="form-control" placeholder="C.P." required>
                                          </div>

                                          <div class="col-md-3">
                                            <label class="col-form-label">Num.</label>
                                            <input type="text" name="profesional_num" id="profesional_num" class="form-control" placeholder="Num." required>
                                          </div>

                                          <div class="col-md-6">
                                            <label class="col-form-label">Telefono</label>
                                            <input type="text" name="profesional_telefono" id="profesional_telefono" class="form-control" placeholder="Telefono" required>
                                          </div>                                  
                                        </div>                                  

                                    </div>
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
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Profesional</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group row">
                          
                          <div class="col-md-6">
                            <label class="col-form-label">Profesión</label>
                            <input type="hidden" name="profesional_id_cat_profesional_edit" id="profesional_id_cat_profesional_edit" value="0" >  
                            <input type="hidden" name="profesional_imagen_edit" id="profesional_imagen_edit" value="0" >                                                                                            
                            <select class="select2 form-control custom-select" style="width: 100%;" id="profesional_id_cat_profesion_edit" name="profesional_id_cat_profesion_edit" data-placeholder="Seleccione Profesión" required>                                                         
                            </select>
                          </div>
                      
                          <div class="col-md-6">
                            <label class="col-form-label">Especialidad</label>
                            <input type="text" name="profesional_especialidad_edit" id="profesional_especialidad_edit" class="form-control" placeholder="Especialidad" required>
                          </div>                          
                      </div>                            
                      <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">Descripción</label>
                            <input type="text" name="profesional_descripcion_edit" id="profesional_descripcion_edit" class="form-control" placeholder="Descripción" required>
                          </div>     
                      </div>                            

                      <div class="form-group row">
                          
                          <div class="col-md-4">
                            <label class="col-form-label">Nombre</label>
                            <input type="text" name="profesional_nombre_edit" id="profesional_nombre_edit" class="form-control" placeholder="Nombre" required>
                          </div>

                          <div class="col-md-4">
                            <label class="col-form-label">Paterno</label>
                            <input type="text" name="profesional_paterno_edit" id="profesional_paterno_edit" class="form-control" placeholder="Paterno" required>
                          </div>
                      
                          
                          <div class="col-md-4">
                            <label class="col-form-label">Materno</label>
                            <input type="text" name="profesional_materno_edit" id="profesional_materno_edit" class="form-control" placeholder="Materno" required>
                          </div>
                      </div>                            
                      <div class="row">                                

                          <div class="form-group col-md-6">
                              <label class="col-form-label">Password</label>                                      
                              <div class="controls">
                                  <input type="password" name="profesional_password_edit" id="profesional_password_edit" class="form-control">                                         
                              </div>                                 
                          </div>   

                          <div class="col-md-6">
                            <label class="col-md-2 col-form-label">Usuario</label>
                            <input type="text" name="profesional_usuario_edit" id="profesional_usuario_edit" class="form-control" placeholder="Usuario" onkeypress="return AvoidSpace(event)" required>
                          </div>                                

                      </div>    
                      <div class="row">                                

                          <div class="form-group col-md-6">
                              <label class="col-form-label">Repetir Password</label>                                      
                              <div class="controls">
                                  <input type="password" name="profesional_password2_edit" id="profesional_password2_edit" data-validation-match-match="profesional_password_edit" class="form-control">
                              </div>  
                          </div>      

                          <div class="form-group col-md-6">
                            <label class="col-form-label">Email</label>                                      
                            <div class="controls">
                              <input type="email" name="profesional_email_edit" id="profesional_email_edit" class="form-control" required data-validation-required-message="Esté campo es requerido"> 
                            </div>  
                          </div>

                      </div>   
                      <div class="row">                  
                          <div class="col-md-6">
                            <label class="col-form-label">Costo de Consulta</label>
                            <input type="text" name="profesional_costo_consulta_edit" id="profesional_costo_consulta_edit" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="$0.00">
                          </div>
                                            
                          <div class="form-group col-md-6">
                            <label class="text-right">Foto</label>                                                      
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="file_edit" name="file_edit">                                                        
                              <label class="custom-file-label" for="file_edit" id="label_file_edit">Elige una Foto</label>                                                        
                            </div>
                          </div>
                      </div>       
                      <div class="row">                                
                        <div class="col-12">
                          <div class="card">
                              <div class="card-header bg-light">
                                <h6 class="m-b-0 text-black">Dirección</h6>    
                              </div>  
                              <div class="card-body">
                                  <h4 class="card-title"></h4>
                                  <h6 class="card-subtitle"></h6>
                                  <div class="row">                                
                                    <div class="col-md-6">
                                      <label class="col-form-label">Estado</label>                                    
                                      <select class="select2 form-control custom-select" style="width: 100%;" id="profesional_id_cat_estado_edit" name="profesional_id_cat_estado_edit" data-placeholder="Seleccione Estado" required>                                                         
                                      </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <label class="col-form-label">Municipio</label>
                                      <input type="text" name="profesional_mpio_edit" id="profesional_mpio_edit" class="form-control" placeholder="Municipio" required>
                                    </div>
                                  </div>
                                  <div class="row">                                
                                    <div class="col-md-6">
                                      <label class="col-form-label">Colonia</label>
                                      <input type="text" name="profesional_colonia_edit" id="profesional_colonia_edit" class="form-control" placeholder="Colonia" required>
                                    </div>

                                    
                                    <div class="col-md-6">
                                      <label class="col-form-label">Calle</label>
                                      <input type="text" name="profesional_calle_edit" id="profesional_calle_edit" class="form-control" placeholder="Calle" required>
                                    </div>
                                  </div>
                                  <div class="row">                                
                                    <div class="col-md-3">
                                      <label class="col-form-label">C.P.</label>
                                      <input type="text" name="profesional_cp_edit" id="profesional_cp_edit" class="form-control" placeholder="C.P." required>
                                    </div>

                                    <div class="col-md-3">
                                      <label class="col-form-label">Num.</label>
                                      <input type="text" name="profesional_num_edit" id="profesional_num_edit" class="form-control" placeholder="Num." required>
                                    </div>

                                    <div class="col-md-6">
                                      <label class="col-form-label">Telefono</label>
                                      <input type="text" name="profesional_telefono_edit" id="profesional_telefono_edit" class="form-control" placeholder="Telefono" required>
                                    </div>                                  
                                  </div>                                  

                              </div>
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
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Profesional</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>¿Estas seguro que deseas eliminar este registro?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="profesional_id_cat_profesional_delete" id="profesional_id_cat_profesional_delete" class="form-control">
                        <input type="hidden" name="profesional_imagen_delete" id="profesional_imagen_delete" class="form-control">
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


 


 
	
    
 



  

