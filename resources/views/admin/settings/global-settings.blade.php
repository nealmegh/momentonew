@extends('admin.layout.admin')


@section('admin-content')
    <h2>Config Your Settings:</h2>
    @include('errors.list')
    {!! Form::open(['url'=>'settings', 'files'=>'true']) !!}
    <div class="tab-content">
        <div class="tab-pane fade in active">
            <div class="col-sm-9 no-padding no-float">

                <div class="row form-group">
                    {!! form::label('site_title','Site Title:') !!}
                    {!! form::text('site_title', null, ['class'=>'input-text full-width']) !!}
                </div>

                <div class="row form-group">
                    {!! form::label('site_name','Site Name:') !!}
                    {!! form::text('site_name', null, ['class'=>'input-text full-width']) !!}
                </div>

                <div class="row form-group">
                    {!! form::label('site_tag','Site Tag:') !!}
                    {!! form::text('site_tag', null, ['class'=>'input-text full-width']) !!}
                </div>

                <div class="row form-group">
                    {!! form::label('admin_email','Admin Email:') !!}
                    {!! form::email('admin_email', null, ['class'=>'input-text full-width']) !!}
                </div>

                <div class="row form-group">
                    {!! form::label('phone_no','Phone No.:') !!}
                    {!! form::text('phone_no', null, ['class'=>'input-text full-width']) !!}
                </div>
                <div class="row form-group">
                    {!! form::label('address','Phone No.:') !!}
                    {!! form::text('address', null, ['class'=>'input-text full-width']) !!}
                </div>

                <div class="row form-group">
                    {!! form::label('logo','LOGO:') !!}
                    {!! form::file('logo', null, ['class'=>'input-text full-width']) !!}
                </div>

                <div class="row form-group">
                    {!! form::label('favicon','Favicon:') !!}
                    {!! form::file('favicon', null, ['class'=>'input-text full-width']) !!}
                </div>

                <div class="row form-group">
                    {!! form::label('currency','Currency:') !!}
                    {!! form::text('currency', null, ['class'=>'input-text full-width']) !!}
                </div>

                <div class="row form-group">
                    {!! form::label('facebook','Facebook:') !!}
                    {!! form::text('facebook', null, ['class'=>'input-text full-width']) !!}
                </div>

                {{--<div class="row form-group">--}}
                    {{--{!! form::label('twitter','Twitter:') !!}--}}
                    {{--{!! form::text('twitter', null, ['class'=>'input-text full-width']) !!}--}}
                {{--</div>--}}

                <div class="row form-group">
                    {!! form::label('googleplus','Google +:') !!}
                    {!! form::text('googleplus', null, ['class'=>'input-text full-width']) !!}
                </div>

                {{--<div class="row form-group">--}}
                    {{--{!! form::label('linkedin','LinkedIn:') !!}--}}
                    {{--{!! form::text('linkedin', null, ['class'=>'input-text full-width']) !!}--}}
                {{--</div>--}}

                {{--<div class="row form-group">--}}
                    {{--{!! form::label('vimeo','Vimeo:') !!}--}}
                    {{--{!! form::text('vimeo', null, ['class'=>'input-text full-width']) !!}--}}
                {{--</div>--}}

                {{--<div class="row form-group">--}}
                    {{--{!! form::label('dribble','Dribble:') !!}--}}
                    {{--{!! form::text('dribble', null, ['class'=>'input-text full-width']) !!}--}}
                {{--</div>--}}

                {{--<div class="row form-group">--}}
                    {{--{!! form::label('flicker','Flicker') !!}--}}
                    {{--{!! form::text('flicker', null, ['class'=>'input-text full-width']) !!}--}}
                {{--</div>--}}

                {{--<div class="row form-group">--}}
                    {{--{!! form::label('pinterest','Pinterest:') !!}--}}
                    {{--{!! form::text('pinterest', null, ['class'=>'input-text full-width']) !!}--}}
                {{--</div>--}}

                <div class="row form-group">
                    {!! form::label('about','About:') !!}
                    {!! form::textarea('about', null, ['class'=>'input-text full-width textarea']) !!}
                </div>

            </div>

        </div>

        <div class="row form-group">
            {!! form::submit('Save Configuration',  ['class'=>'btn btn-primary input-text full-width']) !!}

        </div>

    </div>

    {!! Form::close() !!}
@endsection








