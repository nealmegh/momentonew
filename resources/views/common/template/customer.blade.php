<h1 class="no-margin skin-color">Welcome back to User Panel!</h1>
<p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
<br />


<div class="row block">
    <div class="col-md-12 notifications">
        <h2>All Users</h2>


        @foreach($users as $user)

            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-friends yellow-bg"></i>
                <a href="{{ url('agents/users/'.$user->id) }}">
                    <p class="all-user box-title pull-left">
                        {{ $user->first_name.' '.$user->last_name }} - {{ $user->email }}
                    </p>
                </a>
                <div class="pull-right">
                    <a href="{{ url('agents/users/'.$user->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                    <a class="button btn-mini red">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.hotels.vacancy.destroy', $user->id]]) !!}
                        {!! form::submit('DELETE') !!}
                        {!! Form::close() !!}
                    </a>
                </div>
            </div>
        @endforeach



    </div>

</div>