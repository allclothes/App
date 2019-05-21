<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>A'L Clothes - @yield('title')</title>
	<meta charset="UTF-8">
	<meta name="description" content="The Plaza eCommerce Template">
	<meta name="keywords" content="plaza, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="{{ asset('img/favicon.ico') }} " rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
	
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
     {{-- <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css') }}"/> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css" integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>



	
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
	<![endif]-->
    <script>
            $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
        </script>
</head>
<body>

	@if(Session::has('error') || Session::has('success'))
		<div aria-live="polite" aria-atomic="true" style="position: relative;">
				<!-- Position it -->
				<div style="position: fixed; top: 0;right:0;margin-right:50px;margin-top: 20px;z-index:99999;">
			
					<!-- Then put toasts within -->
					<div class="toast" role="alert" id="toastService" aria-live="assertive" aria-atomic="true" data-autohide="false">
						<div class="toast-header">
							<img src="{{asset('img/logo-phone.png')}}" class="rounded mr-2" alt="...">
							<strong class="mr-auto">{{ session::has('error') ? 'Ops!' : 'Success!' }}</strong>
							<small class="text-muted"></small>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="toast-body">
							{{ session::has('error') ? Session::get('error') : Session::get('success') }}
						</div>
					</div>
			
				</div>
			</div>
	@endif

			
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>


	
    @include('includes.header')
    
    @yield('template')

		<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<p class="copyright">
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="#">A'L Clothes</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
		</div>
	</footer>
	<!-- Footer section end -->


    <!--====== Javascripts & Jquery ======-->	

@if(Session::has('error') || Session::has('success'))
<script>
    $(document).ready(function(){
         $('#toastService').toast('show')

    })
</script>
@endif

	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/mixitup.min.js') }}"></script>
	<script src="{{ asset('js/sly.min.js') }}"></script>
	<script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>