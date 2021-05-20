@extends('app2')
@section('content')




<div class=" cover-home cover-light-sm center" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0) 65%, #0000008c 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 65%, #0000008c 100%),url({{ url ('template/documents/Images/Banner.png')}}) no-repeat top; background-size: cover; height: 800px;">
    <!-- <img src="{{ url ('template/documents/Images/Banner.png')}}" class="img-home-sm img-fluid d-block d-md-none" alt="Cover Campaign" style="width:100%:height:100%"> -->
    <div class="container center" style="text-align: center;align-content: center;  position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" >
        <div class="cover-content center-md-down" >
            <div class="conten " >
                <h1 class="cover-title animated fadeInUp delayp1 mb-3 ">RENOVASI MENJADI </h1>
                <h1 class="cover-title animated fadeInUp delayp1 mb-3 ">SEMAKIN MUDAH</h1>
                <p class="cover-text animated fadeInUp delayp2 ">
                    Platfrom renovasi yang efisien untuk merancang, merencanakn dan membangun dalam satu tempat.
                </p>
                <a href="http://localhost:8000/blog/tips-rumah-ramah-lansia" class="btn btn-primary animated vp-fadeinup delayp2 visible fadeInUp full-visible">GET YOUR ESTIMATE</a>
            </div>
            
        </div>
    </div>
</div>
<!-- <div class="text-center user-tool-asset-addon-entries"></div>
									<div class="pull-center visible-interaction"></div>
									<div class="journal-content-article">
										<div class="owl-carousel owl-theme carousel-cover">
											<div class="item">
												<div class="cover cover-home cover-light-sm" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0) 65%, #0000008c 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 65%, #0000008c 100%),url({{ url ('template/documents/Images/Banner.png')}}) no-repeat top; background-size: cover;">
													<img src="{{ url ('template/documents/33314/741139/Banner-Beli-Desain-min.jpg/Banner-Beli-Desain-min16ef.jpg?t=1600735200495')}}" class="img-home-sm img-fluid d-block d-md-none" alt="Cover Campaign">
													<div class="container">
														<div class="cover-content center-md-down">
															<div class="conten text-justifyt">
																<h1 class="cover-title animated fadeInUp delayp1 mb-12 ">RENOVASI MENJADI SEMAKIN MUDAH</h1>
																<p class="cover-text animated fadeInUp delayp2 mb-12">
																	Platfrom renovasi yang efisien untuk merancang, merencanakn dan membangun dalam satu tempat.
																</p>
															</div>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="content-metadata-asset-addon-entries"></div> -->
@endsection

@section('home')

    <div class="portlet-boundary portlet-boundary_com_liferay_journal_content_web_portlet_JournalContentPortlet_ portlet-static portlet-static-end portlet-decorate portlet-journal-content " >
        <span id="p_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_4kMtNcF6Cc1S"></span>
        <section class="portlet" >
            <div class="portlet-content " style="background-color: #f1ebcd;">
                <h2 class="portlet-title-text">Layanan BuildO</h2>
                <div class=" portlet-content-container">
                    <div class="portlet-body">
                        <div class="text-right user-tool-asset-addon-entries"></div>
                        <div class="pull-right visible-interaction"></div>
                        <div class="journal-content-article">
                            <section class="py-main">
                                <div class="container" >
                                    <div class="heading center-md-up mb-5 vp-fadeinup delayp1">
                                        <h2>Layanan BuildO</h2>
                                    </div>
                                    <div class="row">
                                        @foreach ($service_menus as $service)
                                            <div class="col-md-4 col-6" style='margin-top:60px'>
                                                <a href="{{url ('catalogue/'.$service->url)}}" class=card-main-menu vp-fadeinright delayp2">
                                                <div class=" mx-auto">
                                                    <img src="{{ asset($service->image_path)}}" alt="" class="w-50px rounded">
                                                </div>
                                                <div class="card-body">
                                                    <h3 class="title">{{$service->title}}</h3>
                                                    <p class="text"></p>
                                                </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>

                                    
                                </div>
                            </section>
                        </div>
                        <div class="journal-content-article">
                            <section class="py-main">
                                <div class="container" >
                                    <div class="heading center-md-up mb-5 vp-fadeinup delayp1">
                                        <h2>Mengapa harus BuildO    </h2>
                                    </div>
                                    
                                    <div class="row" style='margin-top:100px'>
                                
                                        <div class="owl-carousel owl-theme carousel-artikel">
                                        <div class="item" style='display:none'>
                                        </div>
                                        @foreach ($about_buildo as $key => $b)
                                            <div class="item">
                                                <div class="card animated vp-fadeinup delayp1">
                                                    <img class="card-img-top" src="{{ asset($b->img_url )}} " alt="Card image cap">
                                                    <div class="card-body center">
                                                        <h5 class="card-title center">{{$b->title}}</h5>
                                                        <p class="card-text center">{{$b->desc}}</p>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

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

    <div class="portlet-boundary portlet-boundary_com_liferay_journal_content_web_portlet_JournalContentPortlet_ portlet-static portlet-static-end portlet-decorate portlet-journal-content " >
        <span id="p_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_4kMtNcF6Cc1S"></span>
        <section class="portlet" >
            <div class="portlet-content ">
                <div class=" portlet-content-container">
                    <div class="portlet-body">
                        <div class="text-right user-tool-asset-addon-entries"></div>
                        <div class="pull-right visible-interaction"></div>
                        <div class="journal-content-article">
                            <section class="py-main">
                                <div class="container" >
                                    <div class="heading center-md-up mb-5 vp-fadeinup delayp1">
                                        <h2>Cara kerja Renovasi dan Bangun</h2>
                                    </div>
                                    
                                    <div class="row" style='margin-top:100px'>
                                
                                        <div class="owl-carousel owl-theme carousel-artikel">
                                        <div class="item" style='display:none'>
                                        </div>
                                        @foreach ($works as $key => $b)
                                            <div class="item">
                                                <div class="card animated vp-fadeinup delayp1">
                                                    <img class="card-img-top" src="{{ asset($b->img_url )}}" alt="Card image cap">
                                                    <div class="card-body center">
                                                        <h5 class="card-title center">{{$b->title}}</h5>
                                                        <p class="card-text center">{{$b->desc}}</p>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

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
    <div class="portlet-boundary portlet-boundary_com_liferay_journal_content_web_portlet_JournalContentPortlet_ portlet-static portlet-static-end portlet-decorate portlet-journal-content " >
        <span id="p_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_4kMtNcF6Cc1S"></span>
        <section class="portlet" >
            <div class="portlet-body" style="background-color: #f1ebcd;">
                    <div class="text-right user-tool-asset-addon-entries"> </div>
                    <div class="pull-right visible-interaction"> </div>
                    <div class="journal-content-article">
  
                        <section class="py-main">
                            <div class="container" > 
                                <div class="heading center-md-up mb-5 vp-fadeinup delayp1">
                                    <h2>Yang telah kami kerjakan    </h2>
                                </div>                                   
                                <div class="row" style='margin-top:100px'>
                            
                                    <div id='kerjaakan' class="owl-carousel owl-theme carousel-cover owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(-3177px, 0px, 0px); transition: all 0.25s ease 0s; width: 7413px;">
                                                @foreach ($portofolio as $key => $b)
                                                <div class="owl-item">
                                                    <div class="item">     
                                                        <div class="journal-content-article">
                                                            <section class="py-main-lg with-sm">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12 content-center order-md-first">
                                                                        <div class="box-list-group w-image">
                                                                            <div class="text-placeholder">
                                                                                <div class="heading mb-3 vp-fadeinup delayp1">
                                                                                    <h2>{{$b->title}}</h2>
                                                                                </div>
                                                                                <div class="list-group">
                                                                                    <p>
                                                                                        {{$b->desc}}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="image-placeholder vp-fadeinup delayp1" style="background: url( {{ asset($b->img_url )}} ) no-repeat center; background-size: cover;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </section>
                                                        </div>
            
            
                                                    </div>
                                                </div>
                                                @endforeach
            
                                                
                                                <!-- <div class="owl-item">
                                                    <div class="item">     
                                                        <div class="journal-content-article">
                                                            <section class="py-main-lg with-sm">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12 content-center order-md-first">
                                                                        <div class="box-list-group w-image">
                                                                            <div class="text-placeholder">
                                                                                <div class="heading mb-3 vp-fadeinup delayp1">
                                                                                    <h2>Bangun Rumah Lebih Baik</br>Dengan Build 0</h2>
                                                                                </div>
                                                                                <div class="list-group">
                                                                                    <h4>Rekanan Yang Terpercaya</h4>
                                                                                    <p>
                                                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="image-placeholder vp-fadeinup delayp1" style="background: url({{ url ('template/documents/33314/2751019/article-min.jpg/article-min026f.jpg?t=1600735069151')}}) no-repeat center; background-size: cover;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </section>
                                                        </div>
            
            
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- <div class="owl-nav" id='nav-kerjaakan'>
                                            <div class="owl-prev">prev</div>
                                            <div class="owl-next">next</div>
                                        </div> -->
                                        <!-- <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div> -->
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </section>
                    </div>
                    <div class="content-metadata-asset-addon-entries"> </div>
                </div>
        </section>
    </div>


    <div class="portlet-boundary portlet-boundary_com_liferay_journal_content_web_portlet_JournalContentPortlet_ portlet-static portlet-static-end portlet-decorate portlet-journal-content " >
        <span id="p_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_4kMtNcF6Cc1S"></span>
        <section class="portlet" >
            <div class="portlet-content ">
                <div class=" portlet-content-container">
                    <div class="portlet-body">
                        <div class="text-right user-tool-asset-addon-entries"></div>
                        <div class="pull-right visible-interaction"></div>
                        <div class="journal-content-article">
                            <section class="py-main">
                                <div class="container" >
                                    <div class="heading center-md-up mb-5 vp-fadeinup delayp1">
                                        <h2>Apa kata mereka</h2>
                                    </div>
                                    
                                    <div class="row" style='margin-top:100px'>
                                
                                        <div id="kata-mereka" class="owl-carousel owl-theme carousel-cover owl-loaded owl-drag" >
                                       
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage">
                                                    @foreach ($review as $key => $b)

                                                        <div class="owl-item">
                                                            <div class="item">
                                                                <div class="card animated vp-fadeinup delayp1">
                                                                    <div class="card-body center">
                                                                        <img class="rounded-circle" src="{{ asset($b->img_url )}}" alt="Card image cap" style="height: 100px;width: 100px">
                                                                        
                                                                    </div>
                                                                    <div class="card-body center">
                                                                        <h5 class="card-title center">{{$b->title}}</h5>
                                                                        <p class="card-text center">{{$b->desc}}</p>
    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                    <!-- <div class="owl-item">
                                                        <div class="item">     
                                                            <div class="journal-content-article">
                                                                <section class="py-main-lg with-sm">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-12 content-center order-md-first">
                                                                            <div class="box-list-group w-image">
                                                                                <div class="text-placeholder">
                                                                                    <div class="heading mb-3 vp-fadeinup delayp1">
                                                                                        <h2>Bangun Rumah Lebih Baik</br>Dengan Build 0</h2>
                                                                                    </div>
                                                                                    <div class="list-group">
                                                                                        <h4>Rekanan Yang Terpercaya</h4>
                                                                                        <p>
                                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="image-placeholder vp-fadeinup delayp1" style="background: url({{ url ('template/documents/33314/2751019/article-min.jpg/article-min026f.jpg?t=1600735069151')}}) no-repeat center; background-size: cover;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </section>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="owl-item">
                                                        <div class="item">     
                                                            <div class="journal-content-article">
                                                                <section class="py-main-lg with-sm">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-12 content-center order-md-first">
                                                                            <div class="box-list-group w-image">
                                                                                <div class="text-placeholder">
                                                                                    <div class="heading mb-3 vp-fadeinup delayp1">
                                                                                        <h2>Bangun Rumah Lebih Baik</br>Dengan Build 0</h2>
                                                                                    </div>
                                                                                    <div class="list-group">
                                                                                        <h4>Rekanan Yang Terpercaya</h4>
                                                                                        <p>
                                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="image-placeholder vp-fadeinup delayp1" style="background: url({{ url ('template/documents/33314/2751019/article-min.jpg/article-min026f.jpg?t=1600735069151')}}) no-repeat center; background-size: cover;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </section>
                                                            </div>


                                                        </div>
                                                    </div> -->
                                                </div>
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

    <div class=" cover-home cover-light-sm center" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0) 65%, #0000008c 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 65%, #0000008c 100%),url({{ url ('template/documents/Images/Banner.png')}}) no-repeat top; background-size: cover;">
        <!-- <img src="{{ url ('template/documents/Images/Banner.png')}}" class="img-home-sm img-fluid d-block d-md-none" alt="Cover Campaign" style="width:100%:height:100%"> -->
        <div class="container center" style="text-align: center;align-content: center;  position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" >
            <div class="cover-content center-md-down" >
                <div class="conten " >
                    <h1 class="cover-title animated fadeInUp delayp1 mb-3 ">{{$baner2->module_name}} </h1>
                    <a href="{{ asset($baner2->img_url )}}" class="btn btn-primary animated vp-fadeinup delayp2 visible fadeInUp full-visible">GET YOUR ESTIMATE</a>
                </div>
                
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="portlet-boundary portlet-boundary_com_liferay_journal_content_web_portlet_JournalContentPortlet_ portlet-static portlet-static-end portlet-decorate portlet-journal-content " >
        <span id="p_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_4kMtNcF6Cc1S"></span>
        <section class="portlet" >
            <div class="portlet-content " style="background-color: #f1ebcd;">
                <h2 class="portlet-title-text">Official brand</h2>
                <div class=" portlet-content-container">
                    <div class="portlet-body">
                        <div class="text-right user-tool-asset-addon-entries"></div>
                        <div class="pull-right visible-interaction"></div>
                        <div class="journal-content-article">
                            <section class="py-main">
                                <div class="container  center-md-up" >
                                    <div class="heading center-md-up mb-5 vp-fadeinup delayp1">
                                        <h2>Official brand</h2>
                                    </div>
                                    <div class="row " style="text-align: center;align-content: center;">
                                        @foreach ($brand as $key => $b)
                                            <div class="col-md-4 col-6" style='margin-top:60px'>
                                        
                                                <div class=" animated vp-fadeinup delayp1">
                                                    <div class="card-body center">
                                                        <img class="" src="{{ asset($b->img_url )}}" alt="Card image cap" style="height: 100px">
                                                        
                                                    </div>
                                                    <div class="card-body center">
                                                        <h5 class="card-title center">{{$b->title}}</h5>

                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-4 "> -->
                                                    <!-- <div class="card-body">
                                                        <img src="{{ asset($b->img_url )}}" alt="" class="w-150px rounded">
                                                        <h3 class="title">{{$b->title}}</h3>
                                                        <p class="text"></p>
                                                    </div> -->
                                                <!-- </div>  -->

                                            </div>                        
                                        @endforeach

                                        
                                        <!-- <div class="col-md-4 col-6" style='margin-top:60px'>
                                            <img src="{{ url ('img/brand/tigaroda.png')}}" alt="" class="w-150px rounded">
                                        </div>
                                        <div class="col-md-4 col-6" style='margin-top:60px'>
                                            <img src="{{ url ('img/brand/krisbow.png')}}" alt="" class="w-150px rounded">
                                        </div> -->
                                    </div>
                                    <!-- <div class="row" style="text-align: center;align-content: center;"> -->
                                        
                                        
                                        
                                        <!-- <div class="col-md-4 ">
                                                    <div class="card-body">
                                                <h3 class="title">Semen Tiga Roda</h3>
                                                <p class="text"></p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 ">
                                                    <div class="card-body">
                                                <h3 class="title">Krisbow</h3>
                                                <p class="text"></p>
                                            </div>
                                        </div>                                     -->
                                    <!-- </div> -->

                                </div>
                            </section>
                        </div>
                        <div class="content-metadata-asset-addon-entries"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <section class="portlet">
        <div class="portlet-content">
            <div class=" portlet-content-container">

            </div>
        </div>
    </section>

    <!-- <div class="portlet-boundary portlet-boundary_com_liferay_journal_content_web_portlet_JournalContentPortlet_ portlet-static portlet-static-end portlet-decorate portlet-journal-content " id="p_p_id_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_vSdOmCBPpsWc_">
        <span id="p_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_vSdOmCBPpsWc"></span>
        <section class="portlet" id="portlet_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_vSdOmCBPpsWc">
            <div class="portlet-content">
                <h2 class="portlet-title-text">Bangun Rumah Lebih Baik Dengan Build 0</h2>
                <div class=" portlet-content-container">
                    <div class="portlet-body">
                        <div class="text-right user-tool-asset-addon-entries"></div>
                        <div class="pull-right visible-interaction"></div>
                        <div class="journal-content-article">
                            <section class="py-main-lg with-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 content-center order-md-first">
                                        <div class="box-list-group w-image">
                                            <div class="text-placeholder">
                                                <div class="heading mb-3 vp-fadeinup delayp1">
                                                    <h2>Bangun Rumah Lebih Baik</br>Dengan Build 0</h2>
                                                </div>
                                                <div class="list-group">
                                                    <div class="list-group-item no-arrow center no-border vp-fadeinleft delayp2">
                                                        <img src="{{ url ('template/documents/Images/homepage-kontraktor-bangunrumah.png/homepage-kontraktor-bangunrumah821a.png?t=1585043057270')}}" alt="image" class="w-50px">
                                                        <div class="list-group-item-content">
                                                            <h4>Rekanan Yang Terpercaya</h4>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="list-group-item no-arrow center no-border vp-fadeinleft delayp2">
                                                        <img src="{{ url ('template/documents/Images/homepage-safepayment-bangunrumah.png/homepage-safepayment-bangunrumahc129.png?t=1585043070104')}}" alt="image" class="w-50px">
                                                        <div class="list-group-item-content">
                                                            <h4>Proses Pembangunan Aman dan Transparan</h4>
                                                            <p>
                                                                Membangun rumah tanpa kuatir menjadi korban pelarian dana atau kualitas meragukan. Semua proses pembangunan transparan dan pengucuran dana berdasarkan veriﬁkasi hasil kerja.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="list-group-item no-arrow center no-border vp-fadeinleft delayp2">
                                                        <img src="{{ url ('template/documents/33314/2751019/homepage-watching-bangunrumah.png/homepage-watching-bangunrumah901e.png?t=1600735069413')}}" alt="image" class="w-50px">
                                                        <div class="list-group-item-content">
                                                            <h4>Pendampingan Sobat Konsul</h4>
                                                            <p>
                                                                Tak lagi sendiri ketika membangun rumah dan renovasi. Sobat Konsul akan selalu siap memberikan panduan dan bantuan mulai dari konsultasi desain dengan arsitek, pembahasan RAB dengan kontraktor, hingga proses konstruksi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="image-placeholder vp-fadeinup delayp1" style="background: url({{ url ('template/documents/33314/2751019/article-min.jpg/article-min026f.jpg?t=1600735069151')}}) no-repeat center; background-size: cover;">
                                            </div>
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
    </div> -->
    <div class="portlet-boundary portlet-boundary_com_liferay_journal_content_web_portlet_JournalContentPortlet_ portlet-static portlet-static-end portlet-decorate portlet-journal-content " id="p_p_id_com_liferay_journal_content_web_portlet_JournalContentPortlet_INSTANCE_wnOYy9jzGoxn_">

    </section>
    </div>
    <div class="portlet-boundary portlet-boundary_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_ portlet-static portlet-static-end portlet-decorate portlet-asset-publisher " id="p_p_id_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_a3G2s85mxMAo_">
    <span id="p_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_a3G2s85mxMAo"></span><section class="portlet" id="portlet_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_a3G2s85mxMAo">
    <div class="portlet-content">
    <h2 class="portlet-title-text">Aset Penerbit</h2>
    <div class=" portlet-content-container">
        <div class="portlet-body">
            <div class="subscribe-action"></div>
            <section class="py-main section-artikel">
            <div class="container">
                <div class="heading">
                    <h2 class="title animated vp-fadeinup delayp1">Blog & Artikel</h2>
                </div>
                <div class="owl-carousel owl-theme carousel-artikel">
                @foreach ($blogs as $key => $b)
                    <div class="item">
                        <div class="card card-artikel animated vp-fadeinup delayp1">
                            <div class="card-img" style="background: linear-gradient(200deg, rgba(0,0,0,0.00) 0%, #000000 130%), url({{ asset($b->image_path)}}) no-repeat center; background-size: cover;">
                            </div>
                            <!-- <p class="category animated vp-slideinleft delayp6">Konstruksi</p> -->
                            <div class="card-body">
                                <p class="date animated vp-fadeinup delayp1">06 August 2020</p>
                                <h5 class="title animated vp-fadeinup delayp2">{{$b->title}}</h5>
                                <p class="subtitle animated vp-fadeinup delayp3">
                                    {{ strip_tags(substr($b->content, 0, 200))}}
                                </p>
                                <a href="{{ url('blog').'/'.$b->url }}" class="btn btn-primary animated vp-fadeinup delayp2">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
            </section>
        </div>
    </div>
    </div>
    </section>
    </div>
@endsection

@section('js')
<script>
    
    $('#kerjaakan').owlCarousel({
        items:1,
        margin:300,
        // margin-left:300,
        // stagePadding:300,
        autoHeight:true,
        loop :true,
        nav: true,
        navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
      
    });  
   
    
    $('#kata-mereka').owlCarousel({
        center: true,
        items:3,
        loop:true,
        margin:10,
        nav: true,
        navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
        responsive:{
            800:{
                items:3
            }
        }
        });  
</script>

@endsection
