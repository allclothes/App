@extends('layouts.auth_layout')
@section('title', 'Login')
@section('bg-color', 'background-color:#e9eaee;')
@section('navbar')
<nav class="navbar">
    <div class="nav1">
        <div class="nav1-item-header container">
            <div class="logo">
                <a href="/"><img src="{{asset('img/logo.png')}}" alt=""></a>                
            </div>           
        </div>
    </div>
</nav>
@endsection

@section('main_content')
<div class="allanunc col-md-12">
    <div class="container-box">

        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
        @endif

        <div class="back-page">
            <div class="back-page">               
                 <a href="/"><i class="fas fa-home"></i> Home</a> 
                <i class="fas fa-angle-right"></i>
                <a href="/menu">Menu</a> 
                <i class="fas fa-angle-right"></i>
                 Login</div>
                 
        </div>
        <div class="anunciar-box" align="center">        
        <header>Fazer Login</header>
        <small>Tenha acesso aos seus anúncios.</small>       
        <div class="buttons">

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-mail</label>
                    <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  
                    <label for="password" class="control-label">Senha</label>
                    <div>
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <small>{{ __('Esqueceu sua senha?') }}</small>
                                    </a>
                                @endif

                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-fazerLogin">
                    <i class="fas fa-sign-in-alt"></i>
                    Entrar</button>
                </div>
            </form>
            
            <div class="spacediv"></div>
            
            
            <div class="no-acc">

                        <span>Não tem conta?</span>
                        <a href="/register">Criar conta</a> 
            </div>
        </div>
    </div>
</div>
</div>
@endsection
 

