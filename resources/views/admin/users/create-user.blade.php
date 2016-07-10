@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.users._left-menu')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                @include('errors.list')
            {!! Form::open(['url'=>'admin/users', 'files'=>'true']) !!}
                @include('common.template._form-profile', ['SubmitButtonText' => 'Add User', 'user'=>null])
                {!! form::hidden('password', uniqid(),['class'=>'hidden']) !!}
            {!! Form::close() !!}

             </div>
        </div>
    </div>
@stop

@section('profile-password')
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('password', 'password') !!}
            {!! Form::password('password',  ['class'=>'input-text full-width']) !!}

        </div>
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('password_confirmation', 'Verify Password') !!}
            {!! Form::password('password_confirmation', ['class'=>'input-text full-width']) !!}
        </div>
    </div>
@endsection