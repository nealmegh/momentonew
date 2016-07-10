<h2>Personal Details</h2>
<div class="col-sm-9 no-padding no-float">
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('first_name', 'First Name') !!}
            {!! Form::text('first_name', null, ['class'=>'input-text full-width']) !!}
        </div>
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('last_name', 'Last Name') !!}
            {!! Form::text('last_name', null, ['class'=>'input-text full-width']) !!}
        </div>
    </div>
    @yield('profile-password')
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
            {!! Form::label('email', 'Email Address') !!}
            {!! Form::email('email', null, ['class'=>'input-text full-width']) !!}
        </div>

    </div>

    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('country', 'Country Code') !!}

            <div class="selector">
                {!! Form::select('country', ['+880'=>'Bangladesh (+880)', '+1'=>'United States (+1)'], ['class'=>'full-width']) !!}
            </div>
        </div>
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('phone_no', 'Phone Number') !!}
            {!! Form::text('phone_no', null, ['class'=>'input-text full-width']) !!}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-12 col-sm-12">
            {!! Form::label('date', 'Date of Birth') !!}
        </div>
        <div class="col-xs-4 col-sm-2">
            <div class="selector">
                {!! Form::selectRange('date', 01, 31, ['class'=>'full-width']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-2">
            <div class="selector">
                {!! Form::selectMonth('month', ['class'=>'full-width']) !!}

            </div>
        </div>
        <div class="col-xs-4 col-sm-2">
            <div class="selector">
                {!! Form::selectRange('year', Carbon\Carbon::now()->toDateTimeString(), 1955, ['class'=>'full-width']) !!}
            </div>
        </div>
    </div>
    <hr>
    <h2>Contact Details</h2>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', null, ['class'=>'input-text full-width']) !!}
        </div>
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('city', 'City') !!}
            {!! Form::text('city', null, ['class'=>'input-text full-width']) !!}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
            {!! Form::label('zip', 'Zip') !!}
            {!! Form::text('zip', null, ['class'=>'input-text full-width']) !!}

        </div>
        <div class="col-sms-6 col-sm-6">

            {!! Form::label('country', 'Country') !!}
            <div class="selector">
                {!! Form::select('country', ['Bangladesh'=>'Bangladesh'], ['class'=>'full-width']) !!}
            </div>
        </div>
    </div>

    <hr>
    <h2>Upload Profile Photo</h2>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-6 no-float">
            <div class="fileinput full-width">
                <input name="file" type="file" class="input-text" data-placeholder="select image/s">
            </div>
            @yield('pro-image')

        </div>
    </div>
    <hr>
    <h2>Describe Yourself</h2>
    <div class="form-group">
        {!! Form::textarea('about', null, ['class'=>'input-text full-width ckeditor', 'placeholder'=>'please tell us about you', 'row'=>'5']) !!}
    </div>
            @yield('extra-field')
    <div class="from-group">
        <button type="submit" class="btn-medium col-sms-6 col-sm-4">UPDATE SETTINGS</button>
    </div>

</div>