<div class="container demo">

    <div class="modal left fade" id="sidebarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" style="padding:0 0 0 0;">

         <nav id="sidebar" class="sidebar-wrapper modal-side" style="padding: 0 0 0 0;position:fixed;bottom:0;left:0;">
            <div class="sidebar-content">
                
                <div class="sidebar-header">
                    <div class="user-pic" >
                        <img class="img-responsive img-rounded" src="{{asset("img/exemples/user.jpg")}}" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Jhon
                            <strong>Smith</strong>
                            <div class="change-type">
  <button data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-caret-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="/user-panel">Usar como: Lucas Rocha</a>

  </div>
</div>

                        </span>
                        
                        <span class="user-role">Empresa</span>
                        <span class="user-status ">
                            <i class="fa fa-circle true"></i>
                            <span>Verificada</span>
                        </span>
                    </div>
                </div>

                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="valor-do-usuario">
                        <span class="font-weight-700" style="color:#bdbdbd">Saldo</span>
                            
                            <div class="clearfix"></div>
                            <div class="allsaldo col-md-12" style="padding:0 0 0 0;margin:0 0 0 0;">
                                <div class="row">
                                <div class="bloqueado col-md-6">
                            <span style="color:#bdbdbd">Bloqueado:</span>
                            <span>R$ 40,00</span>
                            </div>
                            <div class="disponivel col-md-6">
                            <span style="color:#bdbdbd">Disponível:</span>
                            <span>R$ 40,00</span>
                            </div>
                            </div>
                            </div>
                            
                            

                           
                            
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-file-alt"></i>
                                <span>Sua Página</span>                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Geral                                            
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Editar                                            
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>                        
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-images"></i>
                                <span>Álbuns</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Novo Album
                                            <span class="badge badge-pill badge-danger">Hot</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Na praia curtindo.</a>
                                    </li>
                                    <li>
                                        <a href="#">De boa na lagoa</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-image"></i>
                                <span>Fotos</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Modificar</a>
                                    </li>
                                    <li>
                                        <a href="#">Adicionar</a>
                                    </li>                                    
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-dollar-sign"></i>
                                <span>Financeiro</span>                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Histórico
                                            <span class="badge badge-pill badge-success">Pro</span>                           
                                        </a>
                                    </li>                                    
                                    <li>
                                        <a href="#">Assinantes</a>
                                    </li>
                                    <li>
                                        <a href="#">Transferencia</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Reports</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Histórico</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-lock"></i>
                                <span>Segurança</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Histórico de conexões</a>
                                    </li>
                                    <li>
                                        <a href="#">Bloqueios</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                 {{--        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Albuns</span>
                            </a>
                        </li>
                       <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentação</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<!-- container -->