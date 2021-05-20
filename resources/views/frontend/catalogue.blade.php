@extends('app2')
@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
<div class=" cover-home cover-light-sm center" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0) 65%, #0000008c 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 65%, #0000008c 100%),url({{ url ('template/documents/Images/Banner.png')}}) no-repeat top; background-size: cover; height: 800px;">
    <!-- <img src="{{ url ('template/documents/Images/Banner.png')}}" class="img-home-sm img-fluid d-block d-md-none" alt="Cover Campaign" style="width:100%:height:100%"> -->
    <div class="container center" style="text-align: center;align-content: center;  position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" >
        <div class="cover-content center-md-down" >
            <div class="conten " >
                <h1 class="cover-title animated fadeInUp delayp1 mb-3 ">RENOVASI MENJADI </h1>
                <h1 class="cover-title animated fadeInUp delayp1 mb-3 ">SEMAKIN MUDAH</h1>
                <p class="cover-text animated fadeInUp delayp2 ">
                    Platfrom renovasi yang efisien untuk merancang, merencanakn dan membangun dalam satu tempat. {{$code}}
                </p>
                <a href="http://localhost:8000/blog/tips-rumah-ramah-lansia" class="btn btn-primary animated vp-fadeinup delayp2 visible fadeInUp full-visible">GET YOUR ESTIMATE</a>
            </div>
            
        </div>
    </div>
</div>

<div class="container mt-32px">
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
