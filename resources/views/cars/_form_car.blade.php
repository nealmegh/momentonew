<form
        {{--action="{{ route('manager_new_hotel_save_path') }}" method="post" --}}

class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

    <div class="form-group">
      <label for="hotel_name" class="control-label col-md-2">Hotel name  : </label>
      <div class="col-md-10">
        <input type="text" name="name" id="hotel_name" class="form-control"/>
        <span class="help-block">
            * enter your hotel name
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_category" class="control-label col-md-2">Category : </label>
      <div class="col-md-10">
        <select name="category_id" id="hotel_category" class="form-control">
            {{--@foreach($data['categories'] as $category)--}}
                {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
            {{--@endforeach--}}
        </select>
        <span class="help-block">
            * hotel category
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_grade" class="control-label col-md-2">Grade : </label>
      <div class="col-md-10">
        <select name="grade_id" id="hotel_grade" class="form-control">
            {{--@foreach($data['grades'] as $grade)--}}
                {{--<option value="{{ $grade->id }}">{{ $grade->name }}</option>--}}
            {{--@endforeach--}}
        </select>
        <span class="help-block">
            * hotel grades
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_address" class="control-label col-md-2">Address  : </label>
      <div class="col-md-10">
        <input type="text" name="address" id="hotel_address" class="form-control"/>
        <span class="help-block">
            * your hotel's street address
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_city" class="control-label col-md-2">City  : </label>
      <div class="col-md-10">
        <input type="text" name="city" id="hotel_city" class="form-control"/>
        <span class="help-block">
            * name of the city where your hotel is situated
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_state" class="control-label col-md-2">State  : </label>
      <div class="col-md-10">
        <input type="text" name="state" id="hotel_state" class="form-control"/>
        <span class="help-block">
            name of the state where your hotel is situated ( optional )
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_zip" class="control-label col-md-2">Zip Code  : </label>
      <div class="col-md-10">
        <input type="text" name="zip" id="hotel_zip" class="form-control"/>
        <span class="help-block">
            * enter your zip / postal code
        </span>
      </div>
    </div>

    @include('partials.country', array(
        'id' => 'hotel_country',
        'label' => 'Country :',
        'name' => 'country',
        'selected' => 'Bangladesh',
    ))

    <div class="form-group">
      <label for="hotel_pet_allowed" class="control-label col-md-2">Pet Allowed  : </label>
      <div class="col-md-10">
        <input type="radio" name="pet_allowed" id="hotel_pet_allowed" value="1"/> Yes <br/>
        <input type="radio" name="pet_allowed" id="hotel_pet_allowed" value="0"/> No
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_email" class="control-label col-md-2">Hotel Email : </label>
      <div class="col-md-10">
        <input type="email" name="email" id="hotel_email" class="form-control"/>
        <span class="help-block">
            enter your hotel contact email address ( optional )
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_fax" class="control-label col-md-2">Fax  : </label>
      <div class="col-md-10">
        <input type="text" name="fax" id="hotel_fax" class="form-control"/>
        <span class="help-block">
            enter your hotel fax number  ( optional )
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_phone" class="control-label col-md-2">Phone number  : </label>
      <div class="col-md-10">
        <input type="text" name="phone" id="hotel_phone" class="form-control"/>
        <span class="help-block">
            * enter your hotel phone number
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_cell" class="control-label col-md-2">Mobile Number  : </label>
      <div class="col-md-10">
        <input type="text" name="cell" id="hotel_cell" class="form-control"/>
        <span class="help-block">
           * enter hotel mobile phone number
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_distance_from_airport" class="control-label col-md-2">Distance from airport : </label>
      <div class="col-md-10">
        <input type="text" name="distance_from_airport" id="hotel_distance_from_airport" class="form-control"/>
        <span class="help-block">
           * specify the distance from airport in (KM)
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_distance_from_market" class="control-label col-md-2">Distance from market : </label>
      <div class="col-md-10">
        <input type="text" name="distance_from_market" id="hotel_distance_from_market" class="form-control"/>
        <span class="help-block">
           * specify the distance from market area in (KM)
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_google_map" class="control-label col-md-2">Google map code  : </label>
      <div class="col-md-10">
        <textarea name="google_map" id="hotel_google_map" class="form-control"></textarea>
        <span class="help-block">
            * put your google map embed code
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_general_information" class="control-label col-md-2">General information  : </label>
      <div class="col-md-10">
        <textarea name="general_information" id="hotel_general_information" class="form-control"></textarea>
        <span class="help-block">
            write some information about your hotel ( optional )
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_service_information" class="control-label col-md-2">General information  : </label>
      <div class="col-md-10">
        <textarea name="service_information" id="hotel_service_information" class="form-control"></textarea>
        <span class="help-block">
            write some service information about your hotel ( optional )
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_other_information" class="control-label col-md-2">General information  : </label>
      <div class="col-md-10">
        <textarea name="other_information" id="hotel_other_information" class="form-control"></textarea>
        <span class="help-block">
            write other necessary information about your hotel ( optional )
        </span>
      </div>
    </div>

    <div class="form-group">
      <label for="hotel_facilities" class="control-label col-md-2">Grade : </label>
      <div class="col-md-10">
        <select name="facilities[]" style="min-height: 200px" multiple id="hotel_facilities" class="form-control">
            {{--@foreach($data['facilities'] as $facility)--}}
                {{--<option value="{{ $facility->id }}">{{ $facility->name }}</option>--}}
            {{--@endforeach--}}
        </select>
        <span class="help-block">
            * please select your hotel's facilities
        </span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button type="submit" class="btn btn-primary">Save Hotel</button>
      </div>
    </div>
</form>

