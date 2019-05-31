<nav class="navbar navbar-expand-md main-nav col-12" >
      <div class="col-xl-3 col-md-2 col-sm-12" align="center">
  <div class="row d-flex justify-content-center" style="margin-bottom: 10px;">

        <button class="navbar-toggler nav-toggler" type="button" data-toggle="collapse" data-target="#navbarPmeWiixDesenvolment" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fas fa-bars"></span>
    </button>

       <a class="navbar-brand" href="/"><img src="{{asset('img/logo.png')}}" alt="Pay.me" height="50"></a>

       </div>
       </div>
          <form action="{{route('search')}}" class="input-group col-xl-4 col-md-5 col-sm">
        <input type="text" id="search" name="s" class="form-control" placeholder="Buscar no Pay.me">
        <div class="input-group-append">
      <button class="btn-search rounded-right" type="submit">Buscar</button>    
      </div>
    </form>
    



    <div class="collapse navbar-collapse" id="navbarPmeWiixDesenvolment">

    <ul class="navbar-nav ml-auto">
      
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
        
            @if(auth::check())
            
  <li class="nav-item dropdown dropdown-logged">         
        <a class="nav-link dropdown-toggle header-max" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{asset('img/exemples/user.jpg')}}" class="rounded-circle mr-1" width="40" height="40" alt="">
                     <span class="box-money ml-2 pl-2">Minha conta</span>
        </a>
        <div class="dropdown-menu" style="background-color:#1b1b1b;color:#525252;" aria-labelledby="navbarDropdownMenuLink">

          <div class="dropdown-header">
            <a href="/control-panel">
            <div class="row" style="margin:0;">
            <div class="divimg">
            <img src="{{asset('img/exemples/user.jpg')}}" class="rounded-circle mr-1" width="40" height="40" alt="">
            </div>
            <div class="nomes">
              <span class="nome">{{ Auth::user()->name }}</span>         
              <br>
              <small  class="apelido">{{ Auth::user()->username }}</small>
              </div>
              </div>
              </a>
            
  
            
         </div>
          
          <a class="dropdown-item" href="/control-panel">
            <i class="fas fa-id-card"></i>
            Painel
          </a>
          <a class="dropdown-item" href="#">
              <i class="fas fa-hand-holding-usd"></i>
            Adicionar R$
            <span class="badge badge-pill badge-warning">Hot</span>
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-bookmark"></i>
          Assinaturas
        </a>
        @if(auth::user()->storename != null)
          <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="/{{auth::user()->storename}}">
                    <i class="fas fa-file-invoice-dollar"></i>
                  Minha página</a>
          <a class="dropdown-item" href="/control-panel">
          <i class="fas fa-tachometer-alt"></i>
        Resumo</a>
          <a class="dropdown-item" href="/control-panel">
          <i class="fas fa-gamepad"></i>
        Painel de controle</a>
          <a class="dropdown-item" href="#">
          <i class="fas fa-pencil-alt"></i>
        Payme Studio (Beta)</a>
        @endif
          <div class="dropdown-divider" style="background-color:#000;"></div>
          <a class="dropdown-item" href="#">
          <i class="fas fa-cog"></i>
          Configurações
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

            
          <i class="fas fa-sign-out-alt"></i>
          Sair
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
      </li>

      
      
    
            @else
            <li class="nav-item {{ Request::is( 'login') ? 'active' : '' }}">
              <a class="nav-link" href="/login">FAZER LOGIN
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <span class="nav-spacer">l
              </a>
            </li>
            <li class="nav-item {{ Request::is( 'register') ? 'active' : '' }}">
              <a class="nav-link" href="/register">REGISTRAR
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @endif

            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
          </ul>
</div>
            <hr>   
    </nav>