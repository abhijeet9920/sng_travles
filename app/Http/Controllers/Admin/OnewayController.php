<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cars;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\OnewayRoutes;
use App\Models\OnewayEnquiries;
use App\Models\Schedules;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OnewayController extends Controller
{

    /**
     * GET request
     * Load add car form
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadOneway(Request $request)
    {
        $cars = Cars::where('is_active', 1)->select('model', 'id')->get();
        $days = config('constants.days');
        return view('admin.pages.rides.add_oneway', ['title' => 'Add Oneway Routes', 'cars' => $cars, 'days' => $days]);
    }

    /**
     * POST request
     * Sava car object into database
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Routing\Router
     */
    public function addOneWay(Request $request)
    {
        $route = new OnewayRoutes();
        $route->title = $request->get('title');
        $route->description = $request->get('description');
        $route->start_location = $request->get('start_location');
        $route->start_latlong = $request->get('start_latlong');
        $route->end_location = $request->get('end_location');
        $route->end_latlong = $request->get('end_latlong');
        $route->distance = $request->get('distance');
        $route->vehicle = $request->get('car_id');
        $route->rate = $request->get('rate');
        $route->running_schedule = json_encode($request->get('schedules'));
        $route->is_active = 1;
        $route->additional_info = json_encode(['start_point' => $request->get('start_additional'), 'end_point' => $request->get('end_additional')]);
        $route->save();
        return redirect('admin/oneway');
    }


    /**
     * GET request
     * Load container for car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function getOneway(Request $request)
    {
        return view('admin.pages.rides.oneway', ['title' => 'All Oneway Trips']);
    }

    /**
     * POST request
     * Get car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function getOnewayLists(Request $request)
    {
        $columns = array( 
            0 => 'title', 
            1 => 'start_location',
            2 => 'end_location',
            3 => 'distance',
            5 => 'rate'
        );
  
        $totalData = OnewayRoutes::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $cars = OnewayRoutes::with('car')->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $cars =  OnewayRoutes::with('car')->where('start_location', 'LIKE',"%{$search}%")
                            ->orWhere('end_location', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = OnewayRoutes::where('start_location', 'LIKE',"%{$search}%")
                                ->orWhere('end_location', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = array();
        if(!empty($cars))
        {
            foreach ($cars as $car)
            {
                $nestedData['id'] = base64_encode($car->id);
                $nestedData['title'] = $car->title;
                $nestedData['start_location'] = $car->start_location;
                $nestedData['end_location'] = $car->end_location;
                $nestedData['short_starting'] = $car->short_starting;
                $nestedData['short_ending'] = $car->short_ending;
                $nestedData['distance'] = $car->distance;
                $nestedData['vehicle'] = $car->car->model;
                $nestedData['vehicle_additional'] = 'A '.$car->car->seater_type.' seater '.$car->car->fuel.' powered '.$car->car->vehicle_type;
                $nestedData['rate'] = $car->rate;
                $data[] = $nestedData;
            }
        }
          
        $json_data = array(
            "draw" => intval($request->input('draw')),  
            "recordsTotal" => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data" => $data   
        );
        return response()->json($json_data);
    }

    public function editOneway(Request $request, $oneway){
        $id = base64_decode($oneway);
        $route = OnewayRoutes::find($id);
        if(!empty($route)){
            $cars = Cars::where('is_active', 1)->select('model', 'id')->get();
            $days = config('constants.days');
            return view('admin.pages.rides.edit_oneway', ['title' => 'Edit Oneway Routes', 'cars' => $cars, 'days' => $days, 'route' => $route, 'car_id' => $oneway]);
        }
        return redirect('admin/oneway')->withErrors(['msg' => 'Oops! Trip not found']);
    }


    public function getDistance(Request $request){
        $start = $request->get('origin');
        $destination = $request->get('destination');
        $json_url = "https://maps.googleapis.com/maps/api/distancematrix/json?destinations=place_id:$start&origins=place_id:$destination&key=".env('GOOGLE_LOC_KEY');
        $response = json_decode(file_get_contents($json_url), true);
        return $response['rows'][0]['elements'][0] ?? ['distance' => [], 'duration' => [], 'status' => false];
    }

    /**
     * GET request
     * Load container for car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function getBookingsPage(Request $request)
    {
        return view('admin.pages.rides.bookings', ['title' => 'All Oneway Bookings']);
    }

    /**
     * POST request
     * Get car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function getBookings(Request $request)
    {
        $columns = array( 
            0 => 'title', 
            1 => 'start_location',
            2 => 'end_location',
            3 => 'distance',
            5 => 'rate'
        );
  
        $totalData = OnewayEnquiries::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
            
        if(empty($request->input('search.value')))
        {            
            $enquiries = OnewayEnquiries::with('route')->offset($start)
                         ->limit($limit)
                         ->orderBy('ride_time', 'DESC')
                         ->get();
        }
        else {
            $search = $request->input('search.value');
            $enquiries =  OnewayEnquiries::with('route')->whereHas('route', function($query) use($search){
                                $query->where('start_location', 'LIKE', "%{$search}%")->orWhere('end_location', 'LIKE', "%{$search}%");
                            })->orWhere('user_mobile', 'LIKE',"%{$search}%")
                            ->orWhere('user_email', 'LIKE',"%{$search}%")
                            ->orderBy('ride_time', 'DESC')
                            ->offset($start)
                            ->limit($limit)
                            ->get();
            $totalFiltered = OnewayEnquiries::with('route')->whereHas('route', function($query) use($search){
                                $query->where('start_location', 'LIKE', "%{$search}%")->orWhere('end_location', 'LIKE', "%{$search}%");
                            })->orWhere('user_mobile', 'LIKE',"%{$search}%")
                            ->orWhere('user_email', 'LIKE',"%{$search}%")->count();
        }

        $data = array();
        if(!empty($enquiries))
        {
            foreach ($enquiries as $item)
            {
                $route = $item->route;
                $nestedData['id'] = base64_encode($item->id);
                $nestedData['title'] = $item->route->title;
                $nestedData['ride_short'] = 'From '.$route->start_location.' to '.$route->end_location;
                $nestedData['name'] = "$item->user_fname $item->user_lname";
                $nestedData['contact_no'] = $item->user_mobile;
                $nestedData['booking_time'] = Carbon::parse($item->ride_time)->format('D, dS M Y h:i a');
                $nestedData['is_confirmed'] = boolval($item->is_confirmed);
                $data[] = $nestedData;
            }
        }
          
        $json_data = array(
            "draw" => intval($request->input('draw')),  
            "recordsTotal" => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data" => $data   
        );
        return response()->json($json_data);
    }

    public function confirmBooking(Request $request){
        $id = base64_decode($request->get('oneway'));
        try{
            $booking = OnewayEnquiries::findOrfail($id);
            $schedules = new Schedules();
            $schedules->event_id = $id;
            $schedules->type = 'oneway';
            $schedules->save();
            return response()->json(['status' => true, "message" => "booking is Confirmed"]);
        }
        catch(ModelNotFoundException $ex){
            return response()->json(["status" => false, "message" => "Booking is not exists"]);
        }
    }
}