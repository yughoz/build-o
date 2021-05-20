@extends('layouts.app')

@section('title', 'Detail Kehadiran')

@section('content')
    {{-- Nav Filled Starts --}}
    <section id="nav-filled">
        <div class="row">
            <div class="col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" id="form-detail-absen">
                                <div class="form-body">
                                    <div class="row">
                                        @if ($data_absensi->masuk == 1)
                                            {{-- Pegawai --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="number" id="nip" class="form-control" name="nip" placeholder="NIP" value="{{ $data_absensi->pegawai->nip }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" value="{{ $data_absensi->pegawai->nama }}" disabled>
                                                </div>
                                            </div>

                                            {{-- Koordinator --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nip_koordinator">NIP Koordinator</label>
                                                    <input 
                                                        type="number" 
                                                        id="nip_koordinator" 
                                                        class="form-control" 
                                                        name="nip_koordinator" 
                                                        placeholder="NIP Koordinator" 
                                                        value="{{ $data_absensi->koordinator->pegawai->nip }}" 
                                                        disabled
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama_koordinator">Nama Koordinator</label>
                                                    <input 
                                                        type="text" 
                                                        id="nama_koordinator" 
                                                        class="form-control"
                                                        name="nama_koordinator" 
                                                        placeholder="Nama Koordinator"
                                                        value="{{ $data_absensi->koordinator->pegawai->nama }}" 
                                                        disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="waktu_mulai_kerja">Waktu Mulai Kerja</label>
                                                    <input 
                                                        type="text" 
                                                        id="waktu_mulai_kerja" 
                                                        class="form-control" 
                                                        name="waktu_mulai_kerja"
                                                        placeholder="Waktu Mulai Kerja"
                                                        value="{{ $data_absensi->waktu_mulai_kerja }}" 
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="waktu_akhir_kerja">Waktu Akhir Kerja</label>
                                                    <input 
                                                        type="text" 
                                                        id="waktu_akhir_kerja" 
                                                        class="form-control" 
                                                        name="waktu_akhir_kerja"
                                                        placeholder="Waktu Akhir Kerja"
                                                        value="{{ $data_absensi->waktu_akhir_kerja }}" 
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kegiatan">Laporan Kegiatan</label>
                                                    <textarea class="form-control" name="kegiatan" id="kegiatan" rows="5" disabled>{{ $data_absensi->kegiatan }}</textarea>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="aktifitas">Rencana Aktifitas Kerja</label>
                                                    <textarea class="form-control" name="kegiatan" id="kegiatan" rows="5" disabled>
                                                        {{ $data_absensi->aktifitas }}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="aktifitas_lampiran">Lampiran Aktifitas Kerja</label>
                                                    <div>
                                                        @if (!empty($data_absensi->aktifitas_lampiran))
                                                            <div class="badge badge-primary">
                                                                <a href="{{  route('downloader.absensi')."?file=".$data_absensi->aktifitas_lampiran }}" target="_blank">
                                                                    <i class="feather icon-download"></i>
                                                                    <span>Download Lampiran</span>
                                                                </a>
                                                            </div>
                                                        @else    
                                                            <p> 
                                                                <b> Tidak ada lampiran </b>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kegiatan_lampiran">Lampiran Kegiatan Kerja</label>
                                                    <div>
                                                        @if (!empty($data_absensi->kegiatan_lampiran))
                                                            <div class="badge badge-primary">
                                                                <a href="{{ asset($data_absensi->kegiatan_lampiran) }}" target="_blank">
                                                                    <i class="feather icon-download"></i>
                                                                    <span>Download Lampiran</span>
                                                                </a>    
                                                            </div>
                                                        @else
                                                            <p> 
                                                                <b> Tidak ada lampiran </b>
                                                            </p>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @else
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="alasan_tidak_masuk">Alasan Tidak Masuk</label>
                                                    <input 
                                                        type='text' 
                                                        class="form-control"
                                                        name="alasan_tidak_masuk" 
                                                        id="alasan_tidak_masuk" 
                                                        value="{{ $data_absensi->alasan_tidak_masuk }}" 
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="catatan_tidak_masuk">Catatan Tidak Masuk</label>
                                                    <textarea class="form-control" name="catatan_tidak_masuk" id="catatan_tidak_masuk" rows="5" disabled>
                                                        {{ $data_absensi->catatan_tidak_masuk }}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="lampiran_tidak_masuk">Lampiran Tidak Masuk</label>
                                                    <div>
                                                        @if (!empty($data_absensi->lampiran_tidak_masuk))
                                                            <div class="badge badge-primary">
                                                                <a href="{{ asset($data_absensi->lampiran_tidak_masuk) }}" target="_blank">
                                                                    <i class="feather icon-download"></i>
                                                                    <span>Download Lampiran</span>
                                                                </a>    
                                                            </div>
                                                        @else
                                                            <p> 
                                                                <b> Tidak ada lampiran </b>
                                                            </p>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection