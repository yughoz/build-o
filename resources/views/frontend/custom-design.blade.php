@extends('app2')
@section('content') 



<div class="portlet-content">
    <!-- <h2 class="portlet-title-text">Bangun Rumah Lebih Baik Dengan Build 0</h2> -->
    <div class=" portlet-content-container">
        <div class="portlet-body">
            <div class="text-right user-tool-asset-addon-entries"></div>
            <div class="pull-right visible-interaction"></div>
            <div class="journal-content-article">
                <section class="py-main-lg with-sm">
                    <div class="container">
                    @livewire('custom-design',['id_service' => $id_service,'id_product' => $id_product])  
                    </div> 
                </section>
        </div>
        <div class="content-metadata-asset-addon-entries"></div>
    </div>
</div>
@endsection