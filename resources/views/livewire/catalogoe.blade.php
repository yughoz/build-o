<div>
    <div class="row mt-5" >

        <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <div class="breadcrumb breadcrumb-sort mb-3">
                <p class="breadcrumb-item active" aria-current="page"> </p>
                <form class="bd-search d-flex align-items-center">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            
                            <button class="btn btn-outline-secondary" type="button"><img src="{{ url ('img/default/search.png')}}" class="" style="width:25px;height:25px;"></button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        <input type="hidden" name="_Browse_Home_Designs_Portlet_architectId" id="_Browse_Home_Designs_Portlet_architectId"> 
        <div class="row arch-item" id="returnBrowse">
        
            <div class="col-md-3 mb-3">
                <div class="filter-box wrapper bg-gray-50" style="padding: 1rem; border-radius: 4px; background-color: #fff;">
                    <h5 id="filterResposive"> Filter pilihan Anda </h5>
                    <form id="demo" class="collapse_">
                        <div class="form-group">
                            <label>Kategori</label> 
                            <div class="form-group">
                            <select class="custom-select" wire:model="category">
                                <option value="0">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>
                                @endforeach
                             </select>
                            </div>
                        </div>

                        <div class="form-group cx-price-slider" wire:ignore > 
                            <label>Harga</label> 

                            <input type="text" class="js-range-slider" name="my_range" value=""
                                data-type="double"
                                data-min="0"
                                data-max="{{$max_price}}"
                                data-from="{{$min_price}}"
                                data-to="{{$max_price}}"
                                data-grid="true"
                            />
                        </div>

                        <div class="clearfix"> <a wire:click="filter('100','400000')" class="btn btn-block btn-primary" id="filterApply">Cari</a> </div>
                    </form>
                </div>
                </div>
                
                <div class="col-md-9 mb-9">

                    @foreach ($products as $p)                                           
                        <div class="col-md-4 col-12">
                            <div class="card card-item-general animated vp-fadeinup visible delayp1">
                                <div class="card-img" style="background: url({{ asset($p->image_path_1)}}) no-repeat center; background-size: cover">
                                    <div class="card-category">Default</div>
                                </div>
                                <div class="card-body">
                                    <h5>{{$p->name}}</h5>
                                    <h5>Rp {{ number_format($p->price, 2)}}</h5>
                                    <a href="{{url ('product/'.$p->id)}}" class="btn btn-primary btn-block mt-4">Lihat Detail</a>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>


    </div>

</div>


@push('scripts')
        <script type='text/javascript'>
            // document.addEventListener('livewire:load', function () {
                $(".js-range-slider").ionRangeSlider({
                onStart: function (data) {
                    // Called right after range slider instance initialised
            
                    console.log(data.input);        // jQuery-link to input
                    console.log(data.slider);       // jQuery-link to range sliders container
                    console.log(data.min);          // MIN value
                    console.log(data.max);          // MAX values
                    console.log(data.from);         // FROM value
                    console.log(data.from_percent); // FROM value in percent
                    console.log(data.from_value);   // FROM index in values array (if used)
                    console.log(data.to);           // TO value
                    console.log(data.to_percent);   // TO value in percent
                    console.log(data.to_value);     // TO index in values array (if used)
                    console.log(data.min_pretty);   // MIN prettified (if used)
                    console.log(data.max_pretty);   // MAX prettified (if used)
                    console.log(data.from_pretty);  // FROM prettified (if used)
                    console.log(data.to_pretty);    // TO prettified (if used)
                },
            
                onChange: function (data) {
                    // Called every time handle position is changed
            
                    console.log(data.from);
                },
            
                onFinish: function (data) {
                    // Called then action is done and mouse is released
            
                    console.log('finish ',data.from);
                    console.log('finish ',data.to);
                    // document.addEventListener('livewire:load', function () {
                    //     $("#filter_max").val(data.to)
                    // })
                    
                    @this.set('filter_max', data.to);
                    @this.set('filter_min', data.from);
                },
            
                onUpdate: function (data) {
                    // Called then slider is changed using Update public method
            
                    console.log(data.from_percent);
                }
                });
                console.log('DOMContentLoaded')
            // })
        </script>
        @endpush

