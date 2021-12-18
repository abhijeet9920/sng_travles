<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cars;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\OnewayRoutes;
use Validator;
use App\Models\OnewayEnquiries;

class OnewayController extends Controller
{

    /**
     * POST request
     * Get car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function getOnewayLists(Request $request)
    {
        if($request->has('filter')){
            switch($request->get('filter')){
                case 'range':
                    $model = OnewayRoutes::whereBetween('rate', [$request->get('min'), $request->get('max')]);
                    $response = $this->loadOnewayPrivate($request, $model);
                    return response()->json($response);
                case 'vehicle':
                    $value = $request->get('value');
                    $model = OnewayRoutes::join('am_cars', 'am_oneway_routes.vehicle', '=', 'am_cars.id')->where('vehicle_type', $value);
                    $response = $this->loadOnewayPrivate($request, $model);
                    return response()->json($response);
                case 'fuel':
                    $value = $request->get('value');
                    $model = OnewayRoutes::join('am_cars', 'am_oneway_routes.vehicle', '=', 'am_cars.id')->where('fuel', $value);
                    $response = $this->loadOnewayPrivate($request, $model);
                    return response()->json($response);
                default:
                    $model = OnewayRoutes::class;
                    $response = $this->loadOnewayPrivate($request, $model);
                    return response()->json($response);

            }

        }else{
            $model = OnewayRoutes::class;
            $response = $this->loadOnewayPrivate($request, $model);
            return response()->json($response);
        }
    }


    private function loadOnewayPrivate(Request $request, $model)
    {
        if($request->has('filter')){
            $routes = $model->select(DB::raw('am_oneway_routes.id as id'), 'title', DB::raw('am_oneway_routes.rate as rate'), 'distance', 'vehicle')->orderBy('rate', 'asc')->get();
        }else{
            $routes = $model::select('id', 'title', 'rate', 'distance', 'vehicle')->orderBy('rate', 'asc')->get();
        }
        $final_response = [];
        $final_html = '';
        foreach($routes as $route){
            $car = $route->car;
            $temp['id'] = base64_encode($route->id);
            $temp['title'] = $route->title;
            $temp['rate'] = $route->rate;
            $temp['distance'] = number_format((float)($route->distance/1000), 3, '.', '').' kms';
            $temp['images'] = $car->images;
            $final_response[] = $temp;
            $final_html .= '<div class="default-car-item col-lg-6 col-md-12 col-sm-6 col-xs-12">';
                $final_html .= '<div class="inner-box">';
                    $final_html .= '<div class="image-box">';
                        $final_html .= '<figure class="image"><a href="'.url('/one-way').'/'.base64_encode($route->id).'"><img src="data:'.$car->images['mime'].';base64,'.$car->images['source'].'" class="mult_img" alt="'.$route->title.'"></a></figure>';
                    $final_html .= '</div>';
                    $final_html .= '<div class="lower-content">';
                        $final_html .= '<h3><a href="'.url('/one-way').'/'.base64_encode($route->id).'">'.$route->title.'</a></h3>';
                        $final_html .= '<ul class="info clearfix">';
                            $final_html .= '<li>Fare: <span class="price"><strong><span>&#8377;</span>'.$route->rate.'</strong></span></li>';
                            $final_html .= '<li>Distance: <span class="price"><strong>'.$temp['distance'].'</strong></span></li>';
                        $final_html .= '</ul>';
                        $final_html .= '<div class="row">';
                        $final_html .= '<div class="col-md-6 col-sm-6 col-xs-6"><a href="'.url('/one-way').'/'.base64_encode($route->id).'" class="theme-btn btn-style-four btn-block">Detail</a></div>';
                        $final_html .= '<div class="col-md-6 col-sm-6 col-xs-6"><button class="theme-btn btn-style-four btn-block open_booking_form">Book Ride</button></div>';
                        $final_html .= '</div>';
                    $final_html .= '</div>';
                $final_html .= '</div>';
            $final_html .= '</div>';
        }
        if($request->has('mode') && $request->get('mode') == 'view'){
            return ['data' => $final_html];
        }
        return ['data' => $final_response];
    }

    public function loadDetailRide(Request $request, $oneway){
        $id = base64_decode($oneway);
        $route = OnewayRoutes::find($id);
        //return $route;
        if(!empty($route)){
            $cars = Cars::where('is_active', 1)->select('model', 'id')->get();
            $days = config('constants.days');
            return view('front.pages.one_way_single', ['title' => 'Book Your Ride', 'car' => $route->car, 'route' => $route, 'oneway' => $oneway, 'reviews' => ['count' => 0, 'data' => []]]);
        }
        return redirect('/one-way')->withErrors(['msg' => 'Oops! Trip not found']);
    }

    public function bookOneway(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_fname' => ['required', 'string', 'max:50'],
            'user_lname' => ['required', 'string', 'max:50'],
            'user_mobile' => ['required', 'digits:10'],
            'user_email' => ['required','email', 'max:255']
        ]);
        if($validator->fails()){
            $elem = [];
            $errors = $validator->errors()->getMessages();
            return response()->json(['invalid_elem' => collect($errors)->keys(), 'status' => false, 'message' => 'Some fields are missing']);
        }
        $enquiry = new OnewayEnquiries();
        $enquiry->oneway_id = base64_decode($request->hidden_oneway);
        $enquiry->user_fname = $request->user_fname;
        $enquiry->user_lname = $request->user_lname;
        $enquiry->user_email = $request->user_email;
        $enquiry->user_mobile = $request->user_mobile;
        $enquiry->ride_time = $request->hidden_pickuptime;
        $enquiry->is_confirm = 0;
        $enquiry->save();
        return response()->json(['status' => true, 'message' => '<p>Your booking is confirmed. We will send neccessary details in short</p>']);
    }
}