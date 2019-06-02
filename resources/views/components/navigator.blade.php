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

    <ul class="navbar-nav ml-auto ul-navigation">
      
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>

            <li class="nav-item dropleft">

                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(Session::has('carrinho'))
                
                <span class="rounded badge badge-success">{{count(Session::get('carrinho')['data'])}}</span>
                @else
                <span class="rounded badge badge-success">0</span>

                @endif
                <i class="fas fa-shopping-cart"></i>
                  
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color:#1b1b1b;color:#525252;padding:10px;">
                  @if(Session::has('carrinho') && Session::has('carrinho'))
                    @php
                        $carrinho = session::get('carrinho');
                    @endphp
                  <table class="table table-stripped" style="cursor:pointer;color:#ccc;font-size:0.8em;">
                    <thead>
                      <tr>
                        <th colspan="3" style="font-size:1.1em;">Store: <a href="/{{$carrinho['store']}}">{{$carrinho['store']}}</a></th>
                        <th><a href="/api/cleanSession">Limpar</a></th>
                      </tr>
                    <tr>
                      <th class="text-center">Produto</th>
                      <th class="text-center">Quantidade</th>
                      <th class="text-center">Preço</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <thead>
                      <tbody>
                        @php
                            $store = $carrinho['store'];
                        @endphp
                        @foreach ($carrinho['data'] as $cart)    
                        <tr >
                        <td onclick="window.location='/{{$store}}/{{getProductUrlByProductId($cart['id'])}}';">{{$cart['name']}}</td>
                        <td>{{$cart['quantity']}}</td>
                        <td>R$ {{ number_format($cart['cost'], 2, ',', '.') }}</td>
                        <form action="{{route('delCart')}}" method="post">
                          @csrf
                        <input type="hidden" value="{{$cart['id']}}" name="id">
                          <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                        </form>
                          
                        </tr>
                        @endforeach
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td> 
                            @if(count($carrinho['data']) > 0)
                            <a href="/checkout"><button type="button" class="btn-search" style="background-color: #d72800;color:#fafafa;">Checkout</button></a>
                            @endif
                          </td>
                        </tr>
                      </tfoot>  
                  </table>
                  @else
                  <p style="font-weight:500;"> Carrinho vazio =(</p>
                  @endif
                </div>
            </li>
        
            @if(auth::check())
            
  <li class="nav-item dropdown dropdown-logged">         
        <a class="nav-link dropdown-toggle header-max" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
            @if(isset(auth::user()->storename))
            <img src="{{asset("img/stores/".getStoreProfileImageByStoreName(auth::user()->storename))}}" class="rounded-circle mr-1" width="40" height="40" alt="">

            @else
         <img src="{{asset('img/exemples/user.jpg')}}" class="rounded-circle mr-1" width="40" height="40" alt="">
          
          @endif
          
          
          <span class="box-money ml-2 pl-2">Minha conta</span>
        </a>
        <div class="dropdown-menu" style="background-color:#1b1b1b;color:#525252;" aria-labelledby="navbarDropdownMenuLink">

          <div class="dropdown-header">
            <a href="/control-panel">
            <div class="row" style="margin:0;">
            <div class="divimg">
                @if(isset(auth::user()->storename))
                <img src="{{asset("img/stores/".getStoreProfileImageByStoreName(auth::user()->storename))}}" class="rounded-circle mr-1" width="40" height="40" alt="">

                @else
              <img src="{{asset('img/exemples/user.jpg')}}" class="rounded-circle mr-1" width="40" height="40" alt="">
              @endif

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
          {{-- <a class="dropdown-item" href="#">
              <i class="fas fa-hand-holding-usd"></i>
            Adicionar R$
            <span class="badge badge-pill badge-warning">Hot</span>
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-bookmark"></i>
          Assinaturas
        </a> --}}
        @if(auth::user()->storename != null)
          <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="/{{auth::user()->storename}}">
                    <i class="fas fa-file-invoice-dollar"></i>
                  Minha página</a>
          {{-- <a class="dropdown-item" href="/control-panel">
          <i class="fas fa-tachometer-alt"></i>
        Resumo</a>
          <a class="dropdown-item" href="/control-panel">
          <i class="fas fa-gamepad"></i>
        Painel de controle</a>
          <a class="dropdown-item" href="#">
          <i class="fas fa-pencil-alt"></i>
        Payme Studio (Beta)</a> --}}
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
            <li  class="nav-item {{ Request::is( 'login') ? 'active' : '' }}">
              <a class="nav-link" href="/login">FAZER LOGIN
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li  class="nav-item">
              <span class="nav-spacer">l
              </a>
            </li>
            <li  class="nav-item {{ Request::is( 'register') ? 'active' : '' }}">
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