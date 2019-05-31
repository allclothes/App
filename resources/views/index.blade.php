@extends('layouts.default')
@section('title', '')
@section('content')
<div class="page-wrapper" style="padding:0 0 0 0;">
     <div class="paymefull">
     	
<div class="rowline">
		
       <h3 class="header-index">Melhores perfils </h3>
		<div class="pm-recomends">
			<div class="row" style="padding-left:15px;padding-right:15px" >
				

	<div class="menu-wrapper">

		<ul class="menu">

			@if(count($stores) > 0)
			@foreach($stores as $s)
			<div class="item spaces-card col-xl-3 col-md-3 col-sm-4 col-12" style="padding:0 5px 10px 0px;">
			<a href="/{{$s->name}}">
						<div class="card actors bg-transparent" style="border-radius:0;">
							
							<div class="imgtop">
								<img class="user-rating img-responsive rounded-0" src="{{asset('img/stores/'.$s->profileimg)}}" alt="{{$s->name}}">
								</div>
							<div class="card-body">
								<p class="card-text">{{$s->name}}
									<div class="clearfix"></div>
									<span style="font-size: 0.9em;">{{ countProductByStore($s->id) }} produtos</span></p>
									
								</div>
							</div>
						</a>
					</div>
					@endforeach
					@else
					<h3>Não encontramos nenhuma loja =(</h3>
					@endif
	</ul>

	<div class="paddles">
		<button class="left-paddle paddle hidden">
			<i class="fas fa-angle-left" style="font-size:40px;"></i>
		</button>
		<button class="right-paddle paddle">
			<i class="fas fa-angle-right" style="font-size:40px;"></i>
		</button>
	</div>

</div>
</div>
</div>
</div>

@if(count($products) > 0)
<hr class="hr">
<div class="rowline">
		<h3 class="header-index">Últimos produtos</h3>
		
			<div class="row" style="padding-left:15px;padding-right:15px">

				@foreach($products as $e)
				@php
					$img = json_decode($e->images);
				@endphp
			<div class="item spaces-card col-md-3 col-sm-6" style="padding:0 5px 10px 0px;">
					<a href="/{{getStoreNameByStoreId($e->store_id)}}/{{$e->url}}">
						<div class="card albums bg-transparent" style="border-radius:0;">
							
							<div class="imgtop">
								<img class="user-rating img-responsive rounded-0" src="{{asset('img/product_images/'.$img[0])}}" alt="NomeAtriz">
								</div>
							<div class="card-body" style="text-align: left;">
								<table>
								<tr><td>{{$e->name}} - <small> {{getStoreNameByStoreId($e->store_id)}}</small></td></tr>
									<tr><td> <button class="btn-assinar">Comprar por R$ {{ number_format($e->cost, 2, ',', '.')}}</button></td></tr>
								</table>
									
								</div>
							</div>
						</a>
					</div>
					@endforeach


</div>
		</div>
		@endif



   		</div>
   	</div>



@endsection
@section("footer")
@include("components.footer")
@endsection

