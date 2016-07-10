@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Grade Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.hotels.template._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Grade Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <a href="{{ url('admin/hotels/grade/create') }}" class="button btn-small sky-blue1">New Grade</a>
                <hr/>
                <div class="row block">
                    <div class="col-md-8 notifications">
                        <h2>All Grade</h2>


                        @if($action == 'c')
                            @include('errors.list')
                            {!! Form::open(['url'=>'admin/hotels/grade']) !!}
                            <div class="form-group">
                                {!! form::label('name','Title:') !!}
                                {!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Grade Title']) !!}
                            </div>

                            <div class="form-group">
                                {!! form::submit('Add Grade',  ['class'=>'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                        @elseif($action == 'e')
                            @include('errors.list')
                            {!! Form::model($grade,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/hotels/grade/'.$grade->id] ) !!}
                            <div class="form-group">
                                {!! form::label('name','Name:') !!}
                                {!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Grade Name']) !!}
                            </div>
                            <div class="form-group">
                                {!! form::submit('Update Grade',  ['class'=>'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif

                        @foreach($grades as $grade)

                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-star yellow-bg"></i>
                                <a href="#"><p class="all-user box-title pull-left">{{ $grade->name }}</p></a>
                                <div class="pull-right">
                                    <a href="{{ url('admin/hotels/grade/'.$grade->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/hotels/grade/'.$grade->id], 'class'=>'inline-block']) !!}
                                        <button
                                                class="btn-mini red"
                                                type="button"
                                                data-toggle="modal"
                                                data-target="#confirmDelete"
                                                data-title="Delete {{ $grade->name }} Grade"
                                                data-message="Are you sure you want to delete this {{ $grade->name }} Grade?"
                                                >
                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button>
                                        {!! Form::close() !!}
                                </div>
                                @include('common.delete-confirm')
                            </div>
                        @endforeach

                    </div>

                </div>
                <?php 
                // echo $grades->render(); 
                ?>
            </div>
        </div>
    </div>
@endsection