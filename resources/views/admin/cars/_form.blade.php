<div class="row">
    <div class="col-lg-8">
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('name','Car Name:') !!}
                {!! form::text('name', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('title','Car Title:') !!}
                {!! form::text('title', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('type','Type:') !!}
                <div class="selector">
                {!! form::select('type', ['Non A/C'=>'Non A/C', 'A/C'=>'A/C', 'Luxury'=>'Luxury'], null,['class'=>'input-text full-width']) !!}

                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        {!! form::label('hourly_price','Hourly Rate:') !!}
                        {!! form::text('hourly_price', null, ['class'=>'input-text full-width']) !!}
                    </div>
                    <div class="col-xs-6">
                        {!! form::label('whole_day_price','Whole Day Rate:') !!}
                        {!! form::text('whole_day_price', null, ['class'=>'input-text full-width']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('company_name','Company Name:') !!}
                {!! form::text('company_name', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                <h4 class="title">When</h4>
                <div class="row">
                    <div class="col-xs-6">
                        {!! form::label('pick_up_time','Pick Up Time:') !!}
                        {!! Form::text('pick_up_time', 'Any Time', ['class' => 'input-text full-width']) !!}
                    </div>
                    <div class="col-xs-6">
                        <label>Drop Off Time</label>
                        {!! Form::text('drop_off_time', 'Any Time', ['class' => 'input-text full-width']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>Pick Up Location</label>
                        {!! Form::text('pick_up_location', 'Any Place', ['class' => 'input-text full-width']) !!}
                    </div>
                    <div class="col-xs-6">
                        <label>Drop Off Location</label>
                        {!! Form::text('drop_off_location', 'Any Place', ['class' => 'input-text full-width']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('passenger', 'Passenger Capacity:') !!}
                {!! form::input('number' ,'total_days', 1,  ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        {{--<div class="row form-group">--}}
            {{--<div class="col-xs-12">--}}
                {{--{!! form::label('baggage','Baggage Capacity:') !!}--}}
                {!! form::hidden('baggage', 0, ['class'=>'input-text full-width']) !!}
            {{--</div>--}}

        {{--</div>--}}
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('car_features','Car Features:') !!}
                <div class="selector">
                    {!! form::select('car_features', ['Available'=>'Available', 'Unavailable'=>'Unavailable'],'Available', ['class'=>'input-text full-width']) !!}
                </div>
            </div>

        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('millage','KM/LITTER:') !!}
                {!! form::text('millage', null, ['class'=>'input-text full-width', 'placeholder'=>'Kilometer']) !!}
            </div>

        </div>

            <div class="row form-group">
                <div class="col-xs-12">
                    {!! form::label('description','Description:') !!}
                    {!! form::textarea('description', null, ['class'=>'input-text full-width']) !!}

                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-12">

                {!! form::label('short_description','Short Description:') !!}
                {!! form::textarea('short_description', null, ['class'=>'input-text full-width']) !!}
                    </div>
            </div>
        <div class="row form-group">
            <div class="col-xs-12">

            {!! form::submit($SubmitButtonText,  ['class'=>'btn btn-primary full-width']) !!}
</div>
        </div>


    </div>

    <div class="col-lg-4">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="checkbox">
                    {!! form::label('featured','Featured') !!}
                    {!! Form::checkbox('featured', '1', ['class'=>'input-text']) !!}
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                {!! form::label('logo','Logo:') !!}
                {{--<div class="fileinput full-width">--}}
                    {{--{!! form::file('logo', null, ['class'=>'input-text  form-control', 'data-placeholder'=>'select image/s']) !!}--}}
                {{--</div>--}}
                <div class="fileinput full-width" style="line-height: 34px;">
                    <input type="file" class="input-text" name="logo" data-placeholder="select image/s">
                    <input type="text" class="custom-fileinput input-text" placeholder="select image/s">
                </div>
            </div>

        </div>

        <div class="row form-group">
            <div class="col-md-12">
                {!! form::label('gallery','Gallery:') !!}
                <div class="fileinput full-width" style="line-height: 34px;">
                    <input type="file" class="input-text" name="gallery" data-placeholder="select image/s">
                    <input type="text" class="custom-fileinput input-text" placeholder="select image/s">
                </div>

            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
            @if (count($images))
                @foreach($images as $image)
                    <img src="{{ asset($image->path.'/'.$image->name) }}" style="width: 250px"><br/>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
    </div>