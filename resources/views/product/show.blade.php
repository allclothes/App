@extends('layouts.default')
@section("template")	
	<!-- Header section -->
	<header class="header-section header-normal">
		<div class="container-fluid">
			<!-- logo -->
			<div class="site-logo">
				<img src="{{ asset('img/logo.png') }}" alt="logo">
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-right">
				<a href="cart.html" class="card-bag"><img src="{{ asset('img/icons/bag.png') }}" alt=""><span>2</span></a>
				<a href="#" class="search"><img src="{{ asset('img/icons/search.png') }}" alt=""></a>
			</div>
			<!-- site menu -->
			<ul class="main-menu">
				<li><a href="index.html">Home</a></li>
				<li><a href="#">Woman</a></li>
				<li><a href="#">Man</a></li>
				<li><a href="#">LookBook</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="">Home</a> / 
				<a href="">Sales</a> / 
				<a href="">Bags</a> / 
				<span>Shoulder bag</span>
			</div>
			<img src="{{ asset('img/page-info-art.png') }}" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	@foreach ($product as $p)	
	<?php 
	$imgs = json_decode($p->image);
	?>
	<div class="page-area product-page spad">
		<div class="container">
			<div class="row" style="height: 50vh;">
				<div class="col-lg-6">
					<figure>
						<img class="product-big-img" src="{{ asset('img/product_images/'.$imgs[0]) }}" alt="">
					</figure>
					<div class="product-thumbs">
						<div class="product-thumbs-track">
							@foreach ($imgs as $img)
							<div class="pt" data-imgbigurl="{{ asset('img/product_images/'.$img) }}"><img src="{{ asset('img/product_images/'.$img) }}" alt=""></div>
								
							@endforeach
							</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product-content">
						<h2>{{$p->name}}</h2>
						<div class="pc-meta">
						<h4 class="price">R$ {{ number_format($p->cost, 2, ',', '.') }}</h4>
							<div class="review">
								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star is-fade"></i>
								</div>
								<span>(2 reviews)</span>
							</div>
						</div>
					<p>{{$p->description}}</p>
						{{-- <div class="color-choose">
							<span>Colors:</span>
							<div class="cs-item">
								<input type="radio" name="cs" id="black-color" checked>
								<label class="cs-black" for="black-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="blue-color">
								<label class="cs-blue" for="blue-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="yollow-color">
								<label class="cs-yollow" for="yollow-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="orange-color">
								<label class="cs-orange" for="orange-color"></label>
							</div>
						</div> --}}
						{{-- <div class="size-choose">
							<span>Size:</span>
							<div class="sc-item">
								<input type="radio" name="sc" id="l-size" checked>
								<label for="l-size">L</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xl-size">
								<label for="xl-size">XL</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xxl-size">
								<label for="xxl-size">XXL</label>
							</div>
						</div> --}}
						<a href="#" class="site-btn btn-line">ADD TO CART</a>
					</div>
				</div>
			</div>
			<div class="product-details">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
							</li>							
						</ul>
						<div class="tab-content">
							<!-- single tab content -->
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
							<p>{{$p->description}}</p></div>							
						</div>
					</div>
				</div>
			</div>


			@endforeach

			<div class="text-center rp-title">
				<h5>Related products</h5>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="{{ asset('img/products/1.jpg') }}" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{ asset('img/icons/eye.png') }}" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{ asset('img/icons/heart.png') }}" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>Long red Shirt</h6>
							<p>$39.90</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="{{ asset('img/products/2.jpg') }}" alt="">
							<div class="bache">NEW</div>
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{ asset('img/icons/eye.png') }}" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{ asset('img/icons/heart.png') }}" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>Hype grey shirt</h6>
							<p>$19.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="{{ asset('img/products/3.jpg') }}" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{ asset('img/icons/eye.png') }}" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{ asset('img/icons/heart.png') }}" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>long sleeve jacket</h6>
							<p>$59.90</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="{{ asset('img/products/4.jpg') }}" alt="">
							<div class="bache sale">SALE</div>
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{ asset('img/icons/eye.png') }}" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{ asset('img/icons/heart.png') }}" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>Denim men shirt</h6>
							<p>$32.20 <span>RRP 64.40</span></p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<!-- Page end -->


	<!-- Footer top section -->	
	<section class="footer-top-section home-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-8 col-sm-12">
					<div class="footer-widget about-widget">
						<img src="{{ asset('img/logo.png') }}" class="footer-logo" alt="">
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<div class="cards">
							<img src="{{ asset('img/cards/5.png') }}" alt="">
							<img src="{{ asset('img/cards/4.png') }}" alt="">
							<img src="{{ asset('img/cards/3.png') }}" alt="">
							<img src="{{ asset('img/cards/2.png') }}" alt="">
							<img src="{{ asset('img/cards/1.png') }}" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">usefull Links</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Sitemap</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Shipping & returns</h6>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Track Orders</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Shipping</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Contact</h6>
						<div class="text-box">
							<p>Your Company Ltd </p>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, </p>
							<p>+53 345 7953 32453</p>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer top section end -->	
@endsection