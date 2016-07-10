<div class="row">
    <div class="col-lg-6">
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('name','Flight Name:') !!}
                {!! form::text('name', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('title','Flight Title:') !!}
                {!! form::text('title', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('company_name','Company Name:') !!}
                {!! form::text('company_name', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('flight_change','Flight Change:') !!}
                <div class="selector">
                {!! form::text('flight_change', null,['class'=>'input-text full-width', 'placeholder'=>'Charge for Flight Change']) !!}

                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        {!! form::label('from','From:') !!}
                        {!! form::text('from', null, ['class'=>'input-text full-width']) !!}
                    </div>
                    <div class="col-xs-6">
                        {!! form::label('to','To:') !!}
                        {!! form::text('to', null, ['class'=>'input-text full-width']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        {!! form::label('flight_type','Flight Type:') !!}
                        <div class="selector">
                            {!! form::select('flight_type', ['Economy'=>'Economy', 'Luxury'=>'Luxury', 'Intermediate'=>'Intermediate'], null,['class'=>'input-text full-width']) !!}
                        </div>
                    </div>
                    <div class="col-xs-6">
                        {!! form::label('fare_type','Fare Type:') !!}
                        <div class="selector">
                            {!! form::select('fare_type', ['Refundable'=>'Refundable', 'Not Refundable'=>'Not Refundable'], null, ['class'=>'input-text full-width']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('duration', 'Duration:') !!}
                {!! form::text('duration' , '1 Hour',  ['class'=>'input-text full-width', 'placeholder'=>'Flight Duration']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('cancellation','Cancellation:') !!}
                {!! form::text('cancellation', null, ['class'=>'input-text full-width', 'placeholder'=>'Cancelation Change']) !!}
            </div>

        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('flight_features','Flight Features:') !!}
                <div class="selector">
                    {!! form::select('flight_features', ['Available'=>'Available', 'Unavailable'=>'Unavailable'],'Available', ['class'=>'input-text full-width']) !!}
                </div>
            </div>

        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('baggage','Baggage:') !!}
                {!! form::text('baggage', null, ['class'=>'input-text full-width', 'placeholder'=>'KG']) !!}
            </div>

        </div>

            <div class="row form-group">
                <div class="col-xs-12">
                    {!! form::label('description','Description:') !!}
                    {!! form::textarea('description', null, ['class'=>'input-text full-width textarea']) !!}

                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-12">

                {!! form::label('short_description','Short Description:') !!}
                {!! form::textarea('short_description', null, ['class'=>'input-text full-width textarea']) !!}
                    </div>
            </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::submit($SubmitButtonText,  ['class'=>'btn btn-primary full-width']) !!}
            </div>
        </div>


    </div>

    <div class="col-lg-6">

        <div class="row form-group">
            <div class="col-md-12">
                <div class="checkbox">
                    {!! form::label('featured','Featured') !!}
                    {!! Form::checkbox('featured', '1', false, ['class'=>'input-text']) !!}
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                    {!! form::label('base_fare','Base Fare') !!}
                    {!! Form::text('base_fare', null, ['class'=>'input-text full-width', 'placeholder'=>'Set base price for this flight']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                    {!! form::label('tax','Tax') !!}
                    {!! Form::text('tax', null, ['class'=>'input-text full-width', 'placeholder'=>'Set Tax Rate']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                    {!! form::label('direction','Direction') !!}
                    {!! Form::select('direction', ['OneWay'=>'OneWay', 'Return'=>'Return'], ['class'=>'input-text full-width']) !!}
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
            @if (count($images) > 0)
                @foreach($images as $image)
                    <img src="{{ asset($image->path.'/'.$image->name) }}" style="width: 250px"><br/>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
    </div>