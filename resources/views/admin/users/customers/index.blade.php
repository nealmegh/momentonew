@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.users._left-menu')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Customer Manager</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                @include('flash::message')
                <a href="{{ url('admin/users/create') }}" class="button btn-small sky-blue1">Create New User</a>
                <hr />

                <div class="row block">
                    <div class="col-md-8 notifications">
                        <h2>All Customer Users</h2>

                        @foreach($users as $user)
                            @if($user->hasRole('register'))
                                <div class="icon-box style1 fourty-space">
                                    <i class="soap-icon-man-3 yellow-bg"></i>
                                    <a href="{{ url('admin/users/'.$user->id) }}"><p class="all-user box-title pull-left">{{ $user->first_name.' '.$user->last_name }} <span class="price">{{ $user->email }}</span></p></a>

                                    <div class="pull-right">
                                        <a href="{{ url('admin/users/'.$user->id.'/edit')  }}" class="button btn-mini green">EDIT</a>

                                        {!! Form::open(['url'=>'admin/users/'.$user->id, 'method'=>'DELETE', 'class'=>'inline-block']) !!}
                                        {!! Form::open(['method' => 'DELETE', 'url' => 'admin/users/'.$user->id, 'class'=>'inline-block']) !!}
                                        <button
                                                class="btn-mini red"
                                                type="button"
                                                data-toggle="modal"
                                                data-target="#confirmDelete"
                                                data-title="Delete {{ $user->first_name.' '.$user->last_name }} Facility"
                                                data-message="Are you sure you want to delete this {{ $user->first_name.' '.$user->last_name }} Facility?"
                                                >
                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                    @include('common.delete-confirm')
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection