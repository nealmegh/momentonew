@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Assign Hotels'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.agents._left-menu')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Reviews Manager</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                @include('flash::message')
                <hr />
                <div class="row block">
                    <div class="col-md-8 notifications">
                        <h2>Set Agent Commission</h2>
                        {!! Form::model($agent, ['url'=>'admin/agents/commission/'.$agent->agent_id, 'method'=>'PATCH']) !!}
                        <div class="form-group">
                            {!! Form::input('number', 'commission', null, ['class'=>'']) !!} %
                        </div>
                        <button type="submit" class="btn-small">Submit</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-4">




                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection