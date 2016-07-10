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


                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Users</h2>
                        @foreach($users as $user)
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-support yellow-bg"></i>
                                <a href="#"><p class="all-user box-title pull-left">{{ $user->first_name.' '.$user->last_name }} - <span class="skin-color">{{ $user->email }}</span> </p></a>
                                <div class="pull-right">
                                    @if($user->roles->count() > 0 )
                                        @foreach($user->roles as $role)
                                           <a class="button btn-mini green">{{ $role->name }}</a>
                                        @endforeach
                                    @endif
                                        <a href="{{ url('admin/users?manage=user-roles&assign=role&user_id='.$user->id) }}" ><i class="soap-icon-settings-1 circle"></i></a>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <div id="profile" class="tab-pane fade">
                Add New Role
            </div>
        </div>
    </div>
@endsection