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

<<<<<<< HEAD
                        <div class="form-group row">
                            <div class="col-md-6">
                            <label for="Name" class="text-md-right">{{ __('Nome:') }}</label><br/>
                                <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
=======
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Primeiro nome *" name="name" value="{{ old('name') }}" required/>
>>>>>>> v2.0

                                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
<<<<<<< HEAD
                                @enderror
                            </div>
                            <div class="col-md-6">
                                    <label for="lastname" class="text-md-right">{{ __('Sobrenome:') }}</label><br/>
                                    <input id="lastname" placeholder="Sobrenome" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
    
                                    @error('lastname')
=======
                                @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Sobrenome *" name="lastname" value="{{ old('lastname') }}" required />

                                            @error('lastname')
>>>>>>> v2.0
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

<<<<<<< HEAD
                        <!--Campo de sexo e cpf
                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="cpf" class="text-md-right">{{ __('CPF:') }}</label>
                                <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sex" class="text-md-right">{{ __('Sexo:') }}</label><br/><br/>
                                <input name="sex" id="sex" value="feminino" type="radio" required>
                                Feminino
                                </label> 
                                <label class="radio-inline" for="radios-1">
                                <input name="sex" id="sex" value="masculino" type="radio">
                                Masculino
                                </label>
                            </div>
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>-->
                        

                        <div class="form-group">
                          
                            <label for="email" class="text-md-right">{{ __('E-Mail Address:') }}</label>
=======
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
>>>>>>> v2.0

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