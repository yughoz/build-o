@extends('layouts.app')

@section('title', 'Transactions')

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

    <!-- vendor css files datepicker -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">

    {{-- Touchspin --}}
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">

    {{-- Override All CSS --}}
    <style>
        /* Override CSS Date Picker Position to Sticky */
        .picker{
            position: sticky !important;
        }
        .img {
            float: left;
            background-size: cover;
            max-height: 300px;
            max-width: 300px;
            object-fit: cover;
            display: none;
        }
    </style>

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> 
                    <a class="mytooltip nav-link active" data-toggle="tab" href="#listTransaction" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Transaction List" class="fa fas fa-list-alt"></i>
                        </span>
                    </a> 
                </li>
                @if (auth()->user()->can($module['create']))
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#addTransaction" role="tab">
                            <span>
                                <i data-toggle="tooltip" data-placement="top" title="Add Transaction" class="fa fas fa-plus"></i>
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="listTransaction" role="tabpanel">
                    <div class="p-20">
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Custom Product</th>
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <th>Project Address</th>
                                        <th>Date Building</th>
                                        <th>Percentage Building</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  p-20" id="addTransaction" role="tabpanel">
                    <form class="form-horizontal m-t-40" id="formAddTransaction" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Customer</label>
                            <select name="user_id" id="user_customer_list" class="select2 form-control" style="width: 100%">
                                    
                            </select>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input id="custom_design" name="is_custom" type="checkbox">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Custom Design</span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="not-custom-design-grouping">
                            <div class="form-group">
                                <label>Product</label>
                                <select name="product_id" id="product_list" class="select2 form-control" style="width: 100%">
                                        
                                </select>
                            </div>
                            <div class="grouping-product-detail" style="display: none;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img class="preview_image_1" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100%;width:100%;object-fit: cover;">
                                        </div>
                                        <div class="col-md-4">
                                            <img class="preview_image_2" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100%;width:100%;object-fit: cover;">
                                        </div>
                                        <div class="col-md-4">
                                            <img class="preview_image_3" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100%;width:100%;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img class="preview_image_4" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100%;width:100%;object-fit: cover;">
                                        </div>
                                        <div class="col-md-4">
                                            <img class="preview_image_5" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100%;width:100%;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <input type="text" class="form-control preview-product-category" placeholder="Product Category" disabled>
                                </div>
    
                                <div class="form-group">
                                    <label>Service Category</label>
                                    <input type="text" class="form-control preview-service-category" placeholder="Service Category" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control preview-price" placeholder="Price" disabled>
                                </div>
    
                                <div class="form-group">
                                    <label>Indexing Name</label>
                                    <input type="text" class="form-control preview-indexing-name" placeholder="Indexing Name" disabled>
                                </div>
    
                                <div class="form-group">
                                    <label>URL E-Commerce</label>
                                    <input type="text" class="form-control preview-ecommerce" placeholder="URL E-Commerce" disabled>
                                </div>
    
                                <div class="form-group">
                                    <label for="basicInputFile">Description</label>
                                    <div class="preview-description-product">
    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grouping-custom-design" style="display: none">
                            <div class="form-group">
                                <label>Service Menu</label>
                                <select name="service_menu_id" id="service_menu_list" class="select2 form-control" style="width: 100%">
                                        
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Custom Design Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="custom_design_name">
                            </div>
                            <fieldset class="form-group">
                                <label for="basicInputFile">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input images" id="image_custom_design" name="image">
                                    <label class="custom-file-label" for="image">Choose image</label>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <img class="preview_image_custom_design" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicInputFile">Description</label>
                            <input type="hidden" name="desc">
                            <div id="snow-wrapper">
                                <div id="snow-container">
                                    <div class="editor">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Start Date Build</label>
                            <input type="text" name="build_start" class="form-control pickadate-months-year" placeholder="Start Date Build">
                        </div>

                        <div class="form-group">
                            <label>End Date Build</label>
                            <input type="text" name="build_end" class="form-control pickadate-months-year" placeholder="End Date Build">
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

    {{-- Edit Transaction Modal --}}
    <div class="modal fade text-left" id="updateModalTransaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Update Progress Transaction</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUpdateTransaction" enctype="application/x-www-form-urlencoded">
                        <fieldset>
                            <legend>Customer Detail</legend>
                            <div class="form-group">
                                <label>Customer</label>
                                <input type="text" name="user_name" class="form-control" placeholder="Customer" disabled>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="user_email" class="form-control" placeholder="Email" disabled>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="user_phone" class="form-control" placeholder="Phone" disabled>
                            </div>
                            <div class="form-group">
                                <label>Job</label>
                                <input type="text" name="user_job" class="form-control" placeholder="Job" disabled>
                            </div>
                        </fieldset>
                        
                        <fieldset>
                            <legend>Product Detail</legend>
                            <div class="form-group">
                                <label>Product</label>
                                <input type="text" name="product_name" class="form-control" placeholder="Product Name" disabled>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="edit_preview_image_1 img" src="https://via.placeholder.com/500"alt="preview image">
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <img class="edit_preview_image_2 img" src="https://via.placeholder.com/500"alt="preview image">
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <img class="edit_preview_image_3 img" src="https://via.placeholder.com/500"alt="preview image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <img class="edit_preview_image_4 img" src="https://via.placeholder.com/500"alt="preview image">
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <img class="edit_preview_image_5 img" src="https://via.placeholder.com/500"alt="preview image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Product Category</label>
                                <input type="text" name="category_name" class="form-control" placeholder="Product Category" disabled>
                            </div>

                            <div class="form-group">
                                <label>Service Category</label>
                                <input type="text" name="service_name" class="form-control" placeholder="Service Category" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" placeholder="Price" disabled>
                            </div>

                            <div class="form-group">
                                <label>Indexing Name</label>
                                <input type="text" name="indexing_name" class="form-control" placeholder="Indexing Name" disabled>
                            </div>

                            <div class="form-group">
                                <label>URL E-Commerce</label>
                                <input type="text" name="url_ecommerce" class="form-control" placeholder="URL E-Commerce" disabled>
                            </div>

                            <div class="form-group">
                                <label for="basicInputFile">Description</label>
                                <div class="edit-preview-description-product">

                                </div>
                            </div>
                        </fieldset>
                    
                        <fieldset>
                            <legend>Transaction Detail</legend>
                            <div class="form-group">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-success">
                                        <input name="update_is_custom" type="checkbox" disabled>
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Custom Design</span>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="edit-grouping-custom-design" style="display: none">
                                <div class="form-group">
                                    <label>Custom Design Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="custom_design_name">
                                </div>
                                <div class="form-group">
                                    <label for="basicInputFile">Image Custom Design</label>
                                    <div class="col-md-3">
                                        <img class="edit_preview_image_custom_design" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="basicInputFile">Description</label>
                                <input type="hidden" name="desc">
                                <div id="snow-wrapper">
                                    <div id="edit-snow-container">
                                        <div class="editor">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
                            </div>
    
                            <div class="form-group">
                                <label>Start Date Build</label>
                                <input type="text" name="build_start" class="form-control datepicker-months-year" placeholder="Start Date Build">
                            </div>
    
                            <div class="form-group">
                                <label>End Date Build</label>
                                <input type="text" name="build_end" class="form-control datepicker-months-year" placeholder="End Date Build">
                            </div>
                            
                            <div class="form-group">
                                <label>Percentage Progress</label>
                                <div class="input-group">
                                    <input type="number" name="percentage" class="touchspin-icon">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status Transaction</label>
                                <select class="form-control" name="status">
                                    <option value="start">Start</option>
                                    <option value="building">Building</option>
                                    <option value="finish">Finish</option>
                                </select>
                            </div>
                        </fieldset>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">Update Progress</button>
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

    {{-- vendor files select2 --}}
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

    {{-- vendor files sweetalert --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>

    {{-- vendor files quill editor --}}
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

    <!-- vendor files datetimepicker -->
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>

    <!-- vendor files touchspin -->
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/number-input.js') }}"></script>

    {{-- Script according page start here --}}
    <script>
        var snowEditor;
        var editSnowEditor;
        var transactionIDNew;
        
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

        // Datatable
        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("datatable.transaction") }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'user.name', name: 'user.name'},
                {
                    data: 'is_custom',
                    render : function(data, type, row) {
                        let is_custom = (data == true) ? "Custom" : "Not Custom";
                        return `<div class="badge badge-warning"> ${is_custom} </div>`
                    }
                },
                {data: 'name', name: 'name'},
                {
                    data: 'product.category.name',
                    render: function (data, type, row) { 
                        if (typeof data === 'undefined') {
                            return '<div class="badge badge-danger"> Product Category Not Available </div>'
                        }

                        return data;
                    }
                },
                {data: 'address', name: 'address'},
                {
                    data: function (row, type, set) {
                        return `${row.build_start_format} - ${row.build_end_format}`;
                    }, 
                },
                {
                    data: 'percentage', 
                    render : function (data, type, row) { 
                        return `${data}%`
                    }
                },
                {
                    data: 'status', 
                    render : function (data, type, row) { 

                        let color = 'info';
                        switch (data) {
                            case 'cancel':
                                color = 'danger';
                                break;
                            case 'building':
                                color = 'primary';
                                break;
                            case 'finish':
                                color = 'success';
                                break;
                            default:
                                color;
                                break;
                        }

                        return `<div class="badge badge-${color}"> ${data} </div>`
                    }
                },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        // Select2
        $('#user_customer_list').select2({
            placeholder: "Customer List",
            minimumInputLength: 2,
            ajax: {
                url: "{{ route('list.user') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
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

        $('#product_list').select2({
            placeholder: "Product List",
            minimumInputLength: 2,
            ajax: {
                url: "{{ route('select2.product') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                ...item,
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            },
            templateSelection: function (data, container) {
                // Add custom attributes to the <option> tag for the selected option
                $(data.element).attr('data-category_id', data.category_id);
                $(data.element).attr('data-description', data.description);
                $(data.element).attr('data-image_path_1', data.image_path_1);
                $(data.element).attr('data-image_path_2', data.image_path_2);
                $(data.element).attr('data-image_path_3', data.image_path_3);
                $(data.element).attr('data-image_path_4', data.image_path_4);
                $(data.element).attr('data-image_path_5', data.image_path_5);
                $(data.element).attr('data-indexing_name', data.indexing_name);
                $(data.element).attr('data-name', data.name);
                $(data.element).attr('data-price', data.price);
                $(data.element).attr('data-url_ecommerce', data.url_ecommerce);
                $(data.element).attr('data-category', (data.category ? data.category.name : ""));
                $(data.element).attr('data-service-menu', (data.service_menu ? data.service_menu.title : "") );
                return data.text;
            },
        });

        $('#service_menu_list').select2({
            placeholder: "Service Menu",
            ajax: {
                url: "{{ route('select2.servicemenu') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
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
        
        $('#product_list').on('select2:select', function (e) {
            $('.grouping-product-detail').hide();
            let category_id = $(this).find(':selected').data('category_id');
            let description = $(this).find(':selected').data('description');
            let image_path_1 = $(this).find(':selected').data('image_path_1');
            let image_path_2 = $(this).find(':selected').data('image_path_2');
            let image_path_3 = $(this).find(':selected').data('image_path_3');
            let image_path_4 = $(this).find(':selected').data('image_path_4');
            let image_path_5 = $(this).find(':selected').data('image_path_5');
            let indexing_name = $(this).find(':selected').data('indexing_name');
            let name = $(this).find(':selected').data('name');
            let price = $(this).find(':selected').data('price');
            let url_ecommerce = $(this).find(':selected').data('url_ecommerce');
            let category = $(this).find(':selected').data('category');
            let service_menu = $(this).find(':selected').data('service-menu');

            if (category_id && category_id != 0) {
                $('.grouping-product-detail').show();
                // Setting product detail
                for (let index = 1; index <= 5; index++) {
                    $(`.preview_image_${index}`).hide();
                    if (eval(`image_path_${index}`)) {
                        $(`.preview_image_${index}`).show();
                        $(`.preview_image_${index}`).attr('src', (eval(`image_path_${index}`) || 'https://via.placeholder.com/500')); 
                    } 
                }

                $('.name')
                $('.preview-product-category').val(category);
                $('.preview-service-category').val(service_menu);
                $('.preview-price').val(formatAmount(price.toFixed(2)));
                $('.preview-indexing-name').val(indexing_name);
                $('.preview-ecommerce').val(url_ecommerce);
                $('.preview-description-product').html(description);   
            }
        });

        // Date Time Picker
        $('.pickadate-months-year').pickadate({
            selectYears: true,
            selectMonths: true,
            format: 'yyyy-mm-dd'
        });

        $('.datepicker-months-year').pickadate({
            selectYears: true,
            selectMonths: true,
            format: 'yyyy-mm-dd'
        });

        $('#formAddTransaction').submit(function (e) { 
            e.preventDefault();
            // Set description
            let description = document.querySelector('#formAddTransaction input[name=desc]');
            let dataProduct = $('#product_list').select2('data');
            let isCustom = $('#custom_design').prop('checked');
            description.value = snowEditor.container.firstChild.innerHTML;
            
            if ($('#custom_design').prop('checked')) {
                name = $('#custom_design_name').val();
            } else {
                name = dataProduct[0].text;
            }
            let formData = new FormData(this);
            formData.append('is_custom', $('#custom_design').prop('checked'));
            formData.append('name', name);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            
            $.ajax({
                type: "POST",
                url: "{{ route('store.transaction') }}",
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
                    resetFormStore();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    resetFormStore();
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

        // Update action
        function updateTransaction(transactionID) {
            transactionIDNew = transactionID;
            $('#updateModalTransaction').modal('show');
            dataTransaction = getData(transactionIDNew);
            // Setting User Customer Detail
            $('#formUpdateTransaction [name="user_name"]').val(dataTransaction.user.name);
            $('#formUpdateTransaction [name="user_email"]').val(dataTransaction.user.email);
            if (dataTransaction.user.customers) {
                $('#formUpdateTransaction [name="user_phone"]').val(dataTransaction.user.customers.phone);
                $('#formUpdateTransaction [name="user_job"]').val(dataTransaction.user.customers.job);   
            }

            // Setting Product Detail
            for (let index = 1; index <= 5; index++) {
                
                $(`#formUpdateTransaction .edit_preview_image_${index}`).hide();
                if (eval(`dataTransaction.product.image_path_${index}`)) {
                    $(`#formUpdateTransaction .edit_preview_image_${index}`).show();
                    $(`#formUpdateTransaction .edit_preview_image_${index}`).attr('src', (eval(`dataTransaction.product.image_path_${index}`) || 'https://via.placeholder.com/500'));
                } 
            }
            $('#formUpdateTransaction [name="product_name"]').val(dataTransaction.product.name);
            $('#formUpdateTransaction [name="category_name"]').val(dataTransaction.product.category.name);
            $('#formUpdateTransaction [name="service_name"]').val(dataTransaction.product.service_menu.title);
            $('#formUpdateTransaction [name="price"]').val(formatAmount(dataTransaction.product.price.toFixed(2)));
            $('#formUpdateTransaction [name="indexing_name"]').val(dataTransaction.product.indexing_name);
            $('#formUpdateTransaction [name="url_ecommerce"]').val(dataTransaction.product.url_ecommerce);
            $('#formUpdateTransaction .edit-preview-description-product').html(dataTransaction.product.description);

            // Setting Transaction Detail
            if (dataTransaction.is_custom) {
                $('#formUpdateTransaction .edit-grouping-custom-design').show();
                $('#formUpdateTransaction [name="is_custom"]').attr('checked', true);
                $('#formUpdateTransaction [name="custom_design_name"]').val(dataTransaction.name);
                $('#formUpdateTransaction .edit_preview_image_custom_design').attr('src', (dataTransaction.image_path || 'https://via.placeholder.com/500')); 
            }
            
            editSnowEditor.container.firstChild.innerHTML = dataTransaction.desc
            $('#formUpdateTransaction [name="address"]').val(dataTransaction.address);
            $('#formUpdateTransaction [name="percentage"]').val(dataTransaction.percentage);
            $('#formUpdateTransaction [name="build_start"]').val(dataTransaction.build_start);
            $('#formUpdateTransaction [name="build_end"]').val(dataTransaction.build_end);
        }

        // Action for request update to server side
        $('#formUpdateTransaction').submit(function (e) { 
            e.preventDefault();
            let url = '{{ route("update.transaction", ":id") }}';
            let price = $('#edit_price').val();
            url = url.replace(':id', transactionIDNew);
            let formData = new FormData(this);

            let description = $('formUpdateTransaction [name=desc]');
            if ($('#formUpdateTransaction [name="update_is_custom"]').prop('checked')) {
                name = $('#formUpdateTransaction [name="custom_design_name"]').val();
                description.value = snowEditor.container.firstChild.innerHTML;
            }
            console.log("Check description : ", description);

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

        // Cancel Action
        function cancelTransaction(transactionID) {
            let url = '{{ route("cancel.transaction", ":id") }}';
            url = url.replace(':id', transactionID);

            Swal.fire({
                title: 'Are you sure?',
                text: "This transaction being cancelled!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
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
                                'Cancelled!',
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
                        'Your transaction has been progress.',
                        'success'
                    )
                }
            })
        }

        function getData(transactionID) {
            let url = '{{ route("get.transaction", ":id") }}';
            let data;
            url = url.replace(':id', transactionID);
        
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

        function resetFormStore() {
            for (let index = 1; index <= 5; index++) {
                $(`.preview_image_${index}`).attr('src', 'https://via.placeholder.com/500'); 
            }
            snowEditor.container.firstChild.innerHTML = "";
            $('.preview_image_custom_design').attr('src', 'https://via.placeholder.com/500'); 

            $('#myTable').DataTable().ajax.reload();
            $("#user_customer_list").select2("val", "");
            $("#product_list").select2("val", "");
            $('.grouping-custom-design').hide();
            $('.grouping-product-detail').hide();
            $('.not-custom-design-grouping').show();
            document.getElementById('formAddTransaction').reset();
        }

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

        // Preview Image Custom Design
        $('#image_custom_design').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('.preview_image_custom_design').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        
        });

        // Make sure the product is custom or not
        $('#custom_design').change(function() {
            $('.grouping-custom-design').toggle();
            $('.not-custom-design-grouping').toggle()
        });

    </script>
@endsection