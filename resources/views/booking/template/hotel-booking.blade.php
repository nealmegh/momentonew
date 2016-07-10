@extends('booking.layout.booking')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Booking '])
@stop

@section('main-content')

    <div class="booking-section travelo-box">

        <form class="booking-form" method="POST" action="#" novalidate="novalidate">
            <input type="hidden" name="action" value="acc_submit_booking">
            <input type="hidden" name="transaction_id" value="457850">
            <input type="hidden" id="_wpnonce" name="_wpnonce" value="60282f3c66">
            <div class="person-information">
                <h2>Your Personal Information</h2>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-5">
                        <label>first name</label>
                        <input type="text" name="first_name" class="input-text full-width" value="" placeholder="">
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <label>last name</label>
                        <input type="text" name="last_name" class="input-text full-width" value="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-5">
                        <label>email address</label>
                        <input type="text" name="email" class="input-text full-width" value="" placeholder="">
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <label>Verify E-mail Address</label>
                        <input type="text" name="email2" class="input-text full-width" value="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-5">
                        <label>Country code</label>
                        <div class="selector">
                            <select class="full-width" name="country_code">
                               @include('common.country-list')
                            </select><span class="custom-select full-width">Bangladesh (+880)</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <label>Phone number</label>
                        <input type="text" name="phone" class="input-text full-width" value="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-5">
                        <label>address</label>
                        <input type="text" name="address" class="input-text full-width" value="" placeholder="">
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <label>city</label>
                        <input type="text" name="city" class="input-text full-width" value="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-5">
                        <label>zip code</label>
                        <input type="text" name="zip" class="input-text full-width" value="" placeholder="">
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <label>Country</label>
                        <div class="selector">
                            <select class="full-width" name="country">
                                <option value="United States">United States</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Canada">Canada</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua">Antigua</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="British Virgin Islands">British Virgin Islands</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burma Myanmar">Burma Myanmar</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Federated States of Micronesia">Federated States of Micronesia</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Kosovo">Kosovo</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="North Korea">North Korea</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of the Congo">Republic of the Congo</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Barthelemy">Saint Barthelemy</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Martin">Saint Martin</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Korea">South Korea</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="St. Lucia">St. Lucia</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="The Bahamas">The Bahamas</option>
                                <option value="The Gambia">The Gambia</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="US Virgin Islands">US Virgin Islands</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City">Vatican City</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select><span class="custom-select full-width">United States</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 col-md-10">
                        <label>Special requirements</label>
                        <textarea name="special_requirements" class="full-width" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <hr>


            <div class="form-group row">
                <div class="col-sm-12 col-md-12">
                    <img src="http://www.soaptheme.net/wordpress/travelo/wp-content/themes/Travelo/captcha.php?width=400&amp;height=100&amp;characters=5" class="col-sm-6 col-md-5" alt="captcha">
                    <div class="col-sm-6 col-md-5">
                        <label>Security Code</label>
                        <input id="security_code" class="input-text" name="security_code" type="text">
                    </div>
                </div>
            </div>
            <hr>


            <div class="form-group row confirm-booking-btn">
                <div class="col-sm-6 col-md-5">
                    <button type="submit" class="full-width btn-large">
                        CONFIRM BOOKING						</button>
                </div>
            </div>
        </form>


    </div>

@endsection

@section('right-sidebar')

        <div class="booking-details travelo-box">


            <h4>Booking Details</h4>
            <article class="image-box hotel listing-style1">
                <figure class="clearfix">
                    <a href="http://www.soaptheme.net/wordpress/travelo/accommodation/hilton-hotel-and-resorts/" class="hover-effect middle-block" style="position: relative;">
                        <img width="150" height="150" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/11/4-150x150.jpg" class="middle-item wp-post-image" alt="4" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -37.5px;">					</a>
                    <div class="travel-title">
                        <h5 class="box-title"><a href="http://www.soaptheme.net/wordpress/travelo/accommodation/hilton-hotel-and-resorts/">Hilton Hotel</a>
                            <small>
                                Paris								<br>
                                France							</small>
                        </h5>
                        <a href="http://www.soaptheme.net/wordpress/travelo/accommodation/hilton-hotel-and-resorts/?date_from=04/08/2015&amp;date_to=04/22/2015&amp;rooms=1&amp;adults=1&amp;kids=0&amp;child_ages%5B0%5D=0" class="button">EDIT</a>
                    </div>
                </figure>
                <div class="details">
                    <div class="feedback">
                        <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="4.9 stars"><span style="width: 98%;" class="five-stars"></span></div>
                        <span class="review">2 reviews</span>
                    </div>
                    <div class="constant-column-3 timing clearfix">
                        <div class="check-in">
                            <label>Check in</label>
                            <span>Apr 8, 2015<br>4pm</span>
                        </div>
                        <div class="duration text-center">
                            <i class="soap-icon-clock"></i>
							<span>
								14 Nights							</span>
                        </div>
                        <div class="check-out">
                            <label>Check out</label>
                            <span>Apr 22, 2015<br>12pm</span>
                        </div>
                    </div>
                    <div class="guest">
                        <small class="uppercase">1 Deluxe Single Room for <span class="skin-color">1 Adults</span></small>
                    </div>
                </div>
            </article>

            <h4>Other Details</h4>
            <dl class="other-details">
                <dt class="feature">room Type:</dt><dd class="value">Deluxe Single Room</dd>
                <dt class="feature">14 night Stay:</dt><dd class="value">$2380.00</dd>
                <dt class="feature">taxes and fees:</dt><dd class="value">$238.00</dd>
                <dt class="total-price">Total Price</dt><dd class="total-price-value">$2618.00</dd>
            </dl>
            <a href="#" class="show-price-detail" data-show-desc="Show Price Detail" data-hide-desc="Hide Price Detail">Show Price Detail</a><br>
            <dl class="price-details clearer">
                <dt class="feature">2015-04-08:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-09:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-10:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-11:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-12:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-13:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-14:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-15:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-16:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-17:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-18:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-19:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-20:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd><dt class="feature">2015-04-21:</dt><dd class="value clearfix"><table><tbody><tr><td>price per room</td><td>$170.00</td></tr><tr><td>total</td><td>$170.00</td></tr></tbody></table></dd>			</dl>


        </div>
        <div id="search-2" class="widget travelo-box widget_search"><h4 class="widgettitle">Search Stories</h4><form role="search" method="get" id="searchform" class="searchform" action="http://www.soaptheme.net/wordpress/travelo/">
                <div class="with-icon full-width">
                    <input type="text" class="input-text full-width" placeholder="story name or category" value="" name="s" id="s">
                    <button type="submit" class="icon green-bg white-color"><i class="soap-icon-search"></i></button>
                    <input type="hidden" name="post_type" value="post">
                </div>
            </form></div><div id="travtabswidget-2" class="widget travelo-box widget_travtabswidget">		<div class="tab-container box">
                <ul class="tabs full-width">
                    <li class="active"><a data-toggle="tab" href="#recent-posts">Recent</a></li>
                    <li><a data-toggle="tab" href="#popular-posts">Popular</a></li>
                    <li><a data-toggle="tab" href="#new-comments">Comment</a></li>
                </ul>
                <div class="tab-content">
                    <div id="recent-posts" class="tab-pane fade in active">
                        <div class="image-box style14">
                            <article class="box">
                                <figure><a href="http://www.soaptheme.net/wordpress/travelo/amazing-places/"><img width="64" height="64" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/11/17-64x64.png" class="attachment-widget-thumb wp-post-image" alt="1"></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="http://www.soaptheme.net/wordpress/travelo/amazing-places/">Amazing Places</a></h5>
                                </div>
                            </article>
                            <article class="box">
                                <figure><a href="http://www.soaptheme.net/wordpress/travelo/travel-insurance/"><img width="64" height="64" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/11/23-64x64.png" class="attachment-widget-thumb wp-post-image" alt="2"></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="http://www.soaptheme.net/wordpress/travelo/travel-insurance/">Travel Insurance</a></h5>
                                </div>
                            </article>
                            <article class="box">
                                <figure><a href="http://www.soaptheme.net/wordpress/travelo/travelo-with-video-post/"><img width="64" height="64" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/11/14-64x64.png" class="attachment-widget-thumb wp-post-image" alt="1"></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="http://www.soaptheme.net/wordpress/travelo/travelo-with-video-post/">Travelo with video post</a></h5>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div id="popular-posts" class="tab-pane fade">
                        <div class="image-box style14">
                            <article class="box">
                                <figure><a href="http://www.soaptheme.net/wordpress/travelo/amazing-places/"><img width="64" height="64" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/11/17-64x64.png" class="attachment-widget-thumb wp-post-image" alt="1"></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="http://www.soaptheme.net/wordpress/travelo/amazing-places/">Amazing Places</a></h5>
                                </div>
                            </article>
                            <article class="box">
                                <figure><a href="http://www.soaptheme.net/wordpress/travelo/standard-single-image-post/"><img width="64" height="64" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/11/14-64x64.png" class="attachment-widget-thumb wp-post-image" alt="1"></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="http://www.soaptheme.net/wordpress/travelo/standard-single-image-post/">Standard single image post</a></h5>
                                </div>
                            </article>
                            <article class="box">
                                <figure><a href="http://www.soaptheme.net/wordpress/travelo/travel-insurance/"><img width="64" height="64" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/11/23-64x64.png" class="attachment-widget-thumb wp-post-image" alt="2"></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="http://www.soaptheme.net/wordpress/travelo/travel-insurance/">Travel Insurance</a></h5>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div id="new-comments" class="tab-pane fade">
                        <div class="image-box style14">
                            <article class="box">
                                <figure><a>
                                        <img width="52" height="52" alt="avatar" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/12/author11.png">								</a></figure>
                                <div class="details">
                                    <p>admin says:</p>
                                    <h5 class="box-title">
                                        <a href="http://www.soaptheme.net/wordpress/travelo/amazing-places/#comment-6" title="admin on  Amazing Places">Lorem Ipsum is simply dummy text of the printing and typesetting industry....</a>
                                    </h5>
                                </div>
                            </article>
                            <article class="box">
                                <figure><a>
                                        <img width="52" height="52" alt="avatar" src="http://www.soaptheme.net/wordpress/travelo/wp-content/uploads/2014/12/author11.png">								</a></figure>
                                <div class="details">
                                    <p>admin says:</p>
                                    <h5 class="box-title">
                                        <a href="http://www.soaptheme.net/wordpress/travelo/amazing-places/#comment-5" title="admin on  Amazing Places">Lorem Ipsum is simply dummy text of the printing and typesetting industry....</a>
                                    </h5>
                                </div>
                            </article>
                            <article class="box">
                                <figure><a>
                                        <img width="52" height="52" alt="avatar" src="http://www.soaptheme.net/wordpress/travelo/wp-content/themes/Travelo/images/avatar.jpg">								</a></figure>
                                <div class="details">
                                    <p>David Jhon says:</p>
                                    <h5 class="box-title">
                                        <a href="http://www.soaptheme.net/wordpress/travelo/amazing-places/#comment-4" title="David Jhon on  Amazing Places">Lorem Ipsum is simply dummy text of the printing and typesetting industry....</a>
                                    </h5>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div><div id="categories-3" class="widget travelo-box widget_categories"><h4 class="widgettitle">Categories</h4><select name="cat" id="cat" class="postform">
                <option value="-1">Select Category</option>
                <option class="level-0" value="1">Uncategorized</option>
            </select>

            <script type="text/javascript">
                /* <![CDATA[ */
                var dropdown = document.getElementById("cat");
                function onCatChange() {
                    if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                        location.href = "http://www.soaptheme.net/wordpress/travelo/?cat="+dropdown.options[dropdown.selectedIndex].value;
                    }
                }
                dropdown.onchange = onCatChange;
                /* ]]&gt; */
            </script>

        </div><div id="tweets-widget-2" class="widget travelo-box twitter-box"><h4 class="widgettitle">Recent Tweets</h4>		<div class="twitter-holder">
                <ul>
                    <li class="tweet">
                        <p class="tweet-text">
                            Hi,
                            Travelo - Responsive Wordpress Booking Theme is launched! &nbsp;<a href="http://t.co/Z6DVZxr20V" target="_blank">http://t.co/Z6DVZxr20V</a>&nbsp;
                            Regards,
                            SoapTheme					</p>
                        <a class="tweet-date" href="http://twitter.com/SoapTheme/statuses/550887571664809986">
                            3 months ago 					</a>
                    </li>
                    <li class="tweet">
                        <p class="tweet-text">
                            Check out 'Fengo - Premium Responsive Magento Theme' on #EnvatoMarket by &nbsp;<a href="http://twitter.com/SoapTheme" target="_blank">@SoapTheme</a>&nbsp; #themeforest &nbsp;<a href="http://t.co/duyFjvPwCn" target="_blank">http://t.co/duyFjvPwCn</a>&nbsp;					</p>
                        <a class="tweet-date" href="http://twitter.com/SoapTheme/statuses/539628473157816320">
                            4 months ago 					</a>
                    </li>
                    <li class="tweet">
                        <p class="tweet-text">
                            &nbsp;<a href="http://twitter.com/envato_support" target="_blank">@envato_support</a>&nbsp;
                            We tried to upload new item several times, but got 404 page every time. We created a ticket also. Let me know the reason					</p>
                        <a class="tweet-date" href="http://twitter.com/SoapTheme/statuses/537611537603518464">
                            4 months ago 					</a>
                    </li>
                </ul>
            </div>
        </div><div id="travcontactwidget-5" class="contact-box widget travelo-box widget_travcontactwidget"><h4 class="widgettitle">Need Travelo Help?</h4><p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p><address class="contact-details"><span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span><br><a class="contact-email" href="mailto:contact@travelo.com">contact@travelo.com</a></address></div>

@endsection
