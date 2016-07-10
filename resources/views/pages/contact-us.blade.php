@extends('master')

@section('head')
    @if(Request::is('contact-us'))
        <style>
            section#content {
                padding-top: 0;
            }
        </style>
    @endif
@endsection

@section('content')
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Contact Us</h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOME</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>
    <div class="travelo-google-map full-box"></div>
    <section id="content" class="white-bg">
        <div class="container">
            <div id="main">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <div class="travelo-box contact-us-box">
                            <h4>Contact us</h4>
                            <ul class="contact-address">
                                <li class="address">
                                    <i class="soap-icon-address circle"></i>
                                    <h5 class="title">Address</h5>
                                    <p>House # 532/6, Ground Floor, Road # 11(West),
					Baridhara DOHS, Dhaka-1216, Bangladesh </p>
                                    
                                </li>
                                <li class="phone">
                                    <i class="soap-icon-phone circle"></i>
                                    <h5 class="title">Phone</h5>
                                    <p>Mobile: 01715927194</p>
                                    <p>Mobile: 01922114858</p>
                                    <p>Mobile: 01926200100</p> 
                                </li>
                                <li class="email">
                                    <i class="soap-icon-message circle"></i>
                                    <h5 class="title">Email</h5>
                                    <p>info@momentotravles.com</p>
                                    <p>momentote@gmail.com</p>
                                    <p>www.momentotravles.com</p>
                                </li>
                            </ul>
                            <ul class="social-icons full-width">
                                <li><a href={{"https://plus.google.com/".$settings->googleplus}} data-toggle="tooltip" title="" data-original-title="GooglePlus"><i class="soap-icon-googleplus"></i></a></li>
                                <li><a href={{"http://facebook.com/".$settings->facebook}} data-toggle="tooltip" title="" data-original-title="Facebook"><i class="soap-icon-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-9">
                        <div class="travelo-box">

                            {!! Form::open(['url'=>'contact-us-handler', 'class' => 'contact-form', 'method' => 'post']) !!}
                                <h4 class="box-title">Send us a Message</h4>
                                <div class="row form-group">
                                    <div class="col-xs-6">
                                        <label>Your Name</label>
                                        <input type="text" name="name" class="input-text full-width">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Your Email</label>
                                        <input type="text" name="email" class="input-text full-width">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Your Message</label>
                                    <textarea name="message" rows="6" class="input-text full-width" placeholder="write message here"></textarea>
                                </div>
                                <button type="submit" class="btn-large full-width">SEND MESSAGE</button>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



@stop

@section('footer')

    <script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="js/gmap3.min.js"></script>
    <script type="text/javascript">
        tjq(".travelo-google-map").gmap3({
            map: {
                options: {
                    center: [23.810281, 90.412118],
                    zoom: 15
                }
            },
            marker:{
                values: [
                    {latLng:[23.810281, 90.412118], data:"{{ $settings->site_title }}}"}

                ],
                options: {
                    draggable: false
                },
            }
        });
    </script>
@stop