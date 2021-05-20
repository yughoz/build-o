@extends('app2')
@section('content')

<style>
    #productImage {
        width: 100%;
    }
</style>

<section class="py-main section-form section-login vp-fadeinup">
    <div class="container">
        <div class="box-form p-box position-relative">
            <div class="box-close">
                <a href="belimaterial.html?p_p_id=Buy_Material_Detail_Portlet&amp;p_p_lifecycle=1&amp;p_p_state=normal&amp;p_p_mode=view&amp;_Buy_Material_Detail_Portlet_javax.portlet.action=back&amp;p_auth=VimAlLS3" class="close"><span aria-hidden="true"><i class="fas fa-arrow-left"></i></span></a>
            </div>
            <form action="https://www.sobatbangun.com/en/belimaterial-detail?p_p_id=Buy_Material_Detail_Portlet&amp;p_p_lifecycle=1&amp;p_p_state=normal&amp;p_p_mode=view&amp;_Buy_Material_Detail_Portlet_javax.portlet.action=buyMaterial&amp;p_auth=VimAlLS3" class="form " data-fm-namespace="_Buy_Material_Detail_Portlet_" id="_Buy_Material_Detail_Portlet_fm" method="post" name="_Buy_Material_Detail_Portlet_fm">
                <input class="field form-control" id="_Buy_Material_Detail_Portlet_formDate" name="_Buy_Material_Detail_Portlet_formDate" type="hidden" value="1605717559106"/><input class="field form-control" id="_Buy_Material_Detail_Portlet_productId" name="_Buy_Material_Detail_Portlet_productId" type="hidden" value="1"/><input class="field form-control" id="_Buy_Material_Detail_Portlet_parameterId" name="_Buy_Material_Detail_Portlet_parameterId" type="hidden" value="3402"/><input class="field form-control" id="_Buy_Material_Detail_Portlet_locationId" name="_Buy_Material_Detail_Portlet_locationId" type="hidden" value="34"/><input class="field form-control" id="_Buy_Material_Detail_Portlet_firstLoad" name="_Buy_Material_Detail_Portlet_firstLoad" type="hidden" value="true"/>
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <img id="productImage" style="border: 1px solid rgba(204, 204, 204, 0.2);" src="{{ asset($product->image_path_1)}}" alt="" class="   rounded">
                    </div>
                    @if ( intval($service->is_service) === 1)
                        <div class="col-md-6 col-12">
                            <h4 class="title mb-1">{{$product->name}}</h4>
                            <div class="choose">
                                <div class="form-group mb-0 bottom-sticky-sm">
                                    <div class="box-dark">
                                        <div class="box-description">
                                            <div class="text-description">
                                                <p class="mb-0"> Harga </p>
                                                <h4 class="mb-0"> Rp {{ number_format($product->price)}} </h4>
                                            </div>
                                        </div>
                                    </div><br>
                                    <a href="https://api.whatsapp.com/send?phone={{$whatsapp}}" class="btn btn-success btn-block s" target="_blank">Konsultasi</a>
                                    <a href="{{ url ('custom_design/').'/'.$service->id.'/'.$product->id }}" class="btn btn-primary btn-block" >Custom {{$service->title}}</a>

                                </div>
                            </div>
                            <!-- info -->
                            <p class="text-dark font-weight-bold mb-2 mt-4">Informasi Produk</p>
                            {!! $product->description !!}
                        </div>
                    @else
                    <div class="col-md-6 col-12">
                            <h4 class="title mb-1">{{$product->name}}</h4>
                            <div class="choose">
                                <!-- size -->
                                <!-- <div class="mb-2">
                                    <p class="mb-1 small">
                                            Pilih Ukuran: <span class="text-dark " id="resultSize"></span>
                                    </p>
                                    <div class="choose-list">
                                        <label class="labelradio"><input type="radio" name="size" value="3402">
                                        <div id="cardsize3402" class="card-label custom-card-size">40kg</div>
                                        </label><label class="labelradio"><input type="radio" name="size" value="3403">
                                        <div id="cardsize3403" class="card-label custom-card-size">50kg</div>
                                        </label>
                                    </div>
                                </div> -->
                                <div class="form-group mb-0 bottom-sticky-sm">
                                    <div class="box-dark">
                                        <div class="box-description">
                                            <div class="text-description">
                                                <p class="mb-0"> Harga </p>
                                                <h4 class="mb-0"> Rp {{ number_format($product->price)}} </h4>
                                            </div>
                                        </div>
                                    </div><br>
                                    <a href="{!! $product->url_ecommerce !!}" class="btn btn-primary btn-block" target="_blank">Beli Material</a>
                                    <p class="text text-center mt-3 small">
                                            Akan dialihkan ke halaman BuildO Official Store di Tokopedia
                                    </p>
                                </div>
                            </div>
                            <!-- info -->
                            <p class="text-dark font-weight-bold mb-2 mt-4">Informasi Produk</p>
                            {!! $product->description !!}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    </section>
@endsection
