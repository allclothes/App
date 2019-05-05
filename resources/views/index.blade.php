	
    @extends("layouts.default")
    @section("title", 'Produtos')
    @section("template")

	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="{{asset ('img/bg.jpg') }}">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="hs-left"><img src="{{ asset('img/slider-img.png') }}" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">from $19.90</div>
						<h2><span>2018</span> <br>summer collection</h2>
						<a href="" class="site-btn">Shop NOW!</a>
					</div>	
				</div>
			</div>
			<div class="hs-item">
				<div class="hs-left"><img src="{{ asset('img/slider-img.png') }}" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">from $19.90</div>
						<h2><span>2018</span> <br>summer collection</h2>
						<a href="" class="site-btn">Shop NOW!</a>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->
    <div class="shopping-cart collapse" id="shoppingCart" >
            <div class="shopping-cart-header">
              <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
              <div class="shopping-cart-total">
                <span class="lighter-text">Total:</span>
                <span class="main-color-text">$2,229.97</span>
              </div>
            </div> <!--end shopping-cart-header -->
        
            <ul class="shopping-cart-items">
              <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
                <span class="item-name">Sony DSC-RX100M III</span>
                <span class="item-price">$849.99</span>
                <span class="item-quantity">Quantity: 01</span>
              </li>
        
              <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
                <span class="item-name">KS Automatic Mechanic...</span>
                <span class="item-price">$1,249.99</span>
                <span class="item-quantity">Quantity: 01</span>
              </li>
        
              <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
                <span class="item-name">Kindle, 6" Glare-Free To...</span>
                <span class="item-price">$129.99</span>
                <span class="item-quantity">Quantity: 01</span>
              </li>
            </ul>
        
            <a href="#" class="button">Checkout</a>
          </div> <!--end shopping-cart -->

	
	<!-- Intro section -->
	<section class="intro-section spad pb-0">
		<div class="section-title">
			<h2>pemium products</h2>
			<p>We recommend</p>
		</div>
		<div class="intro-slider">
			<ul class="slidee">
				<li>
					<div class="intro-item">
						<figure>
							<img src="{{ asset('img/intro/1.jpg') }}" alt="#">
						</figure>
						<div class="product-info">
							<h5>Pink Sunglasses</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
				<li>
					<div class="intro-item">
						<figure>
							<img src="{{ asset('img/intro/2.jpg') }}" alt="#">
						</figure>
						<div class="product-info">
							<h5>Black Nighty</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
				<li>
					<div class="intro-item">
						<figure>
							<img src="{{ asset('img/intro/3.jpg') }}" alt="#">
							<div class="bache">NEW</div>
						</figure>
						<div class="product-info">
							<h5>Yellow Sholder bag</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
				<li>
					<div class="intro-item">
						<figure>
							<img src="{{ asset('img/intro/4.jpg') }}" alt="#">
						</figure>
						<div class="product-info">
							<h5>Yellow Sunglasses</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
				<li>
					<div class="intro-item">
						<figure>
							<img src="{{ asset('img/intro/5.jpg') }}" alt="#">
						</figure>
						<div class="product-info">
							<h5>Black Sholder bag</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="container">
			<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	<!-- Featured section -->
	<div class="featured-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="featured-item">
						<img src="{{ asset('img/featured/featured-1.jpg') }}" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="featured-item mb-0">
						<img src="{{ asset('img/featured/featured-2.jpg') }}" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Featured section end -->


	<!-- Product section -->
	<section class="product-section spad">
		<div class="container">
			<ul class="product-filter controls">
				<li class="control" data-filter=".new">New arrivals</li>
				<li class="control" data-filter="all">Recommended</li>
				<li class="control" data-filter=".best">Best sellers</li>
			</ul>
			<div class="row" id="product-filter">
				<div class="mix col-lg-3 col-md-6 best">
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
				<div class="mix col-lg-3 col-md-6 new">
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
				<div class="mix col-lg-3 col-md-6 best">
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
				<div class="mix col-lg-3 col-md-6 new best">
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
				<div class="mix col-lg-3 col-md-6 best">
					<div class="product-item">
						<figure>
							<img src="{{ asset('img/products/5.jpg') }}" alt="">
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
				<div class="mix col-lg-3 col-md-6 new">
					<div class="product-item">
						<figure>
							<img src="{{ asset('img/products/6.jpg') }}" alt="">
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
				<div class="mix col-lg-3 col-md-6 best">
					<div class="product-item">
						<figure>
							<img src="{{ asset('img/products/7.jpg') }}" alt="">
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
				<div class="mix col-lg-3 col-md-6 best">
					<div class="product-item">
						<figure>
							<img src="{{ asset('img/products/8.jpg') }}" alt="">
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
	</section>
	<!-- Product section end -->


	<!-- Blog section -->	
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="featured-item">
						<img src="{{ asset('img/featured/featured-3.jpg') }}" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
				<div class="col-lg-7">
					<h4 class="bgs-title">from the blog</h4>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="{{ asset('img/blog-thumb/1.jpg') }}" alt="">
						</div>
						<div class="bi-content">
							<h5>10 tips to dress like a queen</h5>
							<div class="bi-meta">July 02, 2018   |   By maria deloreen</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="{{ asset('img/blog-thumb/2.jpg') }}" alt="">
						</div>
						<div class="bi-content">
							<h5>Fashion Outlet products</h5>
							<div class="bi-meta">July 02, 2018   |   By Jessica Smith</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="{{ asset('img/blog-thumb/3.jpg') }}" alt="">
						</div>
						<div class="bi-content">
							<h5>the little black dress just for you</h5>
							<div class="bi-meta">July 02, 2018   |   By maria deloreen</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->	


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
