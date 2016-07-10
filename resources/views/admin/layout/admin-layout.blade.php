@extends('master')

@section('head')
    <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce_editor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
            @yield('admin-content')
            </div>
        </div>
    </div>
@endsection