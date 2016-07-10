<h1 class="no-margin skin-color">Welcome back to Vacancy Panel!</h1>
<p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
<a href="{{ url('admin/hotels/vacancy/create') }}">New Hotel Vacancy</a>
<br />

<div class="row block">
    <div class="col-md-12 notifications">
        <h2>All Vacancy</h2>


        @if($action == 'c')
            @include('errors.list')
            {!! Form::open(['url'=>'admin/hotels/vacancy']) !!}
            @include('admin.hotels.template._form-room-vacancy', ['SubmitButtonText' => 'Add Room Vacancy'])
            {!! Form::close() !!}
        @elseif($action == 'e')
            @include('errors.list')
            {!! Form::model($hotelVacancy,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/hotels/vacancy/'.$hotelVacancy->id] ) !!}
            @include('admin.hotels.template._form-room-vacancy', ['SubmitButtonText' => 'Update Room Vacancy'])
            {!! Form::close() !!}
        @endif

        @foreach($hotelVacancies as $vacancy)

            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-address yellow-bg"></i>
                <a href="#">
                    <p class="all-user box-title pull-left">
                        {{ $vacancy->date_from.' to '.$vacancy->date_to }} -
                        @if($hotel = $vacancy->hotel)
                            {{ $hotel->name }} -
                        @endif
                        @if($type = $vacancy->roomType)
                            {{ $type->room_type }}
                        @endif
                    </p>
                </a>
                <div class="pull-right">
                    <a href="{{ url('admin/hotels/vacancy/'.$vacancy->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                    <a class="button btn-mini red">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.hotels.vacancy.destroy', $vacancy->id]]) !!}
                        {!! form::submit('DELETE') !!}
                        {!! Form::close() !!}
                    </a>
                </div>
            </div>
        @endforeach


    </div>

</div>