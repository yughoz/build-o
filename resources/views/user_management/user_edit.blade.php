@extends('layouts.app')

@section('title', 'Manajemen Akun')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel='stylesheet' href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel='stylesheet' href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    
    <!-- vendor css files sweetalert -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('app-assets/css/plugins/extensions/noui-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/core/colors/palette-noui.css') }}">
    
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endsection

@section('content')
    <!-- account setting page start -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                            href="#account-vertical-general" aria-expanded="true">
                            <i class="feather icon-globe mr-50 font-medium-3"></i>
                            General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                            href="#account-vertical-password" aria-expanded="false">
                            <i class="feather icon-lock mr-50 font-medium-3"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                    aria-labelledby="account-pill-general" aria-expanded="true">
                                    <form novalidate action="javascript:;" id="formEditUser">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-name">Nama</label>
                                                        <input 
                                                            type="text" 
                                                            class="form-control" 
                                                            id="name"
                                                            name="name"
                                                            placeholder="Name" 
                                                            value="{{ Auth::user()->name }}" 
                                                            data-validation-required-message="Kolom input Nama harus di isi!"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-e-mail">E-mail</label>
                                                        <input 
                                                            type="email" 
                                                            class="form-control" 
                                                            id="email"
                                                            name="email"
                                                            placeholder="Email" 
                                                            value="{{ Auth::user()->email }}" 
                                                            data-validation-required-message="Kolom input E-mail harus di isi!"
                                                            data-validation-email-message="Format email belum benar"
                                                            required
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan Perubahan</button>
                                                <button type="reset" class="btn btn-outline-warning">Batalkan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                    aria-labelledby="account-pill-password" aria-expanded="false">
                                    <form novalidate id="formUpdatePassword" action="javascript:;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-new-password">Password Baru</label>
                                                        <input 
                                                            type="password" 
                                                            name="password" 
                                                            class="form-control"
                                                            data-validation-required-message="Kolom input ini harus di isi!"
                                                            placeholder="Password" 
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">Konfirmasi Password Baru</label>
                                                            <input 
                                                                type="password" 
                                                                name="password_confirmation"
                                                                data-validation-match-match="password" 
                                                                class="form-control"
                                                                data-validation-match-message="Konfirmasi password harus sama dengan Password Baru"
                                                                data-validation-required-message="Konfirmasi Password harus sama"
                                                                placeholder="Repeat Password" 
                                                                required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan Perubahan</button>
                                                <button type="reset" class="btn btn-outline-warning">Batalkan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page end -->
@endsection

@section('vendor-script')
    {<!-- vendor files -->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>

    {{-- vendor files sweetalert --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection
@section('page-script')

    {{-- Script according page start here --}}
    <script>
        $( document ).ready(function() {
            // Input, Select, Textarea validations except submit button
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

            $('#formEditUser').submit(function (e) { 
                e.preventDefault();
                data = $(this).serialize();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                let url = '{{ route("update.user", ":id") }}';
                url = url.replace(':id', {{ Auth::user()->id }} );
                
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

            $('#formUpdatePassword').submit(function (e) { 
                e.preventDefault();
                data = $(this).serialize();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                let url = '{{ route("update.user", ":id") }}';
                url = url.replace(':id', {{ Auth::user()->id }} );
                
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
    </script>
@endsection