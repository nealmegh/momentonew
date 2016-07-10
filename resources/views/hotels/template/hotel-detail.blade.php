@extends('hotels.layout.detail')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel Detail'])
@stop

@section('main-content')
    <div class="tab-container style1" id="hotel-main-content">
        @include('hotels.template.hotel-detail.hotel-main-content')
    </div>
    <div id="hotel-features" class="tab-container">
        @include('hotels.template.hotel-detail.hotel-features')
    </div>
@stop

@section('right-sidebar')

    <?php  $imageLogo = $hotel->images()->where('type', 'logo')->first(); ?>

    <article class="detailed-logo">
            <figure>
            @if($imageLogo != null)
                <img width="114" height="85" src="{{ asset($imageLogo->path.'/'.$imageLogo->name) }}" alt="">
            @else
                <img width="114" height="85" src="{{ asset('images/no-image.png') }}" alt="">
            @endif
            </figure>
            <div class="details">
                <h2 class="box-title">{{ $hotel->name }}
                    <small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space">{{ $hotel->address }}</span></small>
                </h2>
                <span class="price clearfix">
                    <small class="pull-left">minimum/night</small>
                    <span class="pull-right">{{ $settings->currency }} {{ $avg }}</span>
                </span>
                
                <div class="feedback clearfix">
                    <div title="" class="five-stars-container" data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $hotel->grade->name }}">
                        <span class="five-stars" style="width: {{ $hotel->grade->id*20 }}%;"></span></div>
                    <span class="review pull-right">{{ count($hotel->comments) }} reviews</span>
                </div>
                <p class="description">{!! substr($hotel->general_information, 0,180) !!}</p>
                {{--<a class="button yellow full-width uppercase btn-small">add to wishlist</a>--}}
            </div>
        </article>

    @include('common.widget.need-help')
    @include('common.widget.why-us')

@stop


@section('footer')

    <!-- Google Map Api -->
    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <script type="text/javascript" src="{{ asset('js/calendar.js') }}"></script>


    <script type="text/javascript">
        tjq(document).ready(function() {
            // calendar panel
            var cal = new Calendar();
            var unavailable_days = [17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
            var price_arr = {3: '$170', 4: '$170', 5: '$170', 6: '$170', 7: '$170', 8: '$170', 9: '$170', 10: '$170', 11: '$170', 12: '$170', 13: '$170', 14: '$170', 15: '$170', 16: '$170', 17: '$170'};

            var current_date = new Date();
            var current_year_month = (1900 + current_date.getYear()) + "-" + (current_date.getMonth() + 1);
            tjq("#select-month").find("[value='" + current_year_month + "']").prop("selected", "selected");
            cal.generateHTML(current_date.getMonth(), (1900 + current_date.getYear()), unavailable_days, price_arr);
            tjq(".calendar").html(cal.getHTML());

            tjq("#select-month").change(function() {
                var selected_year_month = tjq("#select-month option:selected").val();
                var year = parseInt(selected_year_month.split("-")[0], 10);
                var month = parseInt(selected_year_month.split("-")[1], 10);
                cal.generateHTML(month - 1, year, unavailable_days, price_arr);
                tjq(".calendar").html(cal.getHTML());
            });


            tjq(".goto-writereview-pane").click(function(e) {
                e.preventDefault();
                tjq('#hotel-features .tabs a[href="#hotel-write-review"]').tab('show')
            });

            // editable rating
            tjq(".editable-rating.five-stars-container").each(function() {
                var oringnal_value = tjq(this).data("original-stars");
                if (typeof oringnal_value == "undefined") {
                    oringnal_value = 0;
                } else {
                    //oringnal_value = 10 * parseInt(oringnal_value);
                }
                tjq(this).slider({
                    range: "min",
                    value: oringnal_value,
                    min: 0,
                    max: 5,
                    slide: function( event, ui ) {
                        tjq(this).children('.rating-input').val(ui.value);;
                    }
                });
            });
        });

        tjq('a[href="#map-tab"]').on('shown.bs.tab', function (e) {
            var center = panorama.getPosition();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
        tjq('a[href="#steet-view-tab"]').on('shown.bs.tab', function (e) {
            fenway = panorama.getPosition();
            panoramaOptions.position = fenway;
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        });
        var map = null;
        var panorama = null;
        var fenway = new google.maps.LatLng({{ $hotel->google_map }});
        var mapOptions = {
            center: fenway,
            zoom: 12
        };
        var panoramaOptions = {
            position: fenway,
            pov: {
                heading: 34,
                pitch: 10
            }
        };
        function initialize() {
            tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
            map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop