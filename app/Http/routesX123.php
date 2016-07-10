<?php


/**
 * Entrust Role Policy
 */
//Entrust::routeNeedsPermission('admin*', 'create-post');
Entrust::routeNeedsRole('admin*', 'owner');
Entrust::routeNeedsRole('hotel-dashboard*', 'hotel-manager');
Entrust::routeNeedsRole('agent*', 'agent');
Entrust::routeNeedsRole('user*', 'register');



Route::get('/', 'WelcomeController@index');
Route::get('/home', 'WelcomeController@index');


/**
 * Admin Dashboard
 */
Route::get('admin',['as'=>'admin', 'uses'=> 'Super\AdminController@index']);
Route::get('admin/dashboard', [ 'as' => 'admin_dashboard_path', 'uses' => 'Super\AdminController@index' ]);

/**
 * Admin Booking Panel
 */
Route::post('admin/booking/payment/{no}', 'Booking\BookingController@paymentHistory');
Route::get('admin/booking/detail/{no}/pdf-download', 'Booking\BookingController@pdfDownload');
Route::get('admin/booking/detail/{no}/print-preview', 'Booking\BookingController@printPreview');
Route::get('admin/booking/detail/{no}', 'Booking\BookingController@bookingDetail');

Route::get('admin/booking/new-booking/{hotel_id}', 'Booking\BookingController@adminBooking');
Route::post('admin/booking/new-booking', 'Booking\BookingController@storeHotelBook');
Route::get('admin/booking/new-booking', 'Booking\BookingController@newBooking');

Route::patch('admin/booking/{id}', 'Booking\BookingController@update');
Route::delete('admin/booking/{id}', 'Booking\BookingController@destroy');
Route::get('admin/booking', 'Booking\BookingController@index');


/**
 * Admin Tour Manage
 */
Route::get('admin/tours/manage', 'Tours\ToursController@manageTour');
Route::resource('admin/tours/category', 'Tours\CategoriesController');
Route::resource('admin/tours/feature', 'Tours\FeatureController');
Route::resource('admin/tours/gallery', 'Tours\TourGalleryController');
Route::resource('admin/tours', 'Tours\ToursController');

/**
 * Admin Car Manage
 * by kabir
 */
Route::get('admin/cars/manage', 'Cars\CarsController@manageCar');
Route::resource('admin/cars/category', 'Cars\CategoriesController');
Route::resource('admin/cars/facility', 'Cars\FacilityController');
Route::resource('admin/cars', 'Cars\CarsController');

/**
 * Admin Flight Manage
 * by kabir
 */
Route::get('admin/flights/manage', 'Flights\FlightsController@manageFlight');
Route::resource('admin/flights/category', 'Flights\CategoriesController');
Route::resource('admin/flights/schedule', 'Flights\ScheduleController');
Route::resource('admin/flights/facility', 'Flights\FacilityController');
Route::resource('admin/flights', 'Flights\FlightsController');

/**
 * Admin Hotel Manage
 */
Route::get('admin/hotels/manage', 'Hotels\HotelsController@manageHotel');
Route::resource('admin/hotels/category', 'Hotels\CategoriesController');
Route::resource('admin/hotels/grade', 'Hotels\GradeController');

Route::resource('admin/hotels/facility', 'Hotels\FacilityTypeController');

Route::get('admin/hotels/hotel-facility', 'Hotels\HotelFacilityController@index');
Route::post('admin/hotels/hotel-facility', 'Hotels\HotelFacilityController@store');

Route::get('admin/hotels/hotel-room-facility', 'Hotels\HotelRoomFacilityController@index');
Route::post('admin/hotels/hotel-room-facility', 'Hotels\HotelRoomFacilityController@store');

Route::resource('admin/hotels/room', 'Hotels\HotelRoomController');
Route::resource('admin/hotels/gallery', 'Hotels\HotelGalleryController');
Route::resource('admin/hotels/room-type', 'Hotels\RoomTypeController');
Route::resource('admin/hotels/vacancy', 'Hotels\RoomVacancyController');
//Route::resource('admin/hotels/booking', 'Hotels\HotelBookingController');
Route::resource('admin/hotels', 'Hotels\HotelsController');


/**
 * Admin All Users Manage
 */
Route::controller('admin/users/manage',  'Super\AdminController');
Route::get('admin/users/profile',  'Super\UsersController@UserProfile');
Route::patch('admin/users/role',  'Super\UsersController@roleUpdate');
//Rotue::patch('admin/users/{id}', 'UsersController@update');
Route::resource('admin/users',  'Super\UsersController');

/**
 * Admin Global setting
 */
Route::get('admin/site', 'Super\SiteController@index');
Route::patch('admin/site', 'Super\SiteController@update');


/**
 * Admin Article Manager
 */
Route::resource('admin/articles', 'Article\ArticlesController');

/**
 * Admin Reviews Manager
 */
Route::resource('admin/reviews/types', 'Reviews\RatingTypesController');
Route::get('admin/reviews', 'Reviews\ReviewsController@index');


/**
 * Agents Admin Panel
 */
Route::patch('admin/agents/commission/{agentID}', 'Agents\AgentsController@agentCommissionUpdate');
Route::get('admin/agents/commission/{agentID}', 'Agents\AgentsController@agentCommission');

Route::get('admin/agents/hotels', 'Agents\AgentsController@adminAssignHotelsForAgents');
Route::post('admin/agents/hotels', 'Agents\AgentsController@storeAssignHotel');
Route::delete('admin/agents/hotels/{id}', 'Agents\AgentsController@deleteAssignHotel');
Route::get('admin/agents', 'Agents\AgentsController@adminIndex');


/**
 * Agents Dashboard
 */
Route::patch('agents/profile/{id}', 'Agents\AgentsController@profileUpdate');
Route::resource('agents/hotel/gallery', 'Agents\HotelGalleryController');
Route::get('agents/booking/{id}','Agents\AgentsController@agentsBooking');
Route::get('agents/booking','Agents\AgentsController@agentsBookingSearch');
Route::get('agents/booking-invoice/{booking_no}','Booking\BookingController@printPreview');
Route::get('agents/dashboard','Agents\AgentsController@index');
Route::put('agents/markup', 'Agents\AgentsController@markup');
Route::get('agents','Agents\AgentsController@index');


/**
 * Fronted Pages
 */

Route::get('articles/{id}', 'Article\ArticlesController@detail');
Route::get('articles', 'Article\ArticlesController@allArticle');


/**
 * Frontend Hotel
 */
Route::get('hotels/booking/confirm/{booking_no}/print-preview','Booking\BookingController@printPreview');
Route::get('hotels/booking/confirm/{booking_no}','Booking\BookingController@confirm');
Route::get('hotels/booking/complete/{booking_no}','Booking\BookingController@complete');
Route::get('hotels/booking/{id}','Booking\BookingController@showHotelBook');
Route::post('hotels/booking','Booking\BookingController@storeHotelBook');
Route::get('hotels/detail/{hotel}',  [ 'as' => 'hotel.detail', 'uses' => 'Hotels\HotelsController@hotelDetail']);
Route::get('hotels/search/{option}', 'Hotels\HotelsController@hotelSearch');
Route::get('hotels/search', 'Hotels\HotelsController@hotelSearch');
Route::post('hotels/search', 'Hotels\HotelsController@hotelSearch');
Route::get('hotels', 'Hotels\HotelsController@hotel');

/**
 * Fronend user Profile, booking etc manage
 */
Route::get('user/dashboard', 'User\UserDashboardController@index');

/**
 * Fronend Error
 */
Route::get('403', function(){
    return view('errors.403');
});


/**
 * Frontend Page
 */
Route::get('about-us', 'Pages\PagesController@AboutUs');
Route::get('faqs', 'Pages\PagesController@Faqs');
Route::get('contact-us', 'Pages\PagesController@ContactUs');
Route::post('contact-us-handler', 'Pages\PagesController@ContactUsMail');
Route::get('policy', 'Pages\PagesController@Policy');

/**
 * Frontend User Login/Register
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/**
 * Frontend Review Handler
 */
Route::post('reviews', 'Reviews\ReviewsController@store');



/**
 * Billing @bipon
 */

Route::get('admin/billing', 'Super\AdminController@billing');
Route::get('admin/billing/{user_id}', 'Super\AdminController@agentBill');

/**
 * Agent view check
*/



/**
 *All the routes for tour
 * @bipon
 */



/**
 * Frontend Tour
 */

Route::get('tours/booking/confirm/{booking_no}','Booking\BookingController@confirm');
Route::get('tours/booking/complete/{booking_no}','Booking\BookingController@complete');
Route::get('tours/booking','Booking\BookingController@showTourBook');
Route::post('tours/booking','Booking\BookingController@storeTourBook');
Route::get('tours/detail/{tour}',  [ 'as' => 'hotel.detail', 'uses' => 'Tours\ToursController@tourDetail']);
Route::get('tours/search/{option}', 'Tours\ToursController@tourSearch');
Route::get('tours/search', 'Tours\ToursController@tourSearch');
Route::post('tours/search', 'Tours\ToursController@tourSearch');
Route::get('tours', 'Tours\ToursController@tours');

/**
 * Frontend Car
 * By Kabir
 */

Route::get('cars/booking/confirm/{booking_no}','Booking\BookingController@confirm');
Route::get('cars/booking/complete/{booking_no}','Booking\BookingController@complete');
Route::get('cars/booking','Booking\BookingController@showCarBook');
Route::post('cars/booking','Booking\BookingController@storeCarBook');
Route::get('cars/detail/{car}',  [ 'as' => 'car.detail', 'uses' => 'Cars\CarsController@carDetail']);
Route::get('cars/search/{option}', 'Cars\CarsController@carSearch');
Route::get('cars/search', 'Cars\CarsController@carSearch');
Route::post('cars/search', 'Cars\CarsController@carSearch');
Route::get('cars', 'Cars\CarsController@cars');

/**
 * Frontend Flight
 * By Kabir
 */

Route::get('flights/booking/confirm/{booking_no}','Booking\BookingController@confirm');
Route::get('flights/booking/complete/{booking_no}','Booking\BookingController@complete');
Route::get('flights/booking','Booking\BookingController@showBook');
Route::post('flights/booking','Booking\BookingController@storeTourBook');
Route::get('flights/detail/{flight}',  [ 'as' => 'flight.detail', 'uses' => 'Flights\FlightsController@flightDetail']);
Route::get('flights/search/{option}', 'Flights\FlightsController@flightSearch');
Route::get('flights/search', 'Flights\FlightsController@flightSearch');
Route::post('flights/search', 'Flights\FlightsController@flightSearch');
Route::get('flights', 'Flights\FlightsController@flights');


/**
 * Booking check
 * @bipon
 */
Route::get('booking-check', 'Booking\BookingController@bookingCheck');
Route::get('check-bookings/confirmation', 'Booking\BookingController@reconfirm');
Route::get('booking/complete/{booking_no}','Booking\BookingController@complete');
Route::post('booking-complete', 'Booking\BookingController@bookingComplete');


/**
 * End of all the routes of tour
 * @bipon
 */



Route::get('test', function(){
//    $startDate = '2009-01-28';
//    $enddate = '2009-01-30';
//    $dates = array($startDate);
//    while ($startDate != $enddate) {
//        $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
//        $dates[] = $startDate;
//    }
//    dd($dates);
//    $image = \Intervention\Image\ImageServiceProvider::make('http://localhost/images/shortcodes/gallery-popup/9.jpg');
//    $image->fit(600, 360);
//    return $image;
//    echo Form::select('animal', array(
//        'Cats' => array('leopard' => 'Leopard'),
//        'Dogs' => array('spaniel' => 'Spaniel'),
//    ));
    echo Form::open(['url'=>'agents/hotel/gallery', 'id'=>'fileupload', 'files'=>'true']) ;
    echo Form::text('name', null);
    echo Form::submit();
    echo Form::close();


});

Route::get('test2', function() {
    // create the validation rules ------------------------

});

