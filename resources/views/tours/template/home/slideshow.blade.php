<div id="slideshow" class="slideshow-bg full-screen" style="height: 367px;">
    <div class="flexslider">
        <ul class="slides">
            <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                <div class="slidebg" style="background-image: url('images/tour/home/slider/1.jpg');"></div>
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
                    <img src="{{ asset('images/tours/home/logo.png') }}" alt="">
                </div>
                <div class="heading box">
                    <h1 class="title">Find The Best Tour Deals We Are Offering</h1>
                    <h3 class="sub-title">Enjoy your vacation to the fullest with your friends and family</h3>
                </div>
                <div class="search-box">
                    {!! Form::open(['url'=>'tours/search/result', 'method'=>'GET']) !!}
                        <input name="searchable" type="hidden" value="tour">
                        <div class="row">
                            <div class="col-sm-4 col-md-3 form-group">
                                {{--<input type="text" class="input-text full-width" placeholder="Rome, Paris, New York..." name="placeOrHotel">--}}
                                {!! Form::text('tour',$value = null, array('class' => 'input-text full-width', 'placeholder' => 'enter a destination', 'id' => 'tour')) !!}

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
                                <div class="col-xs-6 col-sm-4 form-group">
                                    <div class="selector">
                                        <select class="full-width">
                                            <option value="">Trip Type</option>
                                            <option value="47">City Tour</option>
                                            <option value="48">Cultural</option>
                                            <option value="50">Honeymoon</option>
                                        </select>
                                        <span class="custom-select full-width">Trip Type</span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 form-group">
                                    <div class="selector">
                                        <select class="full-width">
                                            <option value="">Budget (USD)</option>
                                        </select><span class="custom-select full-width">Budget (USD)</span>
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
                    <a href="{{ url('tours/search/all-tours') }}" class="button btn-medium sky-blue1 uppercase">All Tour Packages</a>
                    &nbsp;&nbsp;
                    <a href="#" class="button btn-medium red uppercase">Latest Tour Packages</a>
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
        $("#tour").autocomplete({
            minLength:1,
            autoFocus: true,
            source: '{{URL('getdata/tour?id=tour&')}}'
        });

    });
</script>