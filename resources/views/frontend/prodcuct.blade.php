@extends('app2')
@section('product_content')
<div class="columns-1" id="main-content" role="main">
		<div class="portlet-layout row">
			<div class="col-md-12 portlet-column portlet-column-only" id="column-1">
				<div class="portlet-dropzone portlet-column-content portlet-column-content-only" id="layout-column_column-1">
					<div class="portlet-boundary portlet-boundary_com_liferay_journal_content_web_portlet_JournalContentPortlet_ portlet-static portlet-static-end portlet-decorate portlet-journal-content " id="p_p_id_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_CjjEkCG7LFWI_">
						<span id="p_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_CjjEkCG7LFWI"></span><section class="portlet" id="portlet_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_CjjEkCG7LFWI">
						<div class="portlet-content">
							<h2 class="portlet-title-text">Beli Bahan Bangunan</h2>
							<div class=" portlet-content-container">
								<div class="portlet-body">
									<div class="text-right user-tool-asset-addon-entries"></div>
									<div class="pull-right visible-interaction"></div>
									<div class="journal-content-article">
										<section class="video-top-section py-main pt-0-sm">
										<div class="container">
											<div class="row">
												<div class="col-md-7 col-12 order-md-last">
													<img class="w-full rounded" src="{{ url ('template/documents/33314/2750723/Bg_screen_material.jpg/Bg_screen_materiala417.jpg?t=1600734864349')}}">
												</div>
												<div class="col-md-5 col-12 order-md-first py-main">
													<div class="heading">
														<h3 class="title mb-2">Beli Bahan Bangunan</h3>
														<p class="text">
															 Dapatkan beragam bahan bangunan berkualitas dengan lebih cepat dan mudah. Pengiriman yang aman dan terlacak membuat proses pembangunan lebih tepat waktu.
														</p>
													</div>
												</div>
											</div>
										</div>
										</section>
									</div>
									<div class="content-metadata-asset-addon-entries"></div>
								</div>
							</div>
						</div>
						</section>
					</div>
					<div class="portlet-boundary portlet-boundary_Buy_Material_Portlet_ portlet-static portlet-static-end portlet-decorate " id="p_p_id_Buy_Material_Portlet_">
						<span id="p_Buy_Material_Portlet"></span><section class="portlet" id="portlet_Buy_Material_Portlet">
						<div class="portlet-content">
							<h2 class="portlet-title-text">Buy Material Portlet</h2>
							<div class=" portlet-content-container">
								<div class="portlet-body">
									<script type="text/javascript" src="{{ url ('template/o/com.holcim.cp.buymaterial.web/js/jquery.dataTables.min.js')}}"></script>
									<link rel="stylesheet" href="{{ url ('template/o/com.holcim.cp.buymaterial.web/css/jquery.dataTables.min.css')}}"/>
									<section class="sw-filter-view">
									<!-- <div class="tab-fluid transparent" data-toggle="sticky-onscroll">
										<ul class="vp-fadeinup delayp1">
											<li class="tab-2 sub-filter active" id="structural" onclick="onChangeTab(this);">Struktural</li>
											<li class="tab-2 sub-filter" id="nonstructural" onclick="onChangeTab(this);">Non Struktural</li>
										</ul>
									</div> -->
									</section><section class="section-detail-home-content py-main-sm">
									<div class="container container-sm">
										<div id="content">
											<!-- structural -->
											<div id="contentStructural" class="">
												<div class="subheading text-center-md-up ">
													<p class="">
														Pekerjaan struktural pada rumah tinggal mencakup pekerjaan pondasi, sloof, kolom, ring balok, dan dak.
													</p>
												</div>
												<div class="owl-carousel owl-theme owl-material-product mb-3">
                                                    @foreach ($products as $product)
                                                        <div class="item">
                                                            <a href="{{ url ('/product').'/'.$product->id}}" class="card card-produk w-o-chevron delayp2">
                                                            <div class="card-header">
                                                                <img src="{{ asset($product->image_path_1)}}" alt="" class="w-150px rounded">
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-text">
                                                                    <h5 class="title">{{$product->name}}</h5>
                                                                </div>
                                                                <div class="btn btn-outline-primary btn-block d-md-block">Lihat Detail</div>
                                                            </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
												</div>
                                            </div>
                                            
										</div>
									</div>
									</section>
									<style>
 .owl-carousel .owl-item img { display: block; width: 100%!important; }
									</style>
									<script type="text/javascript">jQuery(document).ready(function(){$(".owl-material-product").owlCarousel({loop:!1,margin:20,dots:!1,responsive:{0:{items:1.5,loop:!0},768:{items:3},1024:{items:2},1280:{items:4}}})});function onChangeTab(a){a=a.id;$(".sub-filter").removeClass("active");$("#"+a).addClass("active");$("#contentStructural").addClass("d-none");$("#contentNonstructural").addClass("d-none");"structural"==a?$("#contentStructural").removeClass("d-none"):$("#contentNonstructural").removeClass("d-none")};</script>
								</div>
							</div>
						</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
    
@endsection