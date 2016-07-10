@extends('errors.layout.error')

@sectiAttemptge-title')
    @include('common.page-title', ['PageTitle'=>'Error'])
@stop

@section('head')
    <link id="main-style" rel="stylesheet" href="/css/style-light-blue.css">
    <?php $bodyClass = 'post-404page style1' ?>
@endsection

@section('content')
        <div class="col-md-6 col-sm-9 no-float no-padding center-block">
            <div class="error-message">The page <i>you were looking for</i> does not authorised for you.</div>
        </div>
        <div class="error-message-404">
            403
        </div>
@endsection