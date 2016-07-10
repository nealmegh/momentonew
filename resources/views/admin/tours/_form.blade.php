<div class="row">
    <div class="col-lg-8">
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('name','Tour Name:') !!}
                {!! form::text('name', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('title','Tour Title:') !!}
                {!! form::text('title', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        {!! form::label('location','Location:') !!}
                        {!! form::text('location', null, ['class'=>'input-text full-width']) !!}
                    </div>
                    <div class="col-xs-6">
                        {!! form::label('city','City:') !!}
                        {!! form::text('city', null, ['class'=>'input-text full-width']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::label('country','Country:') !!}
                <div class="selector">
                    {!! form::select('country', ['Bangladesh'=>'Bangladesh', 'India'=>'India'], null, ['class'=>'input-text full-width']) !!}
                </div>
            </div>
        </div>

        <div class="row form-group">

        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <h4 class="title">When</h4>
                <div class="row">
                    <div class="col-xs-12">

                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('tour_date', null) !!}
                                Tour Date Mendetory
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>Tour From</label>
                        <div class="datepicker-wrap">
                            {!! Form::text('date_from', null, ['class' => 'input-text full-width', 'placeholder'=>'mm/dd/yy']) !!}
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label>Tour To</label>
                        <div class="datepicker-wrap">
                            {!! Form::text('date_to', null, ['class' => 'input-text full-width', 'placeholder'=>'mm/dd/yy']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-4">
                {!! form::label('total_days', 'Total Tour Days:') !!}
                <div class="selector">
                    {!! form::selectRange('total_days', 1, 30, null,  ['class'=>'full-width']) !!}
                </div>
            </div>
            <div class="col-xs-4">
                {!! form::label('price_per_adult','Price Per Adult:') !!}
                {!! form::text('price_per_adult', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-xs-4">
                {!! form::label('price_per_child','Price Per Child:') !!}
                {!! form::text('price_per_child', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-xs-6">
                {!! form::label('google_map','Google Map:') !!}
                {!! form::text('google_map', null, ['class'=>'input-text full-width', 'placeholder'=>'Latitude, Logitude']) !!}
            </div>
            <div class="col-xs-6">
                {!! form::label('minimum_guest', 'Minimum Guest:') !!}
                <div class="selector">
                    {!! form::selectRange('minimum_guest', 1, 10, null,  ['class'=>'full-width']) !!}
                </div>
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
                {!! form::label('itinerary','Tour Itinerary:') !!}
                {!! form::textarea('itinerary', null, ['class'=>'input-text full-width textarea']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                {!! form::submit($SubmitButtonText,  ['class'=>'btn btn-primary full-width']) !!}
            </div>
        </div>


    </div>

</div>