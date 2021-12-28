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
        $type = $request->get('type');
        switch(strtolower($type)){
            case 'current':
                $start_date = Carbon::now()->firstOfMonth()->format('Y-m-d');
                $end_date = Carbon::now()->lastOfMonth()->format('Y-m-d');
                $events = OnewayEnquiries::join('am_schedules', function($join){
                            $join->on('am_schedules.event_id', '=', 'am_oneway_enquiries.id')
                                ->where('am_schedules.type', 'oneway');
                        })->whereBetween('ride_time', [$start_date, $end_date])
                        ->groupBy(DB::raw('DATE(ride_time)'))
                        ->select(DB::raw('count(1) as total_events, DATE(ride_time) as date'))->get();
                $list = [];
                foreach($events as $event){
                    $temp = [
                        'title' => 'Total '.$event->total_events.' rides',
                        'start' => $event->date,
                        'backgroundColor'=> '#f56954', //red
                        'borderColor' => '#f56954', //red
                        'allDay' => false
                    ];
                    $list[] = $temp;
                }
                return response()->json($list);
                break;
            case 'weekly':
                break;
            default:
                break;
        }
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