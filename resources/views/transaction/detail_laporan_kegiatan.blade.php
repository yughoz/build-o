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
                                        {{-- Pegawai --}}
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nip">NIP</label>
                                                <input type="number" id="nip" class="form-control" name="nip" placeholder="NIP" value="{{ $data_laporan->pegawai->nip }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" value="{{ $data_laporan->pegawai->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="aktifitas">Laporan Kegiatan Kerja</label>
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" disabled>{{ $data_laporan->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-12">
                                <h5 class="card-title mt-2">Lampiran Laporan Kegiatan</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0 @endphp
                                            @foreach ($data_laporan->laporan_detail as $lampiran_laporan)
                                                @php $i++ @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>Lampiran {{ $i }}</td>
                                                    <td>
                                                        <div class="badge badge-primary">
                                                            <a href="{{  route('downloader.absensi')."?file=".$lampiran_laporan->lampiran }}" target="_blank">
                                                                <i class="feather icon-download"></i>
                                                                <span>Download Lampiran</span>
                                                            </a>
                                                            
                                                        </div>

                                                        @if (
                                                                pathinfo($lampiran_laporan->lampiran, PATHINFO_EXTENSION) != "doc" &&
                                                                pathinfo($lampiran_laporan->lampiran, PATHINFO_EXTENSION) != "docx" &&
                                                                pathinfo($lampiran_laporan->lampiran, PATHINFO_EXTENSION) != "xls" &&
                                                                pathinfo($lampiran_laporan->lampiran, PATHINFO_EXTENSION) != "xlsx"
                                                            )
                                                            <div class="badge badge-warning">
                                                                <a href="{{ route('show-file.absensi')."?file=".$lampiran_laporan->lampiran }}" target="_blank">
                                                                    <i class="feather icon-download"></i>
                                                                    <span>Lihat Lampiran</span>
                                                                </a>
                                                            </div>
                                                                
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection