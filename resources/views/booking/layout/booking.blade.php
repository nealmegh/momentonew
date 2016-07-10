@extends('master')

@section('content')
    <div class="container">
        <div id="main">
            <div class="row">
                <div class="col-sms-6 col-sm-8 col-md-9">
                   @yield('main-content')
                </div>
                <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                    @yield('right-sidebar')
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
    <script>
        tjq = jQuery;

        tjq(document).ready(function(){

            //validation form
            tjq('.booking-form').validate({
                rules: {
                    first_name: { required: true},
                    last_name: { required: true},
                    email: { required: true, email: true},
                    email2: { required: true, equalTo: 'input[name="email"]'},
                    phone: { required: true},
                    address: { required: true},
                    city: { required: true},
                    zip: { required: true},
                    security_code: { required: true},
                },
                submitHandler: function (form) {
                    var booking_data = tjq('.booking-form').serialize();
                    tjq.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: booking_data,
                        success: function ( response ) {
                            if ( response.success == 1 ) {
                                var confirm_url = tjq('.booking-form').attr('action') + '?booking_no=' + response.result.booking_no + '&pin_code=' + response.result.pin_code + '&transaction_id=' + response.result.transaction_id + '&message=1';
                                if ( response.payment == 'paypal' ) {
                                    tjq('.confirm-booking-btn').before('<div class="alert alert-success">You will be redirected to paypal.<span class="close"></span></div>');
                                }
                                tjq('.confirm-booking-btn').hide();
                                setTimeout( function(){ tjq('.opacity-ajax-overlay').show(); }, 500 );
                                window.location.href = confirm_url;
                            } else if ( response.success == -1 ) {
                                alert( response.result );
                                setTimeout( function(){ tjq('.opacity-ajax-overlay').show(); }, 500 );
                                window.location.href = 'http://www.soaptheme.net/wordpress/travelo/accommodation/hilton-hotel-and-resorts/?date_from=04/08/2015&amp;date_to=04/22/2015&amp;rooms=1&amp;adults=1&amp;kids=0&amp;child_ages%5B0%5D=0';
                            } else {
                                console.log( response );
                                trav_show_modal( 0, response.result, '' );
                            }
                        }
                    });
                    return false;
                }
            });

            tjq('.show-price-detail').click( function(e){
                e.preventDefault();
                tjq('.price-details').toggle();
                if (tjq('.price-details').is(':visible')) {
                    tjq(this).html( tjq(this).data('hide-desc') );
                } else {
                    tjq(this).html( tjq(this).data('show-desc') );
                }
                return false;
            });
        });
    </script>
@endsection