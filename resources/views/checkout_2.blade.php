@extends('layouts.default')
@section('style')
<style>
    .form-control,.custom-select{
        border-radius: 0px;
        border:0;
    }
        .container {
      max-width: 960px;
    }
    
    .border-top { border-top: 1px solid #e5e5e5; }
    .border-bottom { border-bottom: 1px solid #e5e5e5; }
    .border-top-gray { border-top-color: #adb5bd; }
    
    .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
    
    .lh-condensed { line-height: 1.25; }</style>
@endsection
@section('content')

<div class="page-wrapper" style="padding:0 0 0 0;">
        <div class="paymefull">
            
   <div class="rowline" style="background-color:#1d1d1d;padding:20px;">
        <div class="container">
                <div class="py-5 text-center">
                    <a href="/" onclick="return confirm('Tem certeza que deseja sair?');">
                  <img class="d-block mx-auto mb-4" src="{{asset('/img/logo.png')}}" alt="PayMe">
              </a>
                  <h2>Checkout</h2>
                  <p class="lead">Abaixo preencha os dados para confirmar a sua compra!</p>
                </div>
          
                @php
                          if(!Session::has('carrinho')) $cart = [];
                          else $cart = Session::get('carrinho');

                          if(!isset($cart['data'])) $cart['data'] = [];

                          $totalCost = 0;
                      @endphp
                      
                <div class="row">
                  <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-muted">Seu carrinho</span>
                      <span class="badge badge-secondary badge-pill">{{ count($cart['data']) > 0 ? count($cart['data']) : '0'}}</span>
                    </h4>
                    <ul class="list-group mb-3">
                      @if(isset($cart) && count($cart['data']) > 0)
                      @foreach($cart['data'] as $sp)
                      <li class="list-group-item d-flex justify-content-between lh-condensed" style="background-color:#d72800;">
                              <div>
                                <h6 class="my-0">{{ $sp['name']}}</h6>
                                <small class="text-light">Quantidade: {{$sp['quantity']}}</small>
                              </div>
                              <span class="text-white">R$ {{ number_format($sp['cost'], 2, ',', '.')}}</span>
                            </li>
                      @php
                          $totalCost += $sp['cost'];
                      @endphp
                      @endforeach
                      @else
                      <tr>
                          <td colspan="6">Nenhum produto no seu carrinho =(</td>
                      </tr>
                      @endif
                      <li class="list-group-item d-flex justify-content-between" style="background-color:#d72800;">
                        <span>Total (R$)</span>
                        <strong>R$ {{ number_format($totalCost, 2, ',', '.')}}</strong>
                      </li>
                    </ul>
          
                  {{-- <form method="POST" action="{{route('confirmCheckout')}}" class="card p-2"> --}}
                      {{-- @csrf --}}
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-secondary">Ativar</button>
                        </div>
                      </div>
                    {{-- </form> --}}
                  </div>
                  <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Dados de entrega</h4>
                  <form class="needs-validation" method="POST" action="{{route('storeCheckout')}}">  
                      @csrf
                      <div class="row">
                        <div class="col-md-5 mb-3">
                          <label for="country">Pais</label>
                          <select class="custom-select d-block w-100" name="country" id="country" required>
                            <option value="" disabled selected>Choose...</option>
                            <option>Brasil</option>
                          </select>
                          <div class="invalid-feedback">
                            Por favor selecione um país válido.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="state">Estado</label>
                          <select class="custom-select d-block w-100" name="state" id="state" required>
                            <option value="" selected disabled>Escolha...</option>
                            <option value="PE">Pernambuco</option>
                          </select>
                          <div class="invalid-feedback">
                            Selecione um estado válido.
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="city">Cidade</label>
                          <select class="custom-select d-block w-100" name="city" id="city" required>
                                <option value="" selected disabled>Escolha...</option>
                                <option value="recife">Recife</option>
                                <option value="gravata">Gravatá</option>
                                <option value="caruaru">Caruaru</option>
                                <option value="olinda">Olinda</option>
                                <option value="petrolina">Petrolina</option>
                              </select>
                          <div class="invalid-feedback">
                            City is required.
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                            <div class="col-md-3 mb-3">
                                    <label for="zip">CEP</label>
                                    <input type="text" class="form-control cep" name="cep"  value="{{old('cep')}}" data-mask="00000-000" data-mask-reverse="true" id="zip" placeholder="00.000-00" required>
                                    <div class="invalid-feedback">
                                      CEP code required.
                                    </div>
                                  </div>
                                  <div class="col-md-9 mb-3">
                                        <label for="address">Endereço</label>
                                  <input type="text" class="form-control" name="address" value="{{old('address')}}" id="address" placeholder="Rua alfonso fulano, 71" required>
                                        <div class="invalid-feedback">
                                          Please enter your shipping address.
                                        </div>
                                      </div>

                      </div>
                     
                      <hr class="mb-4">
          
                      <h4 class="mb-3">Pagamento</h4>
          
                      <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                          <input id="credit" name="paymentMethod" type="radio" value="0" class="custom-control-input" checked required>
                          <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input id="debit" name="paymentMethod" type="radio" value="1" class="custom-control-input" required>
                          <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="cc-name">Nome do cartão</label>
                          <input type="text" class="form-control creditCardName" id="cc-name" placeholder="" required>
                          <small class="text-muted">Nome completo igual ao cartão.</small>
                          <div class="invalid-feedback">
                            Name on card is required
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="cc-number">Credit card number</label>
                          <input type="text" class="form-control creditCard" minlength="16" maxlength="20" id="cc-number" placeholder="" required>
                          <div class="invalid-feedback">
                            Credit card number is required
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 mb-3">
                          <label for="cc-expiration">Expiration</label>
                          <input type="text" class="form-control dateEx" id="cc-expiration" placeholder="" required>
                          <div class="invalid-feedback">
                            Expiration date required
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="cc-expiration">CVV</label>
                          <input type="text" class="form-control cvv" id="cc-cvv" placeholder="" required>
                          <div class="invalid-feedback">
                            Security code required
                          </div>
                        </div>
                      </div>
                      <hr class="mb-4">
                      <button class="btn btn-success btn-lg btn-block" type="submit">Confirmar compra!</button>
                    </form>
                  </div>
                </div>
          
                <footer class="my-5 pt-5 text-muted text-center text-small">
                  <p class="mb-1">&copy; 2017-2018 Payme</p>
                  <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Support</a></li>
                  </ul>
                </footer>
              </div>
          
              <!-- Bootstrap core JavaScript
              ================================================== -->
              <!-- Placed at the end of the document so the pages load faster -->
              <script>
                  $(document).ready(function(){
                      $('.cep').mask('00000-000');
                      $(".cvv").mask('000');
                      $(".dateEx").mask('00/00');
                       $(".creditCardName").lettersOnly();
          
                      $('.creditCard').mask('0000 0000 0000 0000');
                  })
              </script>
              <script>
              jQuery.fn.lettersOnly = function() {
            $(this).keydown(function(e) {
              var key = e.which || e.keyCode;
          
              if(!e.altKey && !e.ctrlKey && key >=48 && key<=57 || key>=96 && key<=105 ||key==188||key==109||key==110||key==13||key==35|| key==36|| key==46||key==45||key==107||key==219||key==221||key==220||key==186||key==222|| key==191||key==187||key==192) {
                  return false;
              }
              else {
                return true;  
              }
            });
          }
          jQuery.fn.numbersOnly = function() {
            $(this).keydown(function(e) {
              var key = e.which || e.keyCode;
              if(key >= 65 && key <= 90 || key >= 186 && key <= 188|| key >=191 && key <= 222) {
                  return false;
              }
              else {
                if(!e.shiftKey) {
                  return true;
                }
                else {
                  return false;
                }
              }
            });
          }
          jQuery.fn.alphaNumericOnly = function() {
            $(this).keydown(function(e) {
              var key = e.which || e.keyCode;
              if(e.shiftKey && key >= 48 && key <= 57) {
                return false;
              }
              else {
                 if(key >= 186 && key <= 187 || key >= 191 && key <= 222) {
                  return false;
                }
                else {
                  return true; 
                }
              }
            });
          }
          </script>
      @endsection