@extends('layouts.app')

@section('title', 'Pegawai')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    <!-- vendor css files datepicker -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">

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
                                    <a class="nav-link active" id="home-tab-fill" data-toggle="tab" href="#list-pegawai-tab"
                                        role="tab" aria-controls="home-fill" aria-selected="true">List Pegawai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#tambah-pegawai-tab"
                                        role="tab" aria-controls="profile-fill" aria-selected="false">Tambah Pegawai</a>
                                </li>
                            </ul>

                            {{-- Tab panes --}}
                            <div class="tab-content pt-1">
                                <div class="tab-pane active" id="list-pegawai-tab" role="tabpanel"
                                    aria-labelledby="home-tab-fill">
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
                                <div class="tab-pane" id="tambah-pegawai-tab" role="tabpanel"
                                    aria-labelledby="profile-tab-fill">
                                    <form class="form form-vertical" id="formAddPegawai">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="nip">NIP</label>
                                                        <input type="number" id="nip" class="form-control" name="nip"
                                                            placeholder="NIP">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="no_kapreg">No. Kapreg</label>
                                                        <input type="text" id="no_kapreg" class="form-control"
                                                            name="no_kapreg" placeholder="No. Kapreg">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" id="nama" class="form-control" name="nama"
                                                            placeholder="Nama">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="gelar">Gelar</label>
                                                        <input type="text" id="gelar" class="form-control" name="gelar"
                                                            placeholder="Gelar">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="pangkat">Pangkat</label>
                                                        <input type="text" id="pangkat" class="form-control" name="pangkat"
                                                            placeholder="Pangkat">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="golongan">Golongan</label>
                                                        <input type="text" id="golongan" class="form-control"
                                                            name="golongan" placeholder="Golongan">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tmt">TMT</label>
                                                        <input type='text' class="form-control tmt-datepicker" name="tmt"
                                                            id="tmt" placeholder="TMT">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="nama_jabatan">Nama Jabatan</label>
                                                        <input type='text' class="form-control" name="nama_jabatan"
                                                            id="nama_jabatan" placeholder="Nama Jabatan">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tmt_jabatan">TMT Jabatan</label>
                                                        <input type='text' class="form-control tmt-jabatan-datepicker"
                                                            name="tmt_jabatan" id="tmt_jabatan" placeholder="TMT Jabatan">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kelas_jabatan">Kelas Jabatan</label>
                                                        <input type='text' class="form-control" name="kelas_jabatan"
                                                            id="kelas_jabatan" placeholder="Kelas Jabatan">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tanggal_pensiun">Tanggal Pensiun</label>
                                                        <input type='text' class="form-control tanggal-pensiun-datepicker"
                                                            name="tanggal_pensiun" id="tanggal_pensiun"
                                                            placeholder="Tanggal Pensiun">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tempat_lahir">Tempat Lahir</label>
                                                        <input type='text' class="form-control" name="tempat_lahir"
                                                            id="tempat_lahir" placeholder="Tempat Lahir">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                                        <input type='text' class="form-control tanggal-lahir-datepicker"
                                                            name="tanggal_lahir" id="tanggal_lahir"
                                                            placeholder="Tanggal Lahir">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="agama">Agama</label>
                                                        <input type='text' class="form-control"
                                                            name="agama" id="agama" placeholder="Agama">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-control" id="jenis_kelamin"
                                                                name="jenis_kelamin">
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tanggal_mulai_kerja">Tanggal Mulai Kerja</label>
                                                        <input type='text'
                                                            class="form-control tanggal-mulai-kerja-datepicker"
                                                            name="tanggal_mulai_kerja" id="tanggal_mulai_kerja"
                                                            placeholder="Tanggal Mulai Kerja">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tanggal_akhir_kerja">Tanggal Akhir Kerja</label>
                                                        <input type='text'
                                                            class="form-control tanggal-akhir-kerja-datepicker"
                                                            name="tanggal_akhir_kerja" id="tanggal_akhir_kerja"
                                                            placeholder="Tanggal Akhir Kerja">
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <fieldset class="checkbox">
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" value="1" name="aktif" id="aktif" checked>
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="">Aktif</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan
                                                        Pegawai</button>
                                                    <button type="reset"
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
    <div class="modal fade text-left" id="updatePegawaiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Edit Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" id="formUpdatePegawai" action="javascript:;">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_nip">NIP</label>
                                        <input type="number" id="update_nip" class="form-control" name="nip"
                                            placeholder="NIP">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_no_kapreg">No. Kapreg</label>
                                        <input type="text" id="update_no_kapreg" class="form-control"
                                            name="no_kapreg" placeholder="No. Kapreg">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_nama">Nama</label>
                                        <input type="text" id="update_nama" class="form-control" name="nama"
                                            placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_gelar">Gelar</label>
                                        <input type="text" id="update_gelar" class="form-control" name="gelar"
                                            placeholder="Gelar">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_pangkat">Pangkat</label>
                                        <input type="text" id="update_pangkat" class="form-control" name="pangkat"
                                            placeholder="Pangkat">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_golongan">Golongan</label>
                                        <input type="text" id="update_golongan" class="form-control"
                                            name="golongan" placeholder="Golongan">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_tmt">TMT</label>
                                        <input type='text' class="form-control update-datepicker" name="tmt"
                                            id="update_tmt" placeholder="TMT">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_nama_jabatan">Nama Jabatan</label>
                                        <input type='text' class="form-control" name="nama_jabatan"
                                            id="update_nama_jabatan" placeholder="Nama Jabatan">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_tmt_jabatan">TMT Jabatan</label>
                                        <input type='text' class="form-control update-datepicker"
                                            name="tmt_jabatan" id="update_tmt_jabatan" placeholder="TMT Jabatan">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_kelas_jabatan">Kelas Jabatan</label>
                                        <input type='text' class="form-control" name="kelas_jabatan"
                                            id="update_kelas_jabatan" placeholder="Kelas Jabatan">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_tanggal_pensiun">Tanggal Pensiun</label>
                                        <input type='text' class="form-control update-datepicker"
                                            name="tanggal_pensiun" id="update_tanggal_pensiun"
                                            placeholder="Tanggal Pensiun">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_tempat_lahir">Tempat Lahir</label>
                                        <input type='text' class="form-control" name="tempat_lahir"
                                            id="update_tempat_lahir" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_tanggal_lahir">Tanggal Lahir</label>
                                        <input type='text' class="form-control update-datepicker"
                                            name="tanggal_lahir" id="update_tanggal_lahir"
                                            placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_agama">Agama</label>
                                        <input type='text' class="form-control"
                                            name="agama" id="update_agama" placeholder="Agama">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_jenis_kelamin">Jenis Kelamin</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="update_jenis_kelamin"
                                                name="jenis_kelamin">
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_tanggal_mulai_kerja">Tanggal Mulai Kerja</label>
                                        <input type='text'
                                            class="form-control update-datepicker"
                                            name="tanggal_mulai_kerja" id="update_tanggal_mulai_kerja"
                                            placeholder="Tanggal Mulai Kerja">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="update_tanggal_akhir_kerja">Tanggal Akhir Kerja</label>
                                        <input type='text'
                                            class="form-control update-datepicker"
                                            name="tanggal_akhir_kerja" id="update_tanggal_akhir_kerja"
                                            placeholder="Tanggal Akhir Kerja">
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <fieldset class="checkbox">
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="1" name="aktif" id="update_aktif">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Aktif</span>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Edit
                                        Pegawai</button>
                                    <button type="reset"
                                        class="btn btn-outline-warning mr-1 mb-1">Reset</button>
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
    {{-- vendor files datatable --}}
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>

    <!-- vendor files date picker -->
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>

    {{-- vendor files sweetalert --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('list.pegawai-datatable') }}",
                columns: [{
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'gelar',
                        name: 'gelar'
                    },
                    {
                        data: 'pangkat',
                        name: 'pangkat'
                    },
                    {
                        data: 'golongan',
                        name: 'golongan'
                    },
                    {
                        data: 'tmt',
                        name: 'tmt'
                    },
                    {
                        data: 'nama_jabatan',
                        name: 'nama_jabatan'
                    },
                    {
                        data: 'tmt_jabatan',
                        name: 'tmt_jabatan'
                    },
                    {
                        data: 'kelas_jabatan',
                        name: 'kelas_jabatan'
                    },
                    {
                        data: 'tanggal_pensiun',
                        name: 'tanggal_pensiun'
                    },
                    {
                        data: 'agama',
                        name: 'agama'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // Format Date Picker
            $('.tmt-datepicker').pickadate({
                format: 'yyyy-mm-dd'
            });

            $('.update-datepicker').pickadate({
                format: 'yyyy-mm-dd'
            });

            $('.tmt-jabatan-datepicker').pickadate({
                format: 'yyyy-mm-dd'
            });

            $('.tanggal-pensiun-datepicker').pickadate({
                format: 'yyyy-mm-dd'
            });

            $('.tanggal-lahir-datepicker').pickadate({
                format: 'yyyy-mm-dd'
            });

            $('.tanggal-mulai-kerja-datepicker').pickadate({
                format: 'yyyy-mm-dd'
            });

            $('.tanggal-akhir-kerja-datepicker').pickadate({
                format: 'yyyy-mm-dd'
            });

            // Start Manage this form
            $('#formAddPegawai').submit(function(e) {
                e.preventDefault();
                data = $(this).serialize();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('store.pegawai') }}",
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            type: "success",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        });
                        $('#myTable').DataTable().ajax.reload();
                        document.getElementById('formAddPegawai').reset();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        let message = (xhr.responseJSON.message != "") ? xhr.responseJSON
                            .message : "Internal Server Error!";
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

         // Update action
         function updatePegawai(pegawaiId) {
            $('#updatePegawaiModal').modal('show');

            data_pegawai = getData(pegawaiId);
            
            $('#update_nip').val(data_pegawai.nip);
            $('#update_no_kapreg').val(data_pegawai.no_kapreg);
            $('#update_nama').val(data_pegawai.nama);
            $('#update_gelar').val(data_pegawai.gelar);
            $('#update_pangkat').val(data_pegawai.pangkat);
            $('#update_golongan').val(data_pegawai.golongan);
            $('#update_tmt').val(data_pegawai.tmt);
            $('#update_nama_jabatan').val(data_pegawai.nama_jabatan);
            $('#update_tmt_jabatan').val(data_pegawai.tmt_jabatan);
            $('#update_kelas_jabatan').val(data_pegawai.kelas_jabatan);
            $('#update_tanggal_pensiun').val(data_pegawai.tanggal_pensiun);
            $('#update_tempat_lahir').val(data_pegawai.tempat_lahir);
            $('#update_tanggal_lahir').val(data_pegawai.tanggal_lahir);
            $('#update_agama').val(data_pegawai.agama);
            $('#update_jenis_kelamin').val(data_pegawai.jenis_kelamin);
            $('#update_tanggal_mulai_kerja').val(data_pegawai.tanggal_mulai_kerja);
            $('#update_tanggal_akhir_kerja').val(data_pegawai.tanggal_akhir_kerja);
            if (data_pegawai.aktif == 1) {
                $('#update_aktif').prop('checked', true)
            } else {
                $('#update_aktif').prop('checked', false)
            }
            
            // Action for updating pegawai
            $('#formUpdatePegawai').submit(function (e) { 
                e.preventDefault();
                e.stopPropagation();
                $(this).off('click');
                let url = '{{ route("update.pegawai", ":id") }}';
                url = url.replace(':id', pegawaiId);
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

        // Get detail data
        function getData(pegawaiId) {
            let url = '{{ route("get.pegawai", ":id") }}';
            url = url.replace(':id', pegawaiId);
            
            let data_pegawai = "";
            $.ajax({
                type: "GET",
                url: url,
                dataType: "JSON",
                async: false,
                success: function (response) {
                    data_pegawai = response.data;
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

            return data_pegawai;
        }

        // Remove Action
        function removePegawai(pegawaiId) {
            let url = '{{ route("destroy.pegawai", ":id") }}';
            url = url.replace(':id', pegawaiId);

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
                        'Aman!',
                        'Data kamu aman.',
                        'success'
                    )
                }
            })
        }

    </script>
@endsection
