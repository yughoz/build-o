@extends('layouts.app')

@section('title', 'Service Menu')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    
    <!-- vendor css files select2 -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">

    <!-- vendor css files sweetalert -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> 
                    <a class="mytooltip nav-link active" data-toggle="tab" href="#listServiceMenu" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Service Menu List" class="fa fas fa-list-alt"></i>
                        </span>
                    </a> 
                </li>
                @if (auth()->user()->can($module['create']))
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#addServiceMenu" role="tab">
                            <span>
                                <i data-toggle="tooltip" data-placement="top" title="Add Service Menu" class="fa fas fa-plus"></i>
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="listServiceMenu" role="tabpanel">
                    <div class="p-20">
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Visible</th>
                                        <th>URL</th>
                                        <th>Service</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  p-20" id="addServiceMenu" role="tabpanel">
                    <form class="form-horizontal m-t-40" id="formaddServiceMenu" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="" maxlength="35">
                        </div>
                        <fieldset class="form-group">
                            
                            <label for="basicInputFile">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-3">
                                <img id="preview_image" src="https://via.placeholder.com/500"alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <fieldset>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input id="visible" name="visible" type="checkbox" checked="" value="true">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Visible</span>
                                </div>
                            </fieldset>
                        </div>
                        
                        <div class="form-group">
                            <fieldset>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input id="is_service" name="is_service" type="checkbox" checked="" value="true">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Is Service</span>
                                </div>
                            </fieldset>
                        </div>
                        
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="url" class="form-control" placeholder="Uniform Resource Locator" value="">
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

    {{-- Edit Service Menu Modal --}}
    <div id="updateModalServiceMenu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Service Menu</span></h4>
                    <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUpdateServiceMenu" enctype="application/x-www-form-urlencoded">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="edit_title" name="title" class="form-control" placeholder="Name" value="" maxlength="35">
                        </div>
                        <fieldset class="form-group">
                            <label for="basicInputFile">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="edit_image" name="image">
                                <label class="custom-file-label" for="edit_image">Choose image</label>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-3">
                                <img id="preview_image_edit" src="https://via.placeholder.com/500" alt="preview image" style="max-height: 100px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input id="edit_visible" name="visible" type="checkbox" checked="" value="true">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Visible</span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input id="edit_is_service" name="visible" type="checkbox" checked="" value="true">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Is Service</span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" id="edit_url" name="url" class="form-control" placeholder="Uniform Resource Locator" value="">
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

    {{-- vendor files select2 --}}
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

    {{-- vendor files sweetalert --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>

    {{-- Script according page start here --}}
    <script>
        var serviceMenuIDforUpdate;
        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('datatable.servicemenu') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'image_path', name: 'image_path'},
                {data: 'visible', name: 'visible'},
                {data: 'url', name: 'url'},
                {data: 'is_service', name: 'is_service'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview_image').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        
        });

        $('#edit_image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview_image_edit').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        
        });

        $('#formaddServiceMenu').submit(function (e) { 
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('visible', $('#visible').prop('checked'));
            formData.append('is_service', $('#is_service').prop('checked'));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            
            $.ajax({
                type: "POST",
                url: "{{ route('store.servicemenu') }}",
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
                    $('#myTable').DataTable().ajax.reload();
                    document.getElementById('formaddServiceMenu').reset();
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
        function removeServiceMenu(userId) {
            let url = '{{ route("destroy.servicemenu", ":id") }}';
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
        function updateServiceMenu(serviceMenuID) {
            serviceMenuIDforUpdate = serviceMenuID;
            $('#updateModalServiceMenu').modal('show');
            dataServiceMenu = getData(serviceMenuID);
            visible = dataServiceMenu.visible ? true : false;
            is_service = dataServiceMenu.is_service ? true : false;

            if (dataServiceMenu.image_path) {
                $('#preview_image_edit').attr('src', dataServiceMenu.image_path); 
            }
            
            $('#edit_title').val(dataServiceMenu.title);
            $("#edit_visible").prop("checked", visible);
            $("#edit_is_service").prop("checked", is_service);
            $('#edit_url').val(dataServiceMenu.url);
        }

        // Action for updating user
        $('#formUpdateServiceMenu').submit(function (e) { 
            e.preventDefault();
            e.stopPropagation();
            $(this).off('click');
            let url = '{{ route("update.servicemenu", ":id") }}';
            url = url.replace(':id', serviceMenuIDforUpdate);
            let formData = new FormData(this);
            formData.set('is_service', $('#edit_is_service').prop('checked'));
            formData.set('visible', $('#edit_visible').prop('checked'));
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

        function getData(serviceMenuID) {
            let url = '{{ route("get.servicemenu", ":id") }}';
            url = url.replace(':id', serviceMenuID);
            
            let data_user = "";
            $.ajax({
                type: "GET",
                url: url,
                dataType: "JSON",
                async: false,
                success: function (response) {
                    data_user = response.data;
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

            return data_user;
        }
    </script>
@endsection