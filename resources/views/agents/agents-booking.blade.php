@extends('master-agents')

@section('content')
    <ul class="tabs">
        <li class="active"><a href="{{ url('agents') }}"><i class="soap-icon-arrow-left circle"></i>BACK</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active ">
            <div class="row block">

                <div class="tab-pane fade active in" id="hotels-tab">
                <h1 class="no-margin skin-color">Hi {{ Auth::user()->first_name }}, Welcome to Momento</h1>
                <p>All your trips booking with us will appear here and you’ll be able to manage everything!</p>
                <hr>

                @include('flash::message')
                @include('agents.hotels.hotel-search', ['url'=>'agents/booking'])
                @if(isset($hotels))
                    @include('agents.hotels._list')
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection