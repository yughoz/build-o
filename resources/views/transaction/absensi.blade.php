@extends('layouts.app')

@section('title', 'Kehadiran')
@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/quill.bubble.css') }}">

    <!-- vendor css files select2 -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection

@if ($is_absen)
    @if ((!empty($is_absen->waktu_mulai_kerja) && !empty($is_absen->waktu_akhir_kerja)) || !$is_absen->masuk)
        @section('content')
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kehadiran Form WFH</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="alert alert-primary" role="alert">
                                    <i class="feather icon-info mr-1 align-middle"></i>
                                    <span> Anda sudah hadir hari ini !</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    @endif    
@endif


@section('content')
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kehadiran Form WFH</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert @if(!$is_absen) alert-success @else alert-info @endif">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if(session('errors'))
                            <div class="alert alert-danger">
                                {{ $errors }}
                            </div>
                        @endif

                        <form id="form-absensi" class="form form-horizontal" action="{{ route('store.absensi') }}" method="POST" enctype="multipart/form-data">
                        {{-- <form id="form-absensi" class="form form-horizontal" action="javascript:;" method="POST" enctype="multipart/form-data" onsubmit="validateThisForm()"> --}}
                            @csrf
                            <input type="hidden" name="absen_type" id="absen_type" value="@if(!$is_absen)masuk @else keluar @endif">
                            <div class="form-body">
                                <div class="row">
                                    @if (!$is_absen)
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Status Kehadiran</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="status_absensi" value="true" checked>
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">WFH Kehadiran Datang</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-danger">
                                                                    <input type="radio" name="status_absensi" value="false">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">Tidak Masuk</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-12 masuk">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Rencana Aktifitas</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" name="aktifitas" id="aktifitas" rows="5" placeholder="Rencana Aktifitas"></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 masuk">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Lampiran Rencana Aktifitas</span>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <fieldset class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="lampiran_rencana_aktifitas" class="custom-file-input" id="lampiran_aktifitas">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>  --}}

                                        <div class="col-12 masuk">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Pilih Koordinator</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="koordinator_id" class="select2 koordinator_list" style="width: 100%"></select>
                                                </div>
                                            </div>
                                        </div>       

                                        {{-- Tidak Masuk Form --}}
                                        <div class="col-12 tidak-masuk">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Alasan Tidak Masuk</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="alasan_tidak_masuk" value="Sakit" checked>
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">Sakit</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="alasan_tidak_masuk" value="Izin">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">Izin</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="alasan_tidak_masuk" value="Cuti">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">Cuti</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="alasan_tidak_masuk" value="Lain-lain">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">Lain-lain</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 tidak-masuk">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Catatan Tidak Masuk</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" name="catatan_tidak_masuk" id="catatan_tidak_masuk" rows="5" placeholder="Catatan Tidak Masuk"></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 tidak-masuk">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Lampiran Tidak Masuk</span>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <fieldset class="form-group">
                                                        <div class="custom-file">
                                                            <input name="lampiran_tidak_masuk" type="file" class="custom-file-input" id="lampiran_tidak_masuk">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                           
                                    @else
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Status Kehadiran</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="status_absensi" value="true" checked>
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">WFH Kehadiran Pulang</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="absensi_id" id="absensi_id" value="{{ $is_absen->id }}">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>
                                                        Laporan Kegiatan
                                                        <br>
                                                        <span class="text-danger">(Wajib di Isi)</span>
                                                    </span>
                                                </div>
                                                <div class="col-md-8">
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" name="kegiatan" id="kegiatan" rows="5" placeholder="Laporan Kegiatan yang Dilakukan"></textarea>
                                                        <span class="text-danger hidden error-message-kegiatan"></span>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Permintaan 2020-08-28 --}}
                                        {{-- <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>
                                                        Deskripsi Upload Lampiran
                                                        <br>
                                                        <span class="text-danger">(Optional)</span>
                                                    </span>
                                                </div>
                                                <div class="col-md-8">
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" name="deskripsi_lampiran" id="deskripsi_lampiran" rows="5" placeholder="Deskripsi Lampiran File Upload"></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <button type="button" class="btn-tambah-lampiran btn btn-outline-info mr-1 mb-1">Tambah Surat Pernyataan dan Lampiran untuk di Unggah</button>
                                        </div>
                                        <div class="col-12 masuk increment">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>
                                                        Surat Pernyataan dan Lampiran
                                                        <br>
                                                        <span class="text-danger">(Batas waktu pengiriman laporan adalah {{ $sisa_hari_pengumpulan_laporan }} hari)</span>
                                                    </span>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <fieldset class="form-group">
                                                        <input type="file" id="kegiatan_lampiran" name="kegiatan_lampiran[]" class="form-control-file" multiple>
                                                    </fieldset>
                                                    <span class="text-danger hidden error-message-lampiran-kegiatan"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    @endif                                    
                                    
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1" id="submit-absen">
                                            @if (!$is_absen) WFH Kehadiran Datang @else WFH Kehadiran Pulang @endif
                                        </button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
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
    <!-- vendor files -->
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

    {{-- vendor files select2 --}}
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $(".btn-tambah-lampiran").click(function(){ 
                let clone_html = 
                    '<div class="col-12 clone">' +
                        '<div class="form-group row">' +
                            '<div class="col-md-4">' +
                                '<span>' +
                                    'Lampiran Laporan Kegiatan' +
                                    '<br>' +
                                    '<span class="text-danger">(Batas waktu pengiriman laporan adalah {{ $sisa_hari_pengumpulan_laporan }} hari)</span>' +
                                '</span>' +
                            '</div>' +
                            '<div class="col-lg-6 col-md-10">' +
                                '<fieldset class="form-group">' +
                                    '<input type="file" @if($required_laporan) required @endif id="kegiatan_lampiran" name="kegiatan_lampiran[]" class="form-control-file" multiple>' +
                                '</fieldset>' +
                            '</div>' +
                            '<div class="col-md-2">' +
                                '<button type="button" class="btn btn-danger remove-clone mr-1 mb-1">Hapus</button>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
                ;
                $(".increment").after(clone_html);
            });
            $("body").on("click",".remove-clone",function(){ 
                $(this).parents(".form-group").remove();
            });


            $('.tidak-masuk').hide();
            $("input[name='status_absensi']").click(function() {
                var absen = $(this).val();
                if (absen == 'true') {
                    $('.masuk').show();
                    $('.tidak-masuk').hide();
                    $("#submit-absen"). html("Masuk");
                } else {
                    $('.tidak-masuk').show();
                    $('.masuk').hide();
                    $("#submit-absen"). html("Tidak Masuk");
                }
            });

            // Select2 for Get Pegawai not Koordinator
            $(".koordinator_list").select2({
                placeholder: 'Pilih Koordinator',
                ajax: {
                    url: '{{ route("select2.koordinator") }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: "("+ item.pegawai.nip +") "+item.pegawai.nama,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#form-absensi').on('submit', function() {
                let isValid = true;
                let sisa_hari_pengumpulan = "{{ $sisa_hari_pengumpulan_laporan }}";
                    sisa_hari_pengumpulan = parseInt(sisa_hari_pengumpulan);
                let absen_type = $('#absen_type').val();
                    absen_type = absen_type.trim();
                let laporan_kegiatan = $('#kegiatan').val();
                    laporan_kegiatan = laporan_kegiatan.trim();
                let lampiran = $('#kegiatan_lampiran').prop("files");

                // Start validate this form when absen type keluar
                if (absen_type == "keluar") {
                    if (laporan_kegiatan == "") {
                        $('.error-message-kegiatan').removeClass('hidden');
                        $('.error-message-kegiatan').text("*Laporan Kegiatan TIDAK BOLEH KOSONG, Silahkan isi laporan kegiatan!");
                        isValid = false;    
                    }

                    if (sisa_hari_pengumpulan < 1 && lampiran.length < 1) {
                        $('.error-message-lampiran-kegiatan').removeClass('hidden');
                        $('.error-message-lampiran-kegiatan').text("*Anda tidak dapat absen pulang jika belum melampirkan file, silahkan lampirkan file!");
                        isValid = false;    
                    }
                }
                console.log("Absen Type : ", absen_type);
                console.log("Check : ", isValid);
                return isValid;
            });
        });
        
    </script>
@endsection
