@extends('app2')
@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
<div class=" cover-home cover-light-sm center" >
    <!-- <img src="{{ url ('template/documents/Images/Banner.png')}}" class="img-home-sm img-fluid d-block d-md-none" alt="Cover Campaign" style="width:100%:height:100%"> -->
    <div class="container center" style="text-align: center;align-content: center;  position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" >
        <div class="cover-content center-md-down" >
            <div class="conten " >
                <h1 class="cover-title animated fadeInUp delayp1 mb-3 ">PILIH GAYA DAN DESAIN UNTUK</h1>
                <h1 class="cover-title animated fadeInUp delayp1 mb-3 ">RUMAH IMPIANMU</h1>
            </div>  
        </div>
    </div>
</div>

<div class="container mt-32px">
    <div class="journal-content-article">
        <section class="py-main">
            <div class="container">

                <!-- <div class="row">
                    <div class="col-md-2 col-6" style="margin-top:60px;background-color: #a1a1a1;margin-left:30px">
                        <a href="http://localhost:8000/catalogue/package"  class="card-main-menu" vp-fadeinright="" delayp2"="">
                        <div class="card-body">
                            <h3 class="title">Atap</h3>
                            <p class="text"></p>
                            <div class=" mx-auto">
                                <img src="http://localhost:8000/img/SVG/Icon-modula-package.svg" alt="" class="w-50px rounded">
                            </div>
                        </div>
                        
                        </a>
                    </div>
                    <div class="col-md-2 col-6" style="margin-top:60px;background-color: #a1a1a1;margin-left:30px">
                        <a href="http://localhost:8000/catalogue/package"  class="card-main-menu" vp-fadeinright="" delayp2"="">
                        <div class="card-body">
                            <h3 class="title">Keramik</h3>
                            <p class="text"></p>
                            <div class=" mx-auto">
                                <img src="http://localhost:8000/img/SVG/Icon-modula-package.svg" alt="" class="w-50px rounded">
                            </div>
                        </div>
                        
                        </a>
                    </div>
                    
                    <div class="col-md-2 col-6" style="margin-top:60px;background-color: #a1a1a1;margin-left:30px">
                        <a href="http://localhost:8000/catalogue/package"  class="card-main-menu" vp-fadeinright="" delayp2"="">
                        <div class="card-body">
                            <h3 class="title">Pagar</h3>
                            <p class="text"></p>
                            <div class=" mx-auto">
                                <img src="http://localhost:8000/img/SVG/Icon-modula-package.svg" alt="" class="w-50px rounded">
                            </div>
                        </div>
                        
                        </a>
                    </div>
                    
                    <div class="col-md-2 col-6" style="margin-top:60px;background-color: #a1a1a1;margin-left:30px">
                        <a href="http://localhost:8000/catalogue/package"  class="card-main-menu" vp-fadeinright="" delayp2"="">
                        <div class="card-body">
                            <h3 class="title">Kusen</h3>
                            <p class="text"></p>
                            <div class=" mx-auto">
                                <img src="http://localhost:8000/img/SVG/Icon-modula-package.svg" alt="" class="w-50px rounded">
                            </div>
                        </div>
                        
                        </a>
                    </div>
                    
                    <div class="col-md-2 col-6" style="margin-top:60px;background-color: #a1a1a1;margin-left:30px">
                        <a href="http://localhost:8000/catalogue/package"  class="card-main-menu" vp-fadeinright="" delayp2"="">
                        <div class="card-body">
                            <h3 class="title">Cat</h3>
                            <p class="text"></p>
                            <div class=" mx-auto">
                                <img src="http://localhost:8000/img/SVG/Icon-modula-package.svg" alt="" class="w-50px rounded">
                            </div>
                        </div>
                        
                        </a>
                    </div>
                    
                    <div class="col-md-2 col-6" style="margin-top:60px;background-color: #a1a1a1;margin-left:30px">
                        <a href="http://localhost:8000/catalogue/package"  class="card-main-menu" vp-fadeinright="" delayp2"="">
                        <div class="card-body">
                            <h3 class="title">Plafon</h3>
                            <p class="text"></p>
                            <div class=" mx-auto">
                                <img src="http://localhost:8000/img/SVG/Icon-modula-package.svg" alt="" class="w-50px rounded">
                            </div>
                        </div>
                        
                        </a>
                    </div>
                    <div class="col-md-2 col-6" style="margin-top:60px;background-color: #a1a1a1;margin-left:30px">
                        <a href="http://localhost:8000/catalogue/package"  class="card-main-menu" vp-fadeinright="" delayp2"="">
                        <div class="card-body">
                            <h3 class="title">Wallpaper</h3>
                            <p class="text"></p>
                            <div class=" mx-auto">
                                <img src="http://localhost:8000/img/SVG/Icon-modula-package.svg" alt="" class="w-50px rounded">
                            </div>
                        </div>
                        
                        </a>
                    </div>
                    
                </div> -->

                
            </div>
        </section>
    </div>
    @livewire('catalogoe',['module_code' => $code])  
    
</div>
@endsection


@section('js') 
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    
    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    @stack('scripts')   
@endsection
