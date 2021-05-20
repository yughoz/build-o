@extends('layouts.app')

@section('title', 'Detail of '.$home->title)

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    
    <!-- vendor css files select2 -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">

    <!-- vendor css files sweetalert -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">

    <!-- vendor quill editor css files -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal m-t-40">
                <div class="form-group">
                    <label>Module Code</label>
                    <input type="text" name="module_code" class="form-control" placeholder="Module Code" value="{{ $home->module_code }}" disabled>
                </div>
                <div class="form-group">
                    <label>Module Name</label>
                    <input type="text" name="module_name" class="form-control" placeholder="Module Name" value="{{ $home->module_name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $home->title }}" disabled>
                </div>

                <div class="form-group">
                    <label>Max Child</label>
                    <input type="number" name="max_child" class="form-control" placeholder="Max Child" value="{{ $home->max_child }}" disabled>
                </div>
                
                <div class="form-group">
                    <div class="col-md-3">
                        <img class="preview_image" src="{{ empty($home->img_url) ? "https://via.placeholder.com/500" : $home->img_url }}"alt="preview image" style="max-height: 100px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="basicInputFile">Description</label>
                    <input type="hidden" name="desc">
                    <div id="snow-wrapper">
                        <div id="snow-container">
                            <div class="editor">
                                {!! $home->desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

    {{-- vendor files sweetalert --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>

    {{-- vendor files quill editor --}}
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>

    {{-- Script according page start here --}}
    <script>
        var snowEditor;
        var moduleCodeUpdate;
        
        // Quill Editor setup
        var toolbarOptions = [{ 'header': [1, 2, 3, 4, 5, 6, false] }, 'align', 'bold', 'italic', 'underline', 'strike', 'link'];
        var Font = Quill.import('formats/font');
        Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
        Quill.register(Font, true);

        // Snow Editor
        snowEditor = new Quill('#snow-container .editor', {
            bounds: '#snow-container .editor',
            modules: {
                'formula': true,
                'syntax': true,
                'toolbar': toolbarOptions
            },
            theme: 'snow'
        });

        var editors = [snowEditor];
    </script>
@endsection