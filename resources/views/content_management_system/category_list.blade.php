@extends('layouts.app')

@section('title', 'List of Category')

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
                    <a class="mytooltip nav-link active" data-toggle="tab" href="#listCategory" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Category List" class="fa fas fa-list-alt"></i>
                        </span>
                    </a> 
                </li>
                @if (auth()->user()->can($module['create']))
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#addCategory" role="tab">
                            <span>
                                <i data-toggle="tooltip" data-placement="top" title="Add Category" class="fa fas fa-plus"></i>
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="listCategory" role="tabpanel">
                    <div class="p-20">
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Service Menu</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  p-20" id="addCategory" role="tabpanel">
                    <form class="form-horizontal m-t-40" id="formAddCategory" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Service Menu</label>
                            <select name="service_menu_id" class="select2 form-control service_menu_list" style="width: 100%">
                                    
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
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

    {{-- Edit Category Modal --}}
    <div id="updateModalCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Category</span></h4>
                    <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUpdateCategory" enctype="application/x-www-form-urlencoded">
                        <div class="form-group">
                            <label>Service Menu</label>
                            <select name="service_menu_id" class="select2 form-control service_menu_list" style="width: 100%">
                                    
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="edit_name" name="name" class="form-control" placeholder="Name">
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

    {{-- vendor files select2 --}}
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>

    {{-- Script according page start here --}}
    <script>
        var idUpdate;
        
        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("datatable.category") }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'service_menu.title', name: 'service_menu.title'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('.service_menu_list').select2({
            placeholder: "Service Menu",
            minimumInputLength: 2,
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

        $('#formAddCategory').submit(function (e) { 
            e.preventDefault();
            let formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            
            $.ajax({
                type: "POST",
                url: "{{ route('store.category') }}",
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
                    $('.service_menu_list').val(null).trigger('change');
                    document.getElementById('formAddCategory').reset();
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
        function removeCategory(id) {
            let url = '{{ route("destroy.category", ":id") }}';
            url = url.replace(':id', id);

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
        function updateCategory(id) {
            idUpdate = id;
            $('#updateModalCategory').modal('show');

            dataCategory = getData(id);
            let data = {
                id: dataCategory.service_menu_id,
                text: dataCategory.service_menu.title
            };

            var newOption = new Option(data.text, data.id, false, false);
            $('.service_menu_list').append(newOption).trigger('change');
            
            $('#edit_name').val(dataCategory.name);
        }

        // Action for request update to server side
        $('#formUpdateCategory').submit(function (e) { 
            e.preventDefault();
            let url = '{{ route("update.category", ":id") }}';
            url = url.replace(':id', idUpdate);
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

        function getData(id) {
            let url = '{{ route("get.category", ":id") }}';
            let data;
            url = url.replace(':id', id);
        
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

    </script>
@endsection