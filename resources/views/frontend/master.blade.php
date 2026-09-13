<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content=""/>
<!-- Document Title -->
<title>@yield('page-title') | Gateway Books</title>

<!-- StyleSheets -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/transition.css') }}">

<!-- Mini Cart Styles -->
<style>
	/* aligned to the theme's .topbar .social-icons (28px icons, -2px top margin) */
	.mini-cart{position:relative;float:right;height:28px;line-height:28px;margin:-2px 25px 0 10px;
		padding-bottom:15px;margin-bottom:-15px;}
	.mini-cart > a.mini-cart-btn{position:relative;display:block;color:#fff;font-size:18px;line-height:28px;text-decoration:none;}
	.mini-cart > a.mini-cart-btn:hover,
	.mini-cart > a.mini-cart-btn:focus{color:#fff;}
	.mini-cart .cart-count{position:absolute;top:-2px;right:-10px;height:16px;width:16px;
		border-radius:100%;background:#e74c3c;color:#fff;border:1px solid #1e293d;
		font-size:10px;line-height:14px;text-align:center;}

	/* the panel: hidden by default, shown on hover */
	.mini-cart-panel{
		position:absolute;top:100%;right:0;z-index:9999;
		width:320px;background:#fff;border:1px solid #e5e5e5;
		box-shadow:0 4px 12px rgba(0,0,0,.15);
		padding:12px;text-align:left;
		visibility:hidden;opacity:0;transition:opacity .2s ease;
	}
	.mini-cart:hover .mini-cart-panel{visibility:visible;opacity:1;}

	.mini-cart-panel ul{list-style:none;margin:0;padding:0;max-height:260px;overflow-y:auto;}
	.mini-cart-panel ul li{border-bottom:1px solid #f0f0f0;padding:8px 0;overflow:hidden;}
	.mini-cart-panel ul li img{width:40px;height:55px;object-fit:cover;float:left;margin-right:10px;}
	.mini-cart-panel .mc-name{display:block;color:#333;font-size:13px;font-weight:600;line-height:1.3;}
	.mini-cart-panel .mc-meta{display:block;color:#888;font-size:12px;}
	.mini-cart-panel .mc-remove{float:right;color:#e74c3c;font-size:14px;text-decoration:none;line-height:1;}
	.mini-cart-panel .mc-empty{color:#999;font-size:13px;text-align:center;padding:18px 0;margin:0;}
	.mini-cart-panel .mc-total{border-top:1px solid #ddd;margin-top:8px;padding-top:8px;color:#333;font-size:14px;overflow:hidden;}
	.mini-cart-panel .mc-total strong{float:right;}
	.mini-cart-panel .mc-actions{margin-top:10px;}

	/* Add To Cart button on the book cards */
	.s-product .btn-cart{display:inline-block;margin:10px 0 0;font-size:11px;text-transform:uppercase;}
	.s-product .btn-cart i{margin:0 4px 0 0;}

	/* ---- Checkout page ---- */
	.checkout-box{background:#fff;border:1px solid #e5e5e5;padding:20px;margin:0 0 25px;}
	.checkout-box h4{margin:0 0 20px;padding:0 0 10px;border-bottom:1px solid #eee;font-size:16px;color:#333;}
	/* scoped to form-group so it never touches the payment radio labels */
	.checkout-box .form-group label{font-size:12px;color:#666;font-weight:600;text-transform:uppercase;margin:0 0 6px;}
	.checkout-box .form-control{border-radius:0;box-shadow:none;height:42px;line-height:42px;padding:0 12px;color:#333;}
	.checkout-box textarea.form-control{height:auto;line-height:1.5;padding:10px 12px;}

	.pay-option{display:block;position:relative;border:1px solid #ddd;background:#fff;
		padding:14px 15px 14px 46px;margin:0 0 10px;cursor:pointer;
		font-weight:400;text-transform:none;transition:border-color .2s;}
	.pay-option:hover{border-color:#bbb;}
	.pay-option:has(input:checked){border-color:#333;}

	/* the theme styles bare `input` as a 48px full-width box - undo all of it */
	.pay-option input[type="radio"]{
		position:absolute;left:17px;top:19px;
		width:16px;height:16px;min-height:0;line-height:normal;
		margin:0;padding:0;border:0;background:none;box-shadow:none;}

	.pay-option .pay-icon{float:right;color:#ccc;font-size:18px;margin:2px 0 0 10px;}
	.pay-option .pay-title{display:block;color:#333;font-size:14px;font-weight:600;line-height:1.3;}
	.pay-option .pay-desc{display:block;color:#999;font-size:12px;line-height:1.4;margin:2px 0 0;}

	.card-box{border:1px solid #ddd;background:#fafafa;padding:14px;margin:5px 0 0;}
	.card-placeholder{color:#aaa;font-size:13px;}
	.card-note{color:#999;font-size:12px;margin:10px 0 0;}

	.order-summary ul{list-style:none;margin:0;padding:0;}
	.order-summary ul li{border-bottom:1px solid #f0f0f0;padding:12px 0;overflow:hidden;}
	.order-summary ul li img{width:45px;height:62px;object-fit:cover;float:left;margin-right:12px;}
	.order-summary .co-name{display:block;color:#333;font-size:13px;font-weight:600;}
	.order-summary .co-meta{display:block;color:#999;font-size:12px;}
	.order-summary .co-sub{float:right;color:#333;font-size:13px;font-weight:600;}
	.order-summary .co-total{border-top:2px solid #333;margin-top:10px;padding-top:12px;
		font-size:15px;color:#333;overflow:hidden;}
	.order-summary .co-total strong{float:right;}
	.order-summary .btn-pay{margin-top:18px;border-radius:0;padding:12px;text-transform:uppercase;font-weight:bold;}
	.order-summary .btn-continue{display:block;text-align:center;margin-top:12px;color:#999;font-size:12px;}

	/* ---- Thank you page ---- */
	.thankyou-box{background:#fff;border:1px solid #e5e5e5;padding:40px;text-align:center;}
	.thankyou-icon{display:inline-block;height:70px;width:70px;line-height:70px;border-radius:100%;
		background:#27ae60;color:#fff;font-size:30px;margin:0 0 20px;}
	.thankyou-box h3{margin:0 0 10px;color:#333;}
	.thankyou-box > p{color:#999;margin:0 0 25px;}
	.thankyou-meta{border-top:1px solid #eee;border-bottom:1px solid #eee;padding:18px 0;margin:0 0 20px;}
	.thankyou-meta .ty-label{display:block;color:#999;font-size:11px;text-transform:uppercase;margin:0 0 4px;}
	.thankyou-meta strong{color:#333;font-size:15px;}
	.thankyou-meta .ty-paid{color:#27ae60;}
	.thankyou-items{list-style:none;margin:0 0 25px;padding:0;text-align:left;}
	.thankyou-items li{border-bottom:1px solid #f5f5f5;padding:10px 0;overflow:hidden;}
	.thankyou-items .ty-name{color:#333;font-size:13px;font-weight:600;}
	.thankyou-items .ty-qty{color:#999;font-size:12px;margin-left:8px;}
	.thankyou-items .ty-sub{float:right;color:#333;font-size:13px;font-weight:600;}
</style>

<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>

<!-- JavaScripts -->
<script src="{{ asset('assets/js/vendor/modernizr.js') }}"></script>
</head>
<body>

<!-- Preloader -->
<div id="status">
	<div id="preloader">
		<div class="preloader position-center-center">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>
<!-- Preloader -->

<!-- Wrapper -->
<div class="wrapper push-wrapper">
	<!-- Header -->
	<header id="header">
		<!-- Top Bar -->
		<div class="topbar">
			<div class="container">

				<!-- Mini Cart -->
				<div class="mini-cart pull-right">
					<a href="#" class="mini-cart-btn">
						<i class="fa fa-shopping-basket"></i>
						<span class="cart-count" id="cart-count">3</span>
					</a>

					<div class="mini-cart-panel">
						<ul id="cart-items">
							{{-- DUMMY ITEMS - delete these once the JS renders the list --}}
							<li>
								<a href="#" class="mc-remove">&times;</a>
								<img src="/uploads/no-img.png" alt="">
								<span class="mc-name">The Great Gatsby</span>
								<span class="mc-meta">2 x Rs/ 1200</span>
							</li>
							<li>
								<a href="#" class="mc-remove">&times;</a>
								<img src="/uploads/no-img.png" alt="">
								<span class="mc-name">Sapiens</span>
								<span class="mc-meta">1 x Rs/ 850</span>
							</li>
							{{-- END DUMMY ITEMS --}}
						</ul>

						<div class="mc-total">
							Total <strong>Rs/ <span id="cart-total">3250</span></strong>
						</div>

						<div class="mc-actions">
							<a href="#" class="btn btn-danger btn-xs">Clear</a>
							<a href="" class="btn btn-primary btn-xs pull-right">Checkout</a>
						</div>
					</div>
				</div>
				<!-- Mini Cart -->

				<!-- Social Icons -->
				<div class="social-icons pull-right">
					<ul>
						<li><a class="fa fa-facebook" href="#"></a></li>	
						<li><a class="fa fa-twitter" href="#"></a></li>	
						<li><a class="fa fa-google-plus" href="#"></a></li>	
					</ul>
				</div>
				<!-- Social Icons -->
			</div>
		</div>
		<!-- Top Bar -->

		<!-- Nav -->
		<nav class="nav-holder style-1">
			<div class="container">
				<div class="mega-dropdown-wrapper">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html"><img src="{{ asset('assets/images/logo-1.png') }}" alt=""></a>
					</div>
					<!-- Logo -->
					<!-- Search bar -->
					<div class="search-bar">
						<a href="#"><i class="fa fa-search"></i></a>
					</div>
					<!-- Search bar -->
					<!-- Responsive Button -->
					<div class="responsive-btn">
						<a href="#menu" class="menu-link circle-btn"><i class="fa fa-bars"></i></a>
					</div>
					<!-- Responsive Button -->
					<!-- Navigation -->
					<div class="navigation">
						<ul>
							<li class="{{ Request::is('/') ? 'active' : null }}"><a href="{{ Route('home') }}"><i class="fa fa-home"></i>Home</a></li>
							<li class="{{ Request::is('about') ? 'active' : null }}"><a href="{{ Route('about') }}"><i class="fa fa-files-o"></i>About</a></li>
							<li class="{{ Request::is('gallery') ? 'active' : null }}"><a href="{{ Route('gallery') }}"><i class="fa fa-files-o"></i>gallery</a></li>
							<li class="{{ Request::is('author') ? 'active' : null }}"><a href="{{ Route('author') }}"><i class="fa fa-file-text"></i>author</a></li>
							<li class="{{ Request::is('contact') ? 'active' : null }}"><a href="{{ Route('contact') }}"><i class="fa fa-fax"></i>contact</a></li>
						</ul>
					</div>				
					<!-- Navigation -->
				</div>
			</div>
		</nav>
		<!-- Nav -->
	</header>
	<!-- Header -->

	<!-- BEGIN MAIN CONTENT -->
	@yield('main-content') 
	<!-- END MAIN CONTENT -->

	<!-- Footer -->
	<footer id="footer"> 
	    <!-- Footer columns -->
	    <div class="footer-columns">
	    	<div class="container">

	    		<!-- Columns Row -->
	    		<div class="row">
	    			
		    		<!-- Footer Column -->
		    		<div class="col-lg-4 col-sm-4">
		    			<div class="footer-column logo-column">
		    				<a href="index-1.html"><img src="{{ asset('assets/images/logo-2.png') }}" alt=""></a>
		    				<p></p>
		    				<ul class="address-list">
		    					<li><i class="fa fa-home"></i>Off#91, Falak City Tower, Bolton Market Karachi.</li>
		    					<li><i class="fa fa-phone"></i>+92 322 3411811</li>
		    					<li><i class="fa fa-envelope"></i>ayzeetech@gmail.com</li>
		    				</ul>
		    			</div>
		    		</div>
		    		<!-- Footer Column -->

		    		<!-- Footer Column -->
		    		<div class="col-lg-4 col-sm-4">
		    			<div class="footer-column footer-links">
		    				<h4>Information</h4>
		    				<ul>
		    					<li><a href="#">Home</a></li>
		    					<li><a href="#">About</a></li>
		    					<li><a href="#">Gallery</a></li>
		    					<li><a href="#">blog</a></li>
		    					<li><a href="#">Author</a></li>
		    					<li><a href="#">contact</a></li>
		    				</ul>
		    			</div>
		    		</div>
		    		<!-- Footer Column -->

						<!-- Footer Column -->
						<div class="col-lg-4 col-sm-6">
							<div class="footer-column newsletter">
								<h4>Weekly Newsletter</h4>
								<p>Get our awesome releases and latest updates with exclusive news and offers in your inbox.</p>
								<form class="newsletter-input">
									<i class="fa fa-envelope-o"></i>
									<input class="form-control.newsletter" type="text" placeholder="Enter Your Email">
									<button>SUBSCRIBE</button>
								</form>
								<p>We're on Social Networks. Follow us &amp; get in touch!</p>
								<ul class="social-icons">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
									<li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- Footer Column -->

	    		</div>
	    		<!-- Columns Row -->

	    	</div>
	    </div>
	    <!-- Footer columns -->
	    
	    <!-- Sub Footer -->
	   	<div class="sub-foorer">
	   		<div class="container">
	   			<div class="row">
		   			<div class="col-sm-6">
		   				<p>Copyright <i class="fa fa-copyright"></i> 2019-2020 <span class="theme-color">Al-Fateem Academy</span> All Rights Reserved.</p>
		   			</div>
		   			<div class="col-sm-6">
		   				<a class="back-top" href="#">Back to Top<i class="fa fa-caret-up"></i></a>
		   			</div>
	   			</div>
	   		</div>
	   	</div>
	    <!-- Sub Footer -->
	</footer>
	<!-- Footer -->

</div>
<!-- Wrapper -->

<!-- Java Script -->

<script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>        
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{ asset('assets/js/gmap3.min.js') }}"></script>					
<script src="{{ asset('assets/js/datepicker.js') }}"></script>					
<script src="{{ asset('assets/js/contact-form.js') }}"></script>					
<script src="{{ asset('assets/js/bigslide.js') }}"></script>							
<script src="{{ asset('assets/js/3d-book-showcase.js') }}"></script>					
<script src="{{ asset('assets/js/turn.js') }}"></script>							
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>								
<script src="{{ asset('assets/js/mcustom-scrollbar.js') }}"></script>					
<script src="{{ asset('assets/js/timeliner.js') }}"></script>					
<script src="{{ asset('assets/js/parallax.js') }}"></script>			   	 
<script src="{{ asset('assets/js/countdown.js') }}"></script>	
<script src="{{ asset('assets/js/countTo.js') }}"></script>		
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>	
<script src="{{ asset('assets/js/bxslider.js') }}"></script>	
<script src="{{ asset('assets/js/appear.js') }}"></script>		 		
<script src="{{ asset('assets/js/sticky.js') }}"></script>			 		
<script src="{{ asset('assets/js/prettyPhoto.js') }}"></script>			
<script src="{{ asset('assets/js/isotope.pkgd.js') }}"></script>					 
<script src="{{ asset('assets/js/wow-min.js') }}"></script>			
<script src="{{ asset('assets/js/classie.js') }}"></script>					
<script src="{{ asset('assets/js/main.js') }}"></script>	
<script src="{{ asset('assets/js/myscript.js') }}"></script>	
	

</body>
</html