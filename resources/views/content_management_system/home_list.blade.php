@extends('layouts.app')

@section('title', 'List of Homes')

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
                    <a class="mytooltip nav-link active" data-toggle="tab" href="#listHome" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Home List" class="fa fas fa-list-alt"></i>
                        </span>
                    </a> 
                </li>
                @if (auth()->user()->can($module['create']))
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#addHome" role="tab">
                            <span>
                                <i data-toggle="tooltip" data-placement="top" title="Add Home" class="fa fas fa-plus"></i>
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="listHome" role="tabpanel">
                    <div class="p-20">
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Module Code</th>
                                        <th>Module Name</th>
                                        <th>Max Child</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  p-20" id="addHome" role="tabpanel">
                    <form class="form-horizontal m-t-40" id="formAddHome" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Module Code</label>
                            <input type="text" name="module_code" class="form-control" placeholder="Module Code">
                        </div>
                        <div class="form-group">
                            <label>Module Name</label>
                            <input type="text" name="module_name" class="form-control" placeholder="Module Name">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label>Max Child</label>
                            <input type="number" name="max_child" class="form-control" placeholder="Max Child">
                        </div>

                        <fieldset class="form-group">
                            <label for="basicInputFile">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input images" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="preview_image" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
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

    {{-- Edit Home Modal --}}
    <div id="updateModalHome" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Home</span></h4>
                    <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUpdateModule" enctype="application/x-www-form-urlencoded">
                        <div class="form-group">
                            <label>Module Code</label>
                            <input type="text" id="edit_module_code" name="module_code" class="form-control" placeholder="Module Code">
                        </div>
                        <div class="form-group">
                            <label>Module Name</label>
                            <input type="text" id="edit_module_name" name="module_name" class="form-control" placeholder="Module Name">
                        </div>
                        <div class="form-group">
                            <label>Max Child</label>
                            <input type="number" id="edit_max_child" name="max_child" class="form-control" placeholder="Max Child">
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
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>

    {{-- Script according page start here --}}
    <script>
        var snowEditor;
        var moduleCodeUpdate;
        
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

        var editors = [snowEditor];

        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("datatable.home") }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'module_code', name: 'module_code'},
                {data: 'module_name', name: 'module_name'},
                {data: 'max_child', name: 'max_child'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#formAddHome').submit(function (e) { 
            e.preventDefault();
            // Set description
            let description = document.querySelector('input[name=desc]');
            description.value = snowEditor.container.firstChild.innerHTML;
            let formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            
            $.ajax({
                type: "POST",
                url: "{{ route('store.home') }}",
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
                    $(`.preview_image`).attr('src', 'https://via.placeholder.com/500'); 
                    snowEditor.container.firstChild.innerHTML = "";
                    $('#myTable').DataTable().ajax.reload();
                    document.getElementById('formAddHome').reset();
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

        // Update action
        function updateHome(moduleCode) {
            moduleCodeUpdate = moduleCode;
            $('#updateModalHome').modal('show');
            dataModule = getData(moduleCode);
            
            $('#edit_module_code').val(dataModule.module_code);
            $('#edit_module_name').val(dataModule.module_name);
        }

        // Action for request update to server side
        $('#formUpdateModule').submit(function (e) { 
            e.preventDefault();
            let url = '{{ route("update.home", ":moduleCode") }}';
            let price = $('#edit_price').val();
            url = url.replace(':moduleCode', moduleCodeUpdate);
            let formData = new FormData(this);
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
            let url = '{{ route("get.home", ":id") }}';
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

        // Preview Image Add
        $('.images').change(function(){
            let image_number = $(this).attr('id');
            let number = image_number.charAt((image_number.length-1));
            let reader = new FileReader();
            reader.onload = (e) => { 
                $(`.preview_image`).attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        
        });

    </script>
@endsection