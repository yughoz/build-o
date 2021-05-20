@extends('app2')
@section('content')


    <div class="subscribe-action"></div>
    <section class="py-main section-artikel bg-gray-50">
    <div class="container">
        <div class="heading">
            <h2 class="title animated vp-fadeinup delayp1">Artikel Terbaru</h2>
            <p class="subtitle animated vp-fadeinup delayp2">
                Tetap up-to-date dengan tips dan trik atau bahasan topik bangunan terbaru
            </p>
        </div>
        <div class="row artikel-item">
            @foreach ($blog as $key => $b)
                <div class="{{ ($key == 0) ? 'col-md-8': 'col-md-4'}}">
                    <div class="card card-artikel animated vp-fadeinup delayp1">
                        <div class="card-img" style="background: linear-gradient(200deg, rgba(0,0,0,0.00) 0%, #000000 130%), url({{ asset($b->image_path)}}) no-repeat center; background-size: cover;">
                        </div>
                        <!-- <p class="category animated vp-slideinleft delayp6">Renovasi</p> -->
                        <div class="card-body">
                            <p class="date animated vp-fadeinup delayp1">13 August 2020</p>
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


@endsection