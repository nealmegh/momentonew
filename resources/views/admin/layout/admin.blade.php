@extends('master')

@section('head')
    <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce_editor.js"></script>
    <script type="text/javascript">
        editor_config.selector = ".textarea";
        editor_config.language = 'en_US';
        editor_config.path_absolute = "http://momento.co/";
        tinymce.init(editor_config);
    </script>
@endsection

@section('content')
    <div class="container">
        <div id="main">
            <div class="tab-container full-width-style arrow-left dashboard">

                @yield('admin-nav')

                <div class="tab-content">
                    <div class="tab-pane fade in active">
                       @yield('admin-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection