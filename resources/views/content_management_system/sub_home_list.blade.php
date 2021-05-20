@extends('layouts.app')

@section('title', 'Sub List of '.$homes->module_name)

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
                    <a class="mytooltip nav-link active" data-toggle="tab" href="#listSubHome" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Sub Home List" class="fa fas fa-list-alt"></i>
                        </span>
                    </a> 
                </li>
                @if (auth()->user()->can($module['create']))
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#addSubHome" role="tab">
                            <span>
                                <i data-toggle="tooltip" data-placement="top" title="Add Sub Home" class="fa fas fa-plus"></i>
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="listSubHome" role="tabpanel">
                    <div class="p-20">
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Image URL</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  p-20" id="addSubHome" role="tabpanel">
                    <form class="form-horizontal m-t-40" id="formAddSubHome" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
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
    <div id="updateModalSubHome" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Sub Home</span></h4>
                    <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUpdateSubHome" enctype="application/x-www-form-urlencoded">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" id="edit_title">
                        </div>

                        <fieldset class="form-group">
                            <label for="basicInputFile">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input images" id="edit_image" name="image">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img class="edit_preview_image" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
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
        var subHomeIDNew;
        var moduleCode = "{{ $homes->module_code }}"
        var moduleName = "{{ $homes->module_name }}"
        var maxChild = "{{ $homes->max_child }}"
        
        // Quill Editor setup
        var toolbarOptions = [{ 'header': [1, 2, 3, 4, 5, 6, false] }, 'align', 'bold', 'italic', 'underline', 'strike', 'link'];
        var Font = Quill.import('formats/font');
        Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
        Quill.register(Font, true);

        // Snow Editor
        var snowEditor = new Quill('#snow-container .editor', {
            bounds: '#snow-container .editor',
            modules: {
                'formula': true,
                'syntax': true,
                'toolbar': toolbarOptions
            },
            theme: 'snow'
        });

        // Snow Editor for Update Modal
        var editSnowEditor = new Quill('#edit-snow-container .editor', {
            bounds: '#edit-snow-container .editor',
            modules: {
                'formula': true,
                'syntax': true,
                'toolbar': toolbarOptions
            },
            theme: 'snow'
        });

        var editors = [snowEditor, editSnowEditor];
        
        let datatableURL = '{{ route("datatable.subhome", ":id") }}';
        datatableURL = datatableURL.replace(':id', moduleCode);

        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: datatableURL,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {
                    data: 'img_url', 
                    render: function(data, type, row) {
                        if (data) {
                            return '<img class="preview_image" src="'+ data +'" alt="preview image" style="max-height: 30px;">';
                        }
                        return 'Image Not Available';
                        
                    }
                },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#formAddSubHome').submit(function (e) { 
            e.preventDefault();
            // Set description
            let description = document.querySelector('input[name=desc]');
            description.value = snowEditor.container.firstChild.innerHTML;

            let formData = new FormData(this);
            formData.append('max_child', maxChild)
            formData.append('module_code', moduleCode)
            formData.append('module_name', moduleName)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            
            $.ajax({
                type: "POST",
                url: "{{ route('store.subhome') }}",
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
                    snowEditor.container.firstChild.innerHTML = "";
                    $('#myTable').DataTable().ajax.reload();
                    $('.preview_image').attr('src', 'https://via.placeholder.com/500');
                    document.getElementById('formAddSubHome').reset();
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
        function removeSubHome(subHomeID) {
            let url = '{{ route("destroy.subhome", ":id") }}';
            url = url.replace(':id', subHomeID);

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
        function updateSubHome(subHomeID) {
            subHomeIDNew = subHomeID;
            $('#updateModalSubHome').modal('show');
            dataSubHome = getData(subHomeIDNew);
            editSnowEditor.container.firstChild.innerHTML = dataSubHome.desc
            
            $('#edit_title').val(dataSubHome.title);
            $(`.edit_preview_image`).attr('src', (dataSubHome['img_url'] || 'https://via.placeholder.com/500')); 
        }

        // Action for request update to server side
        $('#formUpdateSubHome').submit(function (e) { 
            e.preventDefault();
            let url = '{{ route("update.subhome", ":id") }}';
            url = url.replace(':id', subHomeIDNew);
            let formData = new FormData(this);

            formData.set('desc', editSnowEditor.container.firstChild.innerHTML)
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

        function getData(subHomeID) {
            let url = '{{ route("get.subhome", ":id") }}';
            let data;
            url = url.replace(':id', subHomeID);
        
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

        // Preview Image Edit
        $('.edit-images').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('.edit_preview_image').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        
        });

    </script>
@endsection