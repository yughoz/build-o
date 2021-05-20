@extends('layouts.app')

@section('title', 'User Management')

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
                    <a class="mytooltip nav-link active" data-toggle="tab" href="#listUser" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="User List" class="fa fas fa-list-alt"></i>
                        </span>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#addUser" role="tab">
                        <span>
                            <i data-toggle="tooltip" data-placement="top" title="Add User" class="fa fas fa-user-plus"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="listUser" role="tabpanel">
                    <div class="p-20">
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  p-20" id="addUser" role="tabpanel">
                    <form class="form-horizontal m-t-40" id="formAddUser">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="" maxlength="25">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" value="">
                        </div>
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
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

    {{-- Start Modal Here --}}
    <div id="assignRoleToUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Give Role to <span class="title-email"></span></h4>
                    <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="formAssignRoleToUser">
                        <div class="form-group row">
                            <label for="example-search-input" class="col-4 col-form-label">Role</label>
                            <div class="col-8">
                                <select class="select2 m-b-10 select2-multiple role_list" style="width: 100%" multiple="multiple" data-placeholder="Choose Role">
                                    
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" id="assignRoleToUserButton"">Assign Role</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Assign User to Pegawai --}}
    <div id="assignUserToPegawaiModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">
                <form id="formAssignUserToPegawai">
                    <div class="modal-header">
                        <h4 class="modal-title">Assign User to Pegawai</h4>
                        <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="example-search-input" class="col-4 col-form-label">Pegawai</label>
                            <div class="col-8">
                                    <select name="pegawai_id" class="select2 pegawai_list" style="width: 100%"></select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" id="assignUserToPegawaiButton">Assign User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit User Modal --}}
    <div id="updateModalUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update User</span></h4>
                    <button type="button" class="close align-right" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUpdateUser">
                        <div class="form-group">
                            <label>Name</label>
                            <input id="update_name" type="text" name="name" class="form-control" placeholder="Name" value="" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input id="update_email" type="email" name="email" class="form-control" placeholder="Email" value="" maxlength="25">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" value="">
                        </div>
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
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
        $( document ).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('show.user-datatable') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {
                        data: 'roles', 
                        render: function ( data, type, row ) {
                            let labelRole = "";
                            $.each(data, function (index, role) { 
                                labelRole += "<span class='label label-info'>"+ role.name +"</span> ";
                            });
                            return labelRole;
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#formAddUser').submit(function (e) { 
                e.preventDefault();
                data = $(this).serialize();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                
                $.ajax({
                    type: "POST",
                    url: "{{ route('store.user') }}",
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
                        document.getElementById('formAddUser').reset();
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
        });

        function assignRoleToUser(userId) { 
            $('#assignRoleToUser').modal('show');

            $('.role_list').select2({
                placeholder: "Role",
                minimumInputLength: 2,
                maximumSelectionLength: 1,
                ajax: {
                    url: "{{ route('list.role') }}",
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

            $('#assignRoleToUserButton').click(function (e) { 
                // Prepare double click
                e.preventDefault();
                e.stopPropagation();
                $(this).off('click');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                
                role_id = $('.role_list').select2("val");
                data = {
                    'role_id' : role_id,
                    'user_id' : userId
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('store.user-role') }}",
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
                        $('#assignRoleToUser').modal('hide');
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
                $('.role_list').select2('val', '');
            });
        }

        // Remove Action
        function removeUser(userId) {
            let url = '{{ route("destroy.user", ":id") }}';
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
        function updateUser(userId) {
            $('#updateModalUser').modal('show');
            data_user = getData(userId);
            role = data_user.roles[0].name
            
            $('#update_name').val(data_user.name);
            $('#update_email').val(data_user.email);
            
            // Action for updating user
            $('#formUpdateUser').submit(function (e) { 
                e.preventDefault();
                e.stopPropagation();
                $(this).off('click');
                let url = '{{ route("update.user", ":id") }}';
                url = url.replace(':id', userId);
                data = $(this).serialize();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                
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

        function getData(userId) {
            let url = '{{ route("get.user", ":id") }}';
            url = url.replace(':id', userId);
            
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