@extends('article.article-layout')

@section('head')
    <?php $bodyClass = 'single single-pos'; ?>
@endsection

@section('article-content')

                    <div class="page">
                        <span style="display: none;" class="entry-title page-title">Blog Right Sidebar</span>
                        <span style="display: none;" class="vcard"><span class="fn"><a rel="author" title="Posts by admin" href="#">admin</a></span></span>
                        <span style="display:none;" class="updated">2014-06-20T13:35:34+00:00</span>
                        <div class="post-content">
                            <div class="blog-infinite">

                                @foreach($articles as $article)

                                    <div class="post">
                                        <div class="post-content-wrapper">
                                            <figure class="image-container">
                                                <a href="{{ url('articles/'.$article->id) }}" class="hover-effect"><img src="{{ url($article->images->path.'/'.$article->images->name) }}" alt=""></a>
                                            </figure>
                                            <div class="details">
                                                <h2 class="entry-title"><a href="{{ url('articles/'.$article->id) }}">{{ $article->title }}</a></h2>
                                                <div class="excerpt-container">
                                                    {!! substr( $article->body, 100) !!}
                                                </div>
                                                <div class="post-meta">
                                                    <div class="entry-date">
                                                        <label class="date">{{ date('d', strtotime($article->created_at)) }}</label>
                                                        <label class="month">{{ date('M', strtotime($article->created_at)) }}</label>
                                                    </div>
                                                    <div class="entry-author fn">
                                                        <i class="icon soap-icon-user"></i> Posted By:
                                                        <a href="#" class="author">Momento</a>
                                                    </div>
                                                    <div class="entry-action">
                                                        <a href="#" class="button entry-comment btn-small"><i class="soap-icon-comment"></i><span>0 Comments</span></a>
                                                        {{--<a href="#" class="button btn-small"><i class="soap-icon-wishlist"></i><span>22 Likes</span></a>--}}
                                                        {{--<span class="entry-tags"><i class="soap-icon-features"></i><span><a href="#">Adventure</a>, <a href="#">Romance</a></span></span>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach



                            </div>
                            {!! $articles->render() !!}

                        </div>
                    </div>


@stop