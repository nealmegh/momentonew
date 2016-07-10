@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Manager'])
@stop

@section('pro-image')
    @if($image = $user->profilePicture()->where('type','=','profile')->first())
        <img width="270" height="263" alt="" src="{{ asset($image->path.'/'.$image->name) }}">
    @else
        <img width="270" height="263" alt="" src="{{ asset('images/no-image.png') }}">
    @endif
@endsection

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        <ul class="tabs">
            <li class="active"><a href="{{ URL::previous() }}"><i class="soap-icon-arrow-left circle"></i>Back</a></li>
        </ul>
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                @include('errors.list')
                {!! Form::model($user,[ 'method' => 'PUT', 'files'=>'true', 'url'=>'admin/users/'.$user->id] ) !!}
                @include('common.template._form-profile', ['SubmitButtonText' => 'Update User'])
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop

