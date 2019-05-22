@extends('layouts.auth')

@section('content')

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <a href="/">
                        <img src="{{asset('img/logo.png')}}" alt=""/>
                        </a>
                        <h3>Bem vindo!</h3>
                        <p>Você está 30 segundos de fazer os melhores negócios!</p>
                        <a href="/login">
                        <input type="submit" value="Login"/>
                        </a><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Crie sua conta</h3>
                            <form method="POST" action="{{ route('register') }}">

                                @csrf

                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Primeiro nome *" name="name" value="{{ old('name') }}" required/>

                                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Sobrenome *" name="lastname" value="{{ old('lastname') }}" required />

                                            @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                        </div>
                                        <div class="form-group text-left">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Apelido *" name="username" value="{{ old('username') }}" required/>
                                            <small>O nome que os outros podem te ver.</small>
                                            @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        
                                        <div class="form-group form-nascimento text-left">
                                            <label for="">Data de nascimento: *</label>
                                            <div class="clearfix"></div>
                                           <input type="text" name="birthday" data-mask="00/00/0000" placeholder="__/__/____" maxlength="10" class="date form-control">
                                           </div>

                                        <div class="form-group">
                                            <select name="sex" class="select" required>
                                                <option disabled selected>Sexo *</option>

                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                                <option value="N">Prefiro não dizer</option>
                                            </select>                                          
                                        </div>     
                                      </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <input type="text" autocomplete="off" minlength="11" maxlength="14" value="{{ old('cpf') }}" name="cpf" class="form-control cpf" placeholder="CPF" />
                                        </div>    

                                    @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                    @endif

                                    <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail *" name="email" value="{{ old('email') }}" required />
                                           
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>   
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha *" name="password" required />
                                            
                                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirmar Senha *" name="password_confirmation" required/>

                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">

                                                <input type="checkbox" class="checkbox" id="terms" required>
                                                <label for="terms">Li e concordo com os <a href="#">termos de uso.</a></label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Registrar"/>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endsection