<div class="col-sm-10 no-padding no-float">

        <div class="row form-group">
            <div class="col-md-6">
            {!! form::label('site_title','Site Title:') !!}
            {!! form::text('site_title', null, ['class'=>'input-text full-width']) !!}
            </div>

            <div class="col-md-6">
            {!! form::label('site_name','Site Name:') !!}
            {!! form::text('site_name', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                {!! form::label('phone_no','Phone No.:') !!}
                {!! form::text('phone_no', null, ['class'=>'input-text full-width']) !!}
            </div>

            <div class="col-md-6">
            {!! form::label('admin_email','Admin Email:') !!}
            {!! form::email('admin_email', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                {!! form::label('tax','TAX:') !!}
                {!! form::text('tax', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-6">
                {!! form::label('service_charge','Service Charge:') !!}
                {!! form::text('service_charge', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">

            <div class="col-md-6">
            {!! form::label('currency','Currency:') !!}
            {!! form::text('currency', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
            {!! form::label('facebook','Facebook:') !!}
            {!! form::text('facebook', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-6">
                {!! form::label('googleplus','Google +:') !!}
                {!! form::text('googleplus', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>




        <div class="row form-group">
            <div class="col-md-12">
                    {!! form::label('address','Address:') !!}
                    {!! form::text('address', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                {!! form::label('meta_description','Meta Description:') !!}
                {!! form::text('meta_description', null, ['class'=>'input-text full-width']) !!}
            </div>
            <div class="col-md-6">
                {!! form::label('meta_tag','Meta Tag:') !!}
                {!! form::text('meta_tag', null, ['class'=>'input-text full-width']) !!}
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
            {!! form::label('about','About:') !!}
            {!! form::textarea('about', null, ['class'=>'input-text full-width textarea']) !!}
            </div>
        </div>




    <div class="row form-group">
        <div class="col-md-12">
            {!! form::submit('Save Configuration',  ['class'=>'btn btn-primary full-width']) !!}
        </div>
    </div>
</div>