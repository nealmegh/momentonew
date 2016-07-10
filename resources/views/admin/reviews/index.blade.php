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
                <hr />

                <div class=" fade active in" id="hotel-reviews">

                    <div class="guest-reviews">
                        <h2>Guest Reviews</h2>
                        @foreach($comments as $comment)
                            <div class="guest-review table-wrapper">
                                <div class="col-xs-3 col-md-2 author table-cell">
                                    <a href="#"><img src="{{ asset($comment->user->profilePicture->path.'/'.$comment->user->profilePicture->name) }}" alt="" width="270" height="263"></a>
                                    <p class="name">{{ $comment->user->first_name.' '.$comment->user->last_name }}</p>
                                    <p class="date">{{ date("M, d, Y", strtotime($comment->created_at)) }}</p>
                                </div>
                                <div class="col-xs-9 col-md-10 table-cell comment-container">
                                    <div class="comment-header clearfix">
                                        <h4 class="comment-title">{{ $comment->review_title }}</h4>
                                        <div class="review-score">
                                            <div class="five-stars-container"><div class="five-stars" style="width: 80%;"></div></div>
                                            <span class="score">{{ round($comment->ratings()->avg('rating_value'), 1) }}/5.0</span>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>{{ $comment->review_text }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <?php echo $comments->appends(['filter' => $filter])->render(); ?>
                </div>




                @include('errors.list')


            </div>
        </div>
    </div>
@endsection