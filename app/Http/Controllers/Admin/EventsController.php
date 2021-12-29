<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\CarsConfiguration;
use App\Models\Cars;
use App\Models\OnewayEnquiries;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
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
        return view('admin.pages.events.oneway', ['title' => 'Oneway Schedules']);
    }

    /**
     * POST request
     * Load all events
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadEvents(Request $request)
    {
        $start_date = Carbon::parse($request->get('start'))->format('Y-m-d H:i:s');
        $end_date = Carbon::parse($request->get('end'))->format('Y-m-d H:i:s');
        $events = OnewayEnquiries::with('route')->join('am_schedules', function($join){
                    $join->on('am_schedules.event_id', '=', 'am_oneway_enquiries.id')
                        ->where('am_schedules.type', 'oneway');
                })->whereBetween('ride_time', [$start_date, $end_date])
                ->get();
        $list = [];
        foreach($events as $event){
            $temp = [
                'id' => $event->id,
                'title' => $event->route->title,
                'start' => $event->ride_time,
                'end' => Carbon::parse($event->ride_time)->addHour(),
                'backgroundColor'=> '#f56954', //red
                'borderColor' => '#f56954', //red
                'allDay' => false
            ];
            $list[] = $temp;
        }
        return response()->json($list);
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