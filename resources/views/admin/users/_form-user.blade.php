<div class="edit-profile">
                <article class="image-box style2 box innerstyle personal-details">
                    <figure>
                        <a title="" href="#">
                            @if($image)
                                <img width="270" height="263" alt="" src="{{ asset($image->path) }}">
                            @else
                                <img width="270" height="263" alt="" src="{{ asset('images/no-image.png') }}">
                            @endif

                                <div class="fileinput full-width" style="line-height: 34px;">
                                    <input type="file" class="input-text" data-placeholder="select image/s">
                                    <input type="text" class="custom-fileinput input-text" placeholder="select image/s">
                                </div>
                        </a>
                    </figure>
                    <div class="details">

                        <h2 class="box-title fullname">User Info</h2>
                        <dl id="user-form" class="term-description" >
                            <dt>user name:</dt><dd>{!! form::text('email', null, ['class'=>'user-form input-text full-width', 'placeholder'=>'info@jessica.com']) !!}</dd>
                            <dt>first name:</dt><dd>{!! form::text('first_name', null, ['class'=>'user-form input-text full-width', 'placeholder'=>'jessica']) !!}</dd>
                            <dt>last name:</dt><dd>{!! form::text('last_name', null, ['class'=>'user-form input-text full-width', 'placeholder'=>'brown']) !!}</dd>
                            <dt>phone number:</dt><dd>{!! form::text('phone_no', null, ['class'=>'user-form input-text full-width', 'placeholder'=>'1-800-123-HELLO']) !!}</dd>
                            <dt>Date of birth:</dt><dd>
                                <div class="datepicker-wrap">
                                    {!! form::text('birth_date', date('m/d/y'), ['class'=>'input-text full-width hasDatepicker', 'placeholder' =>'mm/dd/yy']) !!}
                                    <img class="ui-datepicker-trigger" src="/images/icon/blank.png" alt="" title="">
                                </div>

                            </dd>
                            <dt>Street Address and number:</dt><dd>{!! form::text('address', null, ['class'=>'user-form input-text full-width', 'placeholder'=>'353 Third floor Avenue']) !!}</dd>
                            <dt>Town / City:</dt><dd>{!! form::text('city', null, ['class'=>'user-form input-text full-width', 'placeholder'=>'Paris,France']) !!}</dd>
                            <dt>ZIP code:</dt><dd>{!! form::text('zip', null, ['class'=>'user-form input-text full-width', 'placeholder'=>'75800-875']) !!}</dd>
                            <dt>Country:</dt><dd>{!! form::text('country', null, ['class'=>'user-form input-text full-width', 'placeholder'=>'United States of america']) !!}</dd>
                        </dl>
                    </div>
                </article>
                <hr>
                <h2>About You</h2>
                <div class="intro">
                    <p>{!! form::textarea('about', null, ['class'=>'user-form input-text full-width ckeditor']) !!}</p>
                </div>
                <div class="form-group">
                    {!! form::submit($SubmitButtonText,  ['class'=>'btn btn-success']) !!}
                </div>

</div>


