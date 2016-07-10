@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.users._left-menu')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to User Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />
                @include('flash::message')

                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>{{ $user->first_name }} Access Role</h2>
                        {!! Form::open(['url'=>'admin/users/role', 'method'=>'PATCH']) !!}
                        {!! Form::hidden('user_id', $user->id) !!}
                        <div class="row form-group">
                            @if($user->hasRole('owner'))
                            <div class="checkbox">
                                 <label class="checkbox-inline">
                                    {!! Form::checkbox('owner', '1', true) !!} Owner
                                </label>
                            </div>
                            @else
                            <div class="checkbox">
                                 <label class="checkbox-inline">
                                    {!! Form::checkbox('owner', '1') !!} Owner
                                </label>
                            </div>
                            @endif


                            @if($user->hasRole('admin'))
                                <div class="checkbox">
                                     <label class="checkbox-inline">
                                        {!! Form::checkbox('admin', '2', true) !!} Admin
                                    </label>
                                </div>
                            @else
                                <div class="checkbox">
                                     <label class="checkbox-inline">
                                        {!! Form::checkbox('admin', '2') !!} Admin
                                    </label>
                                </div>
                            @endif


                                @if($user->hasRole('agent'))
                                <div class="checkbox">
                                     <label class="checkbox-inline">
                                        {!! Form::checkbox('agent', '3', true) !!} Agent
                                    </label>
                                </div>
                            @else
                                <div class="checkbox">
                                     <label class="checkbox-inline">
                                        {!! Form::checkbox('agent', '3') !!} Agent
                                    </label>
                                </div>
                            @endif


                                @if($user->hasRole('manager'))
                                <div class="checkbox">
                                     <label class="checkbox-inline">
                                        {!! Form::checkbox('manager', '4', true) !!} Manager
                                    </label>
                                </div>
                            @else
                                <div class="checkbox">
                                     <label class="checkbox-inline">
                                        {!! Form::checkbox('manager', '4') !!} Manager
                                    </label>
                                </div>
                            @endif


                                @if($user->hasRole('register'))
                                <div class="checkbox">
                                     <label class="checkbox-inline">
                                        {!! Form::checkbox('register', '6', true) !!} Register
                                    </label>
                                </div>
                            @else
                                <div class="checkbox">
                                     <label class="checkbox-inline">
                                        {!! Form::checkbox('register', '6') !!} Register
                                    </label>
                                </div>
                            @endif

                            <div class="form-group col-md-5 no-float no-padding no-margin">
                                <button type="submit" class="btn-medium full-width">SUBMIT REVIEW</button>
                            </div>

                    {!! Form::close() !!}
                    </div>

                </div>
            </div>
            <div id="profile" class="tab-pane fade">
                Add New Role
            </div>
        </div>
    </div>
@endsection