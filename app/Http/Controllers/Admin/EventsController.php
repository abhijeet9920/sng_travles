<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\CarsConfiguration;
use App\Models\Cars;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventsController extends Controller
{

    /**
     * GET request
     * Load add car form
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadOnewayCal(Request $request)
    {
        $configurations = CarsConfiguration::pluck('config_value', 'config_name');
        return view('admin.pages.cars.add', ['title' => 'Add Vehicle', 'model' => $configurations['model'], 'fuel' => $configurations['fuel'], 'vehicle_ty' => $configurations['vehicle_ty'], 'seater_typ' => $configurations['seater_typ']]);
    }



    /**
     * GET request
     * Load container for car list
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadOutstationCal(Request $request)
    {
        return view('admin.pages.cars.list', ['title' => 'All Vehicles']);
    }

}