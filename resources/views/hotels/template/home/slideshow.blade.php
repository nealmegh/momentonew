<div id="slideshow" class="slideshow-bg full-screen" style="height: 367px;">
    <div class="flexslider">
        <ul class="slides">
            <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                <div class="slidebg" style="background-image: url(/images/tour/home/slider/1.jpg);"></div>
            </li>
            <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                <div class="slidebg" style="background-image: url(/images/tour/home/slider/2.jpg);"></div>
            </li>
            <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                <div class="slidebg" style="background-image: url(/images/tour/home/slider/3.jpg);"></div>
            </li>
            <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                <div class="slidebg" style="background-image: url(/images/tour/home/slider/4.jpg);"></div>
            </li>
            <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                <div class="slidebg" style="background-image: url(/images/tour/home/slider/5.jpg);"></div>
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="table-wrapper full-width">
            <div class="table-cell">
                <div class="box">
                    <img src="{{ url('images/hotels/home/logo.png') }}" alt="">
                </div>
                <div class="heading box">
                    <h1 class="title">Choose Your Favorite Hotel</h1>
                    <h3 class="sub-title">Within best locations of Bangladesh</h3>
                </div>
                <div class="    search-box">
                    {!! Form::open(['url'=>'hotels/search/result', 'method' => 'get']) !!}
                        <div class="row">
                            <div class="col-sm-4 col-md-3 form-group">
                                {{--{!! Form::text('placeOrHotel', null, ['class' => 'input-text full-width', 'placeholder' => 'enter a destination or hotel name']) !!}--}}
                                {!! Form::text('auto',$value = null, array('class' => 'input-text full-width', 'placeholder' => 'enter a destination or hotel name', 'id' => 'auto')) !!}
                            </div>

                            <div class="col-xs-6 col-sm-4 col-md-2 form-group">
                                <div class="datepicker-wrap">
                                    {!! Form::text('date_from', null, ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4 col-md-2 form-group">
                                <div class="datepicker-wrap">
                                    {!! Form::text('date_to', null, ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}

                                </div>
                            </div>

                            <div class="col-md-5 row">
                                <div class="col-xs-6 col-sm-3 form-group">
                                    <div class="selector">
                                        {!! Form::selectRange('num_of_room', 01, 05, null, ['class' => 'full-width']) !!}
                                        <span class="custom-select full-width">Room</span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 form-group">
                                    <div class="selector">
                                        {!! Form::selectRange('num_of_adult', 01, 05, null, ['class' => 'full-width']) !!}
                                        <span class="custom-select full-width">Adult</span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-2 form-group">
                                    <div class="selector">
                                        {!! Form::selectRange('num_of_child', 00, 05, null, ['class' => 'full-width']) !!}
                                        <span class="custom-select full-width">Kids</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <button class="button btn-medium full-width uppercase sky-blue1">Search Now</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="text-center">
                    <a href="{{ url('hotels/search/all-hotels') }}" class="button btn-medium sky-blue1 uppercase">All Hotels</a>
                    &nbsp;&nbsp;
                    <a href="#" class="button btn-medium red uppercase">Latest Hotels</a>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('input:text').bind({
        });

        $("#auto").autocomplete({
            minLength:1,
            autoFocus: true,
            source: '{{URL('getdata/hotel?id=hotel')}}'
        });
    });
</script>