@extends('layouts.app')

@section('title', 'Manage Role and Permission')

@section('vendor-style')
    {{-- vendor css files datatables --}}
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
                    <a class="mytooltip nav-link active" data-toggle="tab" href="#listRole" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Role List" class="fa fas fa-list-alt"></i>
                        </span>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#addRole" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Add Role" class="fa fas fa-plus"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="listRole" role="tabpanel">
                    <div class="p-20">
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Form Add --}}
                <div class="tab-pane  p-20" id="addRole" role="tabpanel">
                    <form class="form-horizontal m-t-40" id="formAddRole">
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" name="role_name" class="form-control" placeholder="Role Name" value="" id="role_name">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

        {{-- Start Modal Here --}}
        {{-- Assign Permissions to Role Modal --}}
        <div id="assignPermissionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width: 100%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Assign Permission to <span class="title-role"></span></h4>
                        <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="formAssignPermissionToRole">
                            <div class="form-group row">
                                <label for="example-search-input" class="col-4 col-form-label">Permission</label>
                                <div class="col-8">
                                    <select id="permission_list" class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                        
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="table-responsive m-t-40">
                                        <table id="tablePermissionByRole" class="table table-bordered table-striped" style="width:100% !important;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Permission Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" id="addPermissionButton"">Assign Role</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Roles Modal --}}
        <div id="updateModalRole" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width: 100%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Role</span></h4>
                        <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal m-t-40" id="formUpdateRole">
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="role_name" class="form-control" placeholder="Role Name" id="update_role_name">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success">Update</button>
                                                <button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
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
    </div>
@endsection

@section('vendor-script')
    {{-- vendor files select2 --}}
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

    <script>
        $( document ).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('show.role-datatable') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#permission_list').select2({
                placeholder: "Permission",
                minimumInputLength: 2,
                ajax: {
                    url: "{{ route('list.permission') }}",
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

            $('#formAddRole').submit(function (e) { 
                e.preventDefault();
                data = $(this).serialize();
                
                $.ajax({
                    type: "POST",
                    url: "{{ route('store.role') }}",
                    data: data,
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            type: "success",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        });
                        $('#role_name').val('');
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

        });

        function givePermissionToRole(roleId, roleName) { 
            $('#assignPermissionModal').modal('show');
            $('.title-role').text(titleCase(roleName));

            let url = '{{ route("list.permissions-by-role", ":id") }}';
            url = url.replace(':id', roleId);
        
            $('#tablePermissionByRole').DataTable().destroy();    
            var tablePermission = $('#tablePermissionByRole').DataTable({
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#addPermissionButton').click(function (e) { 
                e.preventDefault();
                e.stopPropagation();
                savePermissionOnRole(roleId);
                setTimeout(() => {
                    $('#tablePermissionByRole').DataTable().ajax.reload();    
                }, 1000);
                $('#permission_list').select2('val', '');
            });

            $(document).on('click','.revokePermission', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).off('click');
                let permission_id = $(this).data('permission');
                let url = '{{ route("revoke.permission",":id") }}';
                url = url.replace(':id', roleId);
                data = {
                    '_token' : "{{ csrf_token() }}",
                    'role_id' : roleId,
                    'permission_id' : permission_id
                }
                $.ajax({
                    type: "PUT",
                    url: url,
                    data: data,
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            type: "success",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        });
                        setTimeout(() => {
                            $('#tablePermissionByRole').DataTable().ajax.reload();    
                        }, 1000);
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
        }

        function savePermissionOnRole(roleId) {
            permission = $('#permission_list').select2("val");
            data = {
                '_token' : "{{ csrf_token() }}",
                'permission' : permission,
                'role_id' : roleId
            }
            $.ajax({
                type: "POST",
                url: "{{ route('store.permission-role') }}",
                data: data,
                dataType: "JSON",
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        type: "success",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
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
        }

        function updateRole(roleId, roleName) {
            $('#updateModalRole').modal('show');
            $('#update_role_name').val(roleName);

            // Action for updating role
            $('#formUpdateRole').submit(function (e) { 
                e.preventDefault();
                e.stopPropagation();
                $(this).off('click');
                let url = '{{ route("update.role", ":id") }}';
                url = url.replace(':id', roleId);
                data = $(this).serialize();
                
                $.ajax({
                    type: "PUT",
                    url: url,
                    data: data,
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
        }

        function removeRole(roleId) {
            let url = '{{ route("destroy.role", ":id") }}';
            url = url.replace(':id', roleId);

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
                     $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
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

        function titleCase(string) {
            var sentence = string.toLowerCase().split(" ");
            for(var i = 0; i< sentence.length; i++){
                sentence[i] = sentence[i][0].toUpperCase() + sentence[i].slice(1);
            }
            return sentence;
        }
    </script>
@endsection