<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Front')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('/booking', 'HomeController@loadBookingForm');
    Route::get('/about-us', 'HomeController@loadAboutUs');
    Route::get('/contact-us', 'HomeController@loadContactUs');
    Route::get('/our-cars', 'HomeController@loadOurCars');
    Route::prefix('/one-way')->group(function(){
        Route::get('/', 'HomeController@loadOneWay');
        Route::post('/lists', 'OnewayController@getOnewayLists');
        Route::get('/{oneway}', 'OnewayController@loadDetailRide');
        Route::post('/book', 'OnewayController@bookOneway');
    });
    Route::get('/outstation', 'HomeController@loadOutstation');
});
Route::get('/sample', function(){
    $fields = array(
        "message" => "Welcome to Sharayu's World. Please visit our website for daily/holiday cab services.",
        "language" => "english",
        "route" => "q",
        "numbers" => "8850304560",
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
            "authorization: ".env('SMS_KEY'),
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return ["cURL Error #:" . $err];
    } else {
        return $response;
    }
});
Auth::routes(['verify' => true]);
Route::get('/verify', function(){
    return abort(403, 'Your email is not verified yet');
})->name('verification');

Route::namespace('Admin')->group(function(){
    Route::prefix('admin')->group(function () {
        Route::get('/', 'HomeController@loadLogin');
        Route::post('/', 'HomeController@postLogin');
        Route::post('logout', 'HomeController@postLogout');
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/home', 'HomeController@loadHome');
            Route::get('/sample', function(){
                return view('admin.dashboard', ['title' => 'Layout']);
            });
            Route::prefix('cars')->group(function(){
                Route::get('/', 'CarsController@getCars');
                Route::post('/lists', 'CarsController@getCarsList');
                Route::get('/add', 'CarsController@loadCarForm');
                Route::post('/add', 'CarsController@addCar');
                Route::get('/{car}', 'CarsController@getCar');
            });
            Route::prefix('oneway')->group(function(){
                Route::get('/', 'OnewayController@getOneway');
                Route::post('/lists', 'OnewayController@getOnewayLists');
                Route::get('/add', 'OnewayController@loadOneway');
                Route::post('/add', 'OnewayController@addOneWay');
                Route::post('/distance', 'OnewayController@getDistance');
                Route::get('/bookings', 'OnewayController@getBookingsPage');
                Route::post('/bookings', 'OnewayController@getBookings');
                Route::get('/{oneway}', 'OnewayController@editOneway');
            });
            Route::prefix('/events')->group(function(){
                Route::get('/oneway', 'EventsController@loadOnewayCal');
                Route::get('/outstations', 'EventsController@loadOutstationCal');
            });
        });
    });
});