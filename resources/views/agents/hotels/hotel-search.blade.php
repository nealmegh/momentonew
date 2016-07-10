{!! Form::open(['url'=>$url, 'method' => 'get']) !!}
{!! Form::hidden('searchable', 'hotel') !!}
<div class="row">
    <div class="form-group col-sm-6 col-md-3">
        <h4 class="title">Where</h4>
        <label for="searchable">Your Destination</label>
        {!! Form::text('placeOrHotel', Input::get('placeOrHotel'), ['class' => 'input-text full-width', 'placeholder' => 'enter a destination or hotel name']) !!}
        @if ($errors->has('placeOrHotel'))<p style="color:red;">{!!$errors->first('placeOrHotel') !!}</p>@endif
    </div>

    <div class="form-group col-sm-6 col-md-4">
        <h4 class="title">When</h4>
        <div class="row">
            <div class="col-xs-6">
                <label>Check In</label>
                <div class="datepicker-wrap">
                    {!! Form::text('date_from', Input::get('date_from'), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                </div>
                @if ($errors->has('date_from'))<p style="color:red;">{!!$errors->first('date_from') !!}</p>@endif

            </div>
            <div class="col-xs-6">
                <label>Check Out</label>
                <div class="datepicker-wrap">
                    {!! Form::text('date_to', Input::get('date_to'), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                </div>
                @if ($errors->has('date_to'))<p style="color:red;">{!!$errors->first('date_to') !!}</p>@endif

            </div>
        </div>
    </div>

    <div class="form-group col-sm-6 col-md-3">
        <h4 class="title">Who</h4>
        <div class="row">
            <div class="col-xs-4">
                <label>Rooms</label>
                <div class="selector">
                    {!! Form::selectRange('num_of_room', 01, 05, Input::get('num_of_room'), ['class' => 'full-width']) !!}
                </div>
            </div>
            <div class="col-xs-4">
                <label>Adults</label>
                <div class="selector">
                    {!! Form::selectRange('num_of_adult', 01, 05, Input::get('num_of_adult'), ['class' => 'full-width']) !!}
                </div>
            </div>
            <div class="col-xs-4">
                <label>Kids</label>
                <div class="selector">
                    {!! Form::selectRange('num_of_child', 00, 05, Input::get('num_of_child'), ['class' => 'full-width']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-sm-6 col-md-2 fixheight search-btn-mod">
        <label class="hidden-xs">&nbsp;</label>
        <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
    </div>
</div>
{!! Form::close() !!}
</div>