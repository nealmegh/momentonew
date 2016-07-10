<h4 class="search-results-title">
    <i class="soap-icon-search"></i>
    <b>
        @if($tours != null)
            {{ $results }}
        @endif
    </b> results found.</h4>

<div class="toggle-container filters-container">
    {{--<div class="panel style1 arrow-right">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>--}}
        {{--</h4>--}}
        {{--<div id="price-filter" class="panel-collapse collapse">--}}
            {{--<div class="panel-content">--}}
                {{--<div id="price-range"></div>--}}
                {{--<br />--}}
                {{--<span class="min-price-label pull-left"></span>--}}
                {{--<span class="max-price-label pull-right"></span>--}}
                {{--<div class="clearer"></div>--}}
            {{--</div><!-- end content -->--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="panel style1 arrow-right">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a data-toggle="collapse" href="#rating-filter" class="collapsed">User Rating</a>--}}
        {{--</h4>--}}
        {{--<div id="rating-filter" class="panel-collapse collapse filters-container">--}}
            {{--<div class="panel-content">--}}
                {{--<div id="rating" class="five-stars-container editable-rating"></div>--}}
                {{--<br />--}}
                {{--<small>2458 REVIEWS</small>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="panel style1 arrow-right">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>--}}
        {{--</h4>--}}
        {{--<div id="accomodation-type-filter" class="panel-collapse collapse">--}}
            {{--<div class="panel-content">--}}
                {{--<ul class="check-square filters-option">--}}
                    {{--<li><a href="#">All<small>(722)</small></a></li>--}}
                    {{--<li><a href="#">Hotel<small>(982)</small></a></li>--}}
                    {{--<li><a href="#">Resort<small>(127)</small></a></li>--}}
                    {{--<li class="active"><a href="#">Bed &amp; Breakfast<small>(222)</small></a></li>--}}
                    {{--<li><a href="#">Condo<small>(158)</small></a></li>--}}
                    {{--<li><a href="#">Residence<small>(439)</small></a></li>--}}
                    {{--<li><a href="#">Guest House<small>(52)</small></a></li>--}}
                {{--</ul>--}}
                {{--<a class="button btn-mini">MORE</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="panel style1 arrow-right">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>--}}
        {{--</h4>--}}
        {{--<div id="amenities-filter" class="panel-collapse collapse">--}}
            {{--<div class="panel-content">--}}
                {{--<ul class="check-square filters-option">--}}
                    {{--<li><a href="#">Bathroom<small>(722)</small></a></li>--}}
                    {{--<li><a href="#">Cable tv<small>(982)</small></a></li>--}}
                    {{--<li class="active"><a href="#">air conditioning<small>(127)</small></a></li>--}}
                    {{--<li class="active"><a href="#">mini bar<small>(222)</small></a></li>--}}
                    {{--<li><a href="#">wi - fi<small>(158)</small></a></li>--}}
                    {{--<li><a href="#">pets allowed<small>(439)</small></a></li>--}}
                    {{--<li><a href="#">room service<small>(52)</small></a></li>--}}
                {{--</ul>--}}
                {{--<a class="button btn-mini">MORE</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="panel style1 arrow-right">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a data-toggle="collapse" href="#language-filter" class="collapsed">Host Language</a>--}}
        {{--</h4>--}}
        {{--<div id="language-filter" class="panel-collapse collapse">--}}
            {{--<div class="panel-content">--}}
                {{--<ul class="check-square filters-option">--}}
                    {{--<li><a href="#">English<small>(722)</small></a></li>--}}
                    {{--<li><a href="#">Español<small>(982)</small></a></li>--}}
                    {{--<li class="active"><a href="#">Português<small>(127)</small></a></li>--}}
                    {{--<li class="active"><a href="#">Français<small>(222)</small></a></li>--}}
                    {{--<li><a href="#">Suomi<small>(158)</small></a></li>--}}
                    {{--<li><a href="#">Italiano<small>(439)</small></a></li>--}}
                    {{--<li><a href="#">Sign Language<small>(52)</small></a></li>--}}
                {{--</ul>--}}
                {{--<a class="button btn-mini">MORE</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="panel style1 arrow-right">
        <h4 class="panel-title">
            <a data-toggle="collapse" href="#modify-search-panel" class="">Modify Search</a>
        </h4>
        <div id="modify-search-panel" class="panel-collapse collapse in">
            <div class="panel-content">
                    {!! Form::open(['url'=>'tours/search', 'method' => 'get']) !!}
                    {!! Form::hidden('searchable', 'tour') !!}
                    <div class="form-group">
                        <label>going to</label>
                        {!! Form::text('placeOrHotel', Input::get("placeOrHotel"), ['class' => 'input-text full-width', 'placeholder' => 'enter a destination or hotel name']) !!}

                    </div>
                    <div class="form-group">
                        <label>departure on</label>
                        <div class="datepicker-wrap">
                            {!! Form::text('date_from', Input::get("date_from"), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>arriving on</label>
                        <div class="datepicker-wrap">
                            {!! Form::text('date_to', Input::get("date_to"), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                        </div>
                    </div>

                            {{--<div class="form-group">--}}
                                {{--<label>Rooms</label>--}}
                                {{--<div class="selector">--}}
                                    {{--{!! Form::selectRange('num_of_room', 01, 05, Input::get('num_of_room'), ['class' => 'full-width']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label>Adults</label>
                                <div class="selector">
                                    {!! Form::selectRange('num_of_adult', 01, 05, Input::get('num_of_adult'), ['class' => 'full-width']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kids</label>
                                <div class="selector">
                                    {!! Form::selectRange('num_of_child', 01, 05, Input::get('num_of_child'), ['class' => 'full-width']) !!}
                                </div>
                            </div>

                    <br />
                <a class="button btn-medium dark-blue1 uppercase full-width" href="{{ url('tours/search?searchable=allTours') }}">reset</a>

                <button class="btn-medium icon-check uppercase full-width">search again</button>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>