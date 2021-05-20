@extends('layouts.app')

@section('title', 'Products Of '.$service_menu->title)

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    
    <!-- vendor css files select2 -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">

    <!-- vendor css files sweetalert -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">

    <!-- vendor quill editor css files -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> 
                    <a class="mytooltip nav-link active" data-toggle="tab" href="#listProduct" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Product List" class="fa fas fa-list-alt"></i>
                        </span>
                    </a> 
                </li>
                @if (auth()->user()->can($module['create']))
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#addProduct" role="tab">
                            <span>
                                <i data-toggle="tooltip" data-placement="top" title="Add Product" class="fa fas fa-plus"></i>
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="listProduct" role="tabpanel">
                    <div class="p-20">
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Indexing Name</th>
                                        <th>Price</th>
                                        <th>Show</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  p-20" id="addProduct" role="tabpanel">
                    <form class="form-horizontal m-t-40" id="formAddProduct" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Indexing Name</label>
                            <input type="text" name="indexing_name" class="form-control" placeholder="Indexing Name">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" placeholder="price">
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input id="show" name="show" type="checkbox" checked="" value="true">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Show</span>
                                </div>
                            </fieldset>
                        </div>
                        
                        @if (!$service_menu->is_service)
                            <div class="form-group" id="group_url_ecommerce">
                                <label>URL Ecommerce Product</label>
                                <input type="text" id="url_ecommerce" name="url_ecommerce" class="form-control" placeholder="URL Ecommerce">
                            </div>
                        @endif

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 1</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input images" id="image_1" name="image_1">
                                <label class="custom-file-label" for="image">Choose image 1</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="preview_image_1" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 2</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input images" id="image_2" name="image_2">
                                <label class="custom-file-label" for="image">Choose image 2</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="preview_image_2" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 3</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input images" id="image_3" name="image_3">
                                <label class="custom-file-label" for="image">Choose image 3</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="preview_image_3" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 4</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input images" id="image_4" name="image_4">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="preview_image_4" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 5</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input images" id="image_5" name="image_5">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3 ">
                                <img class="preview_image_5" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="select2 form-control category_list" style="width: 100%">
                                    
                            </select>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="basicInputFile">Description</label>
                            <input type="hidden" name="description">
                            <div id="snow-wrapper">
                                <div id="snow-container">
                                    <div class="editor">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-inverse">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Product Modal --}}
    <div id="updateModalProduct" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Product</span></h4>
                    <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUpdateProduct" enctype="application/x-www-form-urlencoded">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="edit_name" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Indexing Name</label>
                            <input type="text" id="edit_indexing_name" name="indexing_name" class="form-control" placeholder="Indexing Name">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" id="edit_price" name="price" class="form-control" placeholder="price">
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input id="edit_show" name="show" type="checkbox" checked="" value="true">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Show</span>
                                </div>
                            </fieldset>
                        </div>
                        
                        @if (!$service_menu->is_service)
                            <div class="form-group" id="edit_group_url_ecommerce">
                                <label>URL Ecommerce Product</label>
                                <input type="text" id="edit_url_ecommerce" name="url_ecommerce" class="form-control" placeholder="URL Ecommerce">
                            </div>
                        @endif
                        
                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 1</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input edit-images" id="edit_image_1" name="image_1">
                                <label class="custom-file-label" for="image">Choose image 1</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="edit_preview_image_1" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 2</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input edit-images" id="edit_image_2" name="image_2">
                                <label class="custom-file-label" for="image">Choose image 2</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="edit_preview_image_2" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 3</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input edit-images" id="edit_image_3" name="image_3">
                                <label class="custom-file-label" for="image">Choose image 3</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="edit_preview_image_3" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 4</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input edit-images" id="edit_image_4" name="image_4">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="edit_preview_image_4" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image 5</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input edit-images" id="edit_image_5" name="image_5">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3 ">
                                <img class="edit_preview_image_5" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="select2 form-control category_list" style="width: 100%">
                                    
                            </select>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="basicInputFile">Description</label>
                            <input type="hidden" name="description">
                            <div id="snow-wrapper">
                                <div id="edit-snow-container">
                                    <div class="editor">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
{{-- vendor files --}}
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>

    {{-- vendor files sweetalert --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>

    {{-- vendor files quill editor --}}
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

    {{-- vendor files select2 --}}
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>

    {{-- Script according page start here --}}
    <script>
        var snowEditor;
        var editSnowEditor;
        var serviceMenuID = "{{ $service_menu->id }}";
        var productIDNew;
        
        // Quill Editor setup
        var toolbarOptions = [{ 'header': [1, 2, 3, 4, 5, 6, false] }, 'align', 'bold', 'italic', 'underline', 'strike', 'link'];
        var Font = Quill.import('formats/font');
        Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
        Quill.register(Font, true);

        // Snow Editor
        snowEditor = new Quill('#snow-container .editor', {
            bounds: '#snow-container .editor',
            modules: {
                'formula': true,
                'syntax': true,
                'toolbar': toolbarOptions
            },
            theme: 'snow'
        });

        // Snow Editor for Update Modal
        editSnowEditor = new Quill('#edit-snow-container .editor', {
            bounds: '#edit-snow-container .editor',
            modules: {
                'formula': true,
                'syntax': true,
                'toolbar': toolbarOptions
            },
            theme: 'snow'
        });

        var editors = [snowEditor, editSnowEditor];

        let datatableURL = '{{ route("datatable.product", ":id") }}';
        datatableURL = datatableURL.replace(':id', serviceMenuID);

        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: datatableURL,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'indexing_name', name: 'indexing_name'},
                {data: 'price', name: 'price'},
                {data: 'show', name: 'show'},
                {data: 'category.name', name: 'category.name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('.category_list').select2({
            placeholder: "Category",
            ajax: {
                url: "{{ route('select2.category') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term),
                        service_menu_id: serviceMenuID
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $('#formAddProduct').submit(function (e) { 
            e.preventDefault();
            // Set description
            let description = document.querySelector('input[name=description]');
            description.value = snowEditor.container.firstChild.innerHTML;
            let price = $('input[name=price]').val();

            let formData = new FormData(this);
            formData.append('visible', $('#visible').prop('checked'));
            formData.set('price', parseInt(price.replace(/,.*|[^0-9]/g, ''), 10));
            formData.append('service_menu_id', serviceMenuID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            
            $.ajax({
                type: "POST",
                url: "{{ route('store.product') }}",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        type: "success",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                    for (let index = 1; index <= 5; index++) {
                        $(`.preview_image_${index}`).attr('src', 'https://via.placeholder.com/500'); 
                    }
                    snowEditor.container.firstChild.innerHTML = "";
                    $('#myTable').DataTable().ajax.reload();
                    document.getElementById('formAddProduct').reset();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    let message = (xhr.responseJSON.message != "") ? xhr.responseJSON.message : "Internal Server Error!";
                    let typeMessage = (xhr.responseJSON.message != "") ? "warning" : "error"
                    
                    Swal.fire({
                        title: "Error!",
                        text: message,
                        type: typeMessage,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                }
            });
        });

        // Remove Action
        function removeProduct(userId) {
            let url = '{{ route("destroy.product", ":id") }}';
            url = url.replace(':id', userId);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    });
                    
                     $.ajax({
                        type: "DELETE",
                        url: url,
                        dataType: "JSON",
                        success: function (response) {
                            $('#myTable').DataTable().ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            )
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire(
                                'Error',
                                'Internal Server Error!',
                                'warning'
                            )
                        }
                    });
                    
                } else {
                    Swal.fire(
                        'Safe!',
                        'Your data has been safe.',
                        'success'
                    )
                }
            })
        }

        // Update action
        function updateProduct(productID) {
            productIDNew = productID;
            $('#updateModalProduct').modal('show');
            dataProduct = getData(productID);

            let optionSelect2 = {
                id: dataProduct.category_id,
                text: dataProduct.category.name
            };

            var newOption = new Option(optionSelect2.text, optionSelect2.id, false, false);
            $('.category_list').append(newOption).trigger('change');

            show = dataProduct.show ? true : false;
            is_service = dataProduct.is_service ? true : false;
            editSnowEditor.container.firstChild.innerHTML = dataProduct.description

            for (let index = 1; index <= 5; index++) {
                $(`.edit_preview_image_${index}`).attr('src', (dataProduct[`image_path_${index}`] || 'https://via.placeholder.com/500')); 
            }
            
            $('#edit_name').val(dataProduct.name);
            $('#edit_indexing_name').val(dataProduct.indexing_name);
            $('#edit_price').val(formatAmount(dataProduct.price.toFixed(2)));
            $("#edit_show").prop("checked", show);
            $("#edit_is_service").prop("checked", is_service);
            $('#edit_url_ecommerce').val(dataProduct.url_ecommerce);
        }

        // Action for request update to server side
        $('#formUpdateProduct').submit(function (e) { 
            e.preventDefault();
            let url = '{{ route("update.product", ":id") }}';
            let price = $('#edit_price').val();
            url = url.replace(':id', productIDNew);
            let formData = new FormData(this);

            formData.set('description', editSnowEditor.container.firstChild.innerHTML)
            formData.append('service_menu_id', serviceMenuID);
            formData.set('price', parseInt(price.replace(/,.*|[^0-9]/g, ''), 10));
            formData.append('show', $('#edit_show').prop('checked'));
            formData.append('_method', 'PUT');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        type: "success",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                    $('#myTable').DataTable().ajax.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        title: "Error!",
                        text: "Internal Server Error!",
                        type: "error",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                }
            });
        });

        function getData(productID) {
            let url = '{{ route("get.product", ":id") }}';
            let data;
            url = url.replace(':id', productID);
        
            $.ajax({
                type: "GET",
                url: url,
                dataType: "JSON",
                async: false,
                success: function (response) {
                    data = response.data;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        title: "Error!",
                        text: "Internal Server Error!",
                        type: "error",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                }
            });

            return data;
        }

        function formatAmountNoDecimals( number ) {
            var rgx = /(\d+)(\d{3})/;
            while( rgx.test( number ) ) {
                number = number.replace( rgx, '$1' + '.' + '$2' );
            }
            return number;
        }

        function formatAmount( number ) {
            // remove all the characters except the numeric values
            number = number.replace( /[^0-9]/g, '' );

            // set the default value
            if( number.length == 0 ) number = "0.00";
            else if( number.length == 1 ) number = "0.0" + number;
            else if( number.length == 2 ) number = "0." + number;
            else number = number.substring( 0, number.length - 2 ) + '.' + number.substring( number.length - 2, number.length );

            // set the precision
            number = new Number( number );
            number = number.toFixed( 2 );    // only works with the "."

            // change the splitter to ","
            number = number.replace( /\./g, ',' );

            // format the amount
            x = number.split( ',' );
            x1 = x[0];
            x2 = x.length > 1 ? ',' + x[1] : '';

            return `Rp. ${formatAmountNoDecimals( x1 ) + x2}`;
        }

        $('input[name=price]').keyup( function() {
            $( this ).val( formatAmount( $( this ).val() ) );
        });

        // Preview Image Add
        $('.images').change(function(){
            let image_number = $(this).attr('id');
            let number = image_number.charAt((image_number.length-1));
            let reader = new FileReader();
            reader.onload = (e) => { 
                $(`.preview_image_${number}`).attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        
        });

        // Preview Image Edit
        $('.edit-images').change(function(){
            let image_number = $(this).attr('id');
            let number = image_number.charAt((image_number.length-1));
            let reader = new FileReader();
            reader.onload = (e) => { 
                $(`.edit_preview_image_${number}`).attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        
        });

        // Manage is the product bagian dari service atau barang
        $('#is_service').change(function() {
            $( '#group_url_ecommerce' ).toggle();
        });

    </script>
@endsection