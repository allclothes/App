@extends('layouts.auth_layout')

@section("navbar")
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
@section('style')
<style>
.form-control{
    border-radius:0;
}
</style>
@endsection
@section('main_content')
<div class="allanunc col-md-12">

    <div class="container-box">
        

        <div class="back-page">

            <div class="back-page">               
                 <a href="/"><i class="fas fa-home"></i> Home</a> 
                <i class="fas fa-angle-right"></i>
                <a href="/sales">Anunciar</a> 
                <i class="fas fa-angle-right"></i>
                 Criar Conta                
             </div>
            </div>        
        <div class="anunciar-box" align="center" style="min-width: 500px;">
            @if(count($errors)>0)
            <div class="alert alert-danger col-sm-12" role="alert">
                <i class="fas fa-exclamation-triangle"></i> 
                <span style="font-weight: 500;margin-bottom: 20px;">Ocorreram os seguinte erros:</span><br><br>
                @foreach ($errors->all() as $error)
                    • {{$error}}<br>
                @endforeach
            </div> 
            @endif

            <header>Criar Conta</header>
            <small>Anuncie, negocie e venda. Simples assim.</small>
                <div class="buttons">
                             
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                    <input id="lastname" placeholder="Sobrenome" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
    
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          
                            <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>

                        <div class="form-group row">                            
                            <div class="col-md-6">
                                <label for="password" class=" text-md-right">Senha</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                    <label for="password-confirm" class="text-md-right">Confirmar senha:</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                        </div>

                      
                <div class="form-group">
                        <button type="submit" class="btn-fazerLogin">
                        <i class="fas fa-sign-in-alt"></i>
                        Cadastrar</button>
                    </div>
                    </form>
                    <div class="spacediv"></div>
            
            
            <div class="no-acc">

                        <span>Já possui uma conta?</span>
                        <a href="/login">Faça o login!</a> 
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
