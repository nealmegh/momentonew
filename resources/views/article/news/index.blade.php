@extends('article.article-layout')

@section('head')
    <?php $bodyClass = 'single single-pos'; ?>
@endsection

@section('article-content')

    <div class="post">
        <figure class="image-container">
            <a href="#"><img src="{{ url($article->images->path.'/'.$article->images->name) }}" alt=""></a>
        </figure>
        <div class="details">
            <h1 class="entry-title">{{ $article->title }}</h1>
            <div class="post-content">
                {!! $article->body !!}
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
        {{--<div class="single-navigation block">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-6"><a rel="prev" href="" class="button btn-large prev full-width"><i class="soap-icon-longarrow-left"></i><span>Previous Post</span></a></div>--}}
                {{--<div class="col-xs-6"><a rel="next" href="{{ url('pages/'.($article->id + 1)) }}" class="button btn-large next full-width"><span>Next Post</span><i class="soap-icon-longarrow-right"></i></a></div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="comments-container block">--}}
            {{--<h2>3 Comments</h2>--}}
            {{--<ul class="comment-list travelo-box">--}}
                {{--<li class="comment depth-1">--}}
                    {{--<div class="the-comment">--}}
                        {{--<div class="avatar">--}}
                            {{--<img src="/images/shortcodes/team/david.png" width="72" height="72" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="comment-box">--}}
                            {{--<div class="comment-author">--}}
                                {{--<a href="#" class="button btn-mini pull-right">REPLY</a>--}}
                                {{--<h4 class="box-title"><a href="#">David Jhon</a><small>Nov, 12, 2013</small></h4>--}}
                            {{--</div>--}}
                            {{--<div class="comment-text">--}}
                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took.</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<ul class="children">--}}
                        {{--<li class="comment depth-2">--}}
                            {{--<div class="the-comment">--}}
                                {{--<div class="avatar">--}}
                                    {{--<img src="/images/shortcodes/team/jessica.png" width="72" height="72" alt="">--}}
                                {{--</div>--}}
                                {{--<div class="comment-box">--}}
                                    {{--<div class="comment-author">--}}
                                        {{--<a href="#" class="button btn-mini pull-right">REPLY</a>--}}
                                        {{--<h4 class="box-title"><a href="#">David Jhon</a><small>Nov, 12, 2013</small></h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="comment-text">--}}
                                        {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s.</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="comment depth-1">--}}
                    {{--<div class="the-comment">--}}
                        {{--<div class="avatar">--}}
                            {{--<img src="/images/shortcodes/team/kyle.png" width="72" height="72" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="comment-box">--}}
                            {{--<div class="comment-author">--}}
                                {{--<a href="#" class="button btn-mini pull-right">REPLY</a>--}}
                                {{--<h4 class="box-title"><a href="#">Kyle Martin</a><small>Nov, 12, 2013</small></h4>--}}
                            {{--</div>--}}
                            {{--<div class="comment-text">--}}
                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took.</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="post-comment block">--}}
            {{--<h2 class="reply-title">Post a Comment</h2>--}}
            {{--<div class="travelo-box">--}}
                {{--<form class="comment-form">--}}
                    {{--<div class="form-group row">--}}
                        {{--<div class="col-xs-6">--}}
                            {{--<label>Your Name</label>--}}
                            {{--<input type="text" class="input-text full-width">--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-6">--}}
                            {{--<label>Your Email</label>--}}
                            {{--<input type="text" class="input-text full-width">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label>Your Message</label>--}}
                        {{--<textarea rows="6" class="input-text full-width" placeholder="write message here"></textarea>--}}
                    {{--</div>--}}

                    {{--<button type="submit" class="btn-large full-width">SEND COMMENT</button>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>

@stop