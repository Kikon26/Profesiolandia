        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <input type="hidden" id="url" value="http://localhost/Profesiolandia/"/>
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile dropdown m-t-20">
                                <div class="user-pic">
                                    <?php if ($id_perfil=="1") { ?>
                                      <img src="<?php echo base_url().'assets/images/users/'.$foto;?>" alt="users" class="rounded-circle img-fluid" />
                                    <?php } else if ($id_perfil=="2") { ?>
                                      <img src="<?php echo base_url().'assets/images/profesionales/'.$foto;?>" alt="users" class="rounded-circle img-fluid" />
                                    <?php }  ?>
                                </div>
                                <div class="user-content hide-menu m-t-10">
                                    <h5 class="m-b-10 user-name font-medium"><?php echo  $usuario; ?></h5>
                                    <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </a>
                                    <a href='<?php echo base_url()."CAcceso"; ?>' title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                    <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-user m-r-5 m-l-5"></i> Mi Informaci&oacute;n</a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-wallet m-r-5 m-l-5"></i> Mis Pendientes/a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-email m-r-5 m-l-5"></i> Mensajes</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Configuracion de cuenta</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href='<?php echo base_url()."CAcceso"; ?>'>
                                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Salir
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url()."CAcceso/principal"; ?>" aria-expanded="false">
                                <i class="sl-icon-loop"></i>
                                <span class="hide-menu">Inicio</span>
                            </a>
                        </li>
						<?php
						//Aqui meto el armado del menu
							//Verigficar que traiga elementos;
							$padre=0;$hijos=0; $url=base_url();
                            foreach ($menu as $key => $value) 
                            {								
								if ($menu[$key]->padre=="0"){ //Es padre
									if ($menu[$key]->hijos>0){ //con hijos
										$hijos=$menu[$key]->hijos; //Guardo el numero de hijos para decrementarlo
                                        echo "<li class='sidebar-item'>
                                                <a class='sidebar-link has-arrow waves-effect waves-dark' href='javascript:void(0)' aria-expanded='false'>
                                                <!--<a class='sidebar-link has-arrow waves-effect waves-dark' href='".$menu[$key]->accion."' aria-expanded='false'>-->
                                                  <i class='mdi ".$menu[$key/*+$i*/]->iconos."'></i>
                                                  <span class='hide-menu'>".$menu[$key]->descripcion."</span>
                                                </a>
                                                <ul aria-expanded='false' class='collapse first-level' id='". $menu[$key]->nombrePadre ."' >";
											//Aqui meto los hijos que diga
                                            for ($i = 1; $i <= $hijos; $i++) 
                                            {
                                                echo "<li class='sidebar-item'>
                                                        <a href='".$url.$menu[$key+$i]->accion."' class='sidebar-link'>
                                                          <i class='mdi ".$menu[$key+$i]->iconos."'></i>
                                                          <span class='hide-menu'>".$menu[$key+$i]->descripcion."</span>
                                                        </a>
                                                      </li>";
											}
										echo "</ul></li>";										
									}
									else{		//Es padre sin hijos
                                        echo "<li class='sidebar-item'>
                                                <a class='sidebar-link waves-effect waves-dark' href='".$url.$menu[$key]->accion."' aria-expanded='false'>
                                                  <i class='mdi ".$menu[$key]->iconos."'></i>
                                                  <span class='hide-menu'>".$menu[$key]->descripcion."</span>
                                                </a>
                                                <ul aria-expanded='false' class='collapse first-level' id='". $menu[$key]->nombrePadre ."' ></ul>
                                              </li>";
									}
								}
								else{ // Es hijo y me lo brinco sin hacer nada, esto se quitará al final
								}
								// echo $menu[$key]->idMenu;
							}
						?>

                        <!--
						<li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url()."indicadores/CIndicadorescabildo"; ?>" aria-expanded="false">
                                <i class="icon-Bar-Chart2"></i>
                                <span class="hide-menu"> Indicadores</span>
                            </a>
                        </li>
                 
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-notification-clear-all"></i>
                                <span class="hide-menu">Multi level dd</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="javascript:void(0)" class="sidebar-link">
                                        <i class="mdi mdi-octagram"></i>
                                        <span class="hide-menu"> item 1.1</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="javascript:void(0)" class="sidebar-link">
                                        <i class="mdi mdi-octagram"></i>
                                        <span class="hide-menu"> item 1.2</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                        <i class="mdi mdi-playlist-plus"></i>
                                        <span class="hide-menu">Menu 1.3</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-octagram"></i>
                                                <span class="hide-menu"> item 1.3.1</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-octagram"></i>
                                                <span class="hide-menu"> item 1.3.2</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-octagram"></i>
                                                <span class="hide-menu"> item 1.3.3</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-octagram"></i>
                                                <span class="hide-menu"> item 1.3.4</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a href="javascript:void(0)" class="sidebar-link">
                                        <i class="mdi mdi-playlist-check"></i>
                                        <span class="hide-menu"> item 1.4</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
		<!-- ============================================================== -->
		

