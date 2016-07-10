<div class="row">
    <div class="col-lg-8">
        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('hotel_id','Hotel:') !!}
            <div class="selector">
                {!! form::select('hotel_id', [$hotel->id => $hotel->name], ['class'=>'selector full-width']) !!}
                <span class="custom-select">{{ $hotel->name }}</span>
            </div>
                </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                {!! form::label('hotel_room_group_id','Room Type:') !!}
                <div class="selector">
                    {!! form::select('hotel_room_group_id', $roomTypes,  ['class'=>'selector full-width']) !!}
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <h4 class="title">When</h4>
                <div class="row">
                    <div class="col-xs-6">
                        <label>Available From</label>
                        <div class="datepicker-wrap">
                            {!! Form::text('date_from', null, ['class' => 'input-text full-width']) !!}
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label>Available To</label>
                        <div class="datepicker-wrap">
                            {!! Form::text('date_to', null, ['class' => 'input-text full-width']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
                {!! form::label('total_available_room','Total Available Room:') !!}
                {!! form::text('total_available_room', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                {!! form::label('price_per_room','Price Per Room:') !!}
                {!! form::text('price_per_room', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                {!! form::label('child_price','Price for extra Person:') !!}
                {!! form::text('child_price', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                {!! form::label('other','Other:') !!}
                {!! form::text('other', null, ['class'=>'input-text full-width']) !!}
             </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                {!! form::submit($SubmitButtonText,  ['class'=>'btn btn-primary form-control']) !!}
             </div>
        </div>

        </div>

    </div>
</div>