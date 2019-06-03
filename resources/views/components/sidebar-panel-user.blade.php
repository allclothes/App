
<nav id="sidebar" class="sidebar-wrapper sidebar-normal" style="padding: 0 0 0 0;">
            <div class="sidebar-content">
                

                <div class="sidebar-header">
                    <div class="user-pic" >
                        @if(isset(auth::user()->storename))
                        <img class="img-responsive img-rounded" src="{{asset("img/stores/".getStoreProfileImageByStoreName(auth::user()->storename))}}" alt="User picture">

                        @else
                        <img class="img-responsive img-rounded" src="{{asset("img/exemples/user.jpg")}}" alt="User picture">
                        @endif
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{auth::user()->username}}                           
                        </span>

                        <span class="user-role">{{ Auth::user()->storename == null ? 'Cliente' : 'Vendedor' }}</span>
                        {{-- <span class="user-status">
                            <i class="fa fa-circle true"></i>
                            <span>Online</span>
                        </span> --}}
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="valor-do-usuario">
                            
                            <span class="saldo">Saldo: </span>
                        <span>R$ {{ number_format(auth::user()->balance, 2, ',', '.') }}</span>
                           
                            
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
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="/control-panel">Geral                                            
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="#">Segurança e login</a>
                                    </li>
                                    <li>
                                        <a href="#">Regras de uso</a>
                                    </li>
                                    <li>
                                        <a href="#">Assinaturas</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Financeiro</span>                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    {{-- <li>
                                        <a href="#">Adicionar Fundo
                                            <span class="badge badge-pill badge-success">Pro</span>                           
                                        </a>
                                    </li>                                    
                                    <li>
                                        <a href="#">Histórico de transações</a>
                                    </li> --}}
                                    <li>
                                        <a href="/control-panel/payments/history">Historico de compras
                                        <span class="badge badge-pill badge-success">Pro</span>    
                                    </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @if(auth::user()->storename == null)
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-gem"></i>
                                <span>Abrir negócio</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <!-- <li>
                                        <a href="#">Regras de negócio</a>
                                    </li>
                                    <li>
                                        <a href="#">Informações</a>
                                    </li> -->
                                    <li>
                                        <a href="/control-panel/store/create">Criar página</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @else
                        <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-images"></i>
                                    <span>Meu negocio</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="/control-panel/product/create">Novo anuncio
                                                <span class="badge badge-pill badge-danger">Hot</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/control-panel/product/">Meus anuncios</a>
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>
                        @endif
                        {{-- <li class="sidebar-dropdown">
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
                                <span>Privacidade</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Configurações</a>
                                    </li>
                                    <li>
                                        <a href="#">Histórico de conexões</a>
                                    </li>
                                    <li>
                                        <a href="#">Bloqueios</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        {{-- <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Mensagens</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentação</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">0</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">0</span>
                </a>
                <a href="/control-panel">
                    <i class="fa fa-cog"></i>
                    {{-- <span class="badge-sonar"></span> --}}
                </a>
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>