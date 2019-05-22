@extends('layouts.auth')

@section('content')

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <a href="/">
                        <img src="{{asset('img/logo.png')}}" alt=""/>
                        </a>
                        <h3>Bem vindo<br>de volta!</h3>
                        <p>Não tem conta?<br> Vem comigo, não dura nem 30 segundos :P</p>
                        <a href="/register">
                        <input type="submit" name="" value="Registrar"/>
                        </a><br/>
                    </div>
                    <div class="col-md-9 register-right">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading" style="margin-right: 20px;">Entrar</h3>
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="row register-form col-md-12" align="center" style="display: flex;justify-content: center;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Senha" name="password">
                                        </div>
                                        <div class="col-md-12">
                                        <a href="#" style="font-size: 0.8em;">Esqueci minha senha</a>
                                        </div>
                                        
                                        

                                        <input type="submit" class="btnRegister" value="Login"/>
                                        <div class="clearfix"></div>
                                        <a href="/">
                                        <button type="button" class="btnVoltar" style="margin-top:10px;">Voltar</button>
                                        </a>
                                    </form>

                                       
                                    </div>

                                </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endsection
