@extends('tours.layout.detail')

@section('head')
    {{--<link rel="stylesheet" href="{{ asset('css/tours/slider.css') }}">--}}
@endsection

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Tour Detail'])
@stop

@section('main-content')

    <div class="image-box" style="margin-bottom: 15px;">
        @include('tours.template.tour-detail.tour-images')
    </div>

    <div id="tour-details" class="tab-container">
        @include('tours.template.tour-detail.tour-main-content')
    </div>
@stop

@section('right-sidebar')
        <div class="travelo-box">
            <h4 class="box-title">Last Minute Deals</h4>
            <div class="image-box style14">
                @foreach($randomTours as $randomTour)
                    <?php  $tourImage = $randomTour->images()->where('type', 'gallery')->first(); ?>
                    <article class="box">
                    <figure><a href="#" title=""><img width="63" height="59" src="{{ asset($tourImage->path.'/thumbnail/'.$tourImage->name) }}" alt=""></a></figure>
                    <div class="details">
                        <h5 class="box-title"><a href="{{ url('tours/detail/'.$randomTour->id) }}">{{ $randomTour->title }}</a></h5>
                        <label class="price-wrapper"><span class="price-per-unit">{{ $settings->currency.' '.number_format($randomTour->price_per_adult, 2) }}</span>/adult</label>
                    </div>
                </article>
                @endforeach
                
            </div>
        </div>
        @include('common.widget.why-us')
        @include('common.widget.need-help')

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
            var price_arr = {3: '{{ $settings->curremcy }}170', 4: '{{ $settings->curremcy }}170', 5: '{{ $settings->curremcy }}170', 6: '{{ $settings->curremcy }}170', 7: '{{ $settings->curremcy }}170', 8: '{{ $settings->curremcy }}170', 9: '{{ $settings->curremcy }}170', 10: '{{ $settings->curremcy }}170', 11: '{{ $settings->curremcy }}170', 12: '{{ $settings->curremcy }}170', 13: '{{ $settings->curremcy }}170', 14: '{{ $settings->curremcy }}170', 15: '{{ $settings->curremcy }}170', 16: '{{ $settings->curremcy }}170', 17: '{{ $settings->curremcy }}170'};

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
{{--        var fenway = new google.maps.LatLng({{ {{ $settings->curremcy }}hotel->google_map }});--}}
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