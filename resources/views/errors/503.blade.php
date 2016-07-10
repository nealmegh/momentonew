@extends('errors.layout.error')

@sectiAttemptge-title')
@include('common.page-title', ['PageTitle'=>'Error'])
@stop

@section('head')
    <?php $bodyClass = 'post-404page style1' ?>
@endsection

@section('content')
    <div class="col-md-6 col-sm-9 no-float no-padding center-block">
        <div class="error-message">The page <i>you were looking for</i> is not available now.</div>
    </div>
    <div class="error-message-404">
        503
    </div>
@endsection