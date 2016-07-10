@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Articles Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.articles._left-menu')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                @include('flash::message')
                <h1 class="no-margin skin-color">Articles Manager!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <a href="{{ url('admin/articles/create') }}" class="button btn-small sky-blue1">Add New Article</a>

                <hr />

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($articles as $article)
                    {{--<article>--}}
                        {{--<h3>--}}
                            {{--<a  href="{{url('articles', $article->id)}}" >{{ $article->title }}</a> (Category: {{ $article->category_id }})--}}
                        {{--</h3>--}}
                        {{--<div class="body">--}}
                          {{--{{ $article->body }}--}}
                        {{--</div>--}}
                    {{--</article>--}}

                    {{----}}
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{!! link_to('admin/articles/'.$article->id, $article->title) !!}</td>

                            <td>{{ $article->category_id }}</td>
                            <td>@if(isset($article->images->name)){{ $article->images->name }}@endif</td>
                            <td>{{ $article->status }}</td>

                            <td class="text-right">
                                <a href="{{ url('admin/articles/'.$article->id.'/edit')  }}" class="button btn-mini yellow">EDIT</a>
                                {!! Form::open(['method' => 'DELETE', 'url' => ['admin/articles/'.$article->id], 'class'=>'inline-block']) !!}
                                <button
                                        class="btn-mini red"
                                        type="button"
                                        data-toggle="modal"
                                        data-target="#confirmDelete"
                                        data-title="Delete {{ $article->title }} Hotel"
                                        data-message="Are you sure you want to delete this {{ $article->name }} Hotel?"
                                        >
                                    <i class="glyphicon glyphicon-trash"></i> Delete
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                @endforeach

                    </tbody>
                </table>
                <?php echo $articles->render(); ?>

            </div>

        </div>
    </div>
@endsection