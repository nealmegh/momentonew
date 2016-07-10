@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel Manager'])
@stop

@section('admin-content')

    <div class="tab-container full-width-style arrow-left dashboard hotel">

        @include('admin.hotels.template._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Hotel Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>

                @include('flash::message')
                <a href="{{ url('admin/hotels') }}" class="button btn-small ">Back</a>
                <a href="{{ url('admin/hotels/create') }}" class="button btn-small sky-blue1">Create Hotel</a>

                <hr />

                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Hotels</h2>

                        @foreach($hotels as $hotel)
                            <div class="icon-box style1 fourty-space" @if($hotel->status == false) background: #FDB714; @endif>
                                <i class="soap-icon-hotel yellow-bg"></i>
                                <a href="{{ url('hotels/detail/'.$hotel->id) }}" target="_blank">
                                    <p class="all-user box-title pull-left">{{ $hotel->name }}
                                        <span class="price">
                                            @if($category = $hotel->category)
                                            {{ $category->name }}
                                            @endif
                                        </span>
                                    </p>
                                </a>

                                @if($agent = $hotel->agent)
                                    {!! link_to('admin/agents/hotels?for='.$agent->user->id, $agent->user->first_name) !!}
                                @else
                                    {!! link_to('admin/agents/hotels?for=momento', $settings->site_name) !!}
                                @endif

                                <div class="pull-right">

                                    <a href="{{ url('admin/hotels/room-type?hotel='.$hotel->id)  }}" class="button btn-mini green">ROOM TYPE</a>
                                    <a href="{{ url('admin/hotels/vacancy?hotel='.$hotel->id)  }}" class="button btn-mini green">ROOM VACANCY</a>
                                    <a href="{{ url('admin/hotels/gallery/'.$hotel->id)  }}" class="button btn-mini green">GALLERY</a>
                                    <a href="{{ url('admin/hotels/discount/'.$hotel->id)  }}" class="button btn-mini green">DISCOUNT</a>
                                    <br/>

                                    <a href="{{ url('admin/hotels/hotel-facility?hotel='.$hotel->id) }}" class="button btn-mini green">Hotel Facility Add</a>
                                    <a href="{{ url('admin/hotels/'.$hotel->id.'/edit')  }}" class="button btn-mini yellow">EDIT</a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/hotels/'.$hotel->id], 'class'=>'inline-block']) !!}
                                        <button
                                                class="btn-mini red"
                                                type="button"
                                                data-toggle="modal"
                                                data-target="#confirmDelete"
                                                data-title="Delete {{ $hotel->name }} Hotel"
                                                data-message="Are you sure you want to delete this {{ $hotel->name }} Hotel?"
                                                >
                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button>
                                        {!! Form::close() !!}
                                    @if($hotel->status == 1)
                                        <a href="{{ url('admin/hotels/status?hotel='.$hotel->id)  }}" class="button btn-mini green">Active</a>
                                        {{--<button type="button" class="btn btn-mini green">Active</button>--}}
                                    @else
                                        <a href="{{ url('admin/hotels/status?hotel='.$hotel->id)  }}" class="button btn-mini red">Inactive</a>
                                        {{--<button type="button" class="btn btn-mini red">Inactive</button>--}}
                                    @endif
                                </div>

                                @include('common.delete-confirm')
                            </div>
                        @endforeach

                    </div>

                </div>

                <?php  echo $hotels->render(); ?>
            </div>
        </div>
    </div>
@endsection