@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Reviews Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.reviews._left-menu')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Reviews Manager</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>

                @include('flash::message')

                <hr />

                <div class="row block">
                    <div class="col-md-8 notifications">
                        <h2>All Categories</h2>

                            @foreach($ratingTypes as $ratingType)

                                <div class="icon-box style1 fourty-space">
                                    <i class="soap-icon-star yellow-bg"></i>
                                    <a href="#"><p class="all-user box-title pull-left">{{ $ratingType->name }}  <span class="price">{{ $ratingType->service }}</span></p></a>

                                    <div class="pull-right">
                                        <a href="{{ url('admin/reviews/types/'.$ratingType->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                                        <a class="button btn-mini red">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.reviews.types.destroy', $ratingType->id]]) !!}
                                            {!! form::submit('DELETE') !!}
                                            {!! Form::close() !!}
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        <?php echo $ratingTypes->render(); ?>

                    </div>

                    <div class="col-md-4">

                        @if($action == 'c')
                            <h2>Add Categories</h2>

                            @include('errors.list')
                            {!! Form::open(['url'=>'admin/reviews/types']) !!}
                            <div class="row form-group">
                                {!! form::label('name','Name:') !!}
                                {!! form::text('name', null, ['class'=>'input-text full-width', 'placeholder'=>'Rating Type Name']) !!}
                            </div>
                            <div class="row form-group">
                                {!! form::label('service','Service:') !!}
                                <div class="selector">
                                {!! form::select('service', ['hotel'=>'Hotel', 'tour'=>'Tour', 'car'=>'Car'], null, ['class'=>'input-text full-width', 'placeholder'=>'Rating Type Name']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                {!! form::submit('Add Rating Type',  ['class'=>'btn btn-primary full-width']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif

                        @if($action == 'e')
                            <h2>Edit Categories</h2>

                            @include('errors.list')
                            {!! Form::model($rating,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/reviews/types/'.$rating->id] ) !!}
                            <div class="row form-group">
                                {!! form::label('name','Name:') !!}
                                {!! form::text('name', null, ['class'=>'full-width input-text', 'placeholder'=>'Rating Type Name']) !!}
                            </div>
                            <div class="row form-group">
                                {!! form::label('service','Service:') !!}
                                <div class="selector">
                                    {!! form::select('service', ['hotel'=>'Hotel', 'tour'=>'Tour', 'car'=>'Car'], 'hotel') !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                {!! form::submit('Update Rating Type',  ['class'=>'btn btn-primary full-width']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection