<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\CarsConfiguration;
use App\Models\Cars;
use App\Models\OnewayRoutes;

class HomeController extends Controller
{
    /**
     * Load landing page 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $latest = OnewayRoutes::latest()->take(3)->get();
        $oneway = []; $outstations = [];
        foreach($latest as $route){
            $car = $route->car;
            $temp['id'] = base64_encode($route->id);
            $temp['title'] = $route->title;
            $temp['rate'] = $route->rate;
            $temp['distance'] = number_format((float)($route->distance/1000), 3, '.', '').' kms';
            $temp['images'] = $car->images;
            $oneway[] = $temp;
        }
        return view('front.pages.home', ['title' => 'Home', 'oneways' => $oneway, 'outstations' => $outstations]);
    }


    /**
     * Load Book your car form 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadBookingForm(Request $request)
    {
        return view('front.pages.booking', ['title' => 'Book Your Car']);
    }

    /**
     * Load About us 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadAboutUs(Request $request)
    {
        return view('front.pages.about_us', ['title' => 'Who We Are']);
    }


    /**
     * Load Contact us 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadContactUs(Request $request)
    {
        return view('front.pages.contact_us', ['title' => 'Contact Us']);
    }


    /**
     * Load Our Cars us 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadOurCars(Request $request)
    {
        return view('front.pages.our_cars', ['title' => 'Our Cars']);
    }

    /**
     * Load One Way us 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadOneWay(Request $request)
    {
        $configurations = CarsConfiguration::pluck('config_value', 'config_name');
        $vehicle = []; $fuels = [];
        $car_types = DB::table('am_oneway_routes')->join('am_cars', 'am_oneway_routes.vehicle', '=', 'am_cars.id')->select('vehicle_type', DB::raw('count(1) as total'))->groupBy(DB::raw('vehicle_type with rollup'))->pluck('total', 'vehicle_type')->toArray();
        foreach($car_types as $car => $total){
            $key = ($car != '') ? $car : 'All';
            $vehicle[(string)$key] = $total;
        }
        $fuel_types = DB::table('am_oneway_routes')->join('am_cars', 'am_oneway_routes.vehicle', '=', 'am_cars.id')->select('fuel', DB::raw('count(1) as total'))->groupBy(DB::raw('fuel with rollup'))->pluck('total', 'fuel')->toArray();
        
        foreach($fuel_types as $fuel => $total){
            $index = ($fuel != '') ? $fuel : 'All';
            $fuels[$index] = $total;
        }
        $rate_filter = OnewayRoutes::select(DB::raw('MIN(rate) as min_rate, MAX(rate) as max_rate'))->first();
        $filter = ['vehicle' => $vehicle, 'fuel' => $fuels, 'rates' => $rate_filter];
        return view('front.pages.one_way', ['title' => 'Single Route', 'fuel' => $configurations['fuel'], 'type' => $configurations['vehicle_ty'], 'filter' => $filter]);
    }


    /**
     * Load Outstation 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadOutstation(Request $request)
    {
        return view('front.pages.outstation', ['title' => 'Intercity Rides']);
    }

}
