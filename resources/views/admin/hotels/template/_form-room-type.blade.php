<div class="row">
    <div class="col-lg-6 col-md-6">


        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
                {!! form::label('hotel_id','Hotel:') !!}
                <div class="selector">
                    {!! form::select('hotel_id', [ $hotel->id => $hotel->name], ['class'=>'input-text full-width']) !!}
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
                {!! form::label('room_type','Room Type:') !!}
                {!! form::text('room_type', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sms-6 col-sm-6">
                {!! form::label('check_in_time','Check In Time:') !!}
                <div class="selector">
                    {!! form::select('check_in_time', ['12.5'=>'12.30PM'], ['class'=>'input-text full-width']) !!}
                    <span class="custom-select">12.30PM</span>
                </div>
            </div>
            <div class="col-sms-6 col-sm-6">
                {!! form::label('check_out_time','Check Out Time:') !!}
                <div class="selector">
                    {!! form::select('check_out_time',['12'=>'12PM'], ['class'=>'input-text full-width']) !!}
                    <span class="custom-select">12PM</span>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
                {!! form::label('adult_allowed','Adult Allowed:') !!}
                <div class="selector">
                    {!! form::selectRange('adult_allowed', 1, 10, null,['class'=>'input-text full-width']) !!}
                </div>
            </div>
        </div>
        <div class="row form-group">

            <div class="col-sms-12 col-sm-12">
            {!! form::label('child_allowed','Child Allowed:') !!}
                <div class="selector">
                    {!! form::selectRange('child_allowed', 1, 10, null,['class'=>'input-text full-width']) !!}
                </div>
             </div>
        </div>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
            {!! form::label('total_bed','Total Bed:') !!}
            <div class="selector">
                    {!! form::selectRange('total_bed', 1, 10,  null,['class'=>'input-text full-width']) !!}
            </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
            {!! form::label('extra_bed','Extra Bed:') !!}
                <div class="selector">
                    {!! form::selectRange('extra_bed', 0, 10, null,['class'=>'input-text full-width']) !!}
                </div>
             </div>
        </div>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
            {!! form::label('extra_bed_charge','Extra Bed Charge:') !!}
            {!! form::text('extra_bed_charge', null,['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
            {!! form::label('price','Price:') !!}
            {!! form::text('price', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12">
            {!! form::label('description','Description:') !!}
            {!! form::textarea('description', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-6">
                {!! form::submit($SubmitButtonText,  ['class'=>'btn btn-primary full-width']) !!}
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">

        <h2>Upload Room Image</h2>
        <div class="row form-group">
            <div class="col-sms-12 col-sm-12 no-float">
                <div class="fileinput full-width">
                    <input name="file" type="file" class="input-text" data-placeholder="select image/s">
                </div>
                @if(isset($roomType))
                    @if( $image = $roomType->roomImage()->where('type','=','room')->first())
                        <img width="270" height="263" alt="" src="{{ asset($image->path.'/'.$image->name) }}">
                    @else
                        <img width="270" height="263" alt="" src="{{ asset('images/no-image.png') }}">
                    @endif
                @endif


            </div>
        </div>

    </div>

</div>