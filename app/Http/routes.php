<?php


/**
 * Entrust Role Policy
 */
//Entrust::routeNeedsPermission('admin*', 'create-post');
//Entrust::routeNeedsRole('admin*', 'owner');
//Entrust::routeNeedsRole('agent*', 'agent');
//Entrust::routeNeedsRole('user*', 'register');



Route::get('/', 'WelcomeController@index');
Route::get('/home', 'WelcomeController@index');
Route::any('/getdata/{option}', function(){

    $option = Input::get('id');
    $term = Input::get('term');
    global $return_array;
    if($option == 'hotel')
    {
        // 4: check if any matches found in the database table
        $data = DB::table('hotel')->distinct()->select('title')->where('title', 'LIKE', $term.'%')->groupBy('title')->take(10)->get();
        $data2 = DB::table('hotel')->distinct()->select('city')->where('city', 'LIKE', $term.'%')->groupBy('city')->take(10)->get();
        if($data != null || $data2 != null)
        {
            foreach ($data as $v) {
                $return_array[] = array('value' => $v->title);
            }

            foreach ($data2 as $v2) {
                $return_array[] = array('value' => $v2->city);

            }
            // if matches found it first create the array of the result and then convert it to json format so that
            // it can be processed in the autocomplete script

        }
    }
    elseif($option == 'tour')
    {
        // 4: check if any matches found in the database table
        $data = DB::table('tours')->distinct()->select('title')->where('title', 'LIKE', $term.'%')->groupBy('title')->take(10)->get();
        $data2 = DB::table('tours')->distinct()->select('city')->where('city', 'LIKE', $term.'%')->groupBy('city')->take(10)->get();
        $data3 = DB::table('tours')->distinct()->select('location')->where('location', 'LIKE', $term.'%')->groupBy('location')->take(10)->get();
        if($data != null || $data2 != null || $data3 != null)
        {
            foreach ($data as $v) {
                $return_array[] = array('value' => $v->title);
            }

            foreach ($data2 as $v2) {
                $return_array[] = array('value' => $v2->city);

            }
            foreach ($data3 as $v2) {
                $return_array[] = array('value' => $v2->location);

            }
            // if matches found it first create the array of the result and then convert it to json format so that
            // it can be processed in the autocomplete script

        }
    }
    elseif ($option == 'car')
    {
        // 4: check if any matches found in the database table
        $data = DB::table('cars')->distinct()->select('name')->where('name', 'LIKE', $term.'%')->groupBy('name')->take(10)->get();

        if($data != null )
        {
            foreach ($data as $v) {
                $return_array[] = array('value' => $v->name);
            }

            // if matches found it first create the array of the result and then convert it to json format so that
            // it can be processed in the autocomplete script

        }
    }


    return Response::json($return_array);

});

Route::group(['prefix' => 'admin', 'middleware' => 'role.admin', 'namespace' => 'Super' ], function() {

    /**
     * Admin Service Discount
     */
    Route::patch('{service}/discount/{id}', 'Discount\DiscountController@update');
    Route::post('{service}/discount/{id}', 'Discount\DiscountController@store');
    Route::get('{service}/discount/{id}', 'Discount\DiscountController@index');

    /**
     * Admin Booking Panel
     */
    Route::group(['prefix' => 'booking', 'namespace' => 'Booking'], function() {
        Route::post('payment/{no}', 'BookingController@paymentHistory');

        Route::group(['prefix' => 'detail'], function() {
            Route::get('{no}/pdf-download', 'BookingController@pdfDownload');
            Route::get('{no}/print-preview', 'BookingController@printPreview');
            Route::get('{no}/pinEmail', 'BookingController@pinEmail');
            Route::get('{no}', 'BookingController@bookingDetail');
        });

        Route::group(['prefix' => 'new-booking'], function() {
            Route::get('{hotel_id}', 'BookingController@adminBooking');
            Route::post('/', 'BookingController@storeHotelBook');
            Route::get('/', 'BookingController@newBooking');
        });

        Route::patch('{id}', 'BookingController@update');
        Route::delete('id}', 'BookingController@destroy');
        Route::get('/', 'BookingController@index');
    });

    /**
     * Admin Tour Manage
     */
    Route::group(['prefix'=>'tours', 'namespace'=>'Tours'], function() {
        Route::get('manage', 'ToursController@manageTour');
        Route::get('status', 'ToursController@statusManage');
        Route::resource('category', 'CategoriesController');
        Route::resource('feature', 'FeatureController');
        Route::resource('gallery', 'TourGalleryController');
    });
    Route::resource('tours', 'Tours\ToursController');


    /**
     * Admin Car Manage
     * by kabir
     */
    Route::group(['prefix'=>'cars', 'namespace'=>'Cars'], function() {
        Route::get('manage', 'CarsController@manageCar');
        Route::resource('category', 'CategoriesController');
        Route::resource('facility', 'FacilityController');
    });
    Route::resource('cars', 'Cars\CarsController');



    /**
     * Admin Flight Manage
     * by kabir
     */
    Route::group(['prefix'=>'flights', 'namespace'=>'Flights'], function() {
        Route::get('manage', 'FlightsController@manageFlight');
//        Route::resource('category', 'CategoriesController');
        Route::resource('schedule', 'ScheduleController');
        Route::resource('facility', 'FacilityController');
    });
    Route::resource('flights', 'Flights\FlightsController');




    /**
     * Admin Hotel Manage
     */
    Route::group(['prefix'=>'hotels', 'namespace'=>'Hotels'], function() {
        Route::get('manage', 'HotelsController@manageHotel');
        Route::get('status', 'HotelsController@statusManage');
        Route::resource('category', 'CategoriesController');
        Route::resource('grade', 'GradeController');
        Route::resource('facility', 'FacilityTypeController');
        Route::get('hotel-facility', 'HotelFacilityController@index');
        Route::post('hotel-facility', 'HotelFacilityController@store');
        Route::get('hotel-room-facility', 'HotelRoomFacilityController@index');
        Route::post('hotel-room-facility', 'HotelRoomFacilityController@store');
        Route::resource('room', 'HotelRoomController');
        Route::resource('gallery', 'HotelGalleryController');
        Route::resource('room-type', 'RoomTypeController');
        Route::resource('vacancy', 'RoomVacancyController');

    });
    Route::resource('hotels', 'Hotels\HotelsController');



    /**
     * Admin All Users Manage
     */
    Route::group(['prefix'=>'users', 'namespace'=>'Users'], function() {
        Route::controller('manage',  'AdminController');
        Route::get('profile',  'UsersController@UserProfile');
        Route::patch('role',  'UsersController@roleUpdate');
    });
    Route::resource('users',  'Users\UsersController');


    /**
     * Admin Global setting
     */
    Route::group(['prefix'=>'site'], function() {
        Route::patch('/', 'SiteController@update');
        Route::get('/', 'SiteController@index');
    });

    /**
     * Admin Article Manager
     */
//    Route::group(['prefix'=>'articles', 'namespace'=>'Article'], function() {
//    });
    Route::resource('articles', 'Article\ArticlesController');


    /**
     * Admin Reviews Manager
     */
    Route::group(['prefix'=>'reviews', 'namespace'=>'Reviews'], function() {
        Route::resource('types', 'RatingTypesController');
        Route::get('/', 'ReviewsController@index');
    });


    /**
     * Agents Admin Panel
     */
    Route::group(['prefix'=>'agents', 'namespace'=>'Agents'], function() {

        Route::group(['prefix'=>'commission'], function() {
            Route::patch('{agentID}', 'AgentsController@agentCommissionUpdate');
            Route::get('{agentID}', 'AgentsController@agentCommission');
        });

        Route::group(['prefix'=>'hotels'], function() {
            Route::delete('{id}', 'AgentsController@deleteAssignHotel');
            Route::post('/', 'AgentsController@storeAssignHotel');
            Route::get('/', 'AgentsController@adminAssignHotelsForAgents');
        });

        Route::get('/', 'AgentsController@adminIndex');
    });

    /**
     * Billing @bipon
     */
    Route::group(['prefix'=>'billing'], function() {
        Route::get('{user_id}', 'AdminController@agentBill');
        Route::get('/', 'AdminController@billing');
    });


    /**
     * Admin Dashboard
     */
    Route::get('dashboard', [ 'as' => 'admin_dashboard_path', 'uses' => 'AdminController@index' ]);
    Route::get('/',['as'=>'admin', 'uses'=> 'AdminController@index']);

});


/**
 * Agents Dashboard
 */
Route::group(['prefix'=>'agents', 'middleware' => ['role.agent']], function() {
    Route::patch('profile/{id}', 'Agents\AgentsController@profileUpdate');
    Route::resource('hotel/gallery', 'Agents\HotelGalleryController');

    Route::get('booking/{id}','Agents\AgentsController@agentsBooking');
    Route::get('booking','Agents\AgentsController@agentsBookingSearch');
    Route::get('booking-invoice/{booking_no}','Booking\BookingController@printPreview');

    Route::get('dashboard','Agents\AgentsController@index');
    Route::put('markup', 'Agents\AgentsController@markup');
    Route::get('/','Agents\AgentsController@index');
});


/**
 * Fronted Pages
 */
Route::group(['prefix'=>'articles'], function() {
    Route::get('{id}', 'Article\ArticlesController@detail');
    Route::get('/', 'Article\ArticlesController@allArticle');
});



/**
 * Frontend Hotel
 */
Route::group(['prefix'=>'hotels'], function() {

    Route::group(['prefix'=>'booking'], function() {
        Route::get('confirm/{booking_no}/print-preview','Booking\BookingController@printPreview');
        Route::get('confirm/{booking_no}','Booking\BookingController@confirm');
        Route::post('complete/{booking_no}','Booking\BookingController@postComplete');
        Route::get('complete/{booking_no}','Booking\BookingController@complete');
        Route::get('edit/{booking_no}', 'Booking\BookingController@modTraveler');
        Route::post('update/{booking_no}', 'Booking\BookingController@updateTraveler');
        Route::get('{id}','Booking\BookingController@showHotelBook');
        Route::post('/','Booking\BookingController@storeHotelBook');
    });

    Route::group(['prefix'=>'search'], function() {
        Route::POST('words/means/', function(){

            $keyword = Str::lower(Input::get('auto'));
            $models = Word::where('word', '=', $keyword)->orderby('word')->take(10)->skip(0)->get();
            $count = count($models);
            return View::make('Dictionary.definition.means')->with("contents", $models)->with("counts", $count);
        });
        Route::get('{option}', 'Hotels\HotelsController@hotelSearch');
        Route::post('/', 'Hotels\HotelsController@hotelSearch');
        Route::get('/', 'Hotels\HotelsController@hotelSearch');
    });

    Route::get('detail/{hotel}',  [ 'as' => 'hotel.detail', 'uses' => 'Hotels\HotelsController@hotelDetail']);
    Route::get('/', 'Hotels\HotelsController@hotel');
});



/**
 * Frontend Tour
 */
Route::group(['prefix'=>'tours'], function() {
    Route::group(['prefix'=>'booking'], function() {
        Route::get('confirm/{booking_no}/print-preview','Booking\BookingController@printPreview');
        Route::get('confirm/{booking_no}','Booking\BookingController@confirm');
        Route::post('complete/{booking_no}','Booking\BookingController@postComplete');
        Route::get('complete/{booking_no}','Booking\BookingController@complete');
        Route::get('edit/{booking_no}', 'Booking\BookingController@modTraveler');
        Route::post('update/{booking_no}', 'Booking\BookingController@updateTraveler');
        Route::post('/','Booking\BookingController@storeTourBook');
        Route::get('/','Booking\BookingController@showTourBook');
    });

    Route::group(['prefix'=>'search'], function() {
        Route::get('{option}', 'Tours\ToursController@tourSearch');
        Route::post('/', 'Tours\ToursController@tourSearch');
        Route::get('/', 'Tours\ToursController@tourSearch');
    });

    Route::get('detail/{tour}',  [ 'as' => 'hotel.detail', 'uses' => 'Tours\ToursController@tourDetail']);
    Route::get('/', 'Tours\ToursController@tours');
});


/**
 * Frontend Car
 * By Kabir
 */
Route::group(['prefix'=>'cars'], function() {
    Route::group(['prefix'=>'booking'], function() {
        Route::get('confirm/{booking_no}','Booking\BookingController@confirm');
        Route::get('complete/{booking_no}','Booking\BookingController@complete');
        Route::post('/','Booking\BookingController@storeCarBook');
        Route::get('/','Booking\BookingController@showCarBook');
    });

    Route::group(['prefix'=>'search'], function() {
        Route::get('{option}', 'Cars\CarsController@carSearch');
        Route::post('/', 'Cars\CarsController@carSearch');
        Route::get('/', 'Cars\CarsController@carSearch');
    });

    Route::get('detail/{car}',  [ 'as' => 'car.detail', 'uses' => 'Cars\CarsController@carDetail']);
    Route::get('/', 'Cars\CarsController@cars');
});


/**
 * Frontend Flight
 * By Kabir
 */
//Route::group(['prefix'=>'flights'], function() {
//    Route::group(['prefix'=>'booking'], function() {
//        Route::get('confirm/{booking_no}','Booking\BookingController@confirm');
//        Route::get('complete/{booking_no}','Booking\BookingController@complete');
//        Route::post('/','Booking\BookingController@storeFlightBook');
//        Route::get('/','Booking\BookingController@showFlightBook');
//    });
//
//    Route::group(['prefix'=>'search'], function() {
//        Route::get('{option}', 'Flights\FlightsController@flightSearch');
//        Route::post('/', 'Flights\FlightsController@flightSearch');
//        Route::get('/', 'Flights\FlightsController@flightSearch');
//    });
//
//    Route::get('detail/{flight}',  [ 'as' => 'flight.detail', 'uses' => 'Flights\FlightsController@flightDetail']);
//    Route::get('/', 'Flights\FlightsController@flights');
//});


/**
 * Booking check
 * @bipon
 */
Route::get('booking-check', 'Booking\BookingController@bookingCheck');
Route::get('check-bookings/confirmation', 'Booking\BookingController@reconfirm');
Route::get('booking/complete/{booking_no}','Booking\BookingController@complete');
Route::post('booking-complete', 'Booking\BookingController@bookingComplete');


/**
 * Frontend Page
 */
Route::get('about-us', 'Pages\PagesController@AboutUs');
Route::get('faqs', 'Pages\PagesController@Faqs');
Route::get('contact-us', 'Pages\PagesController@ContactUs');
Route::post('contact-us-handler', 'Pages\PagesController@ContactUsMail');
Route::get('policy', 'Pages\PagesController@Policy');

/**
 * Frontend Review Handler
 */
Route::post('reviews', 'Reviews\ReviewsController@store');


/**
 * Fronend user Profile, booking etc manage
 */
Route::group(['prefix'=>'user', 'middleware' => ['role.register']], function() {
    Route::get('dashboard', 'User\UserDashboardController@index');
    Route::get('/', 'User\UserDashboardController@index');
});

/**
 * Fronend Error
 */
Route::get('403', function(){
    return view('errors.403');
});

/**
 * Frontend User Login/Register
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::controller('filemanager', 'FilemanagerLaravelController');
