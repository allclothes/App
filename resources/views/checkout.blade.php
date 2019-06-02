@extends('layouts.default')
@section('title', '')
@section('style')
<style>

.quantity {
    float: left;
    margin-right: 15px;
    background-color: #eee;
    position: relative;
    width: 80px;
    overflow: hidden
}

.quantity input {
    margin: 0;
    text-align: center;
    width: 15px;
    height: 15px;
    padding: 0;
    float: right;
    color: #000;
    font-size: 20px;
    border: 0;
    outline: 0;
    background-color: #F6F6F6
}

.quantity input.qty {
    position: relative;
    border: 0;
    width: 100%;
    height: 40px;
    padding: 10px 25px 10px 10px;
    text-align: center;
    font-weight: 400;
    font-size: 15px;
    border-radius: 0;
    background-clip: padding-box
}

.quantity .minus, .quantity .plus {
    line-height: 0;
    background-clip: padding-box;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    -webkit-background-size: 6px 30px;
    -moz-background-size: 6px 30px;
    color: #bbb;
    font-size: 20px;
    position: absolute;
    height: 50%;
    border: 0;
    right: 0;
    padding: 0;
    width: 25px;
    z-index: 3
}

.quantity .minus:hover, .quantity .plus:hover {
    background-color: #dad8da
}

.quantity .minus {
    bottom: 0
}
.shopping-cart {
    margin-top: 20px;
}
</style>
@endsection
@section('content')
<div class="page-wrapper" style="padding:0 0 0 0;">
    <div class="paymefull">
        <div class="rowline">

                <div class="container">
                        <div class="card shopping-cart " style="background-color:#1d1d1d;">
                                 <div class="card-header text-light" style="background-color:#d72800;">
                                     <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                 Carrinho de compras na <b>{{  Session::get('carrinho')['store'] ?  Session::get('carrinho')['store'] : 'Pay.Me'}}</b> 
                                     
                                     <a href="/" class="btn btn-outline-warning btn-sm pull-right float-right">Continuar comprando</a>
                                     <div class="clearfix"></div>
                                 </div>
                                 <div class="card-body">
                                     @php
                                         if(Session::has('carrinho')) $cart = Session::get('carrinho');
                                         else $cart = [];

                                         if(!isset($cart['data'])) $cart['data']   =   []; 
                                         $totalCost = 0;
                                     @endphp
                                     @if(count($cart) > 0 && count($cart['data']) > 0)                                    
                                     @foreach($cart['data'] as $c)
                                         <!-- PRODUCT -->
                                         <div class="row">
                                             <div class="col-12 col-sm-12 col-md-2 text-center">
                                                     <img class="img-responsive" src="{{asset('/img/product_images/'.getProductImageById($c['id']))}}" alt="prewiew" width="120" height="80">
                                             </div>
                                             <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                                 <h4 class="product-name"><strong>{{$c['name']}}</strong></h4>
                                                 <h4>
                                                     {{-- <small>Product description</small> --}}
                                                 </h4>
                                             </div>
                                             <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                                 <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                                     <h6><strong>R$ {{ number_format($c['cost'], 2, ',', '.') }} <span class="text-muted"></span></strong></h6>
                                                 </div>
                                                 <div class="col-4 col-sm-4 col-md-4">
                                                     <div class="quantity">
                                                         {{-- <input type="button" value="+" class="plus"> --}}

                                                     <input type="number" step="1" max="{{getProductAmountById($c['id'])}}" readonly min="1" value="{{$c['quantity']}}" title="Qty" id="qty" class="qty"
                                                                size="4">
                                                        {{-- <input type="hidden" value="{{getProductAmountById($c['id'])}}" id="productAmount"> --}}

                                                         {{-- <input type="button" value="-" class="minus"> --}}
                                                     </div>
                                                 </div>
                                                 <script>
                                                     $('.plus').click(function(){
                                                        let val = parseInt($('#qty').val(), 10);
                                                        let max = $('#productAmount').val();

                                                        let inc = val++;
                                                        if(val <= max){
                                                            $('#qty').val(val);
                                                        }
                                                     })
                                                     $('.minus').click(function(){
                                                        let val = $('#qty').val();
                                                        let max = $('#productAmount').val();
                                                        if(val > 1){
                                                            $('#qty').val(val-1);
                                                        }
                                                     })
                                                 </script>
                                                 <div class="col-2 col-sm-2 col-md-2 text-right">
                                                 <form action="{{route('delCart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$c['id']}}" name="id">
                                                     <button type="submit" class="btn btn-outline-danger btn-xs">
                                                         <i class="fas fa-trash" aria-hidden="true"></i>
                                                     </button>
                                                    </form>
                                                 </div>
                                             </div>
                                         </div>
                                        @php
                                            $totalCost += $c['cost'];
                                        @endphp
                                         @endforeach
                                         @else
                                         <div style="text-align:center;">
                                             <div style="col-md-12 text-center" style="text-align:center;">
                                             <h5>Não contém nenhum produto no carrinho.</h5>
                                             </div>
                                         </div>
                                         @endif
                                         <!-- END PRODUCT -->
                                         <hr>
                                         <!-- END PRODUCT -->   
                                         <div class="float-right" style="margin: 10px">
                                                <div class="float-right" style="margin: 5px">
                                                    Total price: <b>R$ {{ number_format($totalCost, 2, ',', '.') }}</b><br>
                                                    <a href="/checkout/2" class="btn-search float-right" style="background-color: #d72800;color:#fafafa;padding:10px;margin-top:15px;">Comprar</a>
                                                </div>
                                            </div>            
                                    

                                 </div>                                 
                             </div>
                     </div>

        </div>
    </div>
</div>
@endsection