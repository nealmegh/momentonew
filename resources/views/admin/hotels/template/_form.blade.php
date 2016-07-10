<div class="row">
    <div class="col-lg-10">


        <div class="row form-group">
            <div class="col-md-6">
            {!! form::label('name','Hotel Name:') !!}
            {!! form::text('name', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-6">
                {!! form::label('title','Title:') !!}
                {!! form::text('title', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
            {!! form::label('category_id','Catagory:') !!}
                <div class="selector">
                {!! form::select('category_id', $hotel_category, $category, ['class'=>'input-text full-width']) !!}
                </div>
            </div>
            <div class="col-md-6">
            {!! form::label('grade_id','Grade:') !!}
                <div class="selector">
                {!! form::select('grade_id', $hotel_grade, $grade, ['class'=>'input-text full-width']) !!}
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('address','Address:') !!}
            {!! form::text('address', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
            {!! form::label('country','Country:') !!}
            {!! form::text('country', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-4">
            {!! form::label('state','State:') !!}
            {!! form::text('state', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-4">
                {!! form::label('city','City:') !!}
                {!! form::text('city', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">
            {!! form::label('zip','Zip:') !!}
            {!! form::text('zip', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-4">
            {!! form::label('email','Email:') !!}
            {!! form::text('email', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-4">
            {!! form::label('fax','Fax:') !!}
            {!! form::text('fax', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
            {!! form::label('phone','Phone:') !!}
            {!! form::text('phone', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-4">
            {!! form::label('cell','Cell:') !!}
            {!! form::text('cell', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-4">
            {!! form::label('distance_from_airport','Distance from Airport:') !!}
            {!! form::text('distance_from_airport', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
            {!! form::label('distance_from_market','Distance from Market:') !!}
            {!! form::text('distance_from_market', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-4">
            {!! form::label('pet_allowed','Pet Allowed:') !!}
                <div class="selector">
                {!! form::select('pet_allowed',['1'=>'Allow', '0'=>'Not Allow'], $pet, ['class'=>'input-text full-width']) !!}
                </div>
            </div>
            <div class="col-md-4">
            {!! form::label('google_map','Google Map:') !!}
            {!! form::text('google_map', null, ['class'=>'input-text full-width', 'placeholder'=>'Latitude, Logitude']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
            {!! form::label('logo','Logo:') !!}
            <div class="fileinput full-width" style="line-height: 34px;">
                <input type="file" name="logo" class="input-text" data-placeholder="select image/s">
                <input type="text" class="custom-fileinput input-text" placeholder="select image/s">
            </div>
            {{--{!! form::file('logo', null, ['class'=>'input-text full-width']) !!}--}}
            @if (count($images))
                @foreach($images as $image)
                    <img src="{{ asset($image->path.'/'.$image->name) }}" style="width: 250px">
                @endforeach
            @endif
            </div>
        </div>


        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('general_information','General Information:') !!}
            {!! form::textarea('general_information', null, ['class'=>'input-text full-width textarea']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('service_information','Service Information:') !!}
            {!! form::textarea('service_information', null, ['class'=>'input-text full-width textarea']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('other_information','Other Information:') !!}
            {!! form::textarea('other_information', null, ['class'=>'input-text full-width textarea']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('policy','Policy:') !!}
            {!! form::textarea('policy', null, ['class'=>'input-text full-width textarea' ]) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('terms','Terms:') !!}
            {!! form::textarea('terms', null, ['class'=>'input-text full-width textarea']) !!}
             </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('cancellation','Cancellation:') !!}
            {!! form::textarea('cancellation', null, ['class'=>'input-text full-width textarea']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
            {!! form::submit($SubmitButtonText,  ['class'=>'btn btn-primary full-width']) !!}
            </div>
        </div>


    </div>
</div>