@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.articles._left-menu')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Articles Manager!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />


        <article>
            <h3>
                <a  href="#" >{{ $article->title }}</a>
            </h3>
            <div class="body">
                {{ $article->body }}
            </div>
            <div>

            {{--@foreach($article->photos as $photo)--}}
             {{--{{  $photo->imageable_id }}--}}
            {{--@endforeach--}}

            </div>
        </article>



            </div>
        </div>
    </div>
@endsection