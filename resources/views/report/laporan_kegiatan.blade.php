@extends('layouts.app')

@section('title', 'Laporan Lampiran Kegiatan Pegawai')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    <!-- vendor css files select2 -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">

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
                            <form class="form form-vertical" id="search-form" action="javascript:;">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="koordinator">Pilih Pegawai</label>
                                                <select name="pegawai_id" class="select2 pegawai_list" style="width: 100%"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                                <input type='text' class="form-control datepicker"
                                                    name="tanggal_mulai" id="tanggal_mulai"
                                                    placeholder="Tanggal Mulai">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                                <input type='text' class="form-control datepicker"
                                                    name="tanggal_akhir" id="tanggal_akhir"
                                                    placeholder="Tanggal Akhir">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Filter</button>
                                            @if (auth()->user()->can('EXPORT_KEGIATAN'))
                                                <button type="button" onclick="exportData('excel')" class="btn btn-primary mr-1 mb-1">Export to Excel</button>
                                                <button type="button" onclick="exportData('pdf')" class="btn btn-primary mr-1 mb-1">Export to PDF</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table zero-configuration" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

    {{-- vendor files select2 --}}
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

    {{-- vendor files sweetalert --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script>
        $(document).ready(function() {

            // Filtering datepicker
            $('#search-form').on('submit', function(e) {
                table.draw();
                e.preventDefault();
            });

            // Datepicker
            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd'
            });

            // Select2 for Get Pegawai not Koordinator
            $(".pegawai_list").select2({
                placeholder: 'Pilih Pegawai',
                ajax: {
                    url: '{{ route("select2.pegawai") }}',
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

            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('list.report-kegiatan') }}",
                    data: function (d) {
                        d.tanggal_mulai = $('input[name=tanggal_mulai]').val() || "";
                        d.tanggal_akhir = $('input[name=tanggal_akhir]').val() || "";
                        d.pegawai_id = $('.pegawai_list').select2("val") || "";
                    }
                },
                columns: [{
                        data: 'pegawai.nip',
                        name: 'pegawai.nip'
                    },
                    {
                        data: 'pegawai.nama',
                        name: 'pegawai.nama'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
        }); 

        function exportData(type){ 
            let tanggal_mulai = $('input[name=tanggal_mulai]').val() || "";
            let tanggal_akhir = $('input[name=tanggal_akhir]').val() || "";
            let pegawai_id = $('.pegawai_list').select2("val") || "";
            data = {
                tanggal_mulai : tanggal_mulai,
                tanggal_akhir : tanggal_akhir,
                pegawai_id : pegawai_id,
            };

            const searchParams = jQuery.param(data);
            let error = false;
            if (tanggal_mulai != "" && tanggal_akhir == "") {
                error = true;
                errorType = "Tanggal Akhir tidak boleh kosong";
            }

            if (tanggal_mulai == "" && tanggal_akhir != "") {
                error = true;
                errorType = "Tanggal Awal tidak boleh kosong";
            }

            if (error) {
                Swal.fire({
                    title: "Error!",
                    text: errorType,
                    type: "error",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
            let url = "";
            switch (type) {
                case "excel":
                    url = "{{ route('export.excel-kegiatan') }}"+"?"+searchParams;
                    break;
                case "pdf":
                    url = "{{ route('export.pdf-kegiatan') }}"+"?"+searchParams;
                    break;
                default:
                    url = "#";
                    break;
            }
            
            window.open(
                url,
                '_blank' // <- This is what makes it open in a new window.
            );
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
    </script>
@endsection
