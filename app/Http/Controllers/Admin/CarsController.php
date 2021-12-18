<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\CarsConfiguration;
use App\Models\Cars;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarsController extends Controller
{

    /**
     * GET request
     * Load add car form
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadCarForm(Request $request)
    {
        $configurations = CarsConfiguration::pluck('config_value', 'config_name');
        return view('admin.pages.cars.add', ['title' => 'Add Vehicle', 'model' => $configurations['model'], 'fuel' => $configurations['fuel'], 'vehicle_ty' => $configurations['vehicle_ty'], 'seater_typ' => $configurations['seater_typ']]);
    }

    /**
     * POST request
     * Sava car object into database
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Routing\Router
     */
    public function addCar(Request $request)
    {
        $uplaoded_path = $request->file('car_image')->store('cars', 'uploads');
        $cars = new Cars();
        $cars->model = $request->car_model;
        $cars->fuel = $request->fuel_type;
        $cars->vehicle_type = $request->vehicle_type;
        $cars->seater_type = $request->seater_typ;
        $cars->is_carrier_attached = $request->is_carrier;
        $cars->images = $uplaoded_path;
        $cars->rate = $request->rate;
        $cars->is_active = 1;
        $cars->save();
        return redirect('admin/cars');
    }


    /**
     * GET request
     * Load container for car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function getCars(Request $request)
    {
        return view('admin.pages.cars.list', ['title' => 'All Vehicles']);
    }

    /**
     * POST request
     * Get car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function getCarsList(Request $request)
    {
        $columns = array( 
            0 => 'model', 
            1 => 'fuel',
            2 => 'vehicle_type',
            3 => 'seater_type',
            4 => 'is_carrier_attached',
            5 => 'rate'
        );
  
        $totalData = Cars::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $cars = Cars::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $cars =  Cars::where('id','LIKE',"%{$search}%")
                            ->orWhere('model', 'LIKE',"%{$search}%")
                            ->orWhere('fuel', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Cars::where('id','LIKE',"%{$search}%")
                                ->orWhere('model', 'LIKE',"%{$search}%")
                                ->orWhere('fuel', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = array();
        if(!empty($cars))
        {
            foreach ($cars as $car)
            {
                $nestedData['id'] = $car->id;
                $nestedData['model'] = $car->model;
                $nestedData['fuel_type'] = $car->fuel;
                $nestedData['seater_type'] = $car->seater_type;
                $nestedData['images'] = $car->images;
                $nestedData['vehicle_type'] = $car->vehicle_type;
                $nestedData['is_carrier_attached'] = $car->is_carrier_attached;
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

    /**
     * POST request
     * Get car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function getCar(Request $request, Cars $car)
    {
        return $car;
    }
}