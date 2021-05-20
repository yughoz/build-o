@extends('layouts.app')

@section('title', 'Koordinator')

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
{{-- Nav Filled Starts --}}
<section id="nav-filled">
    <div class="row">
        <div class="col-sm-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="card-body">
                        {{-- Nav tabs --}}
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-fill" data-toggle="tab" href="#list-koordinator-tab"
                                    role="tab" aria-controls="home-fill" aria-selected="true">List Koordinator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-fill" data-toggle="tab" href="#tambah-koordinator-tab"
                                    role="tab" aria-controls="profile-fill" aria-selected="false">Tambah Koordinator</a>
                            </li>
                        </ul>

                        {{-- Tab panes --}}
                        <div class="tab-content pt-1">
                            <div class="tab-pane active" id="list-koordinator-tab" role="tabpanel" aria-labelledby="home-fill">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Gelar</th>
                                                <th>Pangkat</th>
                                                <th>Golongan</th>
                                                <th>TMT</th>
                                                <th>Nama Jabatan</th>
                                                <th>TMT Jabatan</th>
                                                <th>Kelas Jabatan</th>
                                                <th>Tanggal Pensiun</th>
                                                <th>Agama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tambah-koordinator-tab" role="tabpanel" aria-labelledby="profile-fill">
                                <form class="form form-vertical" id="formAddKoordinator" action="javascript:;">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="koordinator">Pilih Koordinator</label>
                                                    <select name="pegawai_id" class="select2 pegawai_list" style="width: 100%"></select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan
                                                    Koordinator</button>
                                                <button type="button" id="resetForm"
                                                    class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                            </div>
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
{{-- Nav Filled Ends --}}
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
    <script>
        $( document ).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('list.koordinator-datatable') }}",
                columns: [
                    {data: 'pegawai.nip', name: 'nip'},
                    {data: 'pegawai.nama', name: 'nama'},
                    {data: 'pegawai.gelar', name: 'gelar'},
                    {data: 'pegawai.pangkat', name: 'pangkat'},
                    {data: 'pegawai.golongan', name: 'golongan'},
                    {data: 'pegawai.tmt', name: 'tmt'},
                    {data: 'pegawai.nama_jabatan', name: 'nama_jabatan'},
                    {data: 'pegawai.tmt_jabatan', name: 'tmt_jabatan'},
                    {data: 'pegawai.kelas_jabatan', name: 'kelas_jabatan'},
                    {data: 'pegawai.tanggal_pensiun', name: 'tanggal_pensiun'},
                    {data: 'pegawai.agama', name: 'agama'},
                    {data: 'pegawai.jenis_kelamin', name: 'jenis_kelamin'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            // Select2 for Get Pegawai not Koordinator
            $(".pegawai_list").select2({
                placeholder: 'Pilih Pegawai',
                ajax: {
                    url: '{{ route("select2.pegawai-koordinator") }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: "("+ item.nip +") "+item.nama,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#resetForm').click(function (e) { 
                e.preventDefault();
                $(".pegawai_list").empty();
            });

            $('#formAddKoordinator').submit(function (e) { 
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                
                pegawai_id = $('.pegawai_list').select2("val");
                data = {
                    'pegawai_id' : pegawai_id
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('store.koordinator') }}",
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
                $(".pegawai_list").empty();
            });
        });

        // Remove Action
        function removeKoordinator(koordinatorId) {
            let url = '{{ route("destroy.koordinator", ":id") }}';
            url = url.replace(':id', koordinatorId);

            Swal.fire({
                title: 'Yakin?',
                text: "Kamu tidak bisa mengembalikan data ini lagi!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data ini!',
                cancelButtonText: 'Batalkan!'
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
                        'Data kamu aman.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection