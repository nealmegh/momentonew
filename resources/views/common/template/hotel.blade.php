
<h1 class="no-margin skin-color">Welcome back to Hotel Panel!</h1>
<p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
<br />

<div class="row block">
    <div class="col-md-12 notifications">
        <h2>All Hotel</h2>

        @foreach($hotels as $hotel)

            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-hotel-1 yellow-bg"></i>
                <a href="{{ url('hotels/detail/'.$hotel->id) }}" target="_blank">
                    <p class="all-user box-title pull-left">
                        {{ $hotel->hotelInfo->name }} - {{ $hotel->hotelInfo->category->name }}
                    </p>
                </a>
                <div class="pull-right">
                    <a href="{{ url('agents/hotel/vacancy/'.$hotel->id)  }}" class="button btn-mini green">ROOM VACANCY</a>
                    <a href="{{ url('agents/hotel/gallery/'.$hotel->id)  }}" class="button btn-mini green">GALLERY</a>
                    <a href="{{ url('agents/hotel/'.$hotel->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                    {{--<a class="button btn-mini red">--}}
                        {{--{!! Form::open(['method' => 'DELETE', 'url'=>'agents/hotel/'.$hotel->id]) !!}--}}
                        {{--{!! form::submit('DELETE') !!}--}}
                        {{--{!! Form::close() !!}--}}
                    {{--</a>--}}
                </div>
            </div>
        @endforeach

    </div>

</div>