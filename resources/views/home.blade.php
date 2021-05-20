@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    {{-- Blockquotes basic --}}
    {{-- @if ($required_laporan)
        <div class="alert alert-dismissible alert-warning" role="alert">
            <h4 class="alert-heading">Anda belum mengumpulkan Laporan !</h4>
            <p class="mb-0">
                Silahkan mengumpulkan laporan pada saat kehadiran pulang di form kehadiran.
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}
    <section id="blockquotes-default" class="row match-height">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
