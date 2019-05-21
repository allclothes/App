@extends('layouts.auth_layout')
@section('title', 'Anunciar')
@section('bg-color', 'background-color:#e9eaee;')
@section('navbar')
<nav class="navbar">
    <div class="nav1">
        <div class="nav1-item-header container">
            <div class="logo">
            <a href="/"><img src="{{asset('img/logo.png')}}" alt=""></a>
                
            </div>
        
        
            <div class="central-atendimento">
                <a href="#" class="central-a-link">
                    <img src="{{asset('img/logo-phone.png')}}" alt="">
                    <div class="central-text">                                
                        <span>Central de atendimento</span>                                
                    </div>
                </a>
            </div>

            <div class="right-header" id="right-header-nav">
                <div class="link-item">
                    <a class="header-autogestion-link" data-toggle="modal" data-target="#lang" style="cursor: pointer;">
                    <i class="fas fa-language"></i>
                    <div class="right-item-box">
                        <small>{{Config::get('app.locale')}}</small>
                    </div>
                    </a>                            
                </div>

                @if(Auth::check())
                <div class="link-item">
                    <a href="/home" class="header-autogestion-link">
                    <i class="fas fa-user-tie"></i>
                    <div class="right-item-box">
                        <span>{{auth::user()->name}}</span>
                        <small>Minha conta</small>
                    </div>
                    </a>                            
                </div>
                @else
                <div class="link-item">
                    <a href="/login" class="header-autogestion-link">
                    <i class="fas fa-user-alt"></i>
                    <div class="right-item-box">
                        <span>Iniciar Sessão</span>
                        <small>Minha conta</small>
                    </div>
                    </a>                            
                </div>
                @endif
                <div class="link-item">
                <a href="{{route('product.create')}}" class="header-autogestion-link">
                    <i class="fas fa-briefcase"></i>
                    <div class="right-item-box">
                        <span>Fazer negócio</span>
                        <small>Anunciar</small>
                    </div>
                </a>
                    
                </div>
                <div class="link-item" >
                    <a href="/" class="header-autogestion-link">
                    <i class="fas fa-question-circle"></i>
                        <span>Ajuda</span>
                    </a>
                </div>

            </div>
             
             <div class="icons row iconsmbcheck" >
                <div class="link-item" style="padding:0px 15px 0px 0px;font-size: 2em;">
                    <a href="/login" class="header-autogestion-link" style="color:#444;">
                    <i class="fas fa-sign-in-alt"></i>                              
                    </a>
                </div>

                <div class="link-item" style="padding:0px 15px 0px 0px;font-size: 2em;">
                    <a href="/" class="header-autogestion-link" style="color:#444;">
                    <i class="fas fa-shopping-cart"></i>                   
                    </a>
                </div>

               <div class="link-item" style="padding:0px 15px 0px 0px;font-size: 2em;">
                    <a href="/" class="header-autogestion-link" style="color:#444;">
                    <i class="fas fa-question"></i>                               
                    </a>
                </div>
             </div>
        </div>                
    </div>
</nav>
@endsection

@section('main_content')
<div class="allanunc col-md-12">
            <div class="container-box">
            <div class="back-page">
<a href="/"><i class="fas fa-home"></i> Inicio</a> <i class="fas fa-angle-right"></i> Anunciar
</div>
<div class="anunciar-box" align="center"> 
    <header>Menu</header>
                <small>Faça o login e desfrute do nosso mercado.</small>

                

                <div class="buttons">
                    <div class="form-group">
                    <a href="{{route('product.create')}}">                        
                    <button type="button" class="btnblue">                                         
                            <i class="fas fa-hand-holding-usd"></i> Anunciar                            
                    </button>                           
                    </a>
                    </div>                    
                   <a href="/">
                     <div class="form-group">
                         <button type="button" class="btndef" data-toggle="modal" data-target="#modalLogin">                          
                                <i class="fas fa-shopping-cart"></i> Comprar                      
                        </button>
                    </div>
                    </a>

                   
                    <div class="no-acc"><span>Precisa de <a href="/help">ajuda</a>?</div> <br>

                        
                    <div class="spacediv"></div>
                    
                   
                    
                    @if(!Auth::check())
                    <div class="form-group">
                    <a href="/login">
                     <button type="button" class="btn-fazerLogin" >
                        <i class="fas fa-sign-in-alt"></i>     
                    Fazer Login                  
                </button>
                    </div>
                    </a>
                    <div class="no-acc">
                        <span>Não tem conta?</span>
                        <a href="/register">Criar conta</a>                     
                    </div>  
                    @else
                    <div class="no-acc">
                            <span>Encerrar a sessão?</span>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>            
                        </div>  
                    @endif                 
                </div>
            </div>
        </div>
@endsection