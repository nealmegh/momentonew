@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Articles Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.articles._left-menu')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Articles Manager!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />
                <h1>Edit: {{ $article -> title }} </h1>
                <hr>
                {!! Form::model($article, ['method'=>'PATCH', 'url'=>'admin/articles/'.$article-> id] ) !!}
                @include('admin.articles.form', ['SubmitButtonText' => 'Update Article'])
                {!! Form::close() !!}

                @include('errors.list')

            </div>
        </div>
    </div>
@endsection