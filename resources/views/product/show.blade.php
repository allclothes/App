@extends('layouts.default')
@section('style')
<style>
/*
** Style Simple Ecommerce Theme for Bootstrap 4
** Created by T-PHP https://t-php.fr/43-theme-ecommerce-bootstrap-4.html
*/
.bloc_left_price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 150%;
}
.category_block li:hover {
    background-color: #007bff;
}
.category_block li:hover a {
    color: #ffffff;
}
.category_block li a {
    color: #343a40;
}
.add_to_cart_block .price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 200%;
    margin-bottom: 0;
}
.add_to_cart_block .price_discounted {
    color: #343a40;
    text-align: center;
    text-decoration: line-through;
    font-size: 140%;
}
.product_rassurance {
    padding: 10px;
    margin-top: 15px;
    background: #ffffff;
    border: 1px solid #6c757d;
    color: #6c757d;
}
.product_rassurance .list-inline {
    margin-bottom: 0;
    text-transform: uppercase;
    text-align: center;
}
.product_rassurance .list-inline li:hover {
    color: #343a40;
}
.reviews_product .fa-star {
    color: gold;
}
.pagination {
    margin-top: 20px;
}
footer {
    background: #343a40;
    padding: 40px;
}
footer a {
    color: #f8f9fa!important
}

</style>
@endsection
@section('content')
@foreach ($store as $s)
	@foreach ($product as $p)

<div class="page-wrapper">
		<nav class="navbar navbar-expand-md navbar-album">
		  <div class="paymefull"> 
			<div class="row">
			<div class="profile-img"> 
			  <a href="/page">
				<img src="{{asset('img/stores/'.$s->profileimg)}}" class="rounded-circle" width="75" height="75" alt="">
				</a>
			</div>      
			<span class="profile-name">{{$s->name}}</span>
		  </div>
	
	
		  </div>
		 </nav>
		<div class="paymefull">
		  <div class="row"> 
		  <div class="col-xl-10 col-md-12"> 
		  <h4 class="header-index" style="margin-bottom: 30px;">{{$p->name}}<small class="text-muted"> • {{$p->id}}</small></h4>
			<div class="main-album" style="min-height: 400px;">  
	
			  <div class="cards-album"> 
					<div class="container">
							<div class="row">
								<!-- Image -->
								<div class="col-12 col-lg-6" >
										<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
												<ol class="carousel-indicators">
												  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
												  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
												  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
												</ol>
												@php
													$img = json_decode($p->images);
													$count =0
												@endphp
												<div class="carousel-inner">]
													@foreach ($img as $i)
												<div class="carousel-item {{ $count == 0 ? 'active' : '' }}">
															<img class="d-block w-100" src="{{ asset('/img/product_images/'.$i) }}" alt="First slide">
														  </div>
														  @php
															  $count +=1;
														  @endphp
													@endforeach
												</div>
												<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
												  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
												  <span class="sr-only">Previous</span>
												</a>
												<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
												  <span class="carousel-control-next-icon" aria-hidden="true"></span>
												  <span class="sr-only">Next</span>
												</a>
											  </div>
								</div>
						
								<!-- Add to cart -->
								<div class="col-12 col-lg-6 add_to_cart_block">

									<div class="card bg-light mb-3">
										<div class="card-body">
										<p class="price">R$ {{ number_format($p->cost, 2, ',', '.') }}</p>										
											{{-- <p class="price_discounted">149.90 $</p> --}}
											<form method="get" action="cart.html">											
												<div class="form-group">
													<script>
														$(document).ready(function(){
															$('.quantity-left-minus').click(function(){
																let quantityVal = parseInt($('#quantity').val(), 10);

																if(quantityVal > 1){
																	let nqv = quantityVal-1;
																	$('#quantity').val(nqv);
																}
															});

																$('.quantity-right-plus').click(function(){
																	let quantityVal = $('#quantity').val();
																	let max = $('#quantity').data('max');
																	let pease = parseInt(quantityVal, 10);
																	let quantityMore = pease+1;
																	if(quantityMore < max || quantityMore == max ){
																		$('#quantity').val(quantityMore);
																	}

																});
																									
														});
													</script>
													<label>Quantity :</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
																<i class="fa fa-minus"></i>
															</button>
														</div>
													<input type="number" class="form-control" id="quantity" name="quantity" data-min="1" data-max="{{$p->amount}}" value="1" readonly>

														<div class="input-group-append">
															<button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
																<i class="fa fa-plus"></i>
															</button>
														</div>
													</div>
												</div>
												
											</form>
											<div class="product_rassurance">
												<ul class="list-inline">
													<li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Fast delivery</li>
													<li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Secure payment</li>
													<li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+33 1 22 54 65 60</li>
												</ul>
											</div>
											<div style="margin-top:20px;">
											<a href="cart.html" class="btn btn-success btn-lg btn-block text-uppercase">
													<i class="fa fa-shopping-cart"></i> Add To Cart
												</a>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						
							<div class="row" style="margin-top:1em;">
								<!-- Description -->
								<div class="col-12">
									<div class="card border-light mb-3"  style="background:transparent;">
										<div class="card-header text-white text-uppercase" style="background-color:#2b2b2b;"><i class="fa fa-align-justify"></i> Description</div>
										<div class="card-body" >
											<p class="card-text">
												{{$p->description}}	
											</p>											
										</div>
									</div>
								</div>
						
							</div>
						</div>
			  </div>
	
			</div>
		  </div>
	
		
		  
		  <div class="col-xl-2 col-md-6" id="publicity" style="padding:0 0 0 10px;">
	
			<h5 style="margin-bottom:30px;">Recomendados</h5>
			  
			  
			<div class="card-albuns" style="height: 400px;">
				@if(count($others)>0)
				@foreach($others as $o)
			  <div class="card-cardotheralbum">
				<span>  {{$o->name}} <small class="text-muted"> • {{getStoreNameByProductId($o->id)}} </small></span>
				<div class="othersalbum"> 
				</div>
	
				</div>
				@endforeach
				@endif
	
			  
			</div>
			  
	
	
			</div>
			
	
	   </div>
	   </div>
	 
</div>
	@endforeach
	@endforeach

	<footer class="footer" style="margin-top:10em;">
		<div class="container">
		<img src="{{asset("img/logo.png")}}" alt="">
		<div class="clearfix"></div>
		<small>Todas imagens ao ser inserida no site são protegidas pelo Google Image Copyright. Ao caso de divulgação não autorizada será tomada medidas judiciais cabiveis.</small>
	  </div>
	  
	</footer>
@endsection