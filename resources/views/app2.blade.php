<!DOCTYPE html><html class="ltr" dir="ltr" lang="en-US">

<head>
<title>{{ $title ?? ''}} - Build O</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">

<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
<link href="{{ url ('template/o/mentions-web/css/mentions.css')}}" rel="stylesheet" type ='' "text/css"/>
<link href="{{ url ('template/o/dynamic-data-mapping-form-renderer/css/main.css')}}" rel="stylesheet" type ='' "text/css"/>

<link class="lfr-css-file" href="{{ url ('template/o/sobatbangun-theme/css/aui3ed1.css')}}" id="liferayAUICSS" rel="stylesheet" type="text/css"/>
<!-- <link href="{{ url ('template/o/frontend-css-web/main47ca.css')}}" rel="stylesheet" type="text/css"/> -->
<link href="{{ url ('template/combo3868.css')}}" id="68460c61" rel="stylesheet" type="text/css"/>
<link class="lfr-css-file" href="{{ url ('template/o/sobatbangun-theme/css/maincustom.css')}}" id="liferayThemeCSS" rel="stylesheet" type="text/css"/>
<!-- <script type="text/javascript"></script> -->
<!-- <script src="{{ url ('template/o/js_loader_modulesd5c4?t=1602779250258')}}" type="text/javascript"></script> -->
<!-- <script src="{{ url ('template/o/js_bundle_config3221?t=1596992986391')}}" type="text/javascript"></script> -->
@livewireStyles
@livewireScripts


<script src="{{ url ('template/o/frontend-js-web/everything88a1.js')}}" type="text/javascript"></script>
<!-- <style type="text/css">
</style> -->
<!-- <link data-senna-track="permanent" href="{{ url ('template/combod537.css?browserId=other&amp;minifierType=css&amp;languageId=en_US&amp;b=7006&amp;t=1545962153015&amp;/o/product-navigation-simulation-theme-contributor/css/simulation_panel.css&amp;/o/product-navigation-product-menu-theme-contributor/product_navigation_product_menu.css&amp;/o/product-navigation-control-menu-theme-contributor/product_navigation_control_menu.css')}}" rel="stylesheet" type ='' "text/css"/> -->
<!-- <script data-senna-track="permanent" src="{{ url ('template/combo813f?browserId=other&amp;minifierType=js&amp;languageId=en_US&amp;b=7006&amp;t=1545962153015&amp;/o/product-navigation-control-menu-theme-contributor/product_navigation_control_menu.js')}}" type ='' "text/javascript"></script> -->
</head>
<style>
	.dropdown-item :hover {
		background-color: yellow;
	}	
	.bg-cs {
		background :#75640b;
		background-color: #75640b;
	}

 /* body .box-landing header.nav .logo { margin-left: 0 !important; } */
</style>


<style>
	.carousel-wrapper {
    width: 1000px;
    margin: auto;
    position: relative;
    text-align: center;
    font-family: sans-serif;
    }

    .owl-carousel .owl-nav {
    overflow: hidden;
    height: 0px;
    }

    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots .owl-dot:hover span {
    background: #fce784;
    }


    /* .owl-carousel .item {
    text-align: center;
    } */

    .owl-carousel .nav-button {
		/* height: 50px; */
		width: 40px;
		cursor: pointer;
		position: absolute;
		top: 110px !important;
    }

    .owl-carousel .owl-prev.disabled,
    .owl-carousel .owl-next.disabled {
		pointer-events: none;
		opacity: 0.25;
    }

    .owl-carousel .owl-prev {
    	left: -35px;
    }

    .owl-carousel .owl-next {
    	right: -35px;
    }

    .owl-theme .owl-nav [class*=owl-] {
		color: #0f0f0f;
		font-size: 39px;
		background: #fadc57;
		border-radius: 3px;
    }

    .owl-carousel .prev-carousel:hover {
    	background-position: 0px -53px;
    }

    .owl-carousel .next-carousel:hover {
    	background-position: -24px -53px;
    }

</style>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

<body class=" controls-visible yui3-skin-sam signed-out public-page site disable_editable user ">

<nav class="quick-access-nav" id="wgdh_quickAccessNav">
<h1 class="hide-accessible">Navigation</h1>
<ul>
	<li>
		<a href="#main-content">Skip to Content</a>
	</li>
</ul>
</nav>
<!-- body_top-ext.jsp -->
<div class="box-landing">
	<header class="nav ">
	<div class="container wrapper-landing">
		<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
			</nav> -->
		<button class="navbar-toggler" type="button"><i class="far fa-bars"></i></button>
		<div class="logo">
			<a href="{{ url ('/')}}"><img src="{{ url ('template/documents/Images/logo.png')}}" id="logo"></a>
		</div>
		<div class="boxNavigationAdmin" id="boxNavigationAdmin">
			<div class="portlet-boundary portlet-boundary_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_ portlet-static portlet-static-end portlet-decorate portlet-navigation " id="p_p_id_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_INSTANCE_LIXNnQFDBqic_">
				<span id="p_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_INSTANCE_LIXNnQFDBqic"></span>
				<section class="portlet" id="portlet_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_INSTANCE_LIXNnQFDBqic">
				<div class="portlet-content">
					<h2 class="portlet-title-text">Navigation Menu</h2>
					<div class=" portlet-content-container">
						<div class="portlet-body">
							<div id="navbar_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_INSTANCE_LIXNnQFDBqic">
								<ul aria-label='Site' pages" class="nav nav-pills navbar-site" role="menubar">
									<h1 class="hide-accessible">Navigation</h1>
									<li class="lfr-nav-item {{ (Request::path() == '/') ? 'active': ''}}" id="layout_137" role="presentation">
										<a aria-labelledby="layout_137" class="" href="{{ url ('/')}}" role="menuitem"><span>Home</span></a>
									</li>
									<!-- <li class="lfr-nav-item {{ (Request::path() == 'material') ? 'active': ''}}" id="layout_137" role="presentation">
										<a aria-labelledby="layout_137" class="" href="{{ url ('/material')}}" role="menuitem"><span>Kontruksi</span></a>
									</li> -->
									<li class="lfr-nav-item dropdown" id="layout_117" role="presentation">
										<!-- <a aria-labelledby="layout_117" aria-haspopup="true" class="dropdown-toggle" href="https://www.sobatbangun.com/our-service" role="menuitem" tabindex="-1" id="yui_patched_v3_18_1_1_1605715107004_77"> <span> Servis Kami <span class="lfr-nav-child-toggle"><i class="icon-caret-down fal fa-angle-down"></i></span></span> </a>  -->
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Service Kami
										</a>
										<ul aria-expanded="false" class="child-menu dropdown-menu" role="menu">
											<li> <a href="{{ url ('/catalogue/bangun_rumah')}}">Bangun rumah</a></li>
											<li> <a href="{{ url ('/catalogue/fix_repair')}}">Fix and Repair</a></li>
											<li> <a href="{{ url ('/catalogue/renovasi_rumah')}}">Renovasi Rumah</a></li>
											<!-- <li> <a href="{{ url ('/catalogue/smart-home')}}">Smart Home</a></li>
											<li> <a href="{{ url ('/catalogue/product')}}">Product</a></li> -->
										</ul>
									</li>
									<!-- <li class="lfr-nav-item {{ (Request::path() == 'product') ? 'active': ''}}" id="layout_137" role="presentation">
										<a aria-labelledby="layout_137" class="" href="{{ url ('/product')}}" role="menuitem"><span>Produk</span></a>
									</li> -->
									<li class="lfr-nav-item selected {{ (Request::path() == 'blog') ? 'active': ''}} " id="layout_7" aria-selected='true' role="presentation">
										<a aria-labelledby="layout_7" class="" href="{{ url ('blog')}}" role="menuitem"><span>Blog</span></a>
									</li>
									@if(!empty(auth()->user()))
										@if(!empty(auth()->user()->customers()->first()))

										<li class="lfr-nav-item dropdown" id="layout_117" role="presentation">
											<!-- <a aria-labelledby="layout_117" aria-haspopup="true" class="dropdown-toggle" href="https://www.sobatbangun.com/our-service" role="menuitem" tabindex="-1" id="yui_patched_v3_18_1_1_1605715107004_77"> <span> Servis Kami <span class="lfr-nav-child-toggle"><i class="icon-caret-down fal fa-angle-down"></i></span></span> </a>  -->
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												{{ auth()->user()->customers()->first()->full_name }}
											</a>
											<ul aria-expanded="false" class="child-menu dropdown-menu" role="menu">
												<li> <a href="{{ url ('/dasboard_customers')}}">My Dashboard</a></li>
												<li> <a href="{{ url ('/account_settings')}}">Account Setting</a></li>
												<li> <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
											</ul>
										</li> 
										@else
										<li class="lfr-nav-item selected" id="layout_7" aria-selected='true' role="presentation">
											<a aria-labelledby="layout_7" class="" href="{{ url ('dashboard')}}" role="menuitem"><span>Dashboard</span></a>
										</li>                           
										@endif

									@else
										<li class="lfr-nav-item">
											<a href="{{ url ('registration') }}"  class="btn btn-login btn-link btn btn-login btn-link" tabindex="-1">Daftar</a>
											<a href="{{ url ('login') }}"  class="btn btn-login btn-link btn-outline-primary" tabindex="-1" id="yui_patched_v3_18_1_1_1611683991599_93">Masuk</a>
										</li>
										<!-- <div class="btn-placeholder row">
											<div class="col-6">
												<a href="{{ url ('login') }}" class="btn btn-outline-primary btn-block">Masuk</a>
											</div>
											<div class="col-6">
												<a href="{{ url ('registration') }}" class="btn btn-primary btn-block">Daftar</a>
											</div>
										</div> -->

									@endif

									
								</ul>
							</div>
						</div>
					</div>
				</div>


				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
				</section>
			</div>
		</div>
		<div class="navbar-slide">
			<div class="img-placeholder">
				<img src="{{ url ('template/o/sobatbangun-theme/images/logo-color.png')}}" alt="">
				<div class="navbar-slide-close">
					<span class="icon-bar icon-bar-1"></span><span class="icon-bar icon-bar-2"></span><span class="icon-bar icon-bar-3"></span>
				</div>
			</div>
			<div class="content">
				<div class="boxNavigationAdminMobile" id="boxNavigationAdmin">
					<div class="portlet-boundary portlet-boundary_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_ portlet-static portlet-static-end portlet-decorate portlet-navigation " id="p_p_id_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_INSTANCE_LIXNnQFDBqic_">
						<span id="p_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_INSTANCE_LIXNnQFDBqic"></span><section class="portlet" id="portlet_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_INSTANCE_LIXNnQFDBqic">
						<div class="portlet-content">
							<h2 class="portlet-title-text">Navigation Menu</h2>
							<div class=" portlet-content-container">
								<div class="portlet-body">
									<div id="navbar_com_liferay_site_navigation_menu_web_portlet_SiteNavigationMenuPortlet_INSTANCE_LIXNnQFDBqic">
										<ul aria-label='Site' pages" class="nav nav-pills navbar-site" role="menubar">
											<h1 class="hide-accessible">Navigation</h1>
											<li class="lfr-nav-item" id="layout_137" role="presentation">
												<a aria-labelledby="layout_137" class="" href="{{ url ('/')}}" role="menuitem"><span>Home</span></a>
											</li>
											<li class="lfr-nav-item dropdown" id="layout_117" role="presentation">
												<a aria-labelledby="layout_117" aria-haspopup='true' class="dropdown-toggle" href='renovation.html' role="menuitem"><span> Our Service <span class="lfr-nav-child-toggle"><i class="icon-caret-down"></i></span></span></a>
												<ul aria-expanded="false" class="child-menu dropdown-menu" role="menu">
													<li class="" id="layout_118" role="presentation">
														<a aria-labelledby="layout_118" href="renovation.html" role="menuitem">Renovation</a>
													</li>
													<li class="" id="layout_120" role="presentation">
														<a aria-labelledby="layout_120" href="buy-design.html" role="menuitem">Buy Design</a>
													</li>
													<li class="" id="layout_121" role="presentation">
														<a aria-labelledby="layout_121" href="add-on.html" role="menuitem">Add On</a>
													</li>
													<li class="" id="layout_122" role="presentation">
														<a aria-labelledby="layout_122" href="belimaterial.html" role="menuitem">Buy Material</a>
													</li>
												</ul>
											</li>
											<li class="lfr-nav-item selected active" id="layout_7" aria-selected='true' role="presentation">
                                                    <a aria-labelledby="layout_7" class="" href="{{ url ('blog')}}" role="menuitem"><span>Blog</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </section>
                        </div>
                    </div>
					

                </div>
            </div>
        </div>
		</header>
		@yield('product_content')
		
        <div class="columns-1" id="main-content" role="main">
            <div class="portlet-layout row">
                <div class="col-md-12 portlet-column portlet-column-only" id="column-1">
                    <div class="portlet-dropzone portlet-column-content portlet-column-content-only" id="layout-column_column-1">
                        <div class="portlet-boundary portlet-boundary_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_ portlet-static portlet-static-end portlet-decorate portlet-asset-publisher " id="p_p_id_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_MQbKfO7N8JiZ_">
                            <span id="p_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_MQbKfO7N8JiZ"></span><section class="portlet" id="portlet_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_MQbKfO7N8JiZ">
                            <div class="portlet-content">
                                <h2 class="portlet-title-text">Asset Publisher</h2>
                                <div class=" portlet-content-container">
                                    <div class="portlet-body">
                                    @yield('content')
                                    </div>
                                </div>
                            </div>
                            </section>
                        </div>
					</div>
					@yield('home')
                </div>
            </div>
        </div>
        <form action="#" id="hrefFm" method="post" name="hrefFm">
            <span></span>
        </form>
	<footer class="">
	<div class="footer-top">
		<div class="container wrapper-landing">
			<div class="row boxLayanan">
				<div class="col-md-5">
					<img src="{{ url ('template//documents/Images/logo.png')}}" alt="" class="img-fluid w-200px mb-3">
					<p class="desc-footer">
						Build O adalah platform digital dari SIG yang bergerak dengan misi mengembangkan proses pembangunan dan renovasi rumah secara lebih baik serta berkelanjutan.
					</p>
				</div>
				<div class="col-md-3">
					<h3><a href="faq.html" class="text-white">FAQ</a></h3>
				</div>
				<div class="col-md-4 footer-media">
					<h3>Hubungi Kami</h3>
					<div class="footer-social">
						<a href="https://www.facebook.com/SobatBangun" class="d-inline-block"><i class="fab fa-facebook-f"></i></a><a href="https://www.youtube.com/channel/UCEw_LBwuBBfxZIG9OaQj5_w" class="d-inline-block"><i class="fab fa-youtube"></i></a><a href="https://www.instagram.com/sobatbangun/" class="d-inline-block"><i class="fab fa-instagram"></i></a>
					</div>
					<a href="mailto:tanya@sobatbangun.com" target="_blank" class="call-hotline"><span><i class="fal fa-envelope"></i></span> tanya@sobatbangun.com </a>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<p class="footer-copyright mb-0">
			© PT SINERGI INFORMATIKA SEMEN INDONESIA. All rights reserved.
		</p>
	</div>
	</footer>
</div>
<div class="audit_trail" style="opacity: 0;visibility: hidden;display: none;">
	<div class="portlet-boundary portlet-boundary_Holcim_Audit_Trail_Logger_Portlet_ portlet-static portlet-static-end portlet-decorate " id="p_p_id_Holcim_Audit_Trail_Logger_Portlet_INSTANCE_BlGKSV5u1EJI_">
		<span id="p_Holcim_Audit_Trail_Logger_Portlet_INSTANCE_BlGKSV5u1EJI"></span><section class="portlet" id="portlet_Holcim_Audit_Trail_Logger_Portlet_INSTANCE_BlGKSV5u1EJI">
		<div class="portlet-content">
			<h2 class="portlet-title-text">Audit Trail Logger Portlet</h2>
			<div class=" portlet-content-container">
				<div class="portlet-body">
					<p>
						 This is audit trail logger
					</p>
				</div>
			</div>
		</div>
		</section>
	</div>
</div>

</body>

<script type="text/javascript" src="{{ url ('template/o/sobatbangun-theme/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ url ('template/o/sobatbangun-theme/js/TweenMax.min.js')}}"></script>
<script type="text/javascript" src="{{ url ('template/o/sobatbangun-theme/js/viewportchecker.min.js')}}"></script>
<script type="text/javascript" src="{{ url ('template/o/sobatbangun-theme/js/jquery.fancybox.min.js')}}"></script>
<script type="text/javascript" src="{{ url ('template/o/sobatbangun-theme/js/before-after.min.js')}}"></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->



<script type="text/javascript">function dropDownLang(){$(document).click(function(){$(".boxActiveLang").removeClass("active");$(".boxDropLanguage \x3e .nav-lang").hide()});$(".boxActiveLang").click(function(a){$(this);$(this).hasClass("active")?($(".boxDropLanguage \x3e .nav-lang").hide(),$(this).removeClass("active")):($(".boxDropLanguage \x3e .nav-lang").show(),$(this).addClass("active"));a.stopPropagation()})}dropDownLang();function goBack(){window.history.back()};</script>
<script type="text/javascript">$(document).ready(function(){$(".vp-fadeinleft").viewportChecker({classToAdd:"visible animated fadeInLeft",offset:100});$(".vp-fadeinright").viewportChecker({classToAdd:"visible animated fadeInRight",offset:100});$(".vp-fadein").viewportChecker({classToAdd:"visible animated fadeIn",offset:100});$(".vp-fadeindown").viewportChecker({classToAdd:"visible animated fadeInDown",offset:100});$(".vp-fadeinup").viewportChecker({classToAdd:"visible animated fadeInUp",offset:100});$(".vp-slideinleft").viewportChecker({classToAdd:"visible animated slideInLeft",
offset:100});$(".vp-slideinright").viewportChecker({classToAdd:"visible animated slideInRight",offset:100});$(".vp-zoomin").viewportChecker({classToAdd:"visible animated zoomIn",offset:100});$(".vp-zoomindown").viewportChecker({classToAdd:"visible animated zoomInDown",offset:100});$(".vp-rotatein").viewportChecker({classToAdd:"visible animated rotateIn",offset:100});$(".vp-slideindown").viewportChecker({classToAdd:"visible animated slideInDown",offset:100});$(".boxNavigationAdmin .nav.nav-pills.navbar-site li.lfr-nav-item.dropdown .lfr-nav-child-toggle i").addClass("icon-caret-down");
$(".boxNavigationAdmin .nav.nav-pills.navbar-site li.lfr-nav-item.dropdown .lfr-nav-child-toggle i").addClass("fal fa-angle-down");$(".nav-tabs \x3e li a[title]").tooltip();$('a[data-toggle\x3d"tab"]').on("show.bs.tab",function(a){if($(a.target).parent().hasClass("disabled"))return!1});$(".next-step").click(function(a){a=$(".wizard .nav-tabs li.active");a.next().removeClass("disabled");nextTab(a)});$(".prev-step").click(function(a){a=$(".wizard .nav-tabs li.active");prevTab(a)});$("#container-select").owlCarousel({items:6,
nav:!0,navText:["\x3cimg src\x3d'https://www.sobatbangun.com/o/sobatbangun-theme/images/ic_previous_gray.png'\x3e","\x3cimg src\x3d'https://www.sobatbangun.com/o/sobatbangun-theme/images/ic_next_gray.png'\x3e"],responsive:{0:{margin:0,items:4},768:{margin:20,items:6}}});$(".project-home").owlCarousel({loop:!1,margin:7.5,dots:!1,responsive:{0:{items:1},768:{margin:20,items:3}}});$(".container-divisi").owlCarousel({loop:!1,margin:7.5,dots:!1,responsive:{0:{items:2},768:{margin:20,items:3},990:{margin:20,
items:5}}});$(".carousel-specific").owlCarousel({loop:!1,margin:30,dots:!0,fade:!0,responsive:{0:{items:1},768:{margin:20,items:1},990:{margin:20,items:1}}});$(".carousel-design-arch-fab").owlCarousel({loop:!1,margin:20,dots:!1,responsive:{0:{items:1.25,loop:!0},736:{margin:20,items:2.25},1024:{margin:20,items:3}}});$(".prev-arrow").click(function(){$(".owl-prev").click()});$(".next-arrow").click(function(){$(".owl-next").click()});$(".owl-products-slider").owlCarousel({loop:!1,margin:30,dots:!0,
responsive:{0:{items:1,dots:!0},600:{items:3,dots:!0},1E3:{items:4}}});$(".owl-benefit").owlCarousel({loop:!1,margin:7.5,dots:!1,responsive:{0:{loop:!0,dots:!0,items:1},768:{margin:20,items:4}}});$(".carousel-portfolio").owlCarousel({loop:!1,margin:20,dots:!0,responsive:{0:{items:1,loop:!0,dots:!0},768:{margin:20,items:1}}});setTimeout(function(){$(".carousel-schema").owlCarousel({loop:!1,margin:0,dots:!1,navText:["\x3ci class\x3d'fa fa-chevron-left'\x3e\x3c/i\x3e","\x3ci class\x3d'fa fa-chevron-right'\x3e\x3c/i\x3e"],
responsive:{0:{items:1,loop:!0},736:{margin:0,items:2.25},1024:{margin:0,items:2}}});$(".owl-project").owlCarousel({loop:!1,margin:7.5,dots:!1,nav:!0,navText:["\x3ci class\x3d'fa fa-long-arrow-left'\x3e\x3c/i\x3e","\x3ci class\x3d'fa fa-long-arrow-right'\x3e\x3c/i\x3e"],responsive:{0:{loop:!1,items:1},768:{margin:20,items:1}}})},1E3);$(".carousel-design-arch").owlCarousel({loop:!0,margin:20,dots:!1,nav:!0,responsive:{0:{items:1.5,loop:!0,nav:!1},768:{margin:20,items:4,nav:!0}}});$(".carousel-square").owlCarousel({dots:!0,
lazyLoad:!0,mouseDrag:!0,responsive:{0:{margin:15,loop:!0,dots:!0,items:1},768:{margin:15,dots:!0,items:3},1024:{margin:15,dots:!1,items:2,dotsEach:1},1280:{margin:15,dots:!1,items:3,dotsEach:1}}});$(".carousel-cover").owlCarousel({loop:!1,autoplay:!1,margin:0,dots:!0,responsive:{0:{items:1},768:{items:1}}});$(".carousel-artikel").owlCarousel({dots:!0,lazyLoad:!0,mouseDrag:!0,loop:!1,autoWidth:!0,dots:!1,responsive:{0:{margin:15,items:1.5},768:{margin:15,items:2.5},1024:{margin:15,items:2,dotsEach:1},
1280:{margin:15,items:2,dotsEach:1}}});$(".c-2-md-1-sm").owlCarousel({dots:!1,lazyLoad:!0,mouseDrag:!0,loop:!1,responsive:{0:{margin:15,items:1.25,loop:!0},768:{margin:15,items:2},1024:{margin:15,items:2,dotsEach:1},1280:{margin:15,items:2,dotsEach:1}}});$(".owl-produk").owlCarousel({loop:!1,margin:20,dots:!1,responsive:{0:{items:2.1,loop:!1},768:{loop:!1,items:2.5},1024:{loop:!1,items:3}}});$(".c-3-md-2-sm").owlCarousel({dots:!1,lazyLoad:!0,mouseDrag:!0,loop:!1,responsive:{0:{margin:10,items:2,loop:!0},
768:{margin:15,items:3},1024:{margin:15,items:3,dotsEach:1},1280:{margin:15,items:3,dotsEach:1}}});$(".c-3-md-1-sm").owlCarousel({dots:!1,lazyLoad:!0,mouseDrag:!0,loop:!1,responsive:{0:{margin:15,items:1.25,loop:!0},768:{margin:15,items:3},1024:{margin:15,items:3,dotsEach:1},1280:{margin:15,items:3,dotsEach:1}}});$(".ba-slider").beforeAfter();$(".box-sketch").click(function(){$(".box-sketch").removeClass("active");$(this).addClass("active");$(".select-floor").css("opacity","0");$(this).parents(".box-plan").find(".select-floor").css("opacity",
"1")});$(".select-floor .btn-select").click(function(){$(this).parent().find(".btn-select").removeClass("active");$(this).addClass("active");var a=$(this).find("img").attr("src");$(this).parents(".box-plan").find(".box-sketch img").attr("src",a)});$("#menu_open").click(function(a){a.stopPropagation();a=$("#boxMenuUtama");$(this).hasClass("active")?(TweenMax.from($(a),0.3,{autoAlpha:1,opacity:1}),TweenMax.to($(a),0.5,{autoAlpha:0,opacity:0,ease:Power2.easeInOut}),$(this).removeClass("active")):(TweenMax.from($(a),
0.3,{autoAlpha:0,opacity:0}),TweenMax.to($(a),0.5,{autoAlpha:1,opacity:1,ease:Power2.easeInOut}),$(this).addClass("active"))});$("body").click(function(){var a=$("#boxMenuUtama");$(this).find("#menu_open").hasClass("active")&&(TweenMax.from($(a),0.3,{autoAlpha:1,opacity:1}),TweenMax.to($(a),0.5,{autoAlpha:0,opacity:0,ease:Power2.easeInOut}),$(this).find("#menu_open").removeClass("active"))});$(".navbar-toggler").click(function(){$(".navbar-slide").css("left","0")});$(".navbar-slide-close").click(function(){$(".navbar-slide").css("left",
"100%")});$("body").removeClass("open");$(".sidenav-menu-slider").removeClass("open");$(".sidenav-toggler").removeClass("active").removeClass("open");$(".nav-lang .in-ID").text("ID");$(".boxNavigationAdminMobile").find(".dropdown-toggle").attr("href","javascript:void(0)");$(".value-filter").click(function(){$(".select-filter").slideToggle()});$(".select-filter li").click(function(){$(".value-filter").html($(this).text()+'\x3ci class\x3d"fas fa-chevron-down"\x3e\x3c/i\x3e');$(".select-filter li").removeClass("selected");
$(this).addClass("selected");$(".select-filter").slideToggle()});$("#filterResposive").click(function(){$(".collapse_").toggleClass("active")});$("#filterApply").click(function(){$(".collapse_").removeClass("active")});$(".navbar-slide .lfr-nav-item.dropdown").click(function(){$(this).find(".child-menu").slideToggle()});var b=RegExp(window.location.pathname.replace(/\/$/,"")+"$");$(".boxMenuUtama .lfr-nav-item a").each(function(){b.test(this.href.replace(/\/$/,""))&&$(this).addClass("active")});$(window).scroll(function(a){50<=
$(window).scrollTop()?($(".is-home header").removeClass("nav-transparent"),$(".is-home #logo").attr("src","../o/sobatbangun-theme/images/logo-color.png"),$(".is-home .nav-lang").removeClass("nav-lang-dark"),$("header").addClass("w-shadow")):($(".is-home header").addClass("nav-transparent"),$(".is-home #logo").attr("src","../documents/Images/logo.png"),$(".is-home .nav-lang").addClass("nav-lang-dark"),$("header").removeClass("w-shadow"))});
$(document).on("click",".scroll-hint",function(a){a.preventDefault();$("html, body").animate({scrollTop:$($.attr(this,"href")).offset().top},500)});$("a.smooth-scroll").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var a=$(this.hash),a=a.length?a:$("[name\x3d"+this.hash.slice(1)+"]");if(a.length)return $("html, body").animate({scrollTop:a.offset().top-120},800),!1}})});
$(document).ready(function(){var b=function(a,c,d){var e=a.outerHeight(),f=c.offset().top-70;d.scrollTop()>=f?(c.height(e),a.addClass("is-sticky")):(a.removeClass("is-sticky"),c.height("auto"))};$('[data-toggle\x3d"sticky-onscroll"]').each(function(){var a=$(this),c=$("\x3cdiv\x3e").addClass("sticky-wrapper");a.before(c);a.addClass("sticky");$(window).on("scroll.sticky-onscroll resize.sticky-onscroll",function(){b(a,c,$(this))});b(a,c,$(window))})});$(document).on("scroll",onScroll);
function onScroll(b){var a=$(document).scrollTop();$(".nav-scroll-indicator").each(function(){var c=$(this),d=$(c.attr("href"));d.position().top+500<=a&&d.position().top+d.height()+500>a?c.addClass("active"):c.removeClass("active")})}
function showPassword(){var b=document.getElementById("password");"password"===b.type?(b.type="text",$("#show-password").attr("src","../o/sobatbangun-theme/images/icons/icon_hide.png")):(b.type="password",$("#show-password").attr("src","../o/sobatbangun-theme/images/icons/icon_show.png"))}
function showRetypePassword(){var b=document.getElementById("retypePassword");"password"===b.type?(b.type="text",$("#show-retype-password").attr("src","../o/sobatbangun-theme/images/icons/icon_hide.png")):(b.type="password",$("#show-retype-password").attr("src","../o/sobatbangun-theme/images/icons/icon_show.png"))}function nextTab(b){$(b).next().find('a[data-toggle\x3d"tab"]').click()}
function prevTab(b){$(b).prev().find('a[data-toggle\x3d"tab"]').click()};</script>

@yield('js')
</html>